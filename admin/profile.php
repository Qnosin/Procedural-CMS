<?php include('includes/admin_header.php') ?>
<?php
  $id = $_SESSION['user_id'];
  $stmt= $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
  $stmt->execute([$id]);
  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
if(isset($_POST['Update_User'])){
    $id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $file = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($file_temp,"../images/$file");

    if(empty($file)){
        $file = $user[0]['user_image'];
    }

    $stmt = $pdo->prepare("UPDATE users SET username = ?, user_firstname = ?,  user_lastname = ?, user_email = ?, 
     user_image = ?  WHERE user_id = ?");
    $stmt->execute([$username, $firstname,$lastname,$email,$file, $id ]);
    header("Location: ./index.php");
}
?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include('includes/admin_nav.php') ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="username">username</label>
                            <input value="<?php echo $user[0]['username'] ?>" type="text" class="form-control"
                                name="username">
                        </div>



                        <div class="form-group">
                            <label for="firstname">firstname</label>
                            <input value="<?php echo $user[0]['user_firstname'] ?>" type="text" class="form-control"
                                name="firstname">
                        </div>


                        <div class="form-group">
                            <label for="lastname">lastname</label>
                            <input value="<?php echo $user[0]['user_lastname'] ?>" type="text" class="form-control"
                                name="lastname">
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input value="<?php echo $user[0]['user_email'] ?>" type="text" class="form-control"
                                name="email">
                        </div>


                        <div class="form-group">
                            <label for="image">User Image</label>
                            <br>
                            <img width="100" src="../images/<?php echo $user[0]['user_image'] ?>" alt="image">
                            <input type="file" name="image">
                        </div>


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" class="form-control" name="Update_User"
                                value="Update User">
                        </div>


                    </form>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>


    <?php include('includes/admin_footer.php') ?>