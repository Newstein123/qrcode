<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Http;

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
        $response = Http::post('https://api.qr-code-generator.com/v1/create?access-token=QwsHvdjsHDrCOP2T7YhllDe6rRESPU02HsCbeMYZd77I4nSpvhKxH_KzPF7JQ2nw', [
            "frame_name" => "top-header",
            "qr_code_text" => "https://www.qr-code-generator.com/",
            "image_format" => "SVG",
            "background_color" => "#ffffff",
            "foreground_color" => "#fa6e79",
            "marker_right_inner_color" => "#2d7cda",
            "marker_right_outer_color" => "#00bfff",
            "marker_left_template" => "version13",
            "marker_right_template" => "version13",
            "marker_bottom_template" => "version13",
            "frame_icon_name" => "app"
        ]);
        
        if ($response->ok()) {
            $data = simplexml_load_string($response->body());
            $svg_image = $data->svg->asXML();
            return view('qrcode.create', compact('svg_image'));
        } else {
            // API returned an error status code, handle the error
            $error = $response->status().' '.$response->reason();
        }
        return view('qrcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_qr_design(Request $request)
    {   
        if($request->hasFile('image')) {
            $style = $request->style;
            $code_color = hexaToRGB($request->code_color);
            $code_bg_color =hexaToRGB($request->code_bg_color);
            $eye = $request->eye;
            $file = $request->file('image');
            $filename = time() . '_' .$request->file('image')->getClientOriginalName();
            $path = 'qr-image/';
            $file->move(public_path($path), $filename);
            return view('qrcode.qr_design', compact('style', 'eye', 'code_color', 'code_bg_color', 'filename'));
        }

        $code_color = hexaToRGB($request->code_color) ;
        $code_bg_color = hexaToRGB($request->code_bg_color);
        $eye = $request->eye;
        $style = $request->style;
        return view('qrcode.qr_design', compact('style', 'eye', 'code_color', 'code_bg_color'));
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
        } elseif($qr_code->template_id == 2) {
            return view('show_template.res_social_media', compact('qr_code'));
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

        $template_name = $request->template_name;

        // Contactless Menu 
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
        $design_id = $request->design_id;
        $user_id = 1;

        // Socail Media

        $headline = $request->headline;
        $about_us = $request->about_us;
        $facebook_url = $request->facebook_url;
        $facebook_text = $request->facebook_text;
        $twitter_url = $request->twitter_url;
        $twitter_text = $request->twitter_text;
        $web_url = $request->web_url;
        $web_text = $request->web_text;
        $shared_link = $request->shared_link;

    
        // storing design if the colors are not exist 

        if(!Design::where('primary_color', $primary_color)->where('button_color', $button_color)->exists()) {
            $design = Design::create([
                'primary_color' => $primary_color,
                'button_color' => $button_color,
            ]);
            $design_id = $design->id;
        } 

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

        if($template_name == 'res_contactless_menu') {
            $info = array(
                'pdf' => $pdf_name,
                'perview_image' => $image_name,
                'company' => $company,
                'title' => $title,
                'description' => $description,
                'website' => $website,
            );
        } elseif($template_name == 'res_socail_media') {
            $info = array(
                'preview_image' => $image_name,
                'headline' => $headline,
                'about_us' => $about_us,
                'facebook_url' => $facebook_url,
                'facebook_text' => $facebook_text,
                'twitter_url' => $twitter_url,
                'twitter_text' => $twitter_text,
                'web_url' => $web_url,
                'web_text' => $web_text,
                'shared_link' => $shared_link,
            );  
        }

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
