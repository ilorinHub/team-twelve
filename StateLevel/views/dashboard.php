  <main id="main" class="main">

    <div class="pagetitle">
      <div class="d-flex justify-content-between">
        <div>
          <h1 class="text-success">Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active text-dark">Customer</li>
           </ol>
          </nav> 
        </div>
        
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#state_hqs">
          <span>Add Customer</span>
        </button>
      </div>

    </div><!-- End Page Title -->

    <section class="section">
      <?= $web_app->showAlert( $msg ) ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="mt-2">
                <?php
                  if ( $customer_dt ) 
                  {
                    echo "<table class='table datatable table-responsive table-striped' id='my_datatable'>
                    <thead class='text-success'>
                      <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Description</th>
                        <th>Added By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $sn = 0;
                    $tr_content = '';

                    //looping through records
                    foreach ( $customer_dt as $customer_data ) 
                    {

                      $id = $customer_data[ 'id' ];
                      $full_name = $customer_data[ 'full_name' ];
                      $phone_num = $customer_data[ 'phone_num' ];
                      $business_description = $customer_data[ 'description' ];
                      $added_by = $customer_data[ 'added_by' ];
                      
                      $sn++;

                      $tr_content .=  "<tr>
                        <td class='fw-light'>$sn</td>
                        <td class='fw-light'>$full_name</td>
                        <td class='fw-light'>+234$phone_num</td>
                        <td class='fw-light'>$business_description</td>
                        <td class='fw-light'>$added_by</td>
                        <td class='fw-light'>
                          <a class='btn btn-success rounded-pill text-white my-1' href='payment?id=$id' target='_blank'> Make Payment</a>
                        </td>
                      </tr>";
                    }

                    echo $tr_content .= '</tbody></table>';
                  }   
                  
                ?>
              </div>
            </div>

          </div>
        </div>
    </section>  </main><!-- End #main -->

<!-- Start State HQs Modal-->
<div class="modal fade" id="state_hqs" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong>Customer</strong></h3>
        <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <h5>Please, fill in the details below!</h5>
          <div class="row">
            <div class="form-group mt-3">
              <label class="fw-bold" for="name">Full Name <span class="text-danger">*</span></label>
              <input type="text" name="name" id="name" class="form-control" required placeholder="Enter Name" maxlenght="100" value="<?= $web_app->persistData( 'name', false, $clear ) ?>">
            </div>
            <div class="form-group row mt-3">
             <label for="phone_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
             <div class="input-group">
                <div class="input-group-text">+234</div>
                <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( 'phone_num', false, $clear ) ?>">
             </div>
            </div>

            <div class="form-group mt-3 ">
              <label for="description">Business description <span class="text-danger">*</span></label>
              <textarea name="description" id="description" class="form-control"><?= $web_app->persistData( 'description', false, $clear ) ?>
                
              </textarea>
            </div>


            <div class="text-center mt-3">
              <button type="submit" name="customer_btn" id="customer_btn" class="btn btn-success" >Save</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- End State HQs Modal-->
