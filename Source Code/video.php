<?php include('includes/header.php');?>
<div id="main">
        <div id="left">

        <h1>TV>></h1>
            
            <?php 
                    $query_video_one="SELECT * FROM tblvideo ordernum WHERE status=1 ORDER BY ordernum";
                    $results_video_one=mysqli_query($dbc,$query_video_one);
                    $query_video_two=mysqli_fetch_assoc($results_video_one);
                    $str_one=explode('=',$query_video_two['link']);
                ?>
                <iframe width="840px" height="400px" class="embed-player" src="http://www.youtube.com/embed/RgKAFK5djSk" frameborder="0" allowfullscreen></iframe>
                    <?php 
                        $query_video="SELECT * FROM tblvideo";
                        $results_video=mysqli_query($dbc,$query_video);
                        kt_query($results_video,$query_video);
                                                   
                    ?>
               <h2>Tất cả video</h1>
                     <ul class="list-video1">                
                        <?php 
                            while ($video=mysqli_fetch_array($results_video,MYSQLI_ASSOC)) 
                            { 
                                $str=explode('=',$video['link']);

                            ?>
                            <li class="bh"><a style="cursor:pointer;" title="<?php echo $str[1]; ?>"><i class="fa fa-caret-right fw"><p><strong></i>&nbsp;<?php echo $video['title']; ?></strong></p></a></li>                        
                            <?php 
                            }
                        ?>                   <script>                        
					                        $(document).ready(function(){
					                            $('.list-video1 li').click(function(){
					                                $(this).parent().siblings('.embed-player').attr('src','http://www.youtube.com/embed/'+$(this).children('a').attr('title'));                                     
					                            });
					                        });
					                    </script>
                                        </ul>
                                        </div>
<?php include('includes/right.php'); ?>
</div>
   
<?php include('includes/footer.php');?>

