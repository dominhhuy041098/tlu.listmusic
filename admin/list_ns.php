<?php include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php');?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
        <h3>Danh sách nghệ sĩ</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Nghệ sĩ</th>
					<th>Ảnh</th>
                    <th>Home</th>
                    <th>Thứ tự</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //đặt số bản ghi cần hiện thị
					$limit=4;
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
						$query_pg="SELECT COUNT(id) FROM tblnghesi";
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
                    $query="SELECT * FROM tblnghesi ORDER BY id DESC LIMIT {$start},{$limit} ";
                    $result=mysqli_query($dbc,$query);
                    kt_query($result,$query);
                    while($nghesi=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        ?>
                            <tr>
                                <td><?php echo $nghesi['id'];?></td>
                                <td><?php echo $nghesi['NgheSi'];?></td>
								<td><img width="50px" src="../<?php echo $nghesi['anh'];?>"/></td>
                                <td><?php if($nghesi['home']==1){
                                    echo 'Hiển thị';
                                }
                                else{
                                    echo 'Không hiển thị';
                                }?></td>
                                <td><?php echo $nghesi['ordernum'];?></td>
                                <td><?php if($nghesi['status']==1){
                                    echo 'Hiển thị';
                                }
                                else{
                                    echo 'Không hiển thị';
                                }?></td>
                                <td align="center"><a onclick= href="edit_ns.php?id=<?php echo $nghesi['id']; ?>"><img src="../image/edit.png" width="16px"></td>
                                <td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa???')" href="delete_ns.php?id=<?php echo $nghesi['id'];?>"><img src="../image/delete.png" width="16px"></td>
                            </tr>
                <?php
                }
                ?>
            </tbody>
			</table>
            <?php 
			echo "<ul class='pagination'>";
			if($per_page > 1)
			{
				$current_page=($start/$limit) + 1;
				//Nếu không phải là trang đầu thì hiện thị trang trước
				if($current_page !=1)
				{
					echo "<li><a href='list_ns.php?s=".($start - $limit)."&p={$per_page}'>Back</a></li>";
				}
				//hiện thị những phần còn lại của trang
				for ($i=1; $i <= $per_page ; $i++) 
				{ 
					if($i != $current_page)
					{
						echo "<li><a href='list_ns.php?s=".($limit *($i - 1))."&p={$per_page}'>{$i}</a></li>";
					}
					else
					{
						echo "<li class='active'><a>{$i}</a></li>";
					}
				}
				//Nếu không phải trang cuối thì hiện thị nút next
				if($current_page != $per_page)
				{
					echo "<li><a href='list_ns.php?s=".($start + $limit)."&p={$per_page}'>Next</a></li>";	
				}
			}
			echo "</ul>";
		?>		
        </div>
    </div>
<?php include('includes/footer.php');?>