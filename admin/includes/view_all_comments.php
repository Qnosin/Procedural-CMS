<?php
    $stmt = $pdo->prepare("SELECT * FROM comments");
    $stmt->execute([]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM comments  WHERE comment_id = ?");
    $stmt->execute([$id]);
    header('location: ./comments.php');
}
?>

<?php
if(isset($_GET['unapprove'])){
    $id = $_GET['unapprove'];
    $status = "unapprove";
    $stmt = $pdo->prepare("UPDATE comments  SET comment_status = ? WHERE comment_id = ?");
    $stmt->execute([$status , $id]);
    header('location: ./comments.php');
}
?>

<?php
if(isset($_GET['approve'])){
    $id = $_GET['approve'];
    $status = "approve";
    $stmt = $pdo->prepare("UPDATE comments  SET comment_status = ? WHERE comment_id = ?");
    $stmt->execute([$status , $id]);
    header('location: ./comments.php');
}
?>

<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Respone to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($comments as $comment) : ?>
                            <?php $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_id = ?"); ?>
                            <?php $stmt->execute([$comment['comment_post_id']]); ?>
                            <?php $post = $stmt->fetchAll(PDO::FETCH_ASSOC);  ?>
                            <tr>
                                <td><?php echo $comment['comment_id'] ?></td>
                                <td><?php echo $comment['comment_author'] ?></td>
                                <td><?php echo $comment['comment_content'] ?></td>
                                <td><?php echo $comment['comment_email'] ?></td>
                                <td><?php echo $comment['comment_status']?></td>
                                <td><a href="../post.php?id=<?php echo $post[0]['post_id']?>"> <?php echo $post[0]['post_title'] ?></a></td>
                                <td><?php echo $comment['comment_date'] ?></td>
                                <td><a href="comments.php?approve=<?php echo $comment['comment_id'] ?>">Approve</a></td>
                                <td><a href="comments.php?unapprove=<?php echo $comment['comment_id'] ?>">Unapprove</a></td>
                                <td><a href="">Edit</a></td>
                                <td><a href="comments.php?delete=<?php echo $comment['comment_id'] ?>">Delete</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>


