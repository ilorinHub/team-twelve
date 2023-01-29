<!-- === START MAIN === -->
<main class="main" id="main">
  <div class="pagetitle h1 mt-5">
    <h1 class="text-success fw-bold">Edit Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item text-success">Edit Profile</li>
      </ol>
    </nav>
    <?= $web_app->showAlert( $msg ) ?>
  </div><!-- End Page Title -->

  <div class="row">
      <div>
         <form enctype="multipart/form-data" method="Post" >
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                 <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <h5 class="fw-bold text-success">Personal Information</h5>
                    </button>
                 </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body row">
                      <div class="form-group col-md-6 row mt-3">
                        <label for="full_name" class="fw-bold">Full Name: <span class="text-danger">*</span></label>
                        <div>
                          <input type="text" name="full_name" id="full_name" required maxlength="100" class="form-control" placeholder="Full Name" value="<?= $web_app->persistData( $full_name, true ) ?>">
                        </div>
                      </div>

                      <div class="form-group col-md-6 row mt-3">
                        <label for="email" class="fw-bold">Email: <span class="text-danger">*</span></label>
                        <div>
                          <input type="email" name="email" id="email" required maxlength="100" class="form-control" placeholder="Email" value="<?= $web_app->persistData( $email, true ) ?>">
                        </div>
                      </div>

                      <div class="form-group col-md-6 row mt-3">
                       <label for="phone_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
                       <div class="input-group">
                          <div class="input-group-text">+234</div>
                          <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( $phone_num, true ) ?>">
                       </div>
                      </div>

                      <div class="form-group col-md-6 row mt-3">
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

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                 <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <h5 class="fw-bold text-success">Organisation Information</h5>
                    </button>
                 </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body row">
                      <div class="form-group col-md-6 row mt-3">
                        <label for="org_name" class="fw-bold">Name: <span class="text-danger">*</span></label>
                        <div>
                          <input type="text" name="org_name" id="org_name" required maxlength="100" placeholder="Name" class="form-control" value="<?= $web_app->persistData( $org_name, true ) ?>">
                        </div>
                      </div>

                      <div class="form-group col-md-6 row mt-3">
                        <label for="org_email" class="fw-bold">Email: <span class="text-danger">*</span></label>
                        <div>
                          <input type="email" name="org_email" id="org_email" placeholder="Email" required maxlength="100" class="form-control" value="<?= $web_app->persistData( $org_email, true ) ?>">
                        </div>
                      </div>
                      <div class="form-group col-md-6 row mt-3">
                       <label for="org_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
                       <div class="input-group">
                          <div class="input-group-text">+234</div>
                          <input type="text" class="form-control" name="org_num" id="org_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( $org_num, true ) ?>">
                       </div>
                      </div>
        
                      <div class="form-group col-md-6 row mt-2">
                        <label for="logo" class="fw-bold">Logo: </label>
                        <div>
                          <input type="hidden" name="old_passport" id="old_passport" value="<?= $old_passport ?>">
                          <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row mt-3">
                        <label for="address" class="fw-bold">Address: <span class="text-danger">*</span></label>
                        <div>
                          <textarea name="address" id="address" placeholder="Enter Address" class="form-control" maxlength="1000"><?= $web_app->persistData( $address, true ) ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>

            <div class="text-center mt-4 mb-4">

               <button name="edit_btn" id="edit_btn" class="btn btn-success">Save</button>
            </div>
         </form>

      </div>
  </div>
</main><!-- End #main -->