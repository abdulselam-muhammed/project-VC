<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
Login Seccessfully
<?php 
if(isset($_SESSION['user'])) {
    echo $_SESSION['user'][0]['name'];
} else {
    echo "isim Bulunmuyor !";
}
 ?>
</body>
</html>