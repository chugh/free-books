
<?php $page="index"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php include('title.php'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php include('desc.php'); ?>">
    <meta name="author" content="">
    <meta name="abstract" content="Books" />
<meta name="keywords" content="<?php include('keywords.php'); ?>" />


    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica|Dr+Sugiyama|Average+Sans">
    <link href="css/custom-css.css" rel="stylesheet">

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/favicon.png">
	

    

  </head>
  <body>
    <div class="container">
      <div class="container-inside">
        <?php include('header.php');

		include('mysql.php'); 
		$message="";
		
		if(mysqli_connect_errno()){echo "unable to connect";}
		function user_set_cookies($username, $id)
		{
			global $code;
			$user_name=strtolower($username);
			$id_hash=md5($user_name.$code);
			setcookie('user_name',$user_name,(time()+2592000),'/','',0);
			setcookie('id_hash',$id_hash,(time()+2592000),'/','',0);
			setcookie('id_web',$id,(time()+2592000),'/','',0);	
		}
		
		if(isset($_POST['submit'])&& $_POST['submit']=='submit'){
			$username = $_POST['myusername'];
			$password = $_POST['inputPassword'];
			$ReTypePassword = $_POST['inputReTypePassword'];
			$emailid = $_POST['inputEmail'];
			$name = $_POST['inputFirstName'];
			$lname = $_POST['inputLastName'];
			$day= $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			if($username=="" ||$password=="" ||$emailid==""||$name==""||$lname=="" || $ReTypePassword ==""){$message ="please enter the complete details";}
			else if( $password != $ReTypePassword){print($password);$message = "Password mismatch";}
			else {
					$sql = "INSERT INTO user VALUES ('','$username','$password','$emailid','$name','$lname','$day','$month','$year')";
					if(!mysqli_query($con,$sql))
					die(mysqli_error($con));
					
				
				}
				//print('$username');
				$data1 = mysqli_query($con,"SELECT * FROM user where username = '$username'");
					$row2 = mysqli_fetch_array($data1);
				$id1  = $row2['id'];
				//print($id1);
				user_set_cookies($username,$id1);
				header("Location: index.php");
		}

?>		
        <?php include('header-image-slider.php'); ?>
        
        <div class="row-fluid">
          <div class="span3 left-bar">
            <?php include('left-nav.php'); ?>
          </div>
          <div class="span9 font-average">
            <div class="border-newly">
            	<div class="row-fluid">
            		<div class="span8">
            			<h3>Sign Up</h3>
            	<form name="booking" action="register.php" method="post" onsubmit="return validateForm()" id="margin-top-15" enctype="multipart/form-data">
                       
                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Username:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="myusername" id="myusername" placeholder="Username">
                            <div class="alert alert-error not-visible" id="inputTitleError">
                              Required Field. Please the title of the paper.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>First Name:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputFirstName" id="inputFirstName" placeholder="First Name">
                            <div class="alert alert-error not-visible" id="inputFirstNameError">
                              Required Field. Please enter your First Name.
                            </div>
                          </div>
                        </div>


                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Last Name:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputLastName" id="inputLastName" placeholder="Last Name">
                            <div class="alert alert-error not-visible" id="inputLastNameError">
                              Required Field. Please enter your Last Name.
                            </div>
                          </div>
                        </div>
						
						<div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Date of birth:</strong></label>
                          </div>
                          <div class="span8">
                            <select name="day">
								<?php
									$i=0;
									for($i=1; $i<31; $i++){
									print('<option>'.$i.'</option>');}
								?>
							</select>
							
							<select name="month">
								<?php
									$i=0;
									for($i=1; $i<13; $i++){
									print('<option>'.$i.'</option>');}
								?>
							</select>
							<select name="year" >
								<?php
									$i=0;
									for($i=1990; $i<2013; $i++){
									print('<option>'.$i.'</option>');}
								?>
							</select>
							
                            <div class="alert alert-error not-visible" id="inputAuthorError">
                              Required Field. Please enter your Password.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Password:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="password" name="inputPassword" id="inputPassword" placeholder="Password">
                            <div class="alert alert-error not-visible" id="inputAuthorError">
                              Required Field. Please enter your Password.
                            </div>
                          </div>
                        </div>
						
						 
                        
						<div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Re-Type Password:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="password" name="inputReTypePassword" id="inputReTypePassword" placeholder="Re-Type Password">
                            <div class="alert alert-error not-visible" id="inputReTypePasswordError">
                              Required Field. Please enter your verified Password.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Email:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputEmail" id="inputEmail" placeholder="Email">
                            <div class="alert alert-error not-visible" id="inputEMailError">
                              Required Field. Please enter your EMail.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            
                          </div>
                          <div class="span8">
							<h4><?php print($message); ?></h4>
                            <button class="btn btn-success btn-width-120 btn-login"input type="submit" name="submit" value="submit">Register</button>
                          </div>
                        </div>
                        
                      </form>
            		</div>
            		<div class="span4">
            			<img src="assets/ad1.png" alt="Ad" class="" style="margin-top: 15px;">
            		</div>
            	</div>
            </div>
            
          </div>
        </div>
        <!-- Footer -->
        <?php include('footer.php'); ?>
      </div>
    </div>

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/custom-js.js"></script>
  </body>
</html>