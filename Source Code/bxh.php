<?php include('includes/header.php');?>
<div id="main">
        <div id="left"><div id="left1">
        <h1>Bảng xếp hạng TOP 10>></h1>
                                          <?php
                        $query_bxh="Select * FROM tblbaihat ORDER BY LuotNghe DESC LIMIT 10";
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
                
                    
            
            </ul>
        
        </div></div>
<?php include('includes/right.php'); ?>
</div>
   
<?php include('includes/footer.php');?>