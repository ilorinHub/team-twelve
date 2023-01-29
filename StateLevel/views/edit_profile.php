<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">Edit Profile</li>
      </ol>
    </nav>
    <?= $web_app->showAlert( $msg ) ?>
  </div><!-- End Page Title -->

  <div class="row">
    <div class="col-md-12 m-auto">
      <form method="POST">
        <h5>Please, fill in the details below!</h5>
        <div class="row">
          <div class="form-group col-md-6  mt-3">
            <label class="fw-bold" for="full_name">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="full_name" id="full_name" class="form-control" required placeholder="Full Name" value="<?= $web_app->persistData( $full_name, true ) ?>"  maxlenght="100">
          </div>

          <div class="form-group col-md-6  mt-3">
            <label for="gender" class="fw-bold">Gender: <span class="text-danger">*</span></label>
            <div>
              <?php
                if ( $gender == 'male' ) 
                {
                  echo '<label class="me-1"><input type="radio" name="gender" id="gender" value="male" checked > Male</label>
                    <label><input type="radio" name="gender" id="gender" value="female"> Female</label>';
                }
                elseif ( $gender == 'female' ) 
                {
                  echo '<label><input type="radio" name="gender" id="gender" value="male" > Male</label>
                  <label><input type="radio" name="gender" id="gender" value="female" checked> Female</label>';
                }
                else
                {
                  echo '<label class="me-1"><input type="radio" name="gender" id="gender" value="male"> Male</label>
                    <label><input type="radio" name="gender" id="gender" value="female"> Female</label>';
                }
              ?>
            </div>
          </div>

          <div class="form-group col-md-6  mt-3">
            <label class="fw-bold" for="state">State <span class="text-danger">*</span></label>
            <input type="text" name="state" id="state" class="form-control" required placeholder="State" maxlenght="30" value="<?= $web_app->persistData( $state, true ) ?>">
          </div>
          <div class="form-group col-md-6  mt-3">
            <label for="email" class="fw-bold">Email: <span class="text-danger">*</span></label>
            <div>
              <input type="email" name="email" id="email" placeholder="Email" required maxlength="100" class="form-control" value="<?= $web_app->persistData( $email, true ) ?>">
            </div>
          </div>
          <div class="form-group col-md-6  mt-3">
           <label for="phn_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
           <div class="input-group">
              <div class="input-group-text">+234</div>
              <input type="text" class="form-control" name="phn_num" id="phn_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( $phn_num, true ) ?>">
           </div>
          </div>
          <div class="form-group  col-md-6 mt-3">
            <label class="fw-bold" for="username">Username <span class="text-danger">*</span></label>
            <input type="text" name="username" class="form-control" id="username" required placeholder="Enter Name" maxlenght="100" disabled value="<?= $web_app->persistData( $username, true ) ?>">
          </div>
          
          <div class="text-center mt-3">
            <button type="submit" name="edit_btn" id="edit_btn" class="btn btn-success" >Edit</button>
          </div>

        </div>
      </form>

    </div>
  </div>
</main><!-- End #main -->