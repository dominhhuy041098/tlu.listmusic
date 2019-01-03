<?php include('includes/header.php'); ?>
<div id="main">
    <div id="left">
    <div id="left1">
            <h1>Tất cả nghệ sĩ</h1>
                    <?php
                        $query_nghesi="Select * FROM tblnghesi where status=1";
                        $results_nghesi=mysqli_query($dbc,$query_nghesi);
                        kt_query($results_nghesi,$query_nghesi);
                    ?>
                <ul>
                    <?php 
                         while ($nghesi=mysqli_fetch_array($results_nghesi,MYSQLI_ASSOC)) 
                         { 
                         ?>
                          <li><a href="search.php?search=<?php echo $nghesi['NgheSi']?>&submit=Tìm"><img src="<?php echo $nghesi['anh'];?>"><p><strong><?php echo $nghesi['NgheSi'];?></strong></p></a></li>                       
                         <?php 
                         }
                     ?>          
                
                    
            
            </ul></div>
           </div>
    <?php include('includes/right.php');?>

</div>
<?php include('includes/footer.php'); ?>