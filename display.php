<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    th{
        padding: 10px;
        border: 1px yellow;
    }
    td{
        padding: 8px;
        border: 2px solid black;
        font-size: 12px;
    }
    .btn-success{
        padding: 2px 3px;
        color: red;
        background-color:aqua;
        text-decoration: none;
        border: 1px solid red;
    }
</style>
</head>
<body>
<table style="border:1px solid black; padding:10px; background:skyblue; width: 100vw">
            <thead> 
           <tr>
            <th>ID</th>
            <th>fullname</th>
            <th>username</th>
            <th>email</th>
            <th>phoneNumber</th>
            <th>password</th>
            <th>confirmpassword</th>
            <th>gender</th>
            <th>operation</th>
            </tr>
            </thead>
            <tbody>
    <?php
  
//connect the database connection file 

include 'database_connection.php';
    $sql = "SELECT * FROM form";
    $result = $conn->query($sql);
    print_r($result);
    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
        echo            
           "<tr?>".
           "<td>".$row["id"]."</td>".
            "<td>".$row["full_name"]."</td>".
            "<td>".$row["username"]."</td>".
            "<td>".$row["email"]."</td>".
            "<td>".$row["phone_number"]."</td>".
            "<td>".$row["password"]."</td>".
            "<td>".$row["confirm_password"]."</td>".
            "<td>".$row["gender"]."</td>".
            "<td> <a href='edit.php?id={$row["id"]}' class='btn btn-success'>Edit</a></td>".
            "<td> <a href='delete.php?id={$row["id"]}' class='btn btn-success'>delete</a></td>"."</tr>";
            }
        }
        else{
            echo "data not found";
        }
// delete the data from database
    // $sqli = "delete from form where username = 'null'";
    // if ($conn->query($sqli) === TRUE) {
    // echo "Record deleted successfully";
    // } else {
    // echo "Error deleting record: " . $conn->error;
    // }

// for update the data in database
    // $update = "UPDATE form SET username='himanshu@123456789' WHERE full_name = 'Himanshu Pandey'";
    // if ($conn->query($update) === TRUE) {
    //   echo "Record updated successfully";
    // } else {
    //   echo "Error updating record: " . mysqli_error($conn);
    // }


// Close the connection

$conn->close();
?>

</tbody>
</table>
</body>
</html>


