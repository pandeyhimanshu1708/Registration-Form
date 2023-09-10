<?php
if(isset($_POST['submit'])){
    print_r($_POST);
    echo "</br>";
    $fullname= ($_POST['fullName']);
    $user = ($_POST['username']);
    $email = ($_POST['email']);
    $phonenumber = ($_POST['phoneNumber']);
    $pass = ($_POST['psw']);
    $confirm_password = ($_POST['confirmPassword']);
    $gender = ($_POST['gender']);
}
// if($fullname !="" && $user !="" && $email !="" && $phonenumber !="" && $pass !="" && $confirm_password !="" && $gender !="")
// {
include 'database_connection.php';
$query = "insert into form (full_name,username,email,phone_number,password,confirm_password,gender) values('$fullname','$user','$email','$phonenumber','$pass','$confirm_password','$gender')";
if(mysqli_query($conn , $query)){
    "</br>";
    echo "data inserted";
    echo '<a class= update href = "display.php"><button>Show list</button> </a>';
}
else{
    echo "error".$query."<br>".mysqli_error($conn);
}
// }
// else{
//     echo "data not inserted";
// }
mysqli_close($conn);
?>




