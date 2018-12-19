<?php ob_start(); ?>
<?php error_reporting(0);?>
<style type="text/css">
.loi{
    color: red;
}
</style>
<?php include('includes/header.php')?>
<div class='row'>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <?php 
            include('../inc/images_helper.php');
            include('../inc/myconnect.php');
            include('../inc/function.php');
            if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
                    $id=$_GET['id'];
                }
                else{
                    header('Location:list_ns.php');
                    exit();
                }
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $error=array();
                
                if(empty($_POST['nghesi'])){
                    $error[]='nghesi';
                }
                else{
                    $nghesi=$_POST['nghesi'];
                }
                if(empty($_POST['ordernum'])){
                    $error[]='ordernum';
                }
                else{
                    $ordernum=$_POST['ordernum'];
                }
            
            
                
                $status=$_POST['status'];
                if(empty($error)){
                    if ($_FILES['img']['size']=='') 
					{
						$link_img=$_POST['anh_hi'];
						$thumb=$_POST['anhthumb_hi'];
					}
					else
					{
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
							
							$imageThumb->resize(200,200,'crop');
							$imageThumb->save($temp[0].'_thumb','../upload/resized');
                        }
                        $sql="SELECT anh,anh_thumb FROM tblnghesi WHERE id={$id}";
						$query_a=mysqli_query($dbc,$sql);
						$anhInfo=mysqli_fetch_assoc($query_a);
						unlink('../'.$anhInfo['anh']);
						unlink('../'.$anhInfo['anh_thumb']);
					}
                        
                $query="UPDATE tblnghesi SET NgheSi='{$nghesi}',
                anh='{$link_img}',
                anh_thumb='{$thumb}',ordernum={$ordernum},status={$status} WHERE id={$id}";
            $results=mysqli_query($dbc,$query);
            kt_query($results,$query);
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
        $query_id="SELECT NgheSi,anh,anh_thumb,ordernum,Status FROM tblnghesi WHERE id={$id};";
        $result_id=mysqli_query($dbc,$query_id);
        kt_query($result_id,$query_id);
        if(mysqli_num_rows($result_id)==1){
            list($nghesi,$anh,$anh_thumb,$ordernum,$status)=mysqli_fetch_array($result_id,MYSQLI_NUM);
        }
        else{
            $messegers="<p class='required'>ID nghệ sĩ không tồn tại</p>";
        }
        ?>
        <form name="frmadd_bh" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($messegers)){
                    echo $messegers;
                }
            ?>
            <h3>Sửa thông tin nghệ sĩ: <?php if(isset($nghesi)){ echo $nghesi;} ?></h3>
            <div class="form-group">
                <label>Nghệ sĩ</label>
                <input type="text" name="nghesi" value="<?php if(isset($nghesi)){ echo $nghesi;} ?>" class="form-control" placeholder="Chủ đề">
                <?php
                    if(isset($error) && in_array('nghesi',$error)){
                        echo "<p class='loi'>Bạn chưa nhập nghệ sĩ </p>";
                    }
                ?>
            </div>
            <div class="form-group">
				<label>Ảnh đại diện</label>
				<p><img width="100" src="../<?php echo $anh; ?>"></p>
				<input type="hidden" name="anh_hi" value="<?php echo $anh; ?>">
				<input type="hidden" name="anhthumb_hi" value="<?php echo $anh_thumb; ?>">
				<input type="file" name="img" value="">
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