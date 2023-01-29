
<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="text-success"> Categories</h1>
    <?= $web_app->showAlert( $msg ) ?>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard">Dashboard</a></li>
        <li class="breadcrumb-item text-success"> Categories</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-success" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Categories</button>
      </li>
    </ul>
    <div class="tab-content pt-2" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col-md-12">
          <div class="row">
            <form class="col-md-6 p-4" method="POST">
              <div class="row">
                <div class=" m-auto">
                  <div class="d-md-flex justify-content-between">
                      <div class="mb-3 me-2">
                        <label class="fw-bold" for="category_name">Category Name : <span class="text-danger">*</span></label>
                        <div>
                          <input type="text" name="category_name" id="category_name" class='form-control' required autofocus placeholder = "Category" value="<?= $web_app->persistData( "category_name", false, $clear ) ?>">
                        </div>
                      </div>                     
                      <div class="form-groupmb-3">
                        <label for="price" class="fw-bold">Price <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="input-group-text">N</div>
                          <input type="number" class="form-control" name="price" id="price" placeholder="Price" required maxlength="10" value="<?= $web_app->persistData( "price", false, $clear ) ?>">
                        </div>
                      </div>
                  </div>
                </div>

                <div class="text-center mt-3">
                  <button type="submit" name="categories_btn" id="categories_btn" class="btn btn-success">Add</button>
                </div>
              </div>
            </form>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="mt-2">
                    <?php
                      if ( $categories_dt ) 
                      {
                        echo "<table class='table datatable table-responsive table-striped' id='my_datatable'>
                        <thead class='text-success'>
                          <tr>
                            <th>S/N</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>";

                        $sn = 0;
                        $tr_content = '';

                        //looping through records
                        foreach ( $categories_dt as $categories_data ) 
                        {

                          $id = $categories_data[ 'id' ];
                          $category = $categories_data[ 'category' ];
                          $price= $categories_data[ 'price' ];
                          
                          $sn++;

                          $tr_content .=  "<tr>
                            <td class='fw-light'>$sn</td>
                            <td class='fw-light'>$category</td>
                            <td class='fw-light'>$price</td>
                            <td class='fw-light'>
                              <a class='btn btn-success rounded-pill text-white my-1' href='edit_category?id=$id' target='_blank'> Edit</a>
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

          </div>  
        </div>
      </div>

    </div>

</main><!-- End #main -->