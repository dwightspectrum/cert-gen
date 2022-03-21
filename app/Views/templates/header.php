<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hotware Certificate Generator</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/settings/hwi-logo-r.png" rel="icon">
  <link href="assets/img/settings/hwi-logo-r.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/plugins/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/plugins/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/plugins/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/plugins/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/plugins/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Scripts here -->
  <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="assets/img/settings/hwi-logo-r.png" alt="">
        <span class="d-none d-lg-block"><img src="assets/img/settings/hwi_logo.png" alt=""></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/avatar.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2" id="header_username"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6 id="user"></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-heading">Steps</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/steps">
          <i class="bi bi-bar-chart-steps"></i>
          <span>Ventilator Protocol</span>
        </a>
      </li>
      <li class="nav-heading">List</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/items">
          <i class="bi bi-minecart-loaded"></i>
          <span>Items</span>
        </a>
      </li>
      <li class="nav-heading">Maintenance</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cert-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-honor-of-kings-line"></i><span>Ventilator</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cert-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pum-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-gas-station-line"></i><span>Pump</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pum-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#burn-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-fire-line"></i><span>Burner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="burn-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#elec-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-flashlight-line"></i><span>Electric Cable</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="elec-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#edb-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-clipboard-line"></i><span>EDB</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="edb-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#cro-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-vip-crown-line"></i><span>Crown Rise</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cro-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#safe-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-shield-keyhole-line"></i><span>Safety Valve</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="safe-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-journal-plus"></i><span>Create Certificate</span>
            </a>
          </li>
          <li>
            <a href="/certificate-ventilator">
              <i class="bi bi-list"></i><span>Records List</span>
            </a>
          </li>

        </ul>
      </li>
      <!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->
  <style>
    .sidebar-nav .nav-content a i {
    font-size: 15px;
    margin-right: 8px;
    line-height: 0;
    border-radius: 50%;
}
  </style>
  <main id="main" class="main">
  <!-- <script type="module" src="assets/js/main.js"></script> -->