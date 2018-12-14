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
            $query="INSERT INTO tblvideo(link,ordernum,status,title) VALUES('{$link}',$ordernum,$status,'{$title}')";
            $results=mysqli_query($dbc,$query);
            if(mysqli_affected_rows($dbc)==1){
                echo "<p style='color:green'>Thêm mới thành công<p>";
            }

            else{
                echo "<p class='loi'>Thêm mới không thành công </p>";
            }

            $_POST['title']='';
            $_POST['ordernum']='';
            $_POST['link']='';
        }
        else {
            $messegers="<p class='loi'>Bạn phải nhập đầy đủ thông tin </p>" ;
        }
            }
        ?>
        <form name="frmadd_video" method="POST">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Thêm mới video</h3>
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title'];} ?>" class="form-control" placeholder="Tên">
                <?php
                    if(isset($error) && in_array('title',$error)){
                        echo "<p class='loi'>Bạn chưa nhập video </p>";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>Thứ Tự</label>
                <input type="text" name="ordernum" value="<?php if(isset($_POST['ordernum'])){ echo $_POST['ordernum'];} ?>" class="form-control" placeholder="Thứ Tự">
                <?php
                    if(isset($error) && in_array('ordernum',$error)){
                        echo "<p class='loi'> Bạn chưa nhập thứ tự </p>";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>link</label>
                <input type="text" name="link" value="<?php if(isset($_POST['link'])){ echo $_POST['link'];} ?>" class="form-control" placeholder="Link">
                <?php
                    if(isset($error) && in_array('link',$error)){
                        echo "<p class='loi'>Bạn chưa nhập link video </p>";
                    }
                ?>
            </div>
            
            <div class="form-group">
                <label style="display:block">Trangthai</label>
                <label class="radio-inline"><input checked="checked" type="radio" name="status" value=1>Hien thi</label>
                <label class="radio-inline"><input type="radio" name="status" value=0>Khong Hien thi</label>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
        </form>
    </div>
<?php include('includes/footer.php')?>