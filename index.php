<?php
$const = mysqli_connect('localhost', 'root' ,'')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
mysqli_select_db( $const, "blog" );
$query = "SELECT * From posts";
$result = mysqli_query( $const, $query);


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
         if (mb_strlen($str, 'UTF-8') > 41) $str = mb_substr($str, 0, 41, 'UTF-8') . '...';
        echo "<div class='card'>
            <a class='a_styles' href='posts_card.php?id=".$key['id']."'><h2> $key[post_title]</h2></a>
          <h5> $key[post_description]</h5>
          <div class='fakeimg' style='height: 200px;'> <img width: '90%' height= '200' src ='images/$key[img_name]'></div>
          <p> $str</p>
        </div>
        ";
      }
        ?>
   			
   		</div>
   		<div class="rightcolumn" >
   			<div class="card">
   				<h2>About me</h2>
   				<div class="fakeimg" style="height: 100px">Image</div>
   				<p>Some text about me in culpa qui officia deserunt mollit anim..</p>
   			</div>
   			<div class="card">
   				<h3>Popular Post</h3>
   				<div class="fakeimg">Image</div></br>
   				<div class="fakeimg">Image</div></br>
   				<div class="fakeimg">Image</div>
   			</div>
   			 <div class="card">
   			   <h3>Follow Me</h3>
   			   <p>Some text..</p>
   			 </div>
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
