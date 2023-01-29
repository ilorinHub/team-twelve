<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Revenue Monitoring</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/white_logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

  <!-- datatables -->
  <link href="assets/vendor/new_datatables/datatables.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
   if ( !( $page == 'login' || $page == 'sign_up' ) )
   {

      include_once ('models/Organisation.php');
      $org_dt = new Organisation();

      $acct_dt = $acct_info->getById( [ $_SESSION[ 'account_id' ] ] );
      $logo = $org_dt->getByAccountId( [ $_SESSION[ 'account_id' ] ] )['logo'];
      $username = $acct_dt['username'];
      $image_path = "assets/uploads/".$logo;
      

      
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

   <div class="d-flex align-items-center justify-content-between">
    <a href="#" class="logo d-flex align-items-center">
      <img src="assets/img/white_logo.png" alt="">
      <!-- <span class="d-none d-lg-block">Admin</span> -->
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
   </div><!-- End Logo -->

   <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <p class="text-success fw-bold pt-3 d-none d-sm-block"><?= $username ?></p>
      <li class="nav-item dropdown pe-3">

       <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="<?= $image_path ?>" alt="Profile" class="rounded-circle">
       </a><!-- End Profile Iamge Icon -->

       <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#password">
           <i class="bi bi-lock text-success"></i>
           <span>Change Password</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout">
           <i class="bi bi-box-arrow-right text-success"></i>
           <span>Logout</span>
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
      <a class="nav-link text-dark" href="dashboard">
       <i class="bi bi-grid-fill text-success"></i>
       <span>Dashboard</span>
      </a>
    </li>
      
    <li class="nav-item">
      <a class="nav-link text-dark" href="profile">
       <i class="bi bi-person-circle text-success"></i>
       <span>My Profile</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-dark" href="customers">
       <i class="bi bi-people-fill text-success"></i>
       <span>Customers</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-dark" href="categories">
       <i class="bi bi-wallet-fill text-success"></i>
       <span>Payment Categories</span>
      </a>
    </li>

   </ul>

  </aside><!-- End Sidebar-->

  <?php 
    }

      if ( isset( $_POST['change_pword_btn'] ) ) 
      {
        //Getting user input
        $pword = $_POST['pword'];
        $con_pword = $_POST['con_pword'];

        // Validating input
        if ( $pword && $con_pword ) 
        {
          if ( $pword == $con_pword ) 
          {

            include_once( 'controllers/admin_auth.php' );

            $enc_pword = $acct_info->encPword( $pword );
            // Collect data into array respectively to db fields
            $dt_01 = [ $enc_pword, $acct_id ];
            $update_pword = $acct_info->updatePwordById( $dt_01 );

            // When Password updated 
            if ( $update_pword ) 
            {
              $msg = $web_app->showAlertMsg( 'success', 'Password Updated!' );
              
            }
            else
            {
              $msg = $web_app->showAlertMsg( 'danger', 'Sorry, Password Not Updated!' );
            }
        } 
        else 
        {
          $msg = $web_app->showAlertMsg( 'danger', "Password Doesn't Match!" );
        }
      }
      else
      {
        $msg = $web_app->showAlertMsg( 'danger', 'Please, Enter Required Data!' );
      }
    }
   
  ?>