


<?php
    include('../inc/myconnect.php');
    include('../inc/function.php');
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
    {
        $id=$_GET['id'];
        //xóa hình ảnh trong thư mục upload
        $sql="SELECT noidung,anh,anh_thumb FROM tblbaihat WHERE id={$id}";
        $query_a=mysqli_query($dbc,$sql);
        $anhInfo=mysqli_fetch_assoc($query_a);
        unlink('../'.$anhInfo['anh']);
        unlink('../'.$anhInfo['anh_thumb']);
        unlink('../'.$anhInfo['noidung']);
        $query="DELETE FROM tblbaihat WHERE id={$id}";
        $result=mysqli_query($dbc,$query);
        kt_query($result,$query);
        header('Location: list_bh.php');
    }
    else
    {
        header('Location: list_bh.php');	
    }
    ?>