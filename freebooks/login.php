
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
		
		function user_set_cookies($username, $id)
		{
			global $code;
			$user_name=strtolower($username);
			$id_hash=md5($user_name.$code);
			setcookie('user_name',$user_name,(time()+2592000),'/','',0);
			setcookie('id_hash',$id_hash,(time()+2592000),'/','',0);
			setcookie('id_web',$id,(time()+2592000),'/','',0);	
		}

		/*function user_isloggedin()
		{
			global $code;
			if($_COOKIE['user_name'] && $_COOKIE['id_hash'])
		{
			$hash=md5($_COOKIE['user_name'].$code);
				if($hash==$_COOKIE['id_hash']){
				return true;
				}
				else
				return false;
			}
		else
			return false;
		}*/

		
		if(isset($_POST['submit'])&& $_POST['submit']=='submit'){
			$username = $_POST['myusername'];
			$password = $_POST['mypassword'];
			$query="SELECT id FROM user WHERE username='$username' AND password='$password'";
			if(!mysqli_query($con,$query))
					die(mysqli_error($con));
			$result=mysqli_query($con,$query);
			if($result && mysqli_num_rows($result)>0){
					$row = mysqli_fetch_array($result,MYSQL_ASSOC);
					$id= $row['id'];
					user_set_cookies($username, $id);
					header("Location: index.php");
					
					
				}
		}

			if(user_isloggedin())
		{
			header("Location: index.php");
		}	?>
        <?php include('header-image-slider.php'); ?>
        
        <div class="row-fluid">
          <div class="span3 left-bar">
            <?php include('left-nav.php'); ?>
          </div>
          <div class="span9 font-average">
            <div class="border-newly">
            	<div class="row-fluid">
            		<div class="span8">
            			<h3>Log in</h3>
						<h4></h4>
            	<form name="booking" action="login.php" method="post" onsubmit="return validateForm()" id="margin-top-15" enctype="multipart/form-data">
                       
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
                            <label class="font-20"><strong>Password:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="password" name="mypassword" id="mypassword" placeholder="Password">
                            <div class="alert alert-error not-visible" id="inputAuthorError">
                              Required Field. Please enter your Author Name.
                            </div>
                          </div>
                        </div>


                        <div class="row-fluid">
                          <div class="span4">
                            
                          </div>
                          <div class="span8">
                            <br>
                            <button class="btn btn-success btn-width-120 btn-login" input type="submit" name="submit" value="submit" >Login</button>
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