<div class="pagetitle">
   <h1>Dashboard</h1>
   <nav>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
      </ol>
   </nav>
</div>
<div class="col-lg-8">
   <div class="row d-flex justify-content-center">
      <div class="col-xxl-4 col-md-6">
         <div class="card info-card sales-card">
            <div class="card-body">
               <h5 class="card-title">Ventilator <span>| Maintenance</span></h5>
               <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <i class="ri-honor-of-kings-line"></i>
                  </div>
                  <div class="ps-3">
                     <span class="pt-1 fw-bold fs-2" style="color: #4154f1;"><?=$ventilator?></span>
                     <span class="text-muted small pt-2 ps-1">Total Reports</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Sales Card -->
      <!-- Revenue Card -->
      <div class="col-xxl-4 col-md-6">
         <div class="card info-card revenue-card">
            <div class="card-body">
               <h5 class="card-title">Pump <span>| Maintenance</span></h5>
               <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <i class="ri-gas-station-line"></i>
                  </div>
                  <div class="ps-3">
                     <span class="pt-1 fw-bold fs-2" style="color: #2eca6a;"><?=$pump?></span>
                     <span class="text-muted small pt-2 ps-1">Total Reports</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Revenue Card -->
      <!-- Customers Card -->
      <div class="col-xxl-4 col-xl-12">
         <div class="card info-card customers-card">
            <div class="card-body">
               <h5 class="card-title">Burner <span>| Maintenance</span></h5>
               <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                     <i class="ri-fire-line"></i>
                  </div>
                  <div class="ps-3">
                     <span class="pt-1 fw-bold fs-2" style="color: #ff771d;"><?=$burner?></span>
                     <span class="text-muted small pt-2 ps-1">Total Reports</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    window.addEventListener('load', (e) => {
      NProgress.done();
    })
  </script>
<style>
   .sales-card .card-icon {
   color: #4154f1;
   background: #f6f6fe;
   }
   element.style {
   }
   .dashboard .sales-card .card-icon {
   color: #4154f1;
   background: #f6f6fe;
   }
   .customers-card .card-icon {
   color: #ff771d;
   background: #ffecdf;
   }
   .revenue-card .card-icon {
   color: #2eca6a;
   background: #e0f8e9;
   }
   .card-icon {
   font-size: 32px;
   line-height: 0;
   width: 64px;
   height: 64px;
   flex-shrink: 0;
   flex-grow: 0;
   }
   .info-card h6 {
   font-size: 28px;
   color: #012970;
   font-weight: 700;
   margin: 0;
   padding: 0;
   }
</style>