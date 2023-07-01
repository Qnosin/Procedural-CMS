<?php include "db.php" ?>

<?php
if(isset($_POST['login'])){
    $password = trim(htmlspecialchars($_POST['password']));
    $email =  htmlspecialchars($_POST['email']);
    $stmt = $pdo->prepare("SELECT * FROM users  where user_email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetchAll();
     if(empty($user)){
        header("Location: ../index.php?loginError");
     }else if(password_verify($password, $user[0]['user_password'])){
        session_start();
        $_SESSION['username'] = $user[0]['username'];
        $_SESSION['firstname'] = $user[0]['user_firstname'];
        $_SESSION['lastname'] = $user[0]['user_lastname'];
        $_SESSION['role'] = $user[0]['user_role'];
        $_SESSION['user_id'] = $user[0]['user_id'];
        header("Location: ../admin");
     }else{
        header("Location: ../index.php?loginError");
     }


}

?>