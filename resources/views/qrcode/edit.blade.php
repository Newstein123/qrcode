  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div id="loading" style="display : none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <p> Scan Me </p>
                    <div class="text-center qr-design">
                        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('this is qr_code')) !!} ">
                    </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-pirmary btn-sm"> Download </button>
                        <button type="button my-3" class="btn btn-warning btn-sm rounded" id="save_qrcode"> Save Your Changes</button>
                    </div>

                </div> 
                <div class="col-md-8 qr_main_design">
                    <div class="design-box">
                        <h3> Frame </h3>
                        <div class="d-flex justify-content-between">
                            <img src="{{asset('frame1.png')}}" alt="#A0522D" width="100px" class="qr-frame">
                            <img src="{{asset('frame2.png')}}" alt="#000000" width="100px" class="qr-frame">
                            <img src="{{asset('frame3.png')}}" alt="#C3D825" width="100px" class="qr-frame">
                            <img src="{{asset('frame4.png')}}" alt="#DC3545" width="100px" class="qr-frame">
                            <img src="{{asset('frame5.png')}}" alt="#FFC107" width="100px" class="qr-frame">
                        </div>
                    </div>
                    <div class="design-box">
                        <h3> Print Template </h3>
                        <p> Some Print Template </p>
                    </div>
                    <div class="design-box">
                        <div class="d-flex justify-content-between">
                            <h3> QR Code  </h3>
                            <button id="qrstyle_moreoption" class="btn btn-outline-primary btn-sm"> -> more option </button>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div>
                                <img class="w-50 qr-style" src="{{asset('qr-code/style.square.png')}}" alt="square">
                            </div>
                            <div>
                                <img class="w-50 qr-style" src="{{asset('qr-code/style.dot.png')}}" alt="dot">
                            </div>
                            <div>
                                <img class="w-50 qr-style" src="{{asset('qr-code/style.round.png')}}" alt="round">
                            </div>
                        </div>
                    </div>
                    <div class="design-box">
                        <h3> Logo  </h3>
                        <form id="qr_logo_upload" enctype="multipart/form-data">
                            <input type="file" name="qr_logo" id="imageInput">
                            <button type="submit" class="btn btn-sm btn-primary"> save </button>
                        </form>
                    </div>
                    <div class="design-box">
                        <h3>  Short Url </h3>
                        <p> Some Logo Design   </p>
                    </div>
                </div>

                {{-- Qr Option  --}}
                <div class="col-md-8 qrstyle_option" style="display : none">
                    <button id="goBackToMainDesign" class="btn btn-danger btn-sm"> back </button>
                    <div class="row">
                        <div class="col-md-12">
                            <h4> Shape color </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="code_color"> Code Color </label>
                                    <input type="color" name="" id="qrcode_color" class="form-control w-25">                          
                                </div>
                                <div class="col-md-6">
                                    <label for="code_color"> Background Color </label>
                                    <input type="color" name="" id="qrcode_bg_color" value="#ffffff" class="form-control w-25">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4> Shape Style </h4>
                            <div class="d-flex justify-content-around">
                                <div>
                                    <img class="w-50 qr-style" src="{{asset('qr-code/style.square.png')}}" alt="square">
                                </div>
                                <div>
                                    <img class="w-50 qr-style" src="{{asset('qr-code/style.dot.png')}}" alt="dot">
                                </div>
                                <div>
                                    <img class="w-50 qr-style" src="{{asset('qr-code/style.round.png')}}" alt="round">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4> Eye Style </h4>
                            <div class="d-flex justify-content-around">
                                <div>
                                    <img class="w-50 qr-eye-style" src="{{asset('qr-code/eye.circle.png')}}" alt="circle">
                                </div>
                                <div>
                                    <img class="w-50 qr-eye-style" src="{{asset('qr-code/eye.square.png')}}" alt="square">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Storing the value  --}}

                <input type="hidden" value="square" name="qr_style" id="qr_style_input">
                <input type="hidden" value="square" name="qreye_style" id="qreye_style_input">
                <input type="hidden" value="" name="qreye_style" id="qr_frame_input">
            </div>      
        </div>
      </div>
    </div>
  </div>