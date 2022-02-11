<?php 

$ma = $_GET['ma'];

$ket_noi = mysqli_connect('localhost','root','','j2school');
mysqli_set_charset($ket_noi,'utf8');

$sql = "delete from crud where ma = $ma";

mysqli_query($ket_noi,$sql);

mysqli_close($ket_noi);