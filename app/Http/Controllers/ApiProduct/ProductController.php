<?php

namespace App\Http\Controllers\ApiProduct;

use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    // public function index(Request $request)
    // {       
    //     $page = request('page') ?? 1;
    //     $client = new Client();
    //     $response = $client->request('GET', 'https://productqr.fsd.gov.mm/api/product');
    //     $statusCode = $response->getStatusCode(); // e.g. 200
    //     $body = $response->getBody();
    //     $data = json_decode($body, true);
    //     $product_data = $data['data'];
    //     $total = $data['total'];
    //     $categories = collect(array_map(function ($item) {
    //         return (object) $item;
    //     }, $product_data));

    //     $categoryWithProducts = [];
    //     foreach ($categories as $category) {
    //         if(count($category->product) > 0) {
    //             $categoryWithProducts[] = $category;
    //         } 
    //     }
    //     // $paginator = new LengthAwarePaginator(
    //     //     $products->forPage($page, $perpage), // data for the current page
    //     //     $total, // total number of items
    //     //     $perpage, // items per page
    //     //     $page, // current page
    //     //     ['path' => $request->url()] // additional query parameters
    //     // );
    //     return view('products.index', compact('categoryWithProducts', 'page'));
    // }

    public function show($id)
    {  
        $client = new Client();
        $response = $client->request('GET', 'https://productqr.fsd.gov.mm/api/product/'.$id);
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $product = (object) $data['data'];
        return view('products.detail', compact('product'));   
    }

    public function index(Request $request)
    {   
        $page = request('page') ?? 1;
        $perpage = request('perpage') ?? 9;
        $category = request('category') ?? '';
        $client = new Client();
        $response = $client->request('GET', 'https://productqr.fsd.gov.mm/api/category?page='.$page.'&perpage='.$perpage. '&category='.$category);
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $categories = (object) $data['data'];
        $product_data = $data['products'];
        $total = $data['total_products'];
        $products = collect(array_map(function ($item) {
            return (object) $item;
        }, $product_data));
        if($category) {
            $paginator = new LengthAwarePaginator(
                $products->forPage($page, $perpage), // data for the current page
                $total, // total number of items
                $perpage, // items per page
                $page, // current page
                ['path' => '/product?category='.$category] // additional query parameters
            );
        } else {
            $paginator = new LengthAwarePaginator(
                $products->forPage($page, $perpage), // data for the current page
                $total, // total number of items
                $perpage, // items per page
                $page, // current page
                ['path' => $request->url()] // additional query parameters
            );
        }
        return view('products.category', compact('categories', 'products', 'paginator'));
    }
}
