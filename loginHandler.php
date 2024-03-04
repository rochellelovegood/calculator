<?php
session_start();
include('db.php'); // Include your database connection file

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST['name'];
    $password=$_POST['password'];
    $query="SELECT id,username,password FROM users WHERE username='$username'";

    $result=mysqli_query($conn,$query);
    if($result){
        $row= mysqli_fetch_assoc($result);
        if($row){
            if(password_verify($password,$row['password'])){
                $_SESSION['id']=$row['id'];
                $_SESSION['name']=$row['username'];
                header("Location: index.php");
            }else{
                $_SESSION['login_error']="Incorrect Password";
                header("Location: login.php");
                exit();
            }
        }else{
            $_SESSION['login_error']="User not found";
            header("Location: login.php");
            exit();
        }
    }
    $_SESSION['login_error'] = "Database error: " . mysqli_error($conn);
        
    // Stop further script execution
    exit();
}
?>
