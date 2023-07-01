<?php
//Create query
$error = "";
 if(isset($_POST['submit'])){
    $catTitle = $_POST['cat_title'];
    if($catTitle == "" || empty($catTitle)){
        $error =  "This field should not be empty";
    }else{
        $stmt= $pdo->prepare("INSERT INTO categories(cat_title) VALUE( ? )");
        $stmt->bindValue(1,$catTitle);
        $stmt->execute();
        header('Location:categories.php');
    }
}
?>

<?php
//Edit Update Query
if(isset($_GET['edit'])){
    $categoryID = $_GET['edit'];
    $stmt=$pdo->prepare('SELECT  *  FROM categories WHERE cat_id = ?');
    $stmt->bindValue(1,$categoryID);
    $stmt->execute();
    $categoryEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['Update'])){
    $cat_title = $_POST['cat_title'];
    $categoryID = $_GET['edit'];
    $stmt=$pdo->prepare('UPDATE categories  SET cat_title = ? WHERE cat_id = ?');
    $stmt->bindValue(1,$cat_title);
    $stmt->bindValue(2,$categoryID);
    $stmt->execute();
    header("Location:categories.php");
}
?>


<?php 
//Delete query
if(isset($_GET['delete'])){
    $categoryID = $_GET['delete'];
    $stmt=$pdo->prepare('DELETE FROM categories WHERE cat_id = ?');
    $stmt->bindValue(1,$categoryID);
    $stmt->execute();
    header("Location:categories.php");
}
?>


<?php
//Db
   $stmt = $pdo->prepare("SELECT * FROM categories");
   $stmt->execute();
   $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>