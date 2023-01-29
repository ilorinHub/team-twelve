  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-success">Dashboard</h1>
      <div class="d-md-flex justify-content-between">
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active text-success">Agents</li>
         </ol>
        </nav>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#state_hqs">
          <span>Add Collection Agent</span>
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
                  if ( $agent_dt ) 
                  {
                    echo "<table class='table datatable table-responsive table-striped' id='my_datatable'>
                    <thead>
                      <tr class='text-success'>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>State</th>
                        <th>Username</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>";

                    $sn = 0;
                    $tr_content = '';

                    //looping through records
                    foreach ( $agent_dt as $agent_data ) 
                    {

                      $id = $agent_data[ 'id' ];
                      $full_name = $agent_data[ 'full_name' ];
                      $gender = $agent_data[ 'gender' ];
                      $state = $agent_data[ 'state' ];
                      $username = $agent_data[ 'username' ];

                      $sn++;

                      $tr_content .=  "<tr>
                        <td class='fw-light'>$sn</td>
                        <td class='fw-light'>$full_name</td>
                        <td class='fw-light'>$gender</td>
                        <td class='fw-light'>$state</td>
                        <td class='fw-light'>$username</td>
                        <td class='fw-light'>
                          <a class='btn btn-success rounded-pill text-white my-1' href='agent_profile?id=$id' target='_blank'> Profile</a>

                          <a class='btn btn-danger rounded-pill text-white del_btn' data-id='$id' data-name='Exco' data-url='./excos'><i class='bi bi-trash'></i>Delete</a>

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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-success"><strong>Collection Agent</strong></h3>
        <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST">
          <h5>Please, fill in the details below!</h5>
          <div class="row">
            <div class="form-group col-md-6  mt-3">
              <label class="fw-bold" for="full_name">Full Name <span class="text-danger">*</span></label>
              <input type="text" name="full_name" id="full_name" class="form-control" required placeholder="Full Name" value="<?= $web_app->persistData( 'full_name', false, $clear ) ?>"  maxlenght="100">
            </div>

            <div class="form-group col-md-6  mt-3">
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

            <div class="form-group col-md-6  mt-3">
              <label class="fw-bold" for="state">State <span class="text-danger">*</span></label>
              <input type="text" name="state" id="state" class="form-control" required placeholder="State" maxlenght="30" value="<?= $web_app->persistData( 'state', false, $clear ) ?>">
            </div>
            <div class="form-group col-md-6  mt-3">
              <label for="email" class="fw-bold">Email: <span class="text-danger">*</span></label>
              <div>
                <input type="email" name="email" id="email" placeholder="Email" required maxlength="100" class="form-control" value="<?= $web_app->persistData( 'email', false, $clear ) ?>">
              </div>
            </div>
            <div class="form-group col-md-6  mt-3">
             <label for="phn_num" class="fw-bold">Phone Number <span class="text-danger">*</span></label>
             <div class="input-group">
                <div class="input-group-text">+234</div>
                <input type="text" class="form-control" name="phn_num" id="phn_num" placeholder="7045326710" required maxlength="10" value="<?= $web_app->persistData( 'phn_num', false, $clear ) ?>">
             </div>
            </div>
            <div class="form-group  col-md-6 mt-3">
              <label class="fw-bold" for="username">Username <span class="text-danger">*</span></label>
              <input type="text" name="username" class="form-control" id="username" required placeholder="Enter Name" maxlenght="100" value="<?= $web_app->persistData( 'username', false, $clear ) ?>">
            </div>
            <div class="form-group  col-md-6 mt-3">
              <label class="fw-bold" for="pword">Password <span class="text-danger">*</span></label>
              <input type="password" name="pword" id="pword" class="form-control" required placeholder="Enter Password" maxlenght="15">
            </div>
            <div class="form-group  col-md-6  mt-3">
              <label for="passport" class="fw-bold">Passport: <span class="text-danger">*</span> </label>
              <div>
                <input type="file" name="passport" id="passport" required class="form-control">
              </div>
            </div>
            

            <div class="text-center mt-3">
              <button type="submit" name="save_btn" id="save_btn" class="btn btn-success" >Save</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- End State HQs Modal-->
