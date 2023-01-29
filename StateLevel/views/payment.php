  <main id="main" class="main">
    <?= $web_app->showAlert( $msg ) ?>
    <div class="pagetitle">
      <h1 class="text-success">Payments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
          <li class="breadcrumb-item text-success">Payment</li>
       </ol>
      </nav>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="mt-2">
                <div>
                  <label class="d-block fw-bold mb-1 h6">Name</label>
                  <span class="border fw-bold rounded p-2">
                    <?= $full_name ?>
                  </span>
                  <div >
                    <label class="mt-4">Customer ID:</label>
                    <span class="text-decoration-underline fw-bold">
                      <?="1000".$customer_id ?>
                    </span>
                  </div>

                  <div class="d-flex justify-content-around">
                    <div class="text-decoration-underline"><?= $full_name ?> <hr>
                    </div>
                    <div>
                      <select name="category" id="category" class="form-select">
                        <?php
                          if ( $payment_category ) 
                          {
                            foreach ( $payment_category as  $payment_dt ) 
                            {
                        ?>
                         <option value="" ><?= $payment_dt['category'] ?></option>

                        <?php
                            }
                          }
                        ?>
                      </select>
                    </div>
                    <div>
                      <input type="text" name="" id="" class="">
                    </div>
                    <div></div>
                  </div>
                </div>
                <form method="POST">
                  
                </form>
              </div>
            </div>

          </div>
        </div>
    </section>  </main><!-- End #main -->