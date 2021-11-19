<?php
if(!file_exists('database'))
{
    mkdir('database');
    file_put_contents('database/users.csv','');
}
if(!file_exists('public'))
    mkdir('public/images');
if(!file_exists('upload.php'))
    mkdir('upload.php');


if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']))
{
    echo '<div class="container">
    <p style="color:red;font-weight: bold" >Invalid data</p>
    <hr>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="table.php">view list</a>
</div>';
}
else{
    require "upload.php";
    $name = filter_input( INPUT_POST,'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo '<div class="container">
    User Added: ';
    echo $_POST["name"];
    $email = filter_input( INPUT_POST,'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo' <br>Email: ';
    echo $_POST["email"];
    echo'<br>Gender: ';
    echo $_POST["gender"];
    echo'<hr>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="table.php">view list</a>
    
    </div>';
    if($filePath==null){
        $filePath="public/images/1.jpg";
    }
    if (!file_exists('database/users.csv')) {
        file_put_contents('database/users.csv', '');
    }
    $gender=$_POST['gender'];
    $fp = fopen('database/users.csv', 'a');
    fwrite($fp, "$name,  $email,  $gender,  $filePath \n");
    fclose($fp);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .container {
            width: 400px;
        }
    </style>
</head>
<body style="padding-top: 3rem;">


</body>
</html>

