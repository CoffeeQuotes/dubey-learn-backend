<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('dbcon/autoload.php'); ?>
<?php
    $id = $_GET['id'] ?? 0;
    $instance = DB::getInstance();
    $conn = $instance->getConnection();
    $newProduct =  new Product($conn);
    if(isset($id) && !empty($id)) {
        $getProduct = $newProduct;
        $products =  $getProduct->edit($id);
    }
    if(isset($_POST['submit'])) {
        if(isset($_FILES['image'])) {
            $uploadData = $_FILES;
            $upload = new UploadImage($uploadData);
            $file_name = $upload->upload();
            $product = $_POST;
            $product['image'] = $file_name;
            $msg =  $newProduct->insert($product);
        }

    }
    if(isset($_POST['update'])) {
        if(isset($_FILES['image'])){
            $uploadData = $_FILES;
            $upload = new UploadImage($uploadData);
            $file_name = $upload->upload();
            $product = $_POST;
            $product['image'] = $file_name;
            $msg = $newProduct->update($id, $product);
        }
//        $product = $_POST;
//        $editProduct = $newProduct;
//        $msg = $editProduct->update($id, $product);
//        $page = 'products.php';
//        echo ("<script>location.href='".$page."';</script>");
    }
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">New Product</li>
        </ol>
        <div class="row">
            <div class="mb-4">
                <div class="col-6 mx-auto">
                <form action="" method="post" class="bg-white shadow-lg p-4 mt-5" enctype="multipart/form-data">
                    <div class="mb-2">
                        <?php if(isset($msg) && !empty($msg)) {
                            echo "<div class='alert alert-primary' role='alert'>$msg</div>";
                        }
                        ?>
                        <?php if(isset($errors) && !empty($errors)) {
                            foreach ($errors as $error):
                                echo "<div class='alert alert-danger' role='alert'>$error</div>";
                            endforeach;
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="<?= $products['product_name'] ?? '' ?>">
                        <div id="nameHelp" class="form-text">Enter product name</div>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" id="brand" aria-describedby="brandHelp"  value="<?= $products['product_brand'] ?? '' ?>">
                        <div id="brandHelp" class="form-text">Enter Brand name</div>
                    </div>
                    <div class="d-flex flex-row mb-3 justify-content-between">
                        <div class="flex-grow-1 px-2 mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input type="color" class="form-control" style="height: 38px;" name="color" id="color" aria-describedby="colorHelp"  value="<?= $products['product_color'] ?? '' ?>">
                            <div id="colorHelp" class="form-text">Enter Color name</div>
                        </div>
                        <div class="flex-grow-1 px-2 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="any" class="form-control" name="price" id="price" aria-describedby="priceHelp"  value="<?= $products['product_price'] ?? '' ?>">
                            <div id="priceHelp" class="form-text">Enter Product Price</div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <?php  if(isset($products['product_img']) && !empty($products['product_img'])): ?>
                            <div class="flex-lg-shrink-1">
                                <p class="text-center"><small>Current Image</small></p>
                                <img class="w-100 p-2" src="images/<?= $products['product_img'] ?? '' ?>"/>
                                <p class="text-secondary text-center"><?= $products['product_img'] ?? '' ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3 w-100">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control file" data-browse-on-zone-click="true" name="image" id="image" aria-describedby="imageHelp"  value="<?= $products['product_img'] ?? '' ?>">
                            <div id="imageHelp" class="form-text">Upload Product Image</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="desc" class="form-label">Desc</label>
                        <textarea name="desc" class="form-control" id="desc" aria-describedby="descHelp"> <?= $products['product_desc'] ?? '' ?></textarea>
                        <div id="descHelp" class="form-text">Enter Product Desc</div>
                    </div>
                    <button type="submit" name="<?= isset($products['id'])? 'update' : 'submit' ?>" class="mb-5 btn btn-primary">Submit</button>
                    <a href="products.php" type="submit" class="mb-5 btn btn-secondary float-end">Back to Products</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('include/footer.php'); ?>
