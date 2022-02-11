<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
</head>
<body>

<?php 

$ma = $_GET['ma'];
$ket_noi = mysqli_connect('localhost','root','','j2school');
mysqli_set_charset($ket_noi,'utf8');

$sql = "select * from crud where ma=$ma";

$ket_qua=mysqli_query($ket_noi,$sql); 

$tin_tuc = mysqli_fetch_array($ket_qua)



?>
<h1><?php echo $tin_tuc['tieu_de']; ?> </h1>
<p> <?php echo nl2br($tin_tuc['noi_dung']); ?> </p>
<img src="<?php echo $tin_tuc['anh']; ?> ">

<?php mysqli_close($ket_noi); ?>
</body>
</html>