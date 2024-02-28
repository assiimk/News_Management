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
        <?php
        $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
        $ID=$_GET['id']; 
        $sql2="select * from news where nid=$ID" ; 
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        ?>
        <tr><td>رقم الخبر</td><td><?php echo $row2["nid"];?> </td></tr>
        <tr><td>عنوان الخبر</td><td><input type="text" name="title" value=<?php echo $row2["ntitle"];?> ></td></tr>
        <tr><td>القسم</td><td>
        <select name="cat">
        <?php
        $sql="select * from cat" ; 
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
         echo "<option value=".$row['cid'].">".$row['cname']."</option>";   
        }
        
        ?>
            </select></td></tr>
        <tr><td>صورة الخبر</td><td><img width="70px"  
        <?php echo "src=upload/". $row2['nid'].".".$row2['nimage'] ?>
        "><input type="file"  name="imagefile" ></td></tr>
        <tr><td>تاريخ الخبر</td><td><?php echo $row2["ndate"];?></td></tr>
        <tr><td>نص الخبر</td><td><textarea rows="10" cols="50" name="ndetail"><?php echo $row2["ndetails"];?></textarea></td></tr>
        </table>
    <input type="submit" value="تعديل الخبر" >
    
    
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
        $ID=$_GET['id'];
        $imageFileType = strtolower(pathinfo(basename($_FILES["imagefile"]["name"]),PATHINFO_EXTENSION));
        $sql="update  news set ntitle='$title',ndetails='$detail',nimage='$imageFileType',cid='$cat' where nid=$ID";
        mysqli_query($conn,$sql); 
        $nid= mysqli_insert_id($conn);
        move_uploaded_file($_FILES["imagefile"]["tmp_name"], "upload//".$nid.".".$imageFileType);
        echo " تم تعديل الخبر  بنجاح";
        mysqli_close($conn);
    }
    
    ?>
</body>
</html>