<?php
    $username = "root";
    $password = "123321";
    try{
        $conn = new PDO('mysql:host=localhost;dbname=crudweb2', $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOexception $e){
        echo "erro: ".$e -> getMessage();
    }
?>