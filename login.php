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
    // echo "come";
    header("location: index.php?success=1");
}else{
    // echo "not come";
    header("location: login_page.php?error=1");
}
CloseCon($conn); 
?>
 