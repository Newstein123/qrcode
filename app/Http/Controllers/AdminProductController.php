<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AdminProductController extends Controller
{
    public function index()
    {   
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function qrDownload ($id)
    {
        $image = QrCode::format('png')->size(200)->merge(public_path('fsd-qr-img.jpg'), 0.2, true)->generate(url('/product/'.$id));
        return response($image)->header('Content-type','image/png')->header('Content-Disposition', 'attachment; filename=fire_vehicles_qr.png');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
       $name = $request->name;
       $type = $request->type;
        Product::create([
        'name' => $name,
        'type' => $type,
        'model_no' => '388383',
        'country' => 'Myanmmar',
        'export_date' => date('Y-m-d'),
        'usage' => "အသုံးဝင်သည်",
        'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis facere obcaecati cum, tempore esse doloribus nam aspernatur dolorem architecto minus?",
        'image' => '',
       ]);

       return redirect('/admin/product')->with('message', 'Product created successfully');
    }
}
