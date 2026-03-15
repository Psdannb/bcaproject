<?php
session_start();
include "../dbconnection.php";
// geeting user data inserted in the form
$username=$_POST['username'];
$psw=$_POST['psw'];
//seeking the username and password in the database
$selectsql ="SELECT *FROM userdata";
$response= mysqli_query($conn,$selectsql );
if($response->num_rows>0){
foreach($response as $data){
    $dbusername=$data['username'];
    $dbpsw=$data['password'];
    $role=$data['role'];
    if($username==$dbusername && $psw== $dbpsw){
     $_SESSION['username']=$dbusername;
     $_SESSION['role']= $role;
        $output=["status"=>"success","message"=>"Login successfully"];
        echo json_encode($output);
        die();
    }
    else{
        $output=["status"=>"failed","message"=>"Username or password does not match"];
         echo json_encode($output);
    }
}
}
else{
    $output=["status"=>"failed","message"=>"Username or password does not match"];
         echo json_encode($output);
}

?>