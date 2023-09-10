<?php

if(isset($_POST["submit"])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullName'];
    $usernamer = $_POST['username'];
    $email = $_POST["email"];
    $phone_number = $_POST['phoneNumber'];
    $pass = $_POST['psw'];
    $confirm_password = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
}
include 'database_connection.php';
  $sql = "UPDATE form SET full_name = '$fullname', username = '$usernamer',email = '$email', phone_number ='$phone_number', `password` = '$pass',Confirm_password = '$confirm_password', gender = '$gender'
  where id = '$id'"; 
if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
    echo '<a class= update href = "display.php"><button color:yellow>Show list</button> </a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>


     