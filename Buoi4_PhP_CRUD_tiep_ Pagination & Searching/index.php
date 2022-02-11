<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php 
            $ket_noi = mysqli_connect('localhost','root','','j2school');
            mysqli_set_charset($ket_noi,'utf8');

            $tim_kiem = '';
            $sql_tong_so_tin_tuc = "select count(*) from crud where tieu_de like '%$tim_kiem%' ";
            $mang_so_tin_tuc = mysqli_query($ket_noi,$sql_tong_so_tin_tuc);
            $ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);
            $tong_so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];
            
            $so_tin_tren_1_trang = 2; 
            $so_trang = ceil($tong_so_tin_tuc / $so_tin_tren_1_trang); 
            
            $trang = 1;
            if (isset($_GET['trang'])) {
            $trang = $_GET['trang']; 
            }

            $bo_qua = $so_tin_tren_1_trang * ((int)$trang - 1);

            
            if (isset($_GET['tim_kiem'])) 
            {
                $tim_kiem = $_GET['tim_kiem'];
            }

            $sql = "select * from crud where tieu_de like  '%$tim_kiem%' limit $so_tin_tren_1_trang offset $bo_qua";

            

            
            
            $ket_qua = mysqli_query($ket_noi,$sql);
        ?>
        <h1> Trang Chu </h1>
        <a href="form_insert.php">Them bai viet >>></a>
        <br>
        <br>
        
        <form>
            <input type="seach" name="tim_kiem" value = "<?php echo $tim_kiem ?>" >
        </form>

        <table border="1" width="100%">
            <tr>
                <th>Ma</th>
                <th>Tieu de</th>
                <th>Anh</th>
                <th>Sua</th>
                <th>Xoa</th>
            </tr>

            <?php foreach ($ket_qua as $tung_bai_tin_tuc) { ?>
                <tr>
                    <td> <?php echo $tung_bai_tin_tuc['ma']; ?> </td>
                    <td> <a href="show.php?ma=<?php echo $tung_bai_tin_tuc['ma']; ?>"><?php echo $tung_bai_tin_tuc['tieu_de'];?></a></td>
                    <td> <img src="<?php echo $tung_bai_tin_tuc['anh']; ?>" height="100px"> </td>
                    <td> <a href="form_update.php?ma=<?php echo $tung_bai_tin_tuc['ma']; ?>">Sua</a></td>
                    <td> <a href="delete.php?ma=<?php echo $tung_bai_tin_tuc['ma']; ?>"> Xoa </a></td>
                </tr>
            <?php } ?>

        </table>
         <?php for($i=1; $i<=$so_trang; $i++) { ?>
            <a href="?trang=<?php echo $i ?> & tim_kiem=<?php echo $tim_kiem ?>"> <?php echo $i ?> </a>
        <?php } ?>

         <?php mysqli_close($ket_noi); ?>
    </body>
</html>