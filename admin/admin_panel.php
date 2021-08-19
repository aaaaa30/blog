<?php
$const = mysqli_connect('localhost', 'root' ,'')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
mysqli_select_db( $const, "blog" );
$query = "SELECT * From posts";
$result = mysqli_query( $const, $query);


  if(isset($_GET["id"])){
      $sql = "DELETE From posts WHERE id = ".$_GET["id"]."";

      if($const->query($sql)){
        echo "Данные успешно удалены";
    } else{
        echo "Ошибка: " . $const->error;
    }
    $const->close();
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
    <link rel="icon" href="/img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <link rel="stylesheet" type="text/css" href="/style/admins_styles.css">
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
   	<div class="header">
   		<h2>Admin Panel</h2>
   	</div>
   	<div class="row">
   		<div class="leftcolumn">
        <?php
        foreach ($result as $key) {
         
        echo "<div class='card'>
            <a class='a_styles' href='posts_card.php?id=".$key['id']."'><span> $key[post_title]</span></a>
            <ul class='hr'>
            <a href='admin_panel.php?id=".$key['id']."''><li>Удалить</li></a>
             <a href='post_edit.php?id=".$key['id']."'><li>Редактировать</li> </a>
            </ul>
        </div>
        ";
      }
        ?>
   			
   		</div>
   	</div>

   	<div class="footer">
   			<h2>Footer</h2>
   		</div>	
    <?

    ?>














    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
