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
                $home=$_POST['home'];
                
                $status=$_POST['status'];
                if(empty($error)){
                    
            $query="INSERT INTO tblchude(ChuDe,home,ordernum,Status) VALUES('{$chuDe}',$home,$ordernum,$status)";
            $results=mysqli_query($dbc,$query);
            if(mysqli_affected_rows($dbc)==1){
                echo "<p style='color:green'>Thêm mới thành công<p>";
            }

            else{
                echo "<p class='loi'>Thêm mới không thành công </p>";
            }

            $_POST['chude']='';
            $_POST['ordernum']='';
        }
        else {
            $messegers="<p class='loi'>Bạn phải nhập đầy đủ thông tin </p>" ;
        }
            }
        ?>
        <form name="frmadd_bh" method="POST">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Thêm mới chủ đề</h3>
            <div class="form-group">
                <label>Chủ đề</label>
                <input type="text" name="chude" value="<?php if(isset($_POST['chude'])){ echo $_POST['chude'];} ?>" class="form-control" placeholder="Chủ đề">
                <?php
                    if(isset($error) && in_array('chude',$error)){
                        echo "<p class='loi'>Bạn chưa nhập chủ đề </p>";
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
                <label style="display:block">Home</label>
                <label class="radio-inline"><input checked="checked" type="radio" name="home" value=1>Hien thi</label>
                <label class="radio-inline"><input type="radio" name="home" value=0>Khong Hien thi</label>
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