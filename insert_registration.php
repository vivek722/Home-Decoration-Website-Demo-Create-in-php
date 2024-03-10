<?php
include('connection.php');
if (isset($_POST['b1']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$_email = $_POST['email'];
$_contact = $_POST['contact'];
$_address = $_POST['address'];
$_password = $_POST['password'];


// $ch1 = "select * from `registration` where email='$_email' and password='$_password'";
// $ff=mysqli_query($con,$ch1);
// $d=mysqli_num_rows($ff);
// if($d==1)
// {
//     die("Your Email Is Alredy Register");
// }
// else
// {
    $query = "insert into `us_register` (`f_name`, `l_name`, `email`, `contact`, `address`, `password`)  values (
        '$fname','$lname','$_email',$_contact,'$_address','$_password')";
        $run = mysqli_query($con,$query);

    if($run)
    {
    echo "insert successfully";
    header("Location:user_login.php ");
    }
    else
    {
    echo "Check Your Input Data!!!";
    }

 }
// }
?>