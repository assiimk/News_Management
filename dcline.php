<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>الأخبار المرفوضة</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <?php
    include "menu.php"; 
     $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
     
        $sql="select * from news where status=2";
        $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
      echo "<table><tr><td>عنوان الخبر</td><td>".$row['ntitle']."</td></tr><tr><td>تاريخ الخبر</td><td>".$row['ndate']."</td></tr><tr><td>القسم</td><td>".$row['cid']."</td></tr><tr><td>الصورة</td><td><img width='400px'  src=upload/".$row['nid'].".".$row['nimage']."></td></tr> <tr><td>نص الخبر</td><td>".$row['ndetails']."</td></tr></table>";
    
   
        }
    }else{
          echo "لاتوجد نتائج لبحثك ";
    }
    
     
    
    mysqli_close($conn);
            
            ?>
</body>
</html>