<?php
    $ma=$_POST['ma'];
    $tieu_de=$_POST['tieu_de'];
    $noi_dung=$_POST['noi_dung'];
    $anh=$_POST['anh'];

    $ket_qua = mysqli_connect('localhost','root','','tintuc');
    mysqli_set_charset($ket_qua,'utf8');

    $sql = "update crud 
    set tieu_de= '$tieu_de',
        noi_dung='$noi_dung',
        anh='$anh'
        where 
        ma=$ma";
    mysqli_query($ket_qua,$sql);

    mysqli_close($ket_qua);
