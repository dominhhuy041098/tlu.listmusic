<?php error_reporting(0); ?>
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
            include('../inc/images_helper.php');
            include('../inc/function.php');
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $error=array();
                if(empty($_POST['nghesi'])){
                    $error[]='nghesi';
                }
                else{
                    $NgheSi=$_POST['nghesi'];
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
                    //Upload ảnh
					if(($_FILES['img']['type']!="image/gif")
                    &&($_FILES['img']['type']!="image/png")
                    &&($_FILES['img']['type']!="image/jpeg")
                    &&($_FILES['img']['type']!="image/jpg"))
                {
                    $message="File không đúng định dạng";	
                }
                elseif ($_FILES['img']['size']>1000000) 
                {
                    $message="Kích thước phải nhỏ hơn 1MB";						
                }
                elseif ($_FILES['img']['size']=='') 
                {
                    $message="Bạn chưa chọn file ảnh";
                }
                else
                {
                    $img=$_FILES['img']['name'];
                    $link_img='upload/'.$img;
                    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$img);																														
                    //Xử lý Resize, Crop hình anh
                    $temp=explode('.',$img);
                    if($temp[1]=='jpeg' or $temp[1]=='JPEG')
                    {
                        $temp[1]='jpg';
                    }
                    $temp[1]=strtolower($temp[1]);
                    $thumb='upload/resized/'.$temp[0].'_thumb'.'.'.$temp[1];
                    $imageThumb=new Image('../'.$link_img);		
                    //crop anh
                    $imageThumb->resize(200,200,'crop');
                    $imageThumb->save($temp[0].'_thumb','../upload/resized');
                }
            $query="INSERT INTO tblNgheSi(NgheSi,anh,anh_thumb,home,ordernum,Status) VALUES('{$NgheSi}','{$link_img}','{$thumb}',$home,$ordernum,$status)";
            $results=mysqli_query($dbc,$query) or die("Query {$query} \n <br/> My SQLERRORS: ".mysqli_error($dbc));
            if(mysqli_affected_rows($dbc)==1){
                echo "<p style='color:green'>Thêm mới thành công<p>";
            }
            else{
                echo "<p class='loi'>Thêm mới không thành công </p>";
            }
            $_POST['nghesi']='';
            $_POST['ordernum']='';
        }
        else {
            $messegers="<p class='loi'>Bạn phải nhập đầy đủ thông tin </p>" ;
        }
            }
        ?>
        <form name="frmadd_ns" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Thêm mới nghệ sĩ</h3>
            <div class="form-group">
                <label>Nghệ sĩ</label>
                <input type="text" name="nghesi" value="<?php if(isset($_POST['nghesi'])){ echo $_POST['nghesi'];} ?>" class="form-control" placeholder="Nghệ sĩ">
                <?php
                    if(isset($error) && in_array('nghesi',$error)){
                        echo "<p class='loi'>Bạn chưa nhập nghệ sĩ </p>";
                    }
                ?>
            </div>
            <div class="form-group">
				<label>Ảnh đại diện</label>
				<input type="file" name="img" value="">
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