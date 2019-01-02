<div id="left">
            <div id="left1">
           <h1> <a href="baihat.php">Bài hát New & HOT*** >></a></h1>
                    <?php
                        $query_baihat="Select * FROM tblbaihat ORDER BY ordernum DESC LIMIT 6";
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
            <h1><a href="video.php">Video nổi bật>></a></h1>
            
            <?php 
                    $query_video_one="SELECT * FROM tblvideo ordernum WHERE status=1 ORDER BY ordernum";
                    $results_video_one=mysqli_query($dbc,$query_video_one);
                    $query_video_two=mysqli_fetch_assoc($results_video_one);
                    $str_one=explode('=',$query_video_two['link']);
                ?></div>
                <iframe width="840px" height="400px" class="embed-player" src="http://www.youtube.com/embed/RgKAFK5djSk" frameborder="0" allowfullscreen></iframe>
                    <?php 
                        $query_video="SELECT * FROM tblvideo WHERE status=1";
                        $results_video=mysqli_query($dbc,$query_video);
                        kt_query($results_video,$query_video);
                                                   
                    ?>
                      <ul class="list-video">                
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
					                            $('.list-video li').click(function(){
					                                $(this).parent().siblings('.embed-player').attr('src','http://www.youtube.com/embed/'+$(this).children('a').attr('title'));                                     
					                            });
					                        });
					                    </script>
                                        </ul>
                                        
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