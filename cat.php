<!DOCTYPE html>
<html dir="rtl">
<head>
    <title>اضافة الاقسام</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php include "menu.php"; ?>
<form action="" method="post">
    اسم القسم <input type="text" required name="name">
    <br>
    <input type="submit" value="اضافة">
    
    
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $servername="localhost";
        $username="root";
        $password="";
        $db="news";
        $conn=mysqli_connect($servername,$username,$password,$db);
        if (!$conn)
        {
        echo "لم يتم الاتصال بالسيرفر";
        }else{
        if (empty($_POST["name"])) {    
            echo "الرجاء ادخال كافة الحقول";
        }else{
         $name=$_POST['name'];
            
          $sql2="select * from cat where cname='$name'" ; 
       
         $result=mysqli_query($conn,$sql2);
            if (mysqli_num_rows($result)>0){
                echo "تم تسجيل القسم مسبقاً";
            }else{
            $sql="insert into cat (cname) values ('$name')";
                mysqli_query($conn,$sql); 
            echo " تم تسجيل القسم  بنجاح";
            echo mysqli_insert_id($conn);
            }
              }
             mysqli_close($conn);
        }
    }
        
       
    ?>
</body>
</html>