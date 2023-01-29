<!-- === START MAIN === -->
<main class="col-11 m-auto">
  <div class="d-flex justify-content-center mt-5 mb-3">
    <a href="#" class="logo d-flex align-items-center w-auto">
      <img src="assets/img/white_logo.png" alt="Logo" >
    </a>
  </div><!-- End Logo -->
  <?= $web_app->showAlert( $msg ) ?>
   <form enctype="multipart/form-data" method="Post" >
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
         <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <h6 class="fw-bold text-success">Personal Information</h6>
            </button>
         </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body row">
              <div class="form-group col-md-6 row mt-3">
                <label for="full_name" class="fw-bold">Full Name: <span class="text-danger">*</span></label>
                <div>
                  <input type="text" name="full_name" id="full_name" required maxlength="100" class="form-control" placeholder="Full Name" value="<?= $web_app->persistData( 'full_name', false, $clear ) ?>">
                </div>
              </div>

              <div class="form-group col-md-6 row mt-3">
                <label for="email" class="fw-bold">Email: <span class="text-danger">*</span></label>
                <div>
                  <input type="email" name="email" id="email" required maxlength="100" class="form-control" placeholder="Email" value="<?= $web_app->persistData( 'email', false, $clear ) ?>">
                </div>
              </div>

              <div class="form-group col-md-6 row mt-3">
               <label for="phone_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
               <div class="input-group">
                  <div class="input-group-text">+234</div>
                  <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( 'phone_num', false, $clear ) ?>">
               </div>
              </div>

              <div class="form-group col-md-6 row mt-3">
                <label for="gender" class="fw-bold">Gender: <span class="text-danger">*</span></label>
                <div>
                  <?php
                    if ( isset( $_POST['gender'] ) && !$clear && $gender_m ) 
                    {
                      echo '<label class="me-1"><input type="radio" name="gender" id="gender" value="male" checked > Male</label>
                        <label><input type="radio" name="gender" id="gender" value="female"> Female</label>';
                    }
                    elseif ( isset( $_POST['gender'] ) && !$clear && $gender_f ) 
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

            </div>
          </div>
        </div>
        <div class="accordion-item">
         <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <h6 class="fw-bold text-success">Organisation Information</h6>
            </button>
         </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body row">
              <div class="form-group col-md-6 row mt-3">
                <label for="org_name" class="fw-bold">Name: <span class="text-danger">*</span></label>
                <div>
                  <input type="text" name="org_name" id="org_name" required maxlength="100" placeholder="Name" class="form-control" value="<?= $web_app->persistData( 'org_name', false, $clear ) ?>">
                </div>
              </div>

              <div class="form-group col-md-6 row mt-3">
                <label for="org_email" class="fw-bold">Email: <span class="text-danger">*</span></label>
                <div>
                  <input type="email" name="org_email" id="org_email" placeholder="Email" required maxlength="100" class="form-control" value="<?= $web_app->persistData( 'org_email', false, $clear ) ?>">
                </div>
              </div>
              <div class="form-group col-md-6 row mt-3">
               <label for="org_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
               <div class="input-group">
                  <div class="input-group-text">+234</div>
                  <input type="text" class="form-control" name="org_num" id="org_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( 'org_num', false, $clear ) ?>">
               </div>
              </div>

              <div class="form-group col-md-6 row mt-2">
                <label for="logo" class="fw-bold">Logo: </label>
                <div>
                  <input type="file" name="logo" id="logo" required class="form-control">
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="address" class="fw-bold">Address: <span class="text-danger">*</span></label>
                <div>
                  <textarea name="address" id="address" placeholder="Enter Address" class="form-control" maxlength="1000"><?= $web_app->persistData( 'address', false, $clear ) ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
         <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <h6 class="fw-bold text-success">Account Information</h6>
            </button>
         </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body row">
              <div class="form-group col-md-6 row mt-3">
                <label for="username" class="fw-bold">Username: <span class="text-danger">*</span></label>
                <div>
                  <input type="text" name="username" id="username" placeholder="Username" required maxlength="20" class="form-control" value="<?= $web_app->persistData( 'username', false, $clear ) ?>">
                </div>
              </div>
              <div class="form-group col-md-6 row mt-3">
                <label for="pword" class="fw-bold">Password: <span class="text-danger">*</span></label>
                <div>
                  <input type="password" name="pword" id="pword" placeholder="Password" required maxlength="15" class="form-control" value="<?= $web_app->persistData( 'pword', false, $clear ) ?>">
                </div>
              </div>
              <div class="form-group col-md-6 row mt-3">
                <label for="con_pword" class="fw-bold">Confirm Password: <span class="text-danger">*</span></label>
                <div>
                  <input type="password" name="con_pword" id="con_pword" placeholder="Password" required maxlength="15" class="form-control" value="<?= $web_app->persistData( 'con_pword', false, $clear ) ?>">
                </div>
              </div>        
            </div>
          </div>
        </div>

    </div>

    <div class="text-center mt-4 mb-4">
      <button name="submit_btn" id="submit_btn" class="btn btn-success">Submit</button>
      <p class="mt-2">Have an account ? <a href="./">Login</a></p>
    </div>
   </form>
</main><!-- End #main -->