<?php
header("Content-Type:text/html; charset=big5");
?>
<!Doctype html>
<html>
<html lang="zh-Hant">
<head>
  <title>²�����u�W�ʪ����x</title>
  <meta http-equiv="Content-Type" content="text/html; charset=big5">
  <meta charset="big5">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="jumbotron text-center">
  <h1>�d�ߨ�����</h1>
  <p>�ϥΪ̯���z�L���������Ӭd�߸Ө����Ӥ���U�c�ⲣ�~�C</p> 
</div>
    
<?php

$conn=mysqli_connect("localhost","root","","db_course");

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}
  if(isset($_POST['save']))
{
    $sname = $_POST['SName'];
    $sql = "SELECT supplier.SName, iteminfo.ItemName FROM `supplier`,`iteminfo` WHERE iteminfo.ItemID AND iteminfo.SId = supplier.SId AND supplier.SName = '$sname'";
    $result = mysqli_query($conn,$sql);
    
        if ($result) {
            echo "<div style='width:100%'><table border='1'><tr><th>SName</th><th>ItemName</th></tr>";
            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row["SName"]."</td>";
                echo "<td>".$row["ItemName"]."</td>";
                echo "</tr>";
            }
            echo "</table></div>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
}

?>

<form action="supplierSelect.php" method="post"> 
    <div style="text-align:center"> 
        <label id="first"> supplier query:</label><br/>
        <input type="text" name="SName" placeholder="��J���d�ߤ������ӦW��"><br/>
        
        <br/>
        <button type="button" class="btn btn-defualt" onclick=location.href="index.php">back homepage</button>
        <button type="submit" name="save" class="btn btn-primary">submit</button>
    </div>
</form>

</body>
</html>