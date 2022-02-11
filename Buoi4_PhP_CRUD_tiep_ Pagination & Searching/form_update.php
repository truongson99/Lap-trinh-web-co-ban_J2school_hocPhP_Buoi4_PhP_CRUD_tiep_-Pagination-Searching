<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
             $ma=$_GET['ma'];
             $ket_noi = mysqli_connect('localhost','root','','j2school');
             mysqli_set_charset($ket_noi,'utf8');

             $sql = "select * from crud where ma=$ma";
             $ket_qua=mysqli_query($ket_noi,$sql);
             $tin = mysqli_fetch_array($ket_qua)

        ?>

            <form method="post" action="process_update.php">
                <input type="hidden" name="ma" value="<?php echo $ma ?> ">
                Tieu de 
                <input type="text" name="tieu_de" value="<?php echo $tin['tieu_de']; ?> "> 
                <br>
                Noi dung 
                <textarea name="noi_dung"><?php echo $tin['noi_dung']; ?></textarea>
                <br>
                Anh
                <input type="text" name="anh" value="<?php echo $tin['anh']; ?>">
                <br>
                <button>UPDATE</button>               
            </form>

            <?php mysqli_close($ket_noi); ?>
    </body>
</html>