<?php include('includes/db.php') ?>
<?php include('includes/header.php') ?>

<!-- Navigation -->
<?php include('includes/nav.php') ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php 
               if(isset($_POST['submit'])){
                $search =  $_POST['search'];
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_tags LIKE  '%$search%' ");
                $stmt->execute();
                $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
            ?>


            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <?php if(count($posts) == 0) : ?>
            <h2>NO RESULTS</h2>;
            <?php else: ?>
            <?php foreach($posts as $post) : ?>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post["post_title"] ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post["post_author"] ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post["post_date"] ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post["post_image"] ?>" alt="">
            <hr>
            <p><?php echo $post["post_content"] ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <?php endforeach ?>
            <?php endif ?>

            <hr>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include('includes/sidebar.php') ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include('includes/footer.php') ?>