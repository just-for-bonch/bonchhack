<?php
session_start();
include("bd.php");

if (isset($_POST['type'])) $table=$_POST['type']; else unset($table);
if (isset($_POST['kal'])) {$kall_min=(float)$_POST['min_kal']; $kall_max=(float)$_POST['max_kal'];}
if (isset($_POST['ziri'])) {$ziri_min=(float)$_POST['min_ziri']; $ziri_max=(float)$_POST['max_ziri'];}
if (isset($_POST['belki'])) {$bilki_min=(float)$_POST['min_bilki']; $bilki_max=(float)$_POST['max_bilki'];}
if (isset($_POST['ugli'])) {$ugli_min=(float)$_POST['min_ugli']; $ugli_max=(float)$_POST['max_ugli'];}

if ($table=="recepty") 
if (isset($_POST['kal']))
	if (isset($_POST['ziri']))
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND ziri>$ziri_min AND ziri<$ziri_max AND belki>$bilki_min AND belki<$bilki_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND ziri>$ziri_min AND ziri<$ziri_max AND belki>$bilki_min AND belki<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND ziri>$ziri_min AND ziri<$ziri_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND ziri>$ziri_min AND ziri<$ziri_max");	
	else
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND belki>$bilki_min AND belki<$bilki_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND belki>$bilki_min AND belki<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kall>$kall_min AND kall<$kall_max");
else
	if (isset($_POST['ziri']))
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE ziri>$ziri_min AND ziri<$ziri_max AND belki>$bilki_min AND belki<$bilki_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE ziri>$ziri_min AND ziri<$ziri_max AND belki>$bilki_min AND belki<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE ziri>$ziri_min AND ziri<$ziri_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE ziri>$ziri_min AND ziri<$ziri_max");	
	else
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE belki>$bilki_min AND belki<$bilki_max AND ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE belki>$bilki_min AND belki<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE ugli>$ugli_min AND ugli<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table");

if ($table=='products') 
if (isset($_POST['kal']))
	if (isset($_POST['ziri']))
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND zirov>$ziri_min AND zirov<$ziri_max AND belkov>$bilki_min AND belkov<$bilki_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND zirov>$ziri_min AND zirov<$ziri_max AND belkov>$bilki_min AND belkov<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND zirov>$ziri_min AND zirov<$ziri_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND zirov>$ziri_min AND zirov<$ziri_max");	
	else
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND belkov>$bilki_min AND belkov<$bilki_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND belkov>$bilki_min AND belkov<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE kaal>$kall_min AND kaal<$kall_max");
else
	if (isset($_POST['ziri']))
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE zirov>$ziri_min AND zirov<$ziri_max AND belkov>$bilki_min AND belkov<$bilki_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE zirov>$ziri_min AND zirov<$ziri_max AND belkov>$bilki_min AND belkov<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE zirov>$ziri_min AND zirov<$ziri_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE zirov>$ziri_min AND zirov<$ziri_max");	
	else
		if (isset($_POST['belki']))
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE belkov>$bilki_min AND belkov<$bilki_max AND ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table WHERE belkov>$bilki_min AND belkov<$bilki_max");				
		else
			if (isset($_POST['ugli']))
				$a=$mysqli->query("SELECT * FROM $table WHERE ugliv>$ugli_min AND ugliv<$ugli_max");
			else
				$a=$mysqli->query("SELECT * FROM $table");
$iter=0;
$qqq=array();
$get="location: search.php?table=".$table."&";
while($row=$a->fetch_array(MYSQL_NUM))
	{
		$qqq[$iter]=$row[0];
		var_dump($row);
		if ($iter!=4)
		$plus="id[]=".$qqq[$iter]."&";
		else
			$plus="id[]=".$qqq[$iter];
		$get=$get.$plus;
		echo "<br>%%%%%%%%%%%%%%%%<br>";
		$iter=$iter+1;
		unset($plus);
		if ($iter==5)
			break;
	}
	echo "<pre>";	
	var_dump($qqq);
	echo "</pre>";
	if ($a->num_rows)		
	header($get);
	else
	header("location: search.php?error=1");
	$mysqli->close();
?>