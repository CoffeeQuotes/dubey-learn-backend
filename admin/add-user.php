<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('dbcon/autoload.php'); ?>
<?php
$id = $_GET['id'] ?? 0;
$instance = DB::getInstance();
$conn = $instance->getConnection();
$newUser =  new User($conn);
if(isset($id) && !empty($id)) {
    $getUser = $newUser;
    $users =  $getUser->edit($id);

}
if(isset($_POST['submit'])) {
    $user = $_POST;
    $msg =  $newUser->insert($user); // return string based on operation status success/ failure
}
if(isset($_POST['update'])) {
    $user = $_POST;
    $editUser = $newUser;
    $msg = $editUser->update($id, $user);
    $page = 'users.php';
    echo ("<script>location.href='".$page."';</script>");
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">New User</li>
        </ol>
        <div class="row">
            <div class="mb-4">
                <div class="col-6 mx-auto">
                    <form action="" method="post" class="bg-white shadow-lg p-4 mt-5">
                        <div class="mb-2">
                            <?php if(isset($msg) && !empty($msg)) {
                                echo "<div class='alert alert-primary' role='alert'>$msg</div>";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="<?= $users['name'] ?? '' ?>">
                            <div id="nameHelp" class="form-text">Enter User name</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="brandHelp"  value="<?= $users['email'] ?? '' ?>">
                            <div id="brandHelp" class="form-text">Enter Email Id</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" name="phone" id="phone" aria-describedby="colorHelp"  value="<?= $users['phone'] ?? '' ?>">
                            <div id="colorHelp" class="form-text">Enter Phone Number</div>
                        </div>
                        <button type="submit" name="<?= isset($users['id'])? 'update' : 'submit' ?>" class="mb-5 btn btn-primary">Submit</button>
                        <a href="users.php" type="submit" class="mb-5 btn btn-secondary float-end">Back to Users</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('include/footer.php'); ?>
