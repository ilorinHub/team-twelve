<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Revenue Collection</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/white_logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../FederalLevel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../FederalLevel/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../FederalLevel/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../FederalLevel/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../FederalLevel/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../FederalLevel/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="../FederalLevel/assets/fonts/flaticon/font/flaticon.css">

  <!-- datatables -->
  <link href="../FederalLevel/assets/vendor/new_datatables/datatables.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../FederalLevel/assets/css/style.css" rel="stylesheet">

</head>

<body>

  <?php 
   if ( !( $page == 'login' ) )
   {
      $agent_dt = $agent->getById( [ $_SESSION[ 'agent_id' ] ] );
      $username = $agent_dt['username'];
      $image_path = "assets/uploads/exco/avatar.png";
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

      <p class="text-success d-none d-sm-block pt-3"> <?= $username ?> </p>
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
       <i class="bi bi-person-fill text-success"></i>
       <span>My Profile</span>
      </a>
    </li>


   </ul>

  </aside><!-- End Sidebar-->

  <?php 
    }

      //Todo: include objects
      if ( isset( $_POST['save_btn'] ) ) 
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

            $enc_pword = $agent->encPword( $pword );
            // Collect data into array respectively to db fields
            $dt_01 = [ $enc_pword, $agent_id ];
            $update_pword = $agent->updatePwordById( $dt_01 );

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