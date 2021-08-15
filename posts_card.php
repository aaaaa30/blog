<?php

if(isset($_GET["id"])){


$const = mysqli_connect('localhost', 'root' ,'')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
mysqli_select_db( $const, "blog" );
$post_id = mysqli_real_escape_string($const ,$_GET["id"] );
$query = "SELECT * From posts Where id = '$post_id'";
$result = mysqli_query( $const, $query);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
   	<div class="header">
   		<h2>Blog NAme</h2>
   	</div>
   	<div class="row">
   		<div class="leftcolumn">
        <?php
        foreach ($result as $key) {
         $str = $key['post_text'];
         
        echo "<div class='card'>
            <h2> $key[post_title]</h2>
          <h5> $key[post_description]</h5>
          <div class='fakeimg' style='height: 200px;'> <img width: '90%' height= '200' src ='images/$key[img_name]'></div>
          <p> $str</p>
        </div>
        ";
      }
        ?>
   			
   		</div>
   		
   	</div>

   	<div class="footer">
   			<h2>Footer</h2>
   		</div>	
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
