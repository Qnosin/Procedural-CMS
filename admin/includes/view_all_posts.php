<?php
    $stmt = $pdo->prepare("SELECT * FROM posts");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM posts  WHERE post_id = ?");
    $stmt->execute([$id]);
    header('location: ./posts.php');
}

?>

<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($posts as $post) : ?>
                            <?php $stmt = $pdo->prepare("SELECT * FROM categories WHERE cat_id = ?"); ?>
                            <?php $stmt->execute([$post['post_category_id']]); ?>
                            <?php $categories = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
                            <tr>
                                <td><?php echo $post['post_id'] ?></td>
                                <td><?php echo $post['post_author'] ?></td>
                                <td><?php echo $post['post_title'] ?></td>
                                <td><?php echo $categories[0]["cat_title"] ?></td>
                                <td><?php echo $post['post_status'] ?></td>
                                <td><img width="100" class="img-responsive" src="../images/<?php echo $post['post_image'] ?>" alt='image'></td>
                                <td><?php echo $post['post_tags'] ?></td>
                                <td><?php echo $post['post_comment_count'] ?></td>
                                <td><?php echo $post['post_date'] ?></td>
                                <td><a href="posts.php?p_id=<?php echo $post['post_id']?>&source=edit_post">Edit</a></td>
                                <td><a href="posts.php?delete=<?php echo $post['post_id']?>">Delete</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>


