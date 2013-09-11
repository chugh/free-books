<?php
error_reporting(0);
$code='A string that is used to pad'.'out short strings for md5 encryption.';
function user_isloggedin()
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
		}
?>
<div class="header">
          <div class="row-fluid">
            <div class="span8">
             <a href="index.php"><img  src="assets/logo_header_new.png" width="355" alt="Buy Me Book"></a>
            </div>
            <div class="span4">
              <div class="colour-gray">
			  <?php if(!user_isloggedin()){ echo '
                <span class="header-info right-border"><a href="">FAQ</a></span>
                <span class="header-info right-border"><a href="">Help</a></span>
                <span class="header-info right-border"><a href="login.php">Sign in</a></span>
                <span class="header-info"><a href="register.php">Create an Account</a></span>';
				}
				else{	$idweb = $_COOKIE['id_web'];
						$data = mysqli_query($con,"SELECT * FROM user where id = $idweb");
						$row1 = mysqli_fetch_array($data);
					echo '
					<span class="header-info right-border">hello '. $row1['name'].' </span>
					<span class="header-info right-border"><a href="">Account</a></span>
					<span class="header-info"  ><a href="sign_out.php">Sign_out</a></span>';
					
				}
				?>
              </div>

              <div class="row-fluid">
            <div class="span12 header-form">
              <form action="" class="margin-auto">
                <div class="input-prepend">
                <span class="add-on">Search</span>
                <input class="input-search" id="prependedInput" type="text" placeholder="Keyword">
                </div>
              </form>
            </div>
            <div class="span6">
              
            </div>
          </div>

            </div>
          </div>
          <div class="font-average nav">
            <a  class="links nav-border" href="index.php">HOMEPAGE</a>
            <a href="" class="links nav-border">WHO WE ARE?</a>
            <a href="" class="links nav-border">WHAT'S NEW?</a>
            <a href="" class="links nav-border">UPLOAD EBOOK</a>
            <a href="" class="links nav-border">REQUEST EBOOK</a>
            <a href="" class="links">REPORT</a>
          </div>
        </div>