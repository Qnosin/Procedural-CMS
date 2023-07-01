<?php 

if(isset($_GET['p_id'])){
    $id = $_GET['p_id'];
    $stmt= $pdo->prepare("SELECT * FROM posts WHERE post_id = ?");
    $stmt->execute([$id]);
    $post = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //dynamic category
    $stmt=$pdo->prepare('SELECT  *  FROM categories');
    $stmt->execute();
    $categories= $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($_POST['Update_Post'])){
    $id = $_GET['p_id'];
    $title = $_POST['title'];
    $category_id = $_POST['post_category_id'];
    $author = $_POST['author'];
    $post_status = $_POST['post_status'];
    $post_tag = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $file = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $post_date = date('Y-m-d');

    move_uploaded_file($file_temp,"../images/$file");

    if(empty($file)){
        $file = $post[0]['post_image'];
    }

    $stmt = $pdo->prepare("UPDATE posts SET post_category_id = ?, post_title = ?,  post_author = ?,  post_content = ?, 
     post_tags = ?,  post_status = ? , post_image = ? ,post_date = ?  WHERE post_id = ?");
    $stmt->execute([$category_id,$title,$author,$post_content,$post_tag,$post_status, $file , $post_date, $id ]);
    header("Location: ./posts.php");
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post[0]['post_title'] ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <select name="post_category_id" id="post_category">
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['cat_id']?>"> <?php echo $category['cat_title'];?></option>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="author">Post Author</label>
    <input value="<?php echo $post[0]['post_author'] ?>" type="text" class="form-control" name="author">
</div>


<div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post[0]['post_status'] ?>" type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
    <label for="post_images">Post Image</label>
    <br>
    <img width="100" src="../images/<?php echo $post[0]['post_image'] ?>" alt="image">
    <input type="file"  name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post[0]['post_tags'] ?>" type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea  name="post_content" class="form-control" cols="30" rows="10">
        <?php echo $post[0]['post_content'] ?>
    </textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="Update_Post" value="Update Post">
</div>


</form>