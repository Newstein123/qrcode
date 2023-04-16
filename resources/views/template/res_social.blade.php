<div class="container">
    <form id="res_contactless" action="{{route('templateSubmit')}}" method="POST" enctype="multipart/form-data" >
        @csrf
      <input type="hidden" name="template_name" value="res_socail_media">
    <div class="row">
        <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Design And Customization 
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div class="design_container">
                              <div class="row">
                                  <input type="hidden" name="design_id" id="design_id">
                                  @foreach (getDefaultDesignColor() as $design)
                                      <div class="col-md-2 me-2 border template_design_box"
                                      data-design_id = "{{$design->id}}" 
                                      data-primary_color="{{$design->primary_color}}"
                                      data-button_color ="{{$design->button_color}}"  
                                      data-primary_text_color ="{{$design->primary_text_color}}"  
                                      data-button_text_color ="{{$design->button_text_color}}"  
                                      >
                                          <div class="primary_color" style="background-color:  {{$design->primary_color}}"> 
                                          </div>
                                          <div class="button_color" style="background-color: {{$design->button_color}}">
                                          </div>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5> Primary Color </h5>
                                    <input type="color" name="primary_color" id="primary_color" class="form-control my-3 w-25">
                                </div>
                                <div class="col-md-6">
                                    <h5> Button Color </h3>
                                    <input type="color" name="button_color" id="button_color" class="form-control my-3 w-25">
                                </div>

                            </div>
                        </div>
                      </div>
                    </div>

                    {{-- Basic Information starts  --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            Basic Infomation 
                          </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <div class="p-5">
                                <p> Provide your infomations for your business </p>
                                <div class="row">
                                    <div class="col-md-4 my-3">
                                        <p> HeadLine </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="headline" id="headline" class="form-control" value="Min Thet Paing">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> About Us  </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="about_us" id="about_us" class="form-control" value="this is my company">
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    {{-- Basic Information ends  --}}

                    {{-- Socail Media Icons starts --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           Social Media Channels 
                          </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <div class="p-3">
                                  <small> Add your username or page to social media pages below.</small>
                                  <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <p> Facebook </p>
                                        </div>
                                        <div>
                                            <i class="fa-brands fa-facebook fs-1"></i>
                                        </div>
                                        <div>
                                            <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Url </label>
                                                <input type="text" class="form-control" name="facebook_url" placeholder="www.example.com">
                                              </div>
                                              <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Text </label>
                                                <input class="form-control" name="facebook_text"/>
                                              </div>
                                        </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <p> Twitter </p>
                                        </div>
                                        <div>
                                            <i class="fa-brands fa-twitter fs-1"></i>
                                        </div>
                                        <div>
                                            <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Url </label>
                                                <input type="text" class="form-control" name="twitter_url" placeholder="www.example.com">
                                              </div>
                                              <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Text </label>
                                                <input class="form-control" name="twitter_text"/>
                                              </div>
                                        </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div>
                                            <p> Website </p>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-globe"></i>
                                        </div>
                                        <div>
                                            <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Url </label>
                                                <input type="text" class="form-control" name="web_url" placeholder="www.example.com">
                                              </div>
                                              <div class="mb-3 d-flex">
                                                <label class="form-label me-3"> Text </label>
                                                <input class="form-control" name="web_text"/>
                                              </div>
                                        </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    {{-- Social media icons ends  --}}

                    {{-- Welcome screen starts  --}}
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWelcome" aria-expanded="false" aria-controls="collapseWelcome">
                          Welcome Screen 
                        </button>
                      </h2>
                      <div id="collapseWelcome" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="p-5">
                                <p> Display Your Image While Page is Loading </p>
                                <img src="{{asset('storage\image\1681579001_res_temp.jpg')}}" alt="" id="preview_image" class="img-fluid">
                                <input type="file" name="preview_image" id="preview_image_file" class="form-control my-2">
                                <button class="btn btn-primary btn-sm my-3" id="pre"> Preview </button>
                            </div>
                        </div>
                      </div>
                    </div>
                    {{-- Welcome screen ends  --}}

                    {{-- Advanced Starts  --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdvancedOption" aria-expanded="false" aria-controls="collapseAdvancedOption">
                            Advanced Option 
                          </button>
                        </h2>
                        <div id="collapseAdvancedOption" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <div class="row">
                                    <div class="col-md-4">
                                        <small> Sharing </small>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="checkbox" name="shared_link" id="shared_link"> 
                                        <small> Add a share button to the page </small>
                                    </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    {{-- Advanced Ends  --}}
                </div>
                {{-- Accordian ends  --}}
    
                {{-- FeedBack Starts  --}}
                <div class="p-5">
                    <h3> We Want Your Feed Back </h3>
                    <small>How can we improve this Solution? What other features would you like to have?</small>
                    <textarea name="feedback" id="feedback" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>

            {{-- Preview Starts  --}}
            <div class="col-md-4">
                <div class="p-3">
                    <div class="bg-light">
                        <p id="preview_template" class="btn btn-primary"> Preview </p>
                        <p id="preview_qr" class="btn btn-primary"> Qr Code </p>
                    </div>
                    <div class="preview_box">
                        @include('preview_template.res_social_media')
                    </div>
                    <div class="preview_qr text-center" style="display : none">
                      <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('Make me into an QrCode!')) !!} ">
                      <p class="mt-2">
                        Scan this QR Code to preview
                          You can customize the design of your
                          QR Code in the next step.
                      </p>
                    </div>
                </div>
            </div>
            {{-- Preview Ends  --}}
            {{-- QR Code starts  --}}
            <div class="col-md-12">
                <div class="d-flex justify-content-around">
                    <button id="second_back" class="btn btn-primary btn-sm"> Back </button>
                    <button type="submit" class="btn btn-primary btn-sm"> Next </button>
                </div>
            </div>
            {{-- QR Code ends  --}}
    </div>
</form>
</div>

<script src="{{asset('js/style.js')}}"></script>
<script>
  $(document).ready(function() {
    $('#shared_link').on('change', function() {
      if ($(this).is(":checked")) {
        $('.shared_link_button').hide();
      } else {
        $('.shared_link_button').show();
      }
    })
  })
</script>