<?php
include "../dbconnection.php";
// geeting user data inserted in the form
$username=$_POST['username'];
$psw=$_POST['psw'];
//seeking the username and password in the database
$selectsql ="SELECT *FROM userdata";
$response= mysqli_query($conn,$selectsql );
if($response->num_rows>0){
foreach($response as $data){
    // print_r($data);
    $dbusername=$data['username'];
    $dbpsw=$data['password'];
    $role=$data['role'];
    if($username==$dbusername && $psw== $dbpsw){
        echo "Username password match";
    }
    else{
        echo "Username or password does not match";
    }
}
}
else{
    echo "Username or password does not match";
}

?>