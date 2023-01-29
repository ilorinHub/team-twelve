
<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="text-success">My Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item text-success"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item text-success">My Profile</li>
      </ol>
    </nav>
    <?= $web_app->showAlert( $msg ) ?>
  </div><!-- End Page Title -->

  	<div class="card p-5">
  		<div class="row">
  			<div class="col-md-8">
  				<div class="row">
		      	<div class="col-md-6">
		      		<label class="fw-bold">Name</label>
		      		<p class="fw-bold text-success text-capitalize"><?= $full_name?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Email</label>
		      		<p class="fw-bold text-success text-capitalize"><?= $email ?></p>
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
		      		<label class="fw-bold">Organization Name</label>
		      		<p class="fw-bold text-success text-capitalize"><?= $org_name ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Organization Email</label>
		      		<p class="fw-bold text-success text-capitalize"><?= $org_email ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Organization Phone Number</label>
		      		<p class="fw-bold text-success text-capitalize"><?= "+234".$org_phn_no ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Organization Address</label>
		      		<p class="fw-bold text-success text-capitalize"><?= $address ?></p>
		      	</div>
		      </div>
	      </div>
	      <div class="col-md-4">
	      	<img src="<?= $image_path ?>" class=" img rounded col-md-8 m-auto">
	      	<div class="mt-2 text-center">
	      		<a href="edit_profile?id = $acct_id" class="btn btn-success">Edit Profile</a>
	      	</div>
	      </div>
  		</div>
  	</div>
</main><!-- End #main -->