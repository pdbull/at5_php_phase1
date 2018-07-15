<?php session_start();
require_once('dbconnection.php');
require_once ('utilities.php');

//Initial Landing
$action = filter_input(INPUT_POST, 'action');
if($action == NULL)
{
    $_POST['init'] = false;
    include('registration.php');
}


//Code for Registration 
if(isset($_POST['register']))
{
	$succeeded = false;
	$_POST['init'] = true;
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$uname =$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
    $contact=$_POST['contact'];
    $errors = array();
    //$valid= $util->_isValid($password);



	 // define variables and set to empty values
      $fNameErr = $lNameErr = $uNameError = $emailErr = $passwordErr = "";

      if (empty($fname)) {
          $fNameErr = "First name is required";
      } else {
          $fname = test_input($fname);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
              $fNameErr = "Only letters and white space allowed if first name.";
          }
      }
    $_POST['fNameErr'] = $fNameErr;

        if (empty($lname)) {
            $lNameErr = "Last name is required";
        } else {
            $lname = test_input($lname);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                $lNameErr = "Only letters and white space allowed in last name.";
            }
        }

      if (empty($uname)) {
        $uNameErr = "User name is required";
      } else {
        $uname = test_input($uname);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
            $uNameErr = "Only letters and white space allowed";
        }
        else{
            $query = "select username from seeker where username = '" . $uname ."'";
            $result = mysqli_query($con,$query);
            if($result)
                $uNameErr = "The user name is already taken, please select another";
        }
      }

      if (empty($_POST["email"])) {
          $emailErr = "Email is required";
      } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
          }
      }

      if (empty($password)) {
          $password = "";
          $passwordErr = "Password cannot be empty.";
      } else if($password != $password2){
          $passwordErr = "Passwords must match.";

      } else {
          $passwordErr = checkPassword($password);
      }





/*if(! checkPassword($password,$errors) || checkPasswordMatch($pwd, $pwd2, $errors))
    {
        $length = count($errors);
        echo $length;
        for($i = 0; $i < $length; $i++)
        {
            echo "<script>alert('". $errors[$i] . "')</script>";
        }
    }
    else
    {

        $enc_password=md5($password);
        $a=date('Y-m-d');
        $sql = "insert into seekers(firstName,lastName,userName,password,email,contact,postDate)  values('{$fname}','{$lname}','{$uname}','{$email}','{$enc_password}','{$contact}','{$a}')";
        $msg=mysqli_query($con,$sql);
        $succeeded = true;
        include('welcome.php');

    }*/
  if($succeeded)
  {
	echo "<script>alert('Registered successfully');</script>";
  }
}

// Code for login system
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=md5($password);
$useremail=$_POST['useremail'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="welcome.php";
$_SESSION['login']=$_POST['uemail'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

//Code for Forgot Password

if(isset($_POST['send']))
{
$row1=mysqli_query($con,"select email,password from users where email='".$_POST['femail']."'");
$row2=mysql_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}

?>


