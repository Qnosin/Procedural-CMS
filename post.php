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
                    if(isset($_GET['id'])){
                        //Posts
                        $id = $_GET['id'];
                        $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = ?");
                        $stmt->execute([$id]);
                        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        //comments  
                        $stmt2 = $pdo->prepare("SELECT * FROM comments WHERE comment_post_id = ? AND comment_status = ? ORDER BY comment_id DESC ");
                        $stmt2->execute([$id,"approve"]);
                        $comments = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                    }


                    if(isset($_POST['create_comment'])){
                        $author = $_POST['comment_author'];
                        $email = $_POST['comment_email'];
                        $content = $_POST['comment_content'];
                        $date = date("Y-m-d");
                        $status = "unapprove";
                        $id = $_GET['id'];

                        if($author != "" || $email != "" || $contet != ""){
                            $stmt =  $pdo->prepare("INSERT INTO comments(comment_post_id , comment_author, comment_date, comment_email, comment_content,comment_status) VALUES(?,?,?,?,?,?)");
                            $stmt->execute([$id,$author,$date,$email,$content,$status]);
                            $stmt2 =  $pdo->prepare("UPDATE posts set post_comment_count = post_comment_count + 1 WHERE post_id = ? ");
                            $stmt2->execute([$id]);

                            header("Location: post.php?id=$id");
                        }
                    }
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

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
                <?php if(!isset($_GET['id'])) : ?>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    <?php endif; ?>
                <?php endforeach ?>

                <hr>
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" role="form">
                        <div class="form-group">
                            <label for="comment_author">Author:</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="comment_email">Email:</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
               <?php foreach($comments as $comment): ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php  echo $comment['comment_author'] ?>
                            <small><?php echo $comment['comment_date'] ?></small>
                        </h4>
                       <?php  echo $comment['comment_content'] ?>
                    </div>
                </div>
                <?php endforeach ?>
    


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include('includes/sidebar.php') ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include('includes/footer.php') ?>
