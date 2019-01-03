<?php include('includes/header.php'); ?>
<div id="banner">
        <a href="#" id="next"><img src="image/Next-PNG-Free-Download.png"></a>
        <a href="#" id="prev"><img src="image/prev.png"></a>
        <div id="chuyen-slide">
        <img class="slide" src="image/dien-swimsuit-khoe-dang-boc-lua-sunmi-dung-hang-dan-my-nhan-viet-2dce9dbe.jpg" stt="0">
        <img class="slide" src="image/1542969378496_org.jpg" style="display:none;" stt="1">
        <img class="slide" src="image/hn.jpg" style="display:none;" stt="2">
        <img class="slide" src="image/hn.png" style="display:none;"  stt="3">
        <img class="slide" src="image/1543458048207_org.jpg" style="display:none;" stt="4">
        <img id="banner-left" src="image/47428263_2136828009918117_8428869809411719168_n.jpg">
        <img id="banner-right" src="image/47069806_260933747916215_5243672339861733376_n.jpg">
    </div>
</div>
<div id="main">
    <div id="left">
		<div id="left1">
				<?php 
					if(isset($_REQUEST['submit']))
					{
						$search=$_GET['search'];?>
						<h1><?php echo $search ?></h1><h3> có kết quả</h3>
					<?php	if(empty($search))
						{
							echo "<p>Yêu cầu nhập dữ liệu vào ô trống</p>";
						}
						else
						{
							$query="SELECT * FROM tblbaihat WHERE BaiHat like '%$search%' or ChuDe like '%$search%' or NgheSi like '%$search%'";
							$results=mysqli_query($dbc,$query);
                            kt_query($results,$query);?>
                            <ul>
							<?php while ($chitietbaihat=mysqli_fetch_array($results,MYSQLI_ASSOC)) 
							{ ?>
							  <li class="bh"><a href="chitietbh.php?id=<?php echo $chitietbaihat['id']; ?>"><img src="<?php echo $chitietbaihat['anh'];?>"><p><strong><?php echo $chitietbaihat['BaiHat'];?></strong><br/>Ca sĩ: <?php echo $chitietbaihat['NgheSi'];?><br/>Lượt Nghe: <?php echo $chitietbaihat['LuotNghe']?></p></a></li>  
							<?php	
							}
						}
					}
				?>
	</div>
	</div>
    <?php include('includes/right.php') ?>

</div>
<?php include('includes/footer.php'); ?>