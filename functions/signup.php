<?php
session_start();
include "../dbconnection.php";
// geeting user data inserted in the form
$username=$_POST['username'];
$psw=$_POST['psw'];
$role="0";
$cpsw=$_POST['cpsw'];
//checking if the password and confirm password are same or not
if($psw!=$cpsw){
    $output=["status"=>"failed","message"=>"Password and confirm password do not match"];
         echo json_encode($output);
         die();
}
//seeking the username and password in the database
$selectsql ="SELECT *FROM userdata where username='$username'";
$response= mysqli_query($conn,$selectsql );
if($response->num_rows>0){
    $output=["status"=>"failed","message"=>"Username already exists"];
         echo json_encode($output);
         die();
}
else{
$insertsql="INSERT INTO userdata(username,password,role) VALUES('$username','$psw','$role')";
$insertresponse=mysqli_query($conn,$insertsql);
if($insertresponse){
     $_SESSION['username']=$username;
     $_SESSION['role']= $role;
    $output=["status"=>"success","message"=>"Registered successfully"];
         echo json_encode($output);
}
else{
    $output=["status"=>"failed","message"=>"Something went wrong"];
         echo json_encode($output);
}
}

?>