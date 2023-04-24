<?php

namespace App\Http\Controllers\ApiProduct;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request)
    {       
        $page = request('page') ?? 1;
        $perpage = request('perpage') ?? 3;
        $client = new Client();
        $response = $client->request('GET', 'https://chanmyanmar.fwsdemopages.com/api/product?page='.$page.'&perpage='.$perpage);
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $product_data = $data['data'];
        $total = $data['total'];
        $products = collect(array_map(function ($item) {
            return (object) $item;
        }, $product_data));

        $paginator = new LengthAwarePaginator(
            $products->forPage($page, $perpage), // data for the current page
            $total, // total number of items
            $perpage, // items per page
            $page, // current page
            ['path' => $request->url()] // additional query parameters
        );
        return view('products.index', compact('products', 'paginator'));
    }

    public function show($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://chanmyanmar.fwsdemopages.com/api/product/'.$id);
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $product = (object) $data['data'];
        return view('products.detail', compact('product'));   
    }


}
