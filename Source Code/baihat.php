<?php include('includes/header.php'); ?>
<div id="main">
    <div id="left">
    <div id="left1">
            <h1>NEW >></h1>
                    <?php
                        $query_baihat="Select * FROM tblbaihat ORDER by id desc limit 6";
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
            <div id="left2">
                        <h1>HOT >></h1>
                                          <?php
                        $query_bxh="Select * FROM tblbaihat ORDER BY LuotNghe DESC LIMIT 6";
                        $results_bxh=mysqli_query($dbc,$query_bxh);
                        kt_query($results_bxh,$query_bxh);
                    ?>
                <ul>
                    <?php 
                         while ($bxh=mysqli_fetch_array($results_bxh,MYSQLI_ASSOC)) 
                         { 
                         ?>
                          <li class="bh"><a href="chitietbh.php?id=<?php echo $bxh['id']; ?>"><img src="<?php echo $bxh['anh'];?>"><p><strong><?php echo $bxh['BaiHat'];?></strong><br/>Ca sĩ: <?php echo $bxh['NgheSi'];?><br/>Lượt Nghe: <?php echo $bxh['LuotNghe']?></p></a></li>                       
                         <?php 
                         }
                     ?>          
                
                    
            
            </ul></div>
            <div id="left1">
    <h1>Tất cả bài hát>></h1>
    <?php
    //đặt số bản ghi cần hiện thị
    $limit=10;
    //Xác định vị trí bắt đầu
    if(isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))
    {
        $start=$_GET['s'];
    } 	
    else
    {
        $start=0;
    }	
    if(isset($_GET['p']) && filter_var($_GET['p'],FILTER_VALIDATE_INT,array('min_range'=>1)))
    {
        $per_page=$_GET['p'];
    } 
    else
    {
        //Nếu p không có, thì sẽ truy vấn CSDL để tìm xem có bao nhiêu page
        $query_pg="SELECT COUNT(id) FROM tblbaihat";
        $results_pg=mysqli_query($dbc,$query_pg);
        kt_query($results_pg,$query_pg);
        list($record)=mysqli_fetch_array($results_pg,MYSQLI_NUM);						
        //Tìm số trang bằng cách chia số dữ liệu cho số limit	
        if($record > $limit)
        {
            $per_page=ceil($record/$limit);
        }
        else
        {
            $per_page=1;
        }
    }			
                        $query_baihat="Select * FROM tblbaihat ORDER BY id DESC LIMIT {$start},{$limit}";
                        $results_baihat=mysqli_query($dbc,$query_baihat);
                        kt_query($results_baihat,$query_baihat);
                    ?>
                <ul>
                    <?php 
                         while ($baihat=mysqli_fetch_array($results_baihat,MYSQLI_ASSOC)) 
                         { 
                         ?>
                        <li class="bh"><a href="chitietbh.php?id=<?php echo $baihat['id']; ?>"><img src="<?php echo $baihat['anh'];?>"><p><strong><?php echo $baihat['BaiHat'];?></strong><br/>Ca sĩ: <?php echo $baihat['NgheSi'];?><br/>Lượt Nghe: <?php echo $baihat['LuotNghe']?></p></a></li>     <?php 
                         }
                     ?>          
                
                    
            
            </ul>
            <?php 
			if($per_page > 1)
			{
				$current_page=($start/$limit) + 1;
				//Nếu không phải là trang đầu thì hiện thị trang trước
				if($current_page !=1)
				{
					echo "<a href='baihat.php?s=".($start - $limit)."&p={$per_page}'>Back</a>";
				}
				//hiện thị những phần còn lại của trang
				for ($i=1; $i <= $per_page ; $i++) 
				{ 
					if($i != $current_page)
					{
						echo "<a href='baihat.php?s=".($limit *($i - 1))."&p={$per_page}'>{$i}</a>";
					}
					else
					{
						echo "<a>{$i}</a>";
					}
				}
				//Nếu không phải trang cuối thì hiện thị nút next
				if($current_page != $per_page)
				{
					echo "<a href='baihat?s=".($start + $limit)."&p={$per_page}'>Next</a>";	
				}
			}
		?>	
    </div></div>
    <?php include('includes/right.php');?>

</div>
<?php include('includes/footer.php'); ?>