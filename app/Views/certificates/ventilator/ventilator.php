<div class="card">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="card-title">Maintenance Ventilator</h5>
        <div>
          <button type="button" class="btn btn-success " id="UpdateButton"><i class="bi bi-save"></i> Save</button>
          <button type="button" class="btn btn-primary "><i class="bi bi-file-pdf"></i> Generate</button>
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
              <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Isolation</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Signature</button>
          </li>
      </ul>

      <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="certificate" role="tabpanel" aria-labelledby="home-tab">
          </div>
          <div class="tab-pane fade" id="verify" role="tabpanel" aria-labelledby="profile-tab">
          </div>
          <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
              Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
          </div>
      </div>
    </div>
</div>




<!-- 
<div class="col-lg-12">
  <div class="bg-white">
    <h5 class="p-3 mb-0" style="font-size: 1.4em;">Maintenance Ventilator</h5>
</div>
<div id="certificate"></div>
<div class="row">
  <div class="col-lg-6">
    <div class="d-grid gap-2 mt-3">
      <button type="button" class="btn btn-success " id="UpdateButton"><i class="bi bi-save"></i> Save</button>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="d-grid gap-2 mt-3">
      <button type="button" class="btn btn-primary "><i class="bi bi-file-pdf"></i> Generate</button>
    </div>
  </div>
</div>   -->

<script type="module" src="assets/js/ventilator.js"></script>

<style>
  .form-control:disabled, .form-control[readonly] {
    background-color: transparent;
    opacity: 1;
    cursor: not-allowed;
  }
  .table tbody, .table thead{
    border-top: 2px solid transparent!important;
}
  .table thead > tr {
    background: #111827;
    color: white;
  }
</style>