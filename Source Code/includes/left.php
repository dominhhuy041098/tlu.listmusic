<div id="left">
            <div id="left1">
            <h1>Bài hát New & HOT*** >></h1>
            <ul>
                    <li class="bh"><a href="#"><img src="image/th (9).jpg"><p><strong>Thằng hề khóc</strong><br/>Dương 565</p></a></li>
                    <li class="bh"><a href="#"><img src="image/th (1).jpg"><p><strong>Thương</strong><br/>Quốc Thiên</p></a></li>
                    <li class="bh"><a href="#"><img src="image/chiconmotdemcuoi.jpg" ><p><strong>Nếu chỉ còn một đêm cuối</strong><br/>Tuấn Hưng</p></a></li>
                    <li class="bh"><a href="#"><img src="image/th (3).jpg"><p><strong>Sai người sai thời điểm</strong></p></a></li>
                    <li class="bh"><a href="#"><img src="image/th (5).jpg" ><p><strong>Chia cách bình yên</strong><br/>Quốc Thiên</p></a></li>
                    <li class="bh"><a href="#"><img src="image/th (6).jpg" ><p><strong>Buồn của anh</strong><br/>Huy Đạt</p></a></li>
                    <li class="bh"><a href="#"><img src="image/th (7).jpg" ><p><strong>Buồn không em</strong><br/>Đạt G</p></a></li>
                    <li class="bh"><a href="#"><img src="image/anhyeuem.jpg"><p><strong>Anh yêu em</strong><br/>Khắc Việt</p></a></li>
            
            </ul></div>
          
            <div id="left2">
            <h1>Video nổi bật>></h1>
            
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
            <ul>
                <li class="bh"><a href="#"><img src="image/th (9).jpg"><p><strong>Thằng hề khóc</strong><br/>Dương 565</p></a></li>
                <li class="bh"><a href="#"><img src="image/th (1).jpg"><p><strong>Thương</strong><br/>Quốc Thiên</p></a></li>
                <li class="bh"><a href="#"><img src="image/chiconmotdemcuoi.jpg" ><p><strong>Nếu chỉ còn một đêm cuối</strong><br/>Tuấn Hưng</p></a></li>
                <li class="bh"><a href="#"><img src="image/th (3).jpg"><p><strong>Sai người sai thời điểm</strong></p></a></li>
             
            </ul></div>
                       					
                

            
            
        </div>