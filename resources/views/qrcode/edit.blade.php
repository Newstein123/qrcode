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
                </div>
                <div class="col-md-8">
                    <div class="design-box">
                        <h3> Frame </h3>
                        <p> Some Frame image </p>
                    </div>
                    <div class="design-box">
                        <h3> Print Template </h3>
                        <p> Some Print Template </p>
                    </div>
                    <div class="design-box">
                        <h3> QR Code  </h3>
                        <select name="" id="qr_style" class="form-control">
                            <option value="dot"> Dot </option>
                            <option value="square"> Square </option>
                            <option value="round"> Round </option>
                        </select>
                        <select name="" id="qr_eye_style" class="form-control my-3">
                            <option value="square"> Square </option>
                            <option value="circle"> Circle </option>
                        </select>
                    </div>
                    <div class="design-box">
                        <h3> Logo  </h3>
                        <p> Some Logo Design   </p>
                    </div>
                    <div class="design-box">
                        <h3>  Short Url </h3>
                        <p> Some Logo Design   </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>