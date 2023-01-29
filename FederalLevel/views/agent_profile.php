
<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="text-success"> Profile</h1>
    <?= $web_app->showAlert( $msg ) ?>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item text-success"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item text-success"> Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active  text-success" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
      </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card p-5">
          <div class="row">
            <div>
              <div class="row">
                <div class="col-md-6">
                  <label class="fw-bold">Full Name</label>
                  <p class="fw-bold text-success text-capitalize"><?= $full_name ?></p>
                </div>
                <div class="col-md-6">
                  <label class="fw-bold">Email</label>
                  <p class="fw-bold text-success text-capitalize"><?= $email ?></p>
                </div>
                <div class="col-md-6">
                  <label class="fw-bold">State</label>
                  <p class="fw-bold text-success text-capitalize"><?= $state ?></p>
                </div>
                <div class="col-md-6">
                  <label class="fw-bold">Phone Number</label>
                  <p class="fw-bold text-success text-capitalize"><?= "+234".$phone_num ?></p>
                </div>
                <div class="col-md-6">
                  <label class="fw-bold">gender</label>
                  <p class="fw-bold text-success text-capitalize"><?= $gender ?></p>
                </div>
                <div class="col-md-6">
                  <label class="fw-bold">Total User Added</label>
                  <p class="fw-bold text-success text-capitalize"><?= $customer_dt ?></p>
                </div>
              </div>
              <p class="text-center fw-bold">Total Amount Generated : </p>
            </div>

          </div>
        </div>

      </div>

    </div>

</main><!-- End #main -->





