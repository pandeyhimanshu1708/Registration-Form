<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <style>
      .required {
        color:red;
        text-align: right;
        font-size: 11px;
        display: none;
      }
    </style>

</head>
<body>
<?php
include "database_connection.php";

$id = $_GET['id'];
// echo $id;
$query= "select * from form where id = $id";

$result = $conn->query($query);
// echo [$result];
// $result = mysql_query($sql);

// echo $result;
if($result-> num_rows > 0){

    $row=$result->fetch_assoc();
    $fullname = $row['full_name'];
    $name = $row['username'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $pass = $row['password'];
    $confirmpassword = $row['confirm_password'];
    $gender = $row['gender'];
}
echo '
<div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="update1.php" method="post" id="form" name="myForm" onsubmit=" return valid()">
        <div class="main-user-info">
          <div class="user-input-box">
<input type = "hidden" value ="'.$id.'"  name =id>
            <label for="fullName">Full Name:<span style="color:red;">*</span></label>
            <input type="text"
                    id="fullName"
                    name="fullName"
                    value="'.$fullname.'" maxlength ="100">
                    <span id="require" class="required"> *Name should only contain letters and spaces!</span>        
          </div>

          <div class="user-input-box">
            <label for="username">Username:<span style=color:red;>*</label>
            <input type="text"
                    id="username"
                    name="username"
                    value = "'.$name.'"maxlength="10">
                    <span id="pandey" class="required">* Username should only contain letters and spaces!!</span>
          </div>

          <div class="user-input-box">
            <label for="email">Email:<span style=color:red;>*</label>
            <input type="email"
                    id="email"
                    name="email"
                    maxlength="50"
                    value="'.$email.'">
                    <span id="mail" class="required">*Please enter a valid email!!</span>
                    
          </div>

          <div class="user-input-box">
            <label for="phoneNumber">Phone Number:<span style=color:red;>*</label>
            <input type="text"
                    id="phone_Number";
                    name="phoneNumber"
                    maxlength="10"
                    value="'.$phone_number.'">
                    <span id="contact_span" class="required">*Please insert a valid phone number!!</span>
          </div>

          <div class="user-input-box">
            <label for="psw">Password</label>
            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  value = "'.$pass.'" required>
            <span id="pass" class="required">*Please enter a matched password!!</span>
            
          </div>

          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    value="'.$confirmpassword.'">
          </div>

        </div>
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" name="gender" id="male" value="male" required >
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other" value="other">
            <label for="other">other</label>
          </div>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register" name="submit">
       </div>
      </form>
    </div> ';
?>
<script>

//var mail_span = document.querySelector("#mail_span");
var span = document.querySelector("#require"); 
var span_user = document.querySelector("#pandey");
var span_email = document.querySelector("mail");
var contact_span = document.querySelector("#contact_span");
var span_pass =document.querySelector("#password");


function valid() {

var user_fullname = document.forms.myForm.fullName.value;
console.log(user_fullname);
if (user_fullname.trim() == ''){
  if (span.style.display = "none") {
      span.style.display = "block";
    }
  return false;
}

var user_username = document.forms.myForm.username.value;
console.log(user_username);
if(user_username.trim() == ''){
  if(span_user.style.dispaly = "none"){
    span_user.style.display = "block";
  }
  return false;
}
var user_email = document.forms.myForm.email.value;
console.log(user_email);
if (!user_email || user_email.trim() === '') {
                if (span_email.style.display = "none") {
                    span_email.style.display = "block";
                }
                return false;
            }
var user_contact = document.forms.myForm.phoneNumber.value;          
if (!validateContactNumber(user_contact)) {
  if (contact_span.style.display = "none") {
      contact_span.style.display = "block";
      }
      return false;
      }
var user_password =document.forms.myForm.psw.value;
var c_pass = document.forms.myForm.confirmPassword.value;

console.log(user_password);
// console.log(c_pass);
if(user_password!= c_pass)
{
  return false;
}
};


function validateContactNumber(contactNumber) {
// Define the regex pattern for a valid contact number (0-9, excluding 10 digits)
var pattern = /^\d{10,}$/;
// Test the input against the regex pattern
return pattern.test(contactNumber);
}
</script>
</body>
</html>


