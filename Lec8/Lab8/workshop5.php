<html>
<head><meta charset="utf-8"></head>    
<body>
<div style="display:flex">
<?php
$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
?>
<?php while ($row = $stmt->fetch()) : ?>
<div style="padding: 15px; text-align: center">
<a href="detail.php?username=<?=$row["username"]?>">
<img src='member_photo/<?=$row["name"]?>.jpg' width='100'>
</a><br>
<?=$row ["name"]?><br>
</div>
<?php endwhile; ?>
</div>
</body>
</html>