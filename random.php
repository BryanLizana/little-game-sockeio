<?php 
$servername = "localhost";
$username = "username";
$password = "password";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE test";
        // use exec() because no results are returned
        $conn->exec($sql);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES (:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);

        // insert a row
        $firstname = "John";
        $lastname = "Doe";
        $email = "john@example.com";
        $stmt->execute();

        
        echo "Connected successfully"; 
    }
     catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }