<?php $page = "home"; 
if(!empty($_POST) && $_POST['inputName']) {
  include('mysql.php');
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"insert into books values ('','$_POST[inputName]','$_POST[inputAuthor]','$_POST[inputDescription]','$_POST[condition]','$_POST[inputEdition]','$_POST[inputBinding]','$_POST[inputPages]','$_POST[inputISBN]','$_POST[inputOldPrice]','$_POST[inputNewPrice]','$_POST[inputDiscount]','$_POST[category]')"); 

}

?>
<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Books Entry Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="abstract" content=""/>
    <meta name="keywords" content=""/>
    <!--  Le styles  -->
    <link href="http://qubitech.in/bootstrap/css/bootstrap.css" rel="stylesheet"/>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Economica|Dr+Sugiyama|Average+Sans|Raleway"/>
    <link href="css/custom-css.css" rel="stylesheet"/>

    <!--  Fav and touch icons  -->
    <link rel="shortcut icon" href="assets/favicon.png"/>
    <style type="text/css">
    body {
      margin-top: 20px;
    }
      .not-visible {
        display: none;
      }
      input, select {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <div style="height: 100%; width: 960px; margin: auto auto;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
        <?php 
          if($result) {
            echo '<div class="alert alert-success">
                              Record Added. 
                            </div>
            ';
          }
          if(!$result && !empty($_POST)) {
            echo '<div class="alert alert-error">
                              Some error occured. Record not Added. 
                            </div>
            ';
          }
        ?>
         <h4>Please fill the following details:</h4>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Category:</strong></label>
                          </div>
                          <div class="span8">
                            <select name="category" id="category">
                              <option value="Academic &amp; Professional">Academic &amp; Professional</option>
                              <option value="Biographies">Biographies</option>
                              <option value="Business, Investing &amp; Management">Business, Investing &amp; Management</option>
                              <option value="Children">Children</option>
                              <option value="College Text &amp; Reference">College Text &amp; Reference</option>
                              <option value="Comics and Graphic Novels">Comics and Graphic Novels</option>
                              <option value="Computers &amp; Internet">Computers &amp; Internet</option>
                              <option value="Entrance Exam">Entrance Exam</option>
                              <option value="History &amp; Politics">History &amp; Politics</option>
                              <option value="Indian Languages">Indian Languages</option>
                              <option value="Literature and Fiction">Literature and Fiction</option>
                              <option value="Medical">Medical</option>
                              <option value="School Books">School Books</option>
                              <option value="Science &amp; Technology">Science &amp;ß Technology</option>
                            </select>
                            <div class="alert alert-error not-visible" id="inputPersonError">
                              Required Field. Please enter the title.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Name:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputName" id="inputName" placeholder="Name">
                            
                            <input type="text" name="yuyuyu" id="inputPerson" placeholder="Specify" style="display:none">
                            <div class="alert alert-error not-visible" id="inputPersonError">
                              Required Field. Please enter the title.
                            </div>
                          </div>
                        </div>

                        


                        


                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Author:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputAuthor" id="inputAuthor" placeholder="Author">
                            <div class="alert alert-error not-visible" id="inputAuthorError">
                              Required Field. Please enter Author.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Description:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputDescription" id="inputDescription" placeholder="Description">
                            <div class="alert alert-error not-visible" id="inputDescriptionError">
                              Required Field. Please enter Description.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Discount:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputDiscount" id="inputDiscount" placeholder="Discount">
                            <div class="alert alert-error not-visible" id="inputDiscountError">
                              Required Field. Please enter Discount.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Condition:</strong></label>
                          </div>
                          <div class="span8">
                            <select name="condition" id="condition">
                              <option value="As Good as New">As Good as New</option>
                              <option value="Moderately Used">Moderately Used</option>
                              <option value="Old &amp; Used">Old &amp; Used</option>
                            </select>
                            <div class="alert alert-error not-visible" id="inputConditionError">
                              Required Field. Please enter Condition.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Edition:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputEdition" id="inputEdition" placeholder="Edition">
                            <div class="alert alert-error not-visible" id="inputEditionError">
                              Required Field. Please enter Edition.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Binding:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputBinding" id="inputBinding" placeholder="Binding">
                            <div class="alert alert-error not-visible" id="inputBindingError">
                              Required Field. Please enter Binding.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Pages:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputPages" id="inputPages" placeholder="Pages">
                            <div class="alert alert-error not-visible" id="inputPagesError">
                              Required Field. Please enter Pages.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>ISBN:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputISBN" id="inputISBN" placeholder="ISBN">
                            <div class="alert alert-error not-visible" id="inputISBNError">
                              Required Field. Please enter your state.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>Old Price:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputOldPrice" id="inputOldPrice" placeholder="Old Price">
                            <div class="alert alert-error not-visible" id="inputOldPriceError">
                              Required Field. Please enter old price.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            <label class="font-20"><strong>New Price:</strong></label>
                          </div>
                          <div class="span8">
                            <input type="text" name="inputNewPrice" id="inputNewPrice" placeholder="New Price">
                            <div class="alert alert-error not-visible" id="inputNewPriceError">
                              Required Field. Please enter price.
                            </div>
                          </div>
                        </div>

                        <div class="row-fluid">
                          <div class="span4">
                            
                          </div>
                          <div class="span8">
                            <button class="btn btn-primary align-right btn-width-20">Submit Book</button>
                          </div>
                        </div>
                        
      </form>
      </div>
    <script type="text/javascript" src="http://qubitech.in/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://qubitech.in/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="js/custom-js.js"></script>
</body>
</html>