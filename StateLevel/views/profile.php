<?= $web_app->showAlert( $msg , true ) ?>

<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>My Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">My Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  	<div class="card p-5">
  		<div class="row">
  			<div>
  				<div class="row">
		      	<div class="col-md-6">
		      		<label class="fw-bold">Full Name</label>
		      		<p class="fw-bold text-primary text-capitalize"><?= $full_name ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Email</label>
		      		<p class="fw-bold text-primary text-capitalize"><?= $email ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">State</label>
		      		<p class="fw-bold text-primary text-capitalize"><?= $state ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">Phone Number</label>
		      		<p class="fw-bold text-primary text-capitalize"><?= "+234".$phone_num ?></p>
		      	</div>
		      	<div class="col-md-6">
		      		<label class="fw-bold">gender</label>
		      		<p class="fw-bold text-primary text-capitalize"><?= $gender ?></p>
		      	</div>
		      	<div class="col-md-6 text-center text-md-start">
		      		<a class='btn btn-success text-white my-1' href="edit_profile?id=<?= $_SESSION[ 'agent_id' ] ?>" target='_blank'>Edit Profile</a>
		      	</div>
		      </div>
	      </div>

  		</div>
  	</div>
</main><!-- End #main -->