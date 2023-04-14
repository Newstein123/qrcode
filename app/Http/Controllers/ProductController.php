<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    public function index(Request $request)
    {      
        
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8000/api/product');
        $statusCode = $response->getStatusCode(); // e.g. 200
        $body = $response->getBody();
        $data = json_decode($body, true);
        $product_data = $data['data'];
        $links = $data['links'];
        $meta = $data['meta'];
        $total = $data['total'];
        $products = collect(array_map(function ($item) {
            return (object) $item;
        }, $product_data));

        // / Create a paginator object
        $currentPage = $data['meta']['current_page'];
        $perPage = $data['meta']['per_page'];
        $total = $data['meta']['total'];
        $paginationLinks = $data['links'];
        $paginator = new LengthAwarePaginator($products, $total, $perPage, $currentPage);

        // Generate pagination links
        $links = $paginator->links('pagination::bootstrap-4', ['paginator' => $paginationLinks]);
        return view('products.index', compact('products', 'links'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail', compact('product'));   
    }


}
