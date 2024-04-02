<?php
session_start();

$con = mysqli_connect('localhost', 'root');
if ($con) {
    echo "connection successful";
} else {
    echo "no connection";
}

$db = mysqli_select_db($con, 'swc');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = " select * from  swc_user where email='$email' and password='$password' ";
    $query = mysqli_query($con, $sql);

    $row = mysqli_num_rows($query);
    if ($row == 1) {
        while ($enreg = mysqli_fetch_array($query)) {
            $_SESSION['user'] = $enreg["username"];
            header('location:./admin/index.php');
        }
    } else {
        
      
        header('location:./login.php?error=1');
    }

}

?>