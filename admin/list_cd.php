<?php include('includes/header.php'); ?>
<?php include('../inc/myconnect.php'); ?>
<?php include('../inc/function.php');?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm12 col-xs-12">
        <h3>Danh sách chủ đề</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Chủ đề</th>
                  
                    <th>Home</th>
                    <th>Thứ tự</th>
                    <th>Trạng thái</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query="SELECT * FROM tblchude ORDER BY ordernum DESC ";
                    $result=mysqli_query($dbc,$query);
                    kt_query($result,$query);
                    while($chude=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        ?>
                            <tr>
                                <td><?php echo $chude['id'];?></td>
                                <td><?php echo $chude['ChuDe'];?></td>
                             
                                <td><?php if($chude['home']==1){
                                    echo 'Hiển thị';
                                }
                                else{
                                    echo 'Không hiển thị';
                                }?></td>
                                <td><?php echo $chude['ordernum'];?></td>
                                <td><?php if($chude['Status']==1){
                                    echo 'Hiển thị';
                                }
                                else{
                                    echo 'Không hiển thị';
                                }?></td>
                                <td align="center"><a onclick= href="edit_cd.php?id=<?php echo $chude['id']; ?>"><img src="../image/edit.png" width="16px"></td>
                                <td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa???')" href="delete_cd.php?id=<?php echo $chude['id'];?>"><img src="../image/delete.png" width="16px"></td>
                            </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php include('includes/footer.php');?>