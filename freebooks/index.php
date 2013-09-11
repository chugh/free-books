
<?php $page="index"; 

//$con=mysqli_connect("freebooksqubit.db.10873852.hostedresource.com","freebooksqubit","P@ssw0rd","freebooksqubit");
include('mysql.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM books");
$row = mysqli_fetch_array($result);
$numrow = $result->num_rows;


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
          
          <div class="span12 font-average">
            <div class="border-newly">
            <h3>Newly Added Books</h3>
            <table width="100%" id="books_table" class="font-average">
              <tbody>
                <!--<tr align="center">
                  <td width="20%">
                    <a href=""><img src="assets/dummy_img.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">Programming Languages</a><br>
                    <span class="author">by Robert W Sebesta</span><br>
                    <div class="price-buy">
                    <span class="price-tag">&#8377; 463</span>
                    <button class="btn btn-mini btn-success margin-top-5 float-right">Buy Now</button>
                    </div>
                  </td>
                  <td width="20%">
                    <a href=""><img src="assets/book_img2.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href=""><?php echo $row['title']; ?></a><br>
                    <span class="author">by <?php echo $row['author']; ?></span><br><hr>
                    <button class="btn btn-mini btn-primary margin-top-5">Download</button>
                  </td>
                  <td width="20%">
                    <a href=""><img src="assets/book_img3.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">Java Cookbook</a><br>
                    <span class="author">by Ian F. Darwin</span><br>
                    <div class="price-buy">
                    <span class="price-tag">&#8377; 463</span>
                    <button class="btn btn-mini btn-success margin-top-5 float-right">Buy Now</button>
                    </div>
                  </td>
                  <td width="20%">
                    <a href=""><img src="assets/book_img4.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">Arduino Robotics</a><br>
                    <span class="author">by John-David Warren</span><br>
                    <div class="price-buy">
                    <span class="price-tag">&#8377; 463</span>
                    <button class="btn btn-mini btn-success margin-top-5 float-right">Buy Now</button>
                    </div>
                  </td>
                  <td width="20%">
                    <a href=""><img src="assets/book_img4.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">Arduino Robotics</a><br>
                    <span class="author">by John-David Warren</span><br>
                    <div class="price-buy">
                    <span class="price-tag">&#8377; 463</span>
                    <button class="btn btn-mini btn-success margin-top-5 float-right">Buy Now</button>
                    </div>
                  </td>
                </tr>-->


                <tr align="center">
                  <?php

                  for($i=$numrow;$i>$numrow-5;$i--) {
                    $result = mysqli_query($con,"SELECT * FROM books where id=$i");
                    $row =  mysqli_fetch_array($result);
                    $filterStr = str_replace(':', '_',$row['title']);
                    $filterStr = str_replace('.', '_',$filterStr);
                    echo '
                      <td width="20%">
                    <a href="detail.php?id='.$i.'"><img src="assets/cover/'.$filterStr.$row['author'].'.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">'.$row['title'].'</a><br>
                    <span class="author">by '.$row['author'].'</span><br><hr>
                    <a href="assets/books/'.$filterStr.$row['author'].'.pdf"><button class="btn btn-mini btn-success margin-top-5">Download</button></a>
                  </td>
                    ';
                  }

                  ?>
                </tr>




              </tbody>
            </table>
            </div>
            <div class="border-newly margin-top-15">
            <h3>List of Books</h3>
            <table width="100%" id="books_table" class="font-average">
              <tbody>
                <?php
                for($j=1;$j<=$numrow;$j+=5) {
                  echo ('<tr align="center">');
                  for($i=0;$i<5 && $i<=$numrow-$j;$i++) {
                    $result = mysqli_query($con,"SELECT * FROM books where id=$i+$j");
                    $row =  mysqli_fetch_array($result);
                    $filterStr = str_replace(':', '_',$row['title']);
                    $filterStr = str_replace('.', '_',$filterStr);
                    echo '
                      <td width="20%">
                    <a href="detail.php?id='.($i+$j).'"><img src="assets/cover/'.$filterStr.$row['author'].'.jpg" width="100" class="image-link img-polaroid"></a><br><br>
                    <a href="">'.$row['title'].'</a><br>
                    <span class="author">by '.$row['author'].'</span><br><hr>
                    <a href="assets/books/'.$filterStr.$row['author'].'.pdf"><button class="btn btn-mini btn-success margin-top-5">Download</button></a>
                  </td>
                    ';
                  }

                 
                echo ('</tr>');
                } 
                ?>
              </tbody>
            </table>
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