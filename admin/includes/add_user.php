<?php 
if(isset($_POST['create_user'])){
    $username = $_POST['username'];
    $password =  password_hash($_POST['password'],PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $file = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];


    move_uploaded_file($file_temp,"../images/$file");

    $stmt = $pdo->prepare("INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role,randSalt)VALUES(?,?,?,?,?,?,?,?)");
    $stmt->execute([$username,$password,$firstname,$lastname,$email,$file,$role,""]);
    header("Location: ./users.php?userCreated");
}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
</div>


<div class="form-group">
    <label for="author">Password</label>
    <input type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email">
</div>


<div class="form-group">
    <label for="firstname">FirstName</label>
    <input type="text" class="form-control" name="firstname">
</div>

<div class="form-group">
    <label for="lastname">LastName</label>
    <input type="text"  class="form-control"  name="lastname">
</div>


<div class="form-group">
    <select name="role">
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        <option value="editor">Editor</option>
    </select>
</div>

<div class="form-group">
    <label for="image">Profile Image</label>
    <input type="file"  name="image">
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="create_user" value="create User">
</div>


</form>