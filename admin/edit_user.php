<?php ob_start(); ?>
<style type="text/css">
.required
{
	color:red;
}
</style>
<script language="javascript">
	function checkall(class_name,obj)
	{
		var items = document.getElementsByClassName(class_name);
		if(obj.checked == true)
		{
			for(i=0;i<items.length;i++)
				items[i].checked = true;
		}
		else
		{
			for(i=0;i<items.length;i++)
				items[i].checked = false;	
		}
	}
</script>
<?php include('includes/header.php') ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<?php 
			include('../inc/myconnect.php');
			include('../inc/function.php');
			if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
			{
				$id=$_GET['id'];
			}
			else
			{
				header('Location: list_user.php');
				exit();
			}
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$errors=array();						
				if(empty($_POST['hoten']))
				{
					$errors[]='hoten';
				}
				else
				{
					$hoten=$_POST['hoten'];
				}
				if(empty($_POST['dienthoai']))
				{
					$errors[]='dienthoai';
				}
				else
				{
					$dienthoai=$_POST['dienthoai'];
				}
				if(filter_var(($_POST['email']),FILTER_VALIDATE_EMAIL)==TRUE)
				{
					$email=mysqli_real_escape_string($dbc,$_POST['email']);
				}				
				if(empty($_POST['diachi']))
				{
					$errors[]='diachi';
				}
				else
				{
					$diachi=$_POST['diachi'];
				}
				$status=$_POST['status'];
				if(empty($errors))
				{	
																	
					$query_in="UPDATE tbluser
								SET hoten='{$hoten}',
									dienthoai='{$dienthoai}',
									email='{$email}',
									diachi='{$diachi}',	
						
									status={$status}
								WHERE id={$id}	
							";
					$results_in=mysqli_query($dbc,$query_in);
					kt_query($results_in,$query_in);
					if(mysqli_affected_rows($dbc)==1)
					{
						echo "<p style='color:green;'>Sửa thành công</p>";
					}
					else
					{
						echo "<p class='required'>Bạn chưa sửa gì</p>";	
					}					
				}
				else
				{
					$message="<p class='required'>Bạn hãy nhập đầy đủ thông tin</p>";
				}
			}
			$query_id="SELECT taikhoan,hoten,dienthoai,email,diachi,status FROM tbluser WHERE id={$id}";
			$results_id=mysqli_query($dbc,$query_id);
			kt_query($results_id,$query_id);
			//Kiểm tra xem ID có tồn tại không
			if(mysqli_num_rows($results_id)==1)
			{
				list($taikhoan,$hoten,$dienthoai,$email,$diachi,$status)=mysqli_fetch_array($results_id,MYSQLI_NUM);				
			}
			else
			{
				$message="<p class='required'>ID user không tồn tại</p>";
			}
		?>
		<form name="frmadd_video" method="POST">
			<?php 
				if(isset($message))
				{
					echo $message;
				}
			?>
			<h3>Sửa User</h3>
			<div class="form-group">
				<label>Tài khoản</label>
				<input type="text" name="taikhoan" value="<?php if(isset($taikhoan)){ echo $taikhoan;} ?>" class="form-control" placeholder="Tài khoản" readonly="true">				
				<?php 
					if(isset($errors) && in_array('taikhoan',$errors))
					{
						echo "<p class='required'>Tài khoản không để trống</p>";
					}
				?>
			</div>							
			<div class="form-group">
				<label>Họ tên</label>
				<input type="text" name="hoten" value="<?php if(isset($hoten)){ echo $hoten;} ?>" class="form-control" placeholder="Họ tên">				
				<?php 
					if(isset($errors) && in_array('hoten',$errors))
					{
						echo "<p class='required'>Họ tên không để trống</p>";
					}
				?>
			</div>	
			<div class="form-group">
				<label>Điện thoại</label>
				<input type="text" name="dienthoai" value="<?php if(isset($dienthoai)){ echo $dienthoai;} ?>" class="form-control" placeholder="Điện thoại">				
				<?php 
					if(isset($errors) && in_array('dienthoai',$errors))
					{
						echo "<p class='required'>Điện thoại không để trống</p>";
					}
				?>
			</div>	
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" value="<?php if(isset($email)){ echo $email;} ?>" class="form-control" placeholder="Email">				
				<?php 
					if(isset($errors) && in_array('email',$errors))
					{
						echo "<p class='required'>Email không hợp lệ</p>";
					}
				?>
			</div>	
			<div class="form-group">
				<label>Địa chỉ</label>
				<input type="text" name="diachi" value="<?php if(isset($diachi)){ echo $diachi;} ?>" class="form-control" placeholder="Địa chỉ">				
				<?php 
					if(isset($errors) && in_array('diachi',$errors))
					{
						echo "<p class='required'>Địa chỉ không để trống</p>";
					}
				?>
			</div>
					
			<div class="form-group">
				<label style="display:block;">Trạng thái</label>
				<?php 
					if($status==1)
					{
					?>
					<label class="radio-inline"><input checked="checked" type="radio" name="status" value="1">Kích hoạt</label>
					<label class="radio-inline"><input type="radio" name="status" value="0">Không kích hoạt</label>
					<?php 
					}
					else
					{
					?>
					<label class="radio-inline"><input type="radio" name="status" value="1">Kích hoạt</label>
					<label class="radio-inline"><input checked="checked" type="radio" name="status" value="0">Không kích hoạt</label>
					<?php		
					}
				?>
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('includes/footer.php') ?>
<?php ob_flush(); ?>