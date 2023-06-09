<div class="container">
    <form id="res_contactless" action="{{route('templateSubmit')}}" method="POST" enctype="multipart/form-data" >
        @csrf
      <input type="hidden" name="template_name" value="res_contactless_menu">
    <div class="row">
        <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Upload PDF
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <input type="file" class="form-control" name="pdf_file">
                        </div>
                      </div>
                    </div>

                    {{-- Design starts  --}}
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Design And Customization 
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <div class="design_container">
                          <input type="hidden" id="design_id" name="design_id" value="">
                              <div class="row">
                                  @foreach (getDefaultDesignColor() as $design)
                                      <div class="col-md-2 me-2 border template_design_box" 
                                      data-design_id="{{$design->id}}"
                                      data-primary_color="{{$design->primary_color}}"
                                      data-button_color ="{{$design->button_color}}"  
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
                    {{-- Design ends  --}}

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
                                        <p> Company </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="company" id="company" class="form-control" value="Min Thet Paing">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Title </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="title" id="title" class="form-control" value="this is my company">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Description  </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <textarea type="text" name="description" id="description" class="form-control"> This is the it company  </textarea>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Website </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="website" id="website" class="form-control" value="minthetpaing.com">
                                    </div>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    {{-- Basic Information ends  --}}

                    {{-- Welcome screen starts  --}}
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Welcome Screen 
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
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
                        @include('preview_template.res_contactless_menu')
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
        <div class="col-md-12">
            <div class="d-flex justify-content-around">
                <button id="second_back" class="btn btn-primary btn-sm"> Back </button>
                <button type="submit" class="btn btn-primary btn-sm"> Next </button>
            </div>
        </div>
    </div>
</form>
</div>


<script src="{{asset('js/style.js')}}"></script>
<script>  
    $(document).ready(function() {
      var company = $('#company').val()
      var title = $('#title').val()
      var description = $('#description').val()
      var website = $('#website').val()

      $('#preview_company').html(company)
      $('#preview_title').html(title)
      $('#preview_description').html(description)
      $('#preview_website').html(website)

      $('#company').on('change', function() {
        var company = $(this).val()
        $('#preview_company').html(company)
      })

      $('#title').on('change', function() {
        var title = $(this).val()
        $('#preview_title').html(title)
      })

      $('#description').on('change', function() {
        var description = $(this).val()
        $('#preview_description').html(description)
      })
      
      $('#website').on('change', function() {
        var website = $(this).val()
        $('#preview_website').html(website)
      })
    })
</script>