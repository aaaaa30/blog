<?php
/*$const = mysqli_connect('localhost', 'root' ,'')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
mysqli_select_db( $const, "blog" );
$query = "SELECT * From posts";
$result = mysqli_query( $const, $query);
//var_dump($result);*/

$uploaddir = '/blog/images/';
$uploadfile = $uploaddir . basename($_FILES['uersfile']['name']);

if(isset($_POST["add_title"])){
  $const = mysqli_connect('localhost', 'root' ,'')  or die ("html>script language='JavaScript'>alert('Не удается подключиться к базе данных. Повторите попытку позже.'),history.go(-1)/script>/html>") ;
  mysqli_select_db( $const, "blog" );
  $title=$const->real_escape_string($_POST['add_title']);
  $title_description=$const->real_escape_string($_POST['add_title_description']);
  $img=$const->real_escape_string($_POST['img_name']);
  $text=$const->real_escape_string($_POST['text']);
  $sql= "INSERT INTO posts (post_title, post_description, img_name, post_text) VALUES ('$title', '$title_description', '
  $img', '$text') ";
   /*if($const->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $const->error;
    }
    $const->close();*/
    //var_dump($_FILES);
    if (move_uploaded_file($_FILES['uersfile']['tmp_name'], 'domains/blog/images/'.$_FILES['uersfile']['name'])) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
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
    <link rel="stylesheet" type="text/css" href="style/add_posts_styles.css">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
    <!-- Start your project here-->
   	<div class="header">
   		<h2>Blog NAme</h2>
   	</div>
   
   	<form method="POST" enctype="multipart/form-data" action="add_posts.php" style="display: inline;">
      <div class="container" >
        <p>
        <label for="add_title">Заголовок </label></br>
        <input type="text" name="add_title" required > 
        </p>
        <p>
        <label for="add_title_description">Краткое описание </label></br>
        <input type="text" name="add_title_description"> 
        </p>
        <p>  
        <label for="img_name"> Картинка </label></br>
        <input type="text" name="img_name"> 
          <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" name="uersfile" >
        <p>
        </p>
        <label for="text"> Текст  </label></br>
        <textarea  name="text"></textarea>
        </p>
        <button type="submit" class="registerbtn">Register</button>
     </div>
    </form>
 

   	<div class="footer">
   			<h2>Footer</h2>
   		</div>	
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
