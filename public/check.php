<?php
require 'config.php';
$pdo = new PDO(DSN, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name      = $_POST['name'];
    $age       = $_POST['age'];

    $errors = [];

    if (empty($name)) {
        $errors[] = 'Merci de saisir un nom';
    }
    if (empty($age)) {
        $errors[] = 'Merci de saisir un age';
    }

    if (empty($errors)) {
        $query = 'INSERT INTO student (name, age) VALUE (:name, :age)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':age', $age);
        $statement->execute();
        header('Location: index.php');
    } else {
        $errorString = http_build_query($errors);
        header('Location: index.php?' . $errorString);
    }
}
