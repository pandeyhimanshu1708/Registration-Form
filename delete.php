<?php

$id= $_GET['id'];


include 'database_connection.php';
 

   $sql = "DELETE from form where id ='$id'";
    
if (mysqli_query($conn, $sql)) {
   
    echo "Data deleted successfully";
    // echo '<a class= list href = "edit.php"><button>Show list</button> </a>';
    echo '<a class= update href = "display.php"><button>Show list</button> </a>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>


