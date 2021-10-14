<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('dbcon/autoload.php'); ?>
<?php
 $instance = DB::getInstance();
 $conn = $instance->getConnection();
 $product = new product($conn);
 $products =  $product->read();
 if(isset($_POST['delete'])){
     $id = $_POST['id'] ?? 0;
     if($msg = $product->delete($id, $conn)) {
        $page = $_SERVER['PHP_SELF'];
        echo ("<script>location.href='".$page."';</script>");
     }
 }
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Product</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Products List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach($products as  $product) {
                        echo "<tr></tr></td><td>". $product['product_name']."</td>";
                        echo "<td>". $product['product_brand']."</td>";
                        echo "<td><div class='p-1 rounded-2 shadow-lg' style='background-color: ".$product['product_color']."'>&nbsp;</div></td>";
                        if(isset($product['product_img']) && !empty($product['product_img'])) :
                            echo "<td><img src='images/".$product['product_img']."' class='img-thumbnail w-25' /></td>";
                        else:
                            echo "<td><img src='images/image.jpg' class='img-thumbnail w-25' /></td>";
                        endif;
                        echo "<td> $". $product['product_price']."</td>";
                        echo "<td>". $product['product_desc']."</td>";
                        echo "<td>
                               <div class='btn-group btn-group-sm'>
                                   <a href='add-product.php?id=".$product['id']."' class='m-1 btn btn-warning btn-sm'>&nbsp;<i class='fas fa-edit'></i>&nbsp;</a>
                                   <form method='post'>
                                        <input type='hidden' name='id' value=".$product['id'].">
                                        <button type='submit' name='delete' id='delete' class='m-1 btn btn-danger btn-sm'>&nbsp;<i class='fas fa-trash-alt'>&nbsp;</i></button>
                                   </form>
                               </div>
                              </td>
                              </tr>";

                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <a href="add-product.php" class="btn btn-primary" style=" line-height:36px; width: 50px; height: 50px; border-radius:50%; position:fixed; bottom: 50px; right: 50px;">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</main>

<?php include('include/footer.php'); ?>

