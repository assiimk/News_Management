<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>اضافة الخبر</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php include "menu.php"; ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table>
        <tr><td>عنوان الخبر</td><td><input type="text" name="title" ></td></tr>
        <tr><td>القسم</td><td>
        <select name="cat">
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $sql="select * from cat" ; 
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
         echo "<option value=".$row['cid'].">".$row['cname']."</option>";   
        }
        mysqli_close($conn);
        ?>
            </select></td></tr>
        <tr><td>صورة الخبر</td><td><input type="file"  name="imagefile" ></td></tr>
        <tr><td>نص الخبر</td><td><textarea rows="10" cols="50" name="ndetail"></textarea></td></tr>
        </table>
    <input type="submit" value="اضافة الخبر" >
    
    
    </form>
<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {  
       $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $title=$_POST['title'];
        $cat=$_POST['cat'];
        $detail=$_POST['ndetail'];
        $imageFileType = strtolower(pathinfo(basename($_FILES["imagefile"]["name"]),PATHINFO_EXTENSION));
        $sql="insert into news (ntitle,ndetails,nimage,cid) values ('$title','$detail','$imageFileType','$cat')";
        mysqli_query($conn,$sql); 
        $nid= mysqli_insert_id($conn);
        move_uploaded_file($_FILES["imagefile"]["tmp_name"], "upload//".$nid.".".$imageFileType);
        echo " تم تسجيل الخبر  بنجاح";
        mysqli_close($conn);
    }
    
    ?>
</body>
</html>