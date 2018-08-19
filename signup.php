
<?php
/**
 * Created by PhpStorm.
 * User: Bandanaa
 * Date: 8/18/2018
 * Time: 15:06
 */
header('Location:' . 'upload.html');
include "dbconnect.php";

    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $word = $_POST['word'];
    $age= $_POST['age'];
    $gender = $_POST['gender'];


    if (!empty($name) && !empty($address) && !empty($email) && !empty($username) && !empty($password && !empty($word) && !empty($age) && !empty($gender) && $password == $word)) {
        $stmt = $conn->prepare(
            $query = "INSERT INTO signup(name,address,email,username,password,age,gender) VALUES (?,?,?,?,?,?,?)"
        );
        $stmt->bind_param(
            "sssssds",
            $name,
            $address,
            $email,
            $username,
            $hash,
            $age,
            $gender

        );
        $stmt->execute();
        header('Location:' . 'upload.html');

        $stmt->close();


    } else {
        echo "</br></br>Your password doesnot match";
    }

