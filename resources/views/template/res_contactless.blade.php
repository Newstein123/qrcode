<div class="container">
    <form id="res_contactless" action="{{route('templateSubmit')}}" method="POST" enctype="multipart/form-data" >
        @csrf
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
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Design And Customization 
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          
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
                                        <p> Company </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="company" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Title </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="title" id="" class="form-control">
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Description  </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <textarea type="text" name="description" id="" class="form-control"> </textarea>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <p> Website </p>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <input type="text" name="website" id="" class="form-control">
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
                                <input type="file" name="preview_image" id="" class="form-control my-2">
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
            <div class="col-md-4">
                <div class="p-3">
                    <div class="bg-light">
                        <button id="preview_template" class="btn btn-primary"> Preview </button>
                        <button id="preview_qr" class="btn btn-primary"> Qr Code </button>
                    </div>
                </div>
            </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-around">
                <button id="second_back" class="btn btn-primary btn-sm"> Back </button>
                <button type="submit" class="btn btn-primary btn-sm"> Next </button>
            </div>
        </div>
    </div>
</form>
</div>