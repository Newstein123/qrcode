<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\ProductQr;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request)
    {   
        $products = ProductQr::paginate(12) ;
        
        // $page = request('page') ?? 1;
        // $perpage = request('perpage') ?? 10;
        // $client = new Client();
        // $response = $client->request('GET', 'http://localhost:8000/api/product/?page='.$page.'&perpage='.$perpage);
        // $statusCode = $response->getStatusCode(); // e.g. 200
        // $body = $response->getBody();
        // $data = json_decode($body, true);
        // $product_data = $data['data'];
        // $total = $data['total'];
        // $products = collect(array_map(function ($item) {
        //     return (object) $item;
        // }, $product_data));

        // $paginator = new LengthAwarePaginator(
        //     $products->forPage($page, $perpage), // data for the current page
        //     $total, // total number of items
        //     $perpage, // items per page
        //     $page, // current page
        //     ['path' => $request->url()] // additional query parameters
        // );
        return view('products.index', compact('products'));
    }

    public function show($code)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8000/api/fire_qr/'.$code);
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $product = (object) $data['data'];
        return view('products.detail', compact('product'));   
    }


}
