<?php 
include 'db_connection.php';
$conn = OpenCon();
$un = $_POST['username'];
$pw = $_POST['password'];


$sql = "SELECT * FROM users WHERE username='$un' AND password='$pw'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    $details = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $details['username'];
    $_SESSION['loggedin'] = true;
     //echo "come";ss
    header("location: home.php?success=1");
}else{
    // echo "not come";
    header("location: index.php?error=1");
}
CloseCon($conn); 
?>
 