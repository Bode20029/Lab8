<html>
<head><meta charset="utf-8"></head>
<body>
<form>
    <input type="text" name="keyword">
    <input type="submit" value="ค้นหา">
</form>
<div style="display:flex">   
    <?php

$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_GET))
$value = '%' . $_GET["keyword"] . '%';


$stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
$stmt->bindParam(1, $value);
$stmt->execute();
while ($row = $stmt->fetch()) {
?>        
<div style="padding: 15px; text-align: center">
<img src='member_photo/<?=$row["name"]?>.jpg' width='100'><br>
ชื่อสมาชิก:<?=$row ["name"]?><br> ที่อยู่:<?=$row ["address"]?><br> อีเมล:<?=$row ["email"]?><br>
</div>
<?php } ?>  
</div>
</body>
</html>