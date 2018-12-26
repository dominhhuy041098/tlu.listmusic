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
<h4>Lượt Nghe: <?php echo $chitietbaihat['LuotNghe']?></h4></li>


</ul>
<div id="left1">
            <h1>Bài hát liên quan>></h1>
                    <?php
                        $query_baihat="Select * FROM tblbaihat WHERE NgheSi='{$chitietbaihat['NgheSi']}' or ChuDe='{$chitietbaihat['ChuDe']}'";
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
                			              <h1>Bảng xếp hạng>></h1>
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
</div>
<?php include('includes/right.php');?>
</div>
<?php include('includes/footer.php');?>
