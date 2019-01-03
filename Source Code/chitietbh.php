<?php include('includes/header.php');
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
        $id=$_GET['id'];
    }
    else{
        header('Location:baihat.php');
        exit();
    }
    $query_chitietbh="select * from tblbaihat where id ='".$id."'";
    $results_chitietbh=mysqli_query($dbc,$query_chitietbh);
    kt_query($results_chitietbh,$query_chitietbh);
	$chitietbaihat=mysqli_fetch_array($results_chitietbh,MYSQLI_ASSOC);
	$luotnghe_them=$chitietbaihat['LuotNghe']+1;
	$query="UPDATE tblbaihat SET LuotNghe={$luotnghe_them} where id ={$id} ";
	$results=mysqli_query($dbc,$query);
	kt_query($results,$query);
?>
<div id='main'>
<div id='left'>
    <img src="<?php echo $chitietbaihat['anh'] ?>" width='400px'/>
    <ul>


<li><audio controls autoplay="autoplay">
    <source src="<?php echo $chitietbaihat['noidung'];?>">
</audio><br/>
<h2>Bài hát: <?php echo $chitietbaihat['BaiHat']?></h2></li>
<li><h4>Nghệ sĩ: <?php echo $chitietbaihat['NgheSi']?></h4>
<h4>Lượt Nghe: <?php echo $chitietbaihat['LuotNghe']+1?></h4></li>


</ul>
<div id="left1">
            <h1>Bài hát liên quan>></h1>
                    <?php
                        $query_baihatlq="Select * FROM tblbaihat WHERE NgheSi='{$chitietbaihat['NgheSi']}' or ChuDe='{$chitietbaihat['ChuDe']}' ORDER BY ordernum LIMIT 6";
                        $results_baihatlq=mysqli_query($dbc,$query_baihatlq);
                        kt_query($results_baihatlq,$query_baihatlq);
                    ?>
                <ul>
                    <?php 
                         while ($baihatlq=mysqli_fetch_array($results_baihatlq,MYSQLI_ASSOC)) 
                         { 
                         ?>
                          <li class="bh"><a href="chitietbh.php?id=<?php echo $baihatlq['id']; ?>"><img src="<?php echo $baihatlq['anh'];?>"><p><strong><?php echo $baihatlq['BaiHat'];?></strong><br/>Ca sĩ: <?php echo $baihatlq['NgheSi'];?><br/>Lượt Nghe: <?php echo $baihatlq['LuotNghe']?></p></a></li>                       
                         <?php 
                         }
                     ?>          
                
                    
            
            </ul></div>
			<div id="left1">
            <h1>Bài hát ngẫu nhiên>></h1>
                    <?php
                        $query_baihat="Select * FROM tblbaihat  ORDER BY rand() LIMIT 6";
                        $results_baihat=mysqli_query($dbc,$query_baihat);
                        kt_query($results_baihat,$query_baihat);
                    ?>
                <ul>
                    <?php 
                         while ($baihat=mysqli_fetch_array($results_baihat,MYSQLI_ASSOC)) 
                         { 
                         ?>
                          <li class="bh"><a href="chitietbh.php?id=<?php echo $baihat['id']; ?>"><img src="<?php echo $baihat['anh'];?>"><p><strong><?php echo $baihat['BaiHat'];?></strong><br/>Ca sĩ: <?php echo $baihat['NgheSi'];?><br/>Lượt Nghe: <?php echo $baihat['LuotNghe']?></p></a></li>                       
                         <?php 
                         }
                     ?>          
                
                    
            
            </ul></div>

                        <div id="left3">
							<h1>Gửi ý kiến góp ý>></h1>
							<br>
							<div id="show2"><label>Cám ơn bạn đã gớp ý</label></div>
							<div id="show1">
								<form id="button" name="frmform" method="POST">
							<table>
								<input type="hidden" name="idbv" id="idbv" value="<?php echo $chitietbaihat['id']; ?>">
								<tr>
									<td>Họ tên</td>
								</tr>
								<tr>
									<td><input type="text" name="hoten" id="hoten" value=""></td>
								</tr>
								<tr>
									<td>Điện thoại</td>
								</tr>
								<tr>
									<td><input type="text" name="dienthoai" id="dienthoai" value=""></td>
								</tr>
								<tr>
									<td>Địa chỉ</td>
								</tr>
								<tr>
									<td><input type="text" name="diachi" id="diachi" value=""></td>
								</tr>
								<tr>
									<td>Email</td>
								</tr>
								<tr>
									<td><input type="text" name="email" id="email" value=""></td>
								</tr>
								<tr>
									<td>Nội dung</td>
								</tr>
								<tr>
									<td><textarea style="width:800px; height:150px;" name="noidung" id="noidung"></textarea></td>
								</tr>
								<tr>									
									<td><input type="submit" name="submit" value="Gửi ý kiến"></td>
								</tr>	
							</table>
							</form>
							</div>
							<br>
							<script type="text/javascript">
								$(document).ready(function(){
									$("#show2").hide();
									function checkMail(mail){
					                    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;								
					                    if (!filter.test(mail)) return false;								
					                        return true;								
					                }
									$("#button").submit(function(){
										var idbv=$("#idbv").val();
										var hoten=$("#hoten").val();
										var dienthoai=$("#dienthoai").val();
										var diachi=$("#diachi").val();
										var email=$("#email").val();
										var noidung=$("#noidung").val();
										if(hoten=='')
										{
											alert("Bạn chưa nhập họ tên");
											$("#hoten").focus();
											return false;
										}
										else if(dienthoai=='')
										{
											alert("Bạn chưa nhập điện thoại");
											$("#dienthoai").focus();
											return false;	
										}
										else if(diachi=='')
										{
											alert("Bạn chưa nhập địa chỉ");
											$("#diachi").focus();
											return false;	
										}
										else if(email=='')
										{
											alert("Bạn chưa nhập email");
											$("#email").focus();
											return false;	
										}
										else if(!checkMail(email))
										{
											alert("Email không đúng định dạng (xyz@abc.de)");
											$("#email").focus();
											return false;	
										}
										else if(noidung=='')
										{
											alert("Bạn chưa nhập nội dung");											
											return false;	
										}
										else
										{
											$.ajax({
												type: "POST",
												url: "dogopy.php",
												data: {idbv : idbv,hoten : hoten,dienthoai : dienthoai,diachi : diachi,email : email,noidung : noidung},
												cache: false,
												success:function(html){
													$("#show1").hide(500);
													$("#show2").show(500);
												}
											});
										}
										return false;
									});
								});
							</script>
                        </div>
                </div>			
<?php include('includes/right.php');?>
</div>
<?php include('includes/footer.php');?>
