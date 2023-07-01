<?php 

if(isset($_GET['u_id'])){
    $id = $_GET['u_id'];
    $stmt= $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //dynamic category
    if( $user[0]['user_role'] == 'admin'){
        $rest = "echo <option value='subscriber'>Subscriber</option> <option value='editor'>Editor</option>";
    }else if($user[0]['user_role'] == 'editor'){
        $rest = "echo <option value='subscriber'>Subscriber</option> <option value='admin'>Admin</option>";
    }else{
        $rest = "echo <option value='editor'>Editor</option><option value='admin'>Admin</option>";
    }

}

if(isset($_POST['Update_User'])){
    $id = $_GET['u_id'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $user_role = $_POST['user_role'];
    $file = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($file_temp,"../images/$file");

    if(empty($file)){
        $file = $user[0]['user_image'];
    }

    $stmt = $pdo->prepare("UPDATE users SET username = ?, user_firstname = ?,  user_lastname = ?, user_email = ?, 
     user_image = ?,  user_role = ?  WHERE user_id = ?");
    $stmt->execute([$username, $firstname,$lastname,$email,$file,$user_role, $id ]);
    header("Location: ./users.php");
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="username">username</label>
    <input value="<?php echo $user[0]['username'] ?>" type="text" class="form-control" name="username">
</div>



<div class="form-group">
    <label for="firstname">firstname</label>
    <input value="<?php echo $user[0]['user_firstname'] ?>" type="text" class="form-control" name="firstname">
</div>


<div class="form-group">
    <label for="lastname">lastname</label>
    <input value="<?php echo $user[0]['user_lastname'] ?>" type="text" class="form-control" name="lastname">
</div>

<div class="form-group">
    <label for="email">email</label>
    <input value="<?php echo $user[0]['user_email'] ?>" type="text" class="form-control" name="email">
</div>

<div class="form-group">
    <select name="user_role">
            <option value="<?php echo $user[0]['user_role']?>"> <?php echo $user[0]['user_role']?> </option>
            <?php echo $rest; ?>
    </select>
</div>

<div class="form-group">
    <label for="image">User Image</label>
    <br>
    <img width="100" src="../images/<?php echo $user[0]['user_image'] ?>" alt="image">
    <input type="file"  name="image">
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="Update_User" value="Update User">
</div>


</form>