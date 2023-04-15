<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_qrs()
    {   
        $qr_codes = QrCode::all();
        return view('qrcode.index', compact('qr_codes'));
    }

    public function get_preview_template($name)
    {
        if($name == 'res_contactless_menu') {
            return view('preview_template.res_contactless_menu');
        } elseif($name == 'res_social_media') {
            return view('preview_template.res_social_media');
        }

        return redirect()->back();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qrcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $qr_code = QrCode::findOrFail($id);
        return view('qrcode.show', compact('qr_code'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function showTemplate(string $code)
    {   
        $qr_code = QrCode::where('qr_name', $code)->first();
        if($qr_code->template_id == 1) {
            return view('show_template.res_contactless', compact('qr_code'));
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }

    public function getTemplate(Request $request)
    {
        $image_name = $request->image_name;   
        return getTemplate($image_name);
    }

    public function storeTemplate(Request $request)
    {
        $pdf = $request->file('pdf_file');
        $image = $request->file('preview_image');
        $company = $request->company;
        $title = $request->title;
        $description = $request->description;
        $website = $request->website;
        $feedback = $request->feedback;
        $primary_color = $request->primary_color;
        $button_color = $request->button_color;
        $template_id = $request->template->id ?? 1;
        $user_id = 1;

        // storing design 

        if($primary_color && $button_color) {
            $design = Design::create([
                'primary_color' => $primary_color,
                'button_color' => $button_color,
            ]);
        }
        $design_id = $request->design_id ?? $design->id;
        // storing pdf 

        if($request->hasFile('pdf_file')) {
            $pdf_name = time(). '_'.$pdf->getClientOriginalName();
            Storage::disk('public')->put('pdf/'.$pdf_name, file_get_contents($pdf));
        }

        // Storing Image 

        if($request->hasFile('preview_image')) {
            $image_name = time(). '_'.$image->getClientOriginalName();
            Storage::disk('public')->put('image/'.$image_name, file_get_contents($image));
        }

        $qr_name = generateRandomString(10);

        $info = array(
            'pdf' => $pdf_name,
            'perview_image' => $image_name,
            'company' => $company,
            'title' => $title,
            'description' => $description,
            'website' => $website,
        );

        QrCode::create([
            'design_id' => $design_id,
            'template_id' => $template_id,
            'user_id' => $user_id,
            'qr_info' => json_encode($info),
            'feedback' => $feedback,
            'expired_date' => now()->addDay(15),
            'qr_name' => $qr_name,
        ]);

        return redirect()->back();
    }
}
