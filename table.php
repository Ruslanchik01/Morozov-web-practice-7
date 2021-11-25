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
            width: 700px;
        }

        .col_left{
            display: inline-block;
            width: 15%;
        }

        .col_center{
            display: inline-block;
            width: 35%;
        }
        .col_center2{
            display: inline-block;
            width: 10%;
        }

        .col_right{
            display: inline-block;
            width: 40%;
            text-align: center;
        }

        img{
            height: 150px;
            width: 150px;
        }



    </style>
</head>
<body style="padding-top: 3rem;">
<div class="container">
    <?php
//    $myFile = "database/users.csv";
//    $lines = file($myFile);
//
//    for($i=0;$i<count($lines);$i++)
//    {
//        $arr = explode(",",$lines[$i]);
//        for($j = 0; $j < count($arr); $j++){
////            echo $arr[$j];
////            printf("%.25s",$arr[$j]);
//            if ($j==0)
//            {
//                echo "<div class='col_left'>$arr[$j]</div>";
//            }
//
//            if ($j==1)
//            {
//                echo "<div class='col_center'>$arr[$j]</div>";
//            }
//            if ($j==2)
//            {
//                echo "<div class='col_center2'>$arr[$j]</div>";
//            }
//
//            if ($j==3)
//            {
//                echo "<div class='col_right'><img src='$arr[$j]' alt=''></div>";
//            }
//
//        }
//        echo "<hr>";
//    }
    require 'db.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $users[] = [
                'name' => $row['name'],
                'email' => $row['email'],
                'gender' => $row['gender'],
                'path'=>$row['path_to_img']
            ];
        }
    }

    for($i=0;$i<$result->num_rows;$i++)
    {
        for($j = 0; $j < 4; $j++){
//            echo $arr[$j];
//            printf("%.25s",$arr[$j]);
            $tmp="";
            if ($j==0)
            {
                $tmp=$users[$i]['name'];
                echo "<div class='col_left'>$tmp</div>";
            }

            if ($j==1)
            {
                $tmp=$users[$i]['email'];
                echo "<div class='col_center'>$tmp</div>";
            }
            if ($j==2)
            {
                $tmp=$users[$i]['gender'];
                echo "<div class='col_center2'>$tmp</div>";
            }

            if ($j==3)
            {
                $tmp=$users[$i]['path'];
                echo "<div class='col_right'><img src='$tmp' alt=''></div>";
            }

        }
        echo "<hr>";
    }

    ?>
    <a class="btn" href="adduser.php">return back</a>
</div>

</body>
</html>
