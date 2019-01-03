<?php include('./inc/myconnect.php');?>
<?php include('./inc/function.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TLU Music</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="js/jquery.js"></script>
    <script src="js/c.js"></script>
   
</head>
<body>
    <div id="menu_top">
        <ul>
            <li><img src="image/Music-icon.png" height="40px" width="40px">
            <img src="image/512.png" height="40px" width="40px"></li>
            <li><a href="index.php" title="Trang chủ" class="active">Trang chủ</a></li>
            <li><a href="baihat.php" title="Bài hát">Bài hát</a></li>
            <li><a href="chude.php" title="Chủ đề">Chủ đề</a></li>
            <li><a href="nghesi.php" title="Nghệ sĩ">Nghệ sĩ</a></li>
            <li><a href="bxh.php" title="BXH">BXH</a>
                
            </li>
            
            <li><a href="video.php" title="Video">Video</a></li>
            <form id="t" name="frmsearch" method="GET" action="search.php">
            <input type="text" name="search" placeholder="Search.." value=><input type="submit" name="submit" value="Tìm" style=" width: 50px;padding: 10px;right:10px;"></ul>
            </form>
    </div>