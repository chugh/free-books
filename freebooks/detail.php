
<?php $page="index"; 
include('mysql.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id = $_REQUEST['id'];
if(!isset($id))
  $id=1;
$result = mysqli_query($con,"SELECT * FROM books where id = $id");
$row = mysqli_fetch_array($result);
$filterStr = str_replace(':', '_',$row['title']);
$filterStr = str_replace('.', '_',$filterStr);
?>
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
        <?php include('header.php'); ?>
        <?php include('header-image-slider.php'); ?>
        
        <div class="row-fluid">
          <div class="span3 left-bar">
            <?php include('left-nav.php'); ?>
          </div>
          <div class="span9 font-average">
            <div class="border-newly book-details">
            	<div class="row-fluid">
                <div class="span3">
                  <?php echo '
                  <img src="assets/cover/'.$filterStr.$row['author'].'.jpg" class="img-polaroid" width="200" alt="">
                  ';
                  ?>
                </div>
                <div class="span9 padding-left-7">
                  <h2><?php  echo $row['title']; ?></h2>
                  by <?php  echo $row['author']; ?><br>
                  <hr>
                  <table>
                    <tbody>
                      <tr>
                        <th width="55%">Type:</th>
                        <th>eBook (.pdf)</th>
                      </tr>
                      <tr>
                        <th>Edition:</th>
                        <th><?php  echo $row['edition']; ?></th>
                      </tr>
                      <tr>
                        <th>Binding:</th>
                        <th><?php  echo $row['binding']; ?></th>
                      </tr>
                      <tr>
                        <th>Pages:</th>
                        <th><?php  echo $row['pages']; ?></th>
                      </tr>
                      <tr>
                        <th>ISBN:</th>
                        <th><?php  echo $row['isbn']; ?></th>
                      </tr>
                      <tr>
                        <th>Time Downloaded:</th>
                        <th><?php  echo $row['timesdwn']; ?></th>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                      <span class="orig-price">Help by Donating Us</span>
                      <?php echo '
                      <a href="assets/books/'.$filterStr.$row['author'].'.pdf" download="abc"><button class="btn btn-success float-right margin-right-30 btn-buy">Download Now</button></a><br><br>
                      ';
                      ?>
                    
                  
                  <hr>
                  <p class="justified"><?php  echo $row['desc']; ?></p>
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