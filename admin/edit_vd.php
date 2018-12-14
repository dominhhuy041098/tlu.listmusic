<?php ob_start(); ?>

<style type="text/css">
.loi{
    color: red;
}
</style>
<?php include('includes/header.php')?>
<div class='row'>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php 
            include('../inc/myconnect.php');
            include('../inc/function.php');
            if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
                    $id=$_GET['id'];
                }
                else{
                    header('Location:list_cd.php');
                    exit();
                }
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $error=array();
                
                if(empty($_POST['title'])){
                    $error[]='title';
                }
                else{
                    $title=$_POST['title'];
                }
                if(empty($_POST['link'])){
                    $error[]='link';
                }
                else{
                    $link=$_POST['link'];
                }
                if(empty($_POST['ordernum'])){
                    $error[]='ordernum';
                }
                else{
                    $ordernum=$_POST['ordernum'];
                }
        
                $status=$_POST['status'];
                if(empty($error)){
                $query="UPDATE tblvideo SET title='{$title}',link='{$link}',ordernum={$ordernum},status={$status} WHERE id={$id}";
            $results=mysqli_query($dbc,$query);
            if(mysqli_affected_rows($dbc)==1){
                echo "<p style='color:green'>Sửa thành công<p>";
            }

            else{
                echo "<p class='loi'>Bạn chưa sửa gì </p>";
            }

        }
        else {
            $messegers="<p class='loi'>Bạn phải nhập đầy đủ thông tin </p>" ;
        }
            }
        $query_id="SELECT title,link,ordernum,status FROM tblvideo WHERE id={$id};";
        $result_id=mysqli_query($dbc,$query_id);
        kt_query($result_id,$query_id);
        if(mysqli_num_rows($result_id)==1){
            list($title,$link,$ordernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
        }
        else{
            $messegers="<p class='required'>ID video không tồn tại</p>";
        }
        ?>
        <form name="frmadd_bh" method="POST">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Sửa thông tin video: <?php if(isset($video)){ echo $video;} ?></h3>
            <div class="form-group">
                <label>Video</label>
                <input type="text" name="title" value="<?php if(isset($title)){ echo $title;} ?>" class="form-control" placeholder="Tên">
                <?php
                    if(isset($error) && in_array('title',$error)){
                        echo "<p class='loi'>Bạn chưa nhập video </p>";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>Thứ Tự</label>
                <input type="text" name="ordernum" value="<?php if(isset($ordernum)){ echo $ordernum;} ?>" class="form-control" placeholder="Thứ Tự">
                <?php
                    if(isset($error) && in_array('ordernum',$error)){
                        echo "<p class='loi'> Bạn chưa nhập thứ tự </p>";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" value="<?php if(isset($link)){ echo $link;} ?>" class="form-control" placeholder="Link">
                <?php
                    if(isset($error) && in_array('Link',$error)){
                        echo "<p class='loi'> Bạn chưa nhập Link </p>";
                    }
                ?>
            </div>
        
           
            <div class="form-group">
                <label style="display:block">Trangthai</label>
                <?php
                    if($status==1){
                        ?>
                         <label class="radio-inline"><input checked="checked" type="radio" name="status" value=1>Hien thi</label>
                        <label class="radio-inline"><input type="radio" name="status" value=0>Khong Hien thi</label>
                    <?php
                    }
                    else{
                        ?> <label class="radio-inline"><input  type="radio" name="status" value=1>Hien thi</label>
                        <label class="radio-inline"><input checked="checked" type="radio" name="status" value=0>Khong Hien thi</label>
                        <?php    
                    } 
                ?>
                       </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Sửa">
        </form>
    </div>
<?php include('includes/footer.php')?>
<?php ob_flush();?>