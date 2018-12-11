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
                
                if(empty($_POST['chude'])){
                    $error[]='chude';
                }
                else{
                    $chuDe=$_POST['chude'];
                }
                if(empty($_POST['ordernum'])){
                    $error[]='ordernum';
                }
                else{
                    $ordernum=$_POST['ordernum'];
                }
                $menu=$_POST['menu'];
                $home=$_POST['home'];
                
                $status=$_POST['status'];
                if(empty($error)){
                $query="UPDATE tblchude SET ChuDe='{$chuDe}',menu={$menu},home={$home},ordernum={$ordernum},Status={$status} WHERE id={$id}";
            $results=mysqli_query($dbc,$query);
            if(mysqli_affected_rows($dbc)==1){
                echo "<p style='color:green'>Sửa thành công<p>";
            }

            else{
                echo "<p class='loi'>Sửa không thành công </p>";
            }

        }
        else {
            $messegers="<p class='loi'>Bạn phải nhập đầy đủ thông tin </p>" ;
        }
            }
        $query_id="SELECT ChuDe,menu,home,ordernum,Status FROM tblchude WHERE id={$id};";
        $result_id=mysqli_query($dbc,$query_id);
        kt_query($result_id,$query_id);
        if(mysqli_num_rows($result_id)==1){
            list($chuDe,$menu,$home,$ordernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
        }
        else{
            $messegers="<p class='required'>ID chủ đề không tồn tại</p>";
        }
        ?>
        <form name="frmadd_bh" method="POST">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Sửa thông tin chủ đề: <?php if(isset($chuDe)){ echo $chuDe;} ?></h3>
            <div class="form-group">
                <label>Chủ đề</label>
                <input type="text" name="chude" value="<?php if(isset($chuDe)){ echo $chuDe;} ?>" class="form-control" placeholder="Chủ đề">
                <?php
                    if(isset($error) && in_array('chude',$error)){
                        echo "<p class='loi'>Bạn chưa nhập chủ đề </p>";
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
                <label style="display:block">Menu</label>
                <?php
                    if($menu==0){
                        ?>
                        <label class="radio-inline"><input  type="radio" name="menu" value=1>Hien thi</label>
                        <label class="radio-inline"><input checked="checked"type="radio" name="menu" value=0>Khong Hien thi</label>
                    <?php
                    }
                    else{
                        ?> <label class="radio-inline"><input checked="checked" type="radio" name="menu" value=1>Hien thi</label>
                        <label class="radio-inline"><input  type="radio" name="menu" value=0>Khong Hien thi</label>
                        <?php    
                    } 
                ?>
               
            </div>
            <div class="form-group">
                <label style="display:block">Home</label>
                <?php
                    if($home==1){
                        ?>
                         <label class="radio-inline"><input checked="checked" type="radio" name="home" value=1>Hien thi</label>
                        <label class="radio-inline"><input type="radio" name="home" value=0>Khong Hien thi</label>
                    <?php
                    }
                    else{
                        ?> <label class="radio-inline"><input  type="radio" name="home" value=1>Hien thi</label>
                        <label class="radio-inline"><input checked="checked" type="radio" name="home" value=0>Khong Hien thi</label>
                        <?php    
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