
<div class="col-md-4">


<!-- Login -->
<?php if(!isset($_SESSION['role'])): ?>
<div class="well">
    <h4>Login</h4>
    <?php if(isset($_GET['loginError'])) : echo "<p style='color:red;'> Bad Password or Email Try Again </p>" ; endif; ?>
    <form action="includes/login.php" method="post">      
    <div class="form-grouip">
        <input name="email" type="email" class="form-control" placeholder="Enter email">
    </div>
    <br>
    <div class="input-group">
        <input name="password" type="password" class="form-control" placeholder="Enter a Password">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type="submit">Submit</button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>
<?php endif; ?>


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">      
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<?php
   $stmt = $pdo->prepare("SELECT * FROM categories");
   $stmt->execute();
   $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php foreach($categories as $category) : ?>
                <li><a href="category.php?category=<?php echo $category['cat_id']?>"><?php echo $category['cat_title'];?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
       
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include("widget.php") ?>

</div>