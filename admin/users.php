<?php include('include/head.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('dbcon/autoload.php'); ?>
<?php
$instance = DB::getInstance();
$conn = $instance->getConnection();
$user = new user($conn);
$users =  $user->read();
if(isset($_POST['delete'])){
    $id = $_POST['id'] ?? 0;
    if($msg = $user->delete($id)) {
        $page = $_SERVER['PHP_SELF'];
        echo ("<script>location.href='".$page."';</script>");
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users List
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach($users as  $user) {
                        echo "<tr></tr></td><td>". $user['name']."</td>";
                        echo "<td>". $user['email']."</td>";
                        echo "<td>".$user['phone']."</td>";
                        echo "<td>
                               <div class='btn-group btn-group-sm'>
                                   <a href='add-user.php?id=".$user['id']."' class='m-1 btn btn-warning btn-sm'>&nbsp;<i class='fas fa-edit'></i>&nbsp;</a>
                                   <form method='post'>
                                        <input type='hidden' name='id' value=".$user['id'].">
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
        <a href="add-user.php" class="btn btn-primary" style=" line-height:36px; width: 50px; height: 50px; border-radius:50%; position:fixed; bottom: 50px; right: 50px;">
            <i class="fas fa-plus"></i>
        </a>
    </div>
</main>

<?php include('include/footer.php'); ?>

