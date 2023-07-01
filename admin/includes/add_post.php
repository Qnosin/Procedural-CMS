<?php 
if(isset($_POST['create_post'])){
    $title = $_POST['title'];
    $category_id = $_POST['post_category_id'];
    $author = $_POST['author'];
    $post_status = $_POST['post_status'];
    $file = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $post_tag = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('Y-d-m');




    move_uploaded_file($file_temp,"../images/$file");

    $stmt = $pdo->prepare("INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)VALUES(?,?,?,?,?,?,?,?)");
    $stmt->execute([$category_id,$title,$author,$post_date,$file,$post_content,$post_tag,$post_status]);
    header("Location: ./posts.php?postCreated");
}
?>

<?php
$stmt=$pdo->prepare('SELECT  *  FROM categories');
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <select name="post_category_id">
        <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['cat_id'] ?>"><?php echo $category['cat_title'] ?></option>
        <?php endforeach ?>
    </select>
</div>

<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
</div>


<div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status">
</div>

<div class="form-group">
    <label for="post_images">Post Image</label>
    <input type="file"  name="image">
</div>

<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" class="form-control" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" class="form-control" name="create_post" value="Publish Post">
</div>


</form>