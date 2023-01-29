
<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1><?= $org_name ?> Profile</h1>
    <?= $web_app->showAlert( $msg ) ?>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"> Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">

    <div class="card-body">
      <!-- Default Tabs -->
      <ul class="nav nav-tabs pt-2" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Payment Logs</button>
        </li>
      </ul>
      <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <?php
            if ( $payment_dt ) 
            {
              echo "<table class='table datatable table-responsive table-striped' id='my_datatable'>

              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Amount</th>
                  <th>Paid For</th>
                  <th>Redeem To</th>
                  <th>Date & Time</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Amount</th>
                  <th>Paid For</th>
                  <th>Redeem To</th>
                  <th>Date & Time</th>
                </tr>
              </tfoot>
              <tbody>";

              $sn = 0;
              $tr_content = '';

              //looping through records
              foreach ( $payment_dt as $payment_data ) 
              {

                $amount = $payment_data[ 'amount' ];
                $paid_for = $payment_data[ 'paid_for' ];
                $redeem_to = $payment_data[ 'redeem_to' ];
                $date = $payment_data[ 'date_time' ];
                
                $sn++;

                $tr_content .=  "<tr>
                  <td class='fw-light'>$sn</td>
                  <td class='fw-light'>$amount</td>
                  <td class='fw-light'>$paid_for</td>
                  <td class='fw-light'>$redeem_to</td>
                  <td class='fw-light'>$date</td>
                </tr>";
              }

              echo $tr_content .= '</tbody></table>';
            }   
            
          ?>

        </div>
      </div><!-- End Default Tabs -->

    </div>
  </div>


</main><!-- End #main -->





