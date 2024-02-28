<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>عرض البيانات</title>
    <meta charset="UTF-8">
</head>
<body>
<?php include "menu.php"; ?>
    <form action="" method="post">
     <input name="search" type="text" ><br>
    <input type="submit" value="بحث" >
    </form>
    
    <?php
     $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
     
 
 
     if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $search=$_POST['search']; 
         
         
       $sql2="select * from news where status=1 and ndetails like '%$search%' ";
        $result2=mysqli_query($conn,$sql2);
    if (mysqli_num_rows($result2)>0)
    {
        while($row=mysqli_fetch_assoc($result2))
        {
      echo "<table><tr><td>عنوان الخبر</td><td>".$row['ntitle']."</td></tr><tr><td>تاريخ الخبر</td><td>".$row['ndate']."</td></tr><tr><td>القسم</td><td>".$row['cid']."</td></tr><tr><td>الصورة</td><td><img width='400px'  src=upload/".$row['nid'].".".$row['nimage']."></td></tr> <tr><td>نص الخبر</td><td>".$row['ndetails']."</td></tr></table><hr>";
    
   
        }
    }else{
          echo "لاتوجد نتائج لبحثك ";
    }  
     }
     
    
    mysqli_close($conn);
            
            ?>
</body>
</html>