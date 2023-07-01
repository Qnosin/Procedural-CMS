<?php
$stmt = $pdo->prepare("Select count(*) as postNum from posts");
$stmt->execute();
$postsNum = $stmt->fetchAll();
?>

<?php
$stmt = $pdo->prepare("Select count(*) as coomentNum from comments");
$stmt->execute();
$coomentsNum = $stmt->fetchAll();
?>


<?php
$stmt = $pdo->prepare("Select count(*) as userNum from users");
$stmt->execute();
$usersNum = $stmt->fetchAll();
?>


<?php
$stmt = $pdo->prepare("Select count(*) as categorieNum from categories");
$stmt->execute();
$categoriesNum = $stmt->fetchAll();
?>