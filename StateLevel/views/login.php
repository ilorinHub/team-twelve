  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center mb-3">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/white_logo.png" alt="Logo" >
                </a>
              </div><!-- End Logo -->
              <p class="text-center">Agent</p>
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title pb-0 fs-4 text-success">Login</h5>
                    <h6>Please, fill in the details below!</h6>
                  </div>

                  <?= $web_app->showAlert( $msg ) ?>
                  
                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="uname" class="form-label fw-bold text-success">Username</label>
                      <input type="text" name="uname" class="form-control" id="uname" placeholder="Enter Username" value="<?php echo $web_app->persistData( 'uname' ); ?>" autofocus required>
                      <div class="invalid-feedback">Please enter your username!</div>
                    </div> 

                    <div class="col-12">
                      <label for="pword" class="form-label fw-bold text-success">Password</label>
                      <input type="password" name="pword" class="form-control" id="pword" placeholder="Enter Password" value="<?php echo $web_app->persistData( 'password' ); ?>" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit" name="login_btn">Login</button>
                    </div>

                    <div class="col-md-12 ">
                      <p class="text-center ">
                      <a href="../index.php" target="_blank">Back to Homepage</a></p>

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->