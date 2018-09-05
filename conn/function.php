<?php
require_once('config.php');

function getdata($sql)
{
	$a = null;
	$r = mysqli_query($conn,$sql);
	while($data = mysqli_fetch_assoc($r))
	{
		$a[] = $data;
	}
	return $a;
}



?>