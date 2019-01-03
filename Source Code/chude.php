<?php include('includes/header.php'); ?>
<div id="main">
    <div id="left">
    <div id="left1">
            <h1>Tất cả chủ đề</h1>
                    <?php
                        $query_chude="Select * FROM tblchude where status=1";
                        $results_chude=mysqli_query($dbc,$query_chude);
                        kt_query($results_chude,$query_chude);
                    ?>
                <ul>
                    <?php 
                         while ($chude=mysqli_fetch_array($results_chude,MYSQLI_ASSOC)) 
                         { 
                         ?>
                          <a href="search.php?search=<?php echo $chude['ChuDe']?>&submit=Tìm"><li><p><strong><?php echo $chude['ChuDe'];?></strong></p></li></a>                       
                         <?php 
                         }
                     ?>          
                
                    
            
            </ul></div>
           </div>
    <?php include('includes/right.php');?>

</div>
<?php include('includes/footer.php'); ?>