<?php
    function kt_query($result,$query){
        global $dbc;
        if(!$result){
            die("Query {$query} \n<br/> MYSQLERROR:".mysqli_error($dbc));
        }
    }

    function show_categoriesCD()
{
	global $dbc;
	$query_dq="SELECT * FROM tblchude ";
	$categories=mysqli_query($dbc,$query_dq);
	while($category=mysqli_fetch_array($categories,MYSQLI_ASSOC))
	{
		echo("<option>".$category['ChuDe']."</option>");
	}
	return true;
}
    function selectCtrlCD($name,$class)
{
	global $dbc;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>-----------------------</option>";
	show_categoriesCD();
	echo "</select>";
}

function show_categoriesNS()
{
	global $dbc;
	$query_dq="SELECT * FROM tblnghesi ";
	$categories=mysqli_query($dbc,$query_dq);
	while($category=mysqli_fetch_array($categories,MYSQLI_ASSOC))
	{
		echo("<option>".$category['NgheSi']."</option>");
	}
	return true;
}
    function selectCtrlNS($name,$class)
{
	global $dbc;
	echo "<select name='".$name."' class='".$class."'>";
	echo "<option value='0'>-----------------------</option>";
	show_categoriesNS();
	echo "</select>";
}

?>