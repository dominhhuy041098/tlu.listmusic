<?php
// kết nối database
$dbc=mysqli_connect('localhost','root','','webmusic');
//Kiểm tra
if(!$dbc){
    echo "Lỗi";
}
else{
    mysqli_set_charset($dbc,'utf8');
}
?>