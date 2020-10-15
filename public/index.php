<?php
require 'config.php';
$pdo = new PDO(DSN, USER, PASS);

$query = 'SELECT * FROM student';
$statement = $pdo->query($query);
$students = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Mes élèves</h1>
<ul>
    <?php foreach ($_GET as $error) : ?>
    <li>
        <?= $error ?>
    </li>
    <?php endforeach; ?>
</ul>
<form action="check.php" method="post">
    <input type="text" name="name" placeholder="Nom de l'étudiant">
    <input type="number" name="age" placeholder="Age de l'étudiant">
    <button>OK</button>
</form>

<ul>
    <?php foreach ($students as $studentData) : ?>
    <li>
        <?= $studentData['name'] ?> -  <?= $studentData['age'] ?> ans
    </li>
    <?php endforeach; ?>
</ul>
</body>
</html>

