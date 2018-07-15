
<?php include 'header.php' ?>
<?php
  $init =  $_POST['init'];
  if(!$init)
  {
      $_POST['fNameErr'] = ""; $_POST['lNameErr'] = ""; $_POST['uNameErr'] = ""; $_POST['emailErr'] = ""; $_POST['passwordErr'] = "";
  }


  ?>
<body>
<nav class='navbar navbar-default'>
    <div class='container-fluid'>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Welcome <span> to ApesTree!</span></a>
        </div>
        <div class="navbar-collapse collapse" id="myNavbar" data-toggle="collapse" data-target=".navbar-collapse.in">
            <ul class='nav navbar-nav'>
                <li><a id="newsLink" href="javascript:void(0)" >Job Search</a></li>
                <li><a id="savedLink" href="javascript:void(0)" >News</a></li>
                <li><a id="sharedLink" href="javascript:void(0)" >Messages</a></li>
                <li><a id="profileLink" href="javascript:void(0)" >Profile</a></li>
                <li><a id="logoutLink" href="javascript:void(0)" >Logout</a></li>
                <li><a href="javascript:void(0)" >Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class='container'>
    <form name="registration" method="post" action="" enctype="multipart/form-data">
        <p>First Name <?php echo $_POST['fNameErr'];?></p>
        <input type="text" class="text" value=""  name="fname" required >
        <p>Last Name <?php echo $_POST['lNameErr'];;?></p>
        <input type="text" class="text" value="" name="lname"  required >
        <p>User Name <?php echo $_POST['uNameErr'];;?> </p>
        <input type="text" class="text" value=""  name="username" required >
        <p>Email Address <?php echo $_POST['emailErr'];;?></p>
        <input type="text" class="text" value="" name="email" required >
        <p>Password <?php echo $_POST['passwordErr'];;?></p>
        <input type="password" value="" name="password" required>
        <p>Match Password </p>
        <input type="password" value="" name="password2" required>
        <p>Contact No. </p>
        <input type="text" value="" name="contact"  required>
        <div class="choose-role">
            <input type="checkbox" name="role1" value="seeker"> Seeker
            <input type="checkbox" name="role2" value="recruiter"> Recruiter (You can choose both!)
        </div>
        <div class="sign-up">
            <input type="reset" value="Reset">
            <input type="submit" name="register"  value="Register" >
            <div class="clear"> </div>
        </div>
        <p> Already registered? Please <a href="javascript:void(0)" >Login</a></p>
    </form>
</div>
</body>

<?php include 'footer.php' ?>