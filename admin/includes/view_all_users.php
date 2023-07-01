<?php
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute([]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM users  WHERE user_id = ?");
    $stmt->execute([$id]);
    header('location: ./users.php');
}
?>


<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Username</th>
                                <th>FirstName</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['user_id'] ?> </td>
                                <td> <img width="100"  src="../images/<?php echo $user['user_image'] ?>"></td>
                                <td><?php echo $user['username'] ?></td>
                                <td><?php echo $user['user_firstname'] ?></td>
                                <td><?php echo $user['user_lastname']?></td>
                                <td><?php echo $user['user_email']?></td>
                                <td><?php echo $user['user_role'] ?></td>
                                <td><a href="users.php?u_id=<?php echo $user['user_id'] ?>&source=edit_user">Edit</a></td>
                                <td><a href="users.php?delete=<?php echo $user['user_id'] ?>">Delete</a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>


