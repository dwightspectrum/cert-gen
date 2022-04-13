<div class="container">
  <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h5 class="card-title">Maintenance Ventilator</h5>
          <div>
            <button type="button" class="btn btn-success " id="updateButton"><i class="bi bi-save"></i> Update</button>
          </div>
        </div>      

        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#certificate" type="button" role="tab" aria-controls="home" aria-selected="true">Ventilator Data</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#verify" type="button" role="tab" aria-controls="profile" aria-selected="false">Verify Placed</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#isolation" type="button" role="tab" aria-controls="contact" aria-selected="false">Isolation</button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#signature" type="button" role="tab" aria-controls="contact" aria-selected="false">Signature</button>
            </li>
        </ul>

        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="certificate" role="tabpanel" aria-labelledby="home-tab"></div>
          <div class="tab-pane fade" id="verify" role="tabpanel" aria-labelledby="profile-tab" style="width: 40%; margin: auto;"></div>
          <div class="tab-pane fade " id="isolation" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row mt-3">
              <label class="col-sm-2 col-form-label">
                <b>Isolation, resistance to earth</b>
                <br>meassurement voltage: <i>1000VDC</i><br>
                <br>minimum acceptable resistance:
                <br><i>up to 240V = 0,2MΩ / up to 600V = 0,5MΩ</i><br>
                <br>Tested with Device:
                <br><i>Fluke 1653B, Multifunction Tester</i>				  				
              </label>
              <div class="col-sm-10">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control isolation" id="floatingL1" data-label="l1" placeholder="L1">
                  <label for="floatingL1">L1</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control isolation" id="floatingL2" data-label="l2" placeholder="L2">
                  <label for="floatingL2">L2</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control isolation" id="floatingL3" data-label="l3" placeholder="L3">
                  <label for="floatingL3">L3</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea class="form-control isolation" data-label="remarks" placeholder="Remarks" id="floatingTextarea" style="height: 100px;"></textarea>
                  <label for="floatingTextarea">Remarks</label>
                </div>
                <div class="form-floating mb-3"> 
                  <select class="form-select form-control isolation" data-label="safety" style="cursor: pointer;" >
                    <option value="" >Select</option>
                    <option value="OK" >OK</option>
                    <option value="Fail">Fail</option>
                  </select>  
                  <label class="form-check-label" for="gridCheck">Function and Safety of device without defect/fault</label>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="signature" role="tabpanel" aria-labelledby="contact-tab">
            
            <form class="row">
              <div class="col-7">
                <div id-output="output"></div>
                <div class="text-center mt-2">
                  <button type="button" class="btn btn-primary rounded-pill mr-2" id="modalSignature-btn" >Draw Signature</button>
                  <button type="button" class="btn btn-secondary rounded-pill" id="clearSignature">Clear</button>
                </div>
              </div>
              <div class="col-4">
                <div class="me-5" style="margin-top: 5rem;">
                  <div class="form-floating ">
                    <input type="text" class="form-control signatures" id="floatingInspector" placeholder="Inspector" data-signify="inspector">
                    <label for="floatingInspector">Inspector</label>
                  </div>
                  <div class="form-floating mt-3">
                    <input type="text" class="form-control signatures" id="floatingPlace" placeholder="Place" data-signify="place">
                    <label for="floatingPlace">Place</label>
                  </div>
                  <div class="form-floating mt-3" >
                    <input type="date" class="form-control signatures" id="floatingDate" placeholder="Date" data-signify="date"> 
                    <label for="floatingDate">Date</label>
                  </div>
                </div>
              </div>
            </form>

            <div class="modal fade " id="modalSignature" tabindex="-1" data-bs-backdrop="static" aria-modal="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Signature</h5> 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body"> 
                  <canvas width="470" height="300" style="touch-action: none;border-color: 1px blue;background-color: #2630790f;"></canvas>
                  </div>
                  <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-action="clear">Clear</button> 
                    <button type="button" class="btn btn-primary" data-action="save-png">Save</button>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
  </div>
</div>
<script>
  const VENTILATOR_ID = <?= json_encode($ventilator) ?>
</script>
<script src="<?=base_url()?>/assets/js/signature/signature_pad.umd.min.js"></script>
<script src="<?=base_url()?>/assets/js/signature/signature.js"></script>
<script src="<?=base_url()?>/assets/js/ventilator/ventilator_update.js"></script>
<link href="<?=base_url()?>/assets/css/table-style.css" rel="stylesheet">
