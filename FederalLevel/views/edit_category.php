
<!-- === START MAIN === -->
<main id="main" class="main">
  <div class="pagetitle">
    <h1 class="text-success">Edit Category</h1>
    <?= $web_app->showAlert( $msg ) ?>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item text-success"> Edit Category</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card col-md-6">
    <div class="card-body">
      <form class="pt-3" method="POST">
        <div class="row">
          <div class="mb-3 me-2">
            <label class="fw-bold" for="category_name">Category Name : <span class="text-danger">*</span></label>
            <div>
              <input type="text" name="category_name" id="category_name" class='form-control' required autofocus placeholder = "Category" value="<?= $web_app->persistData( $category, true ) ?>">
            </div>
          </div>                     
          <div class="form-groupmb-3">
            <label for="price" class="fw-bold">Price <span class="text-danger">*</span></label>
            <div class="input-group">
              <div class="input-group-text">N</div>
              <input type="number" class="form-control" name="price" id="price" placeholder="Price" required maxlength="10" value="<?= $web_app->persistData( $price, true ) ?>">
            </div>
          </div>

          <div class="text-center mt-3">
            <button type="submit" name="categories_btn" id="categories_btn" class="btn btn-success">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</main><!-- End #main -->