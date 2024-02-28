<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <META HTTP-EQUIV="refresh" CONTENT="1;URL=edit.php">
</head>
<body>
    <?php include "menu.php"; ?>
<?php
    
        $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $ID=$_GET['id']; 
    
        $sql="delete from news where nid=$ID";
        mysqli_query($conn,$sql);
    echo "تم الحذف بنجاح";
    
        
        
    ?>
    
</body>
</html>