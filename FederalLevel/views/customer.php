  <main id="main" class="main">
    <?= $web_app->showAlert( $msg ) ?>
    <div class="pagetitle">
      <h1 class="text-success">Customers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
          <li class="breadcrumb-item text-success">Customers</li>
       </ol>
      </nav>

    </div><!-- End Page Title -->

    <section class="section">
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
                      $description = $customer_data[ 'description' ];
                      $added_by = $customer_data[ 'added_by' ];

                      
                      $sn++;

                      $tr_content .=  "<tr>
                        <td class='fw-light'>$sn</td>
                        <td class='fw-light'>$full_name</td>
                        <td class='fw-light'>+234$phone_num</td>
                        <td class='fw-light'>$description</td>
                        <td class='fw-light'>$added_by</td>
                        <td class='fw-light'>
                          <a class='btn btn-success rounded-pill text-white my-1' href='customer_profile?id=$id' target='_blank'> View More</a>
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