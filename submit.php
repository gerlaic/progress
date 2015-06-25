<?php
$actionString=$_POST["action"];
session_start();

	

$action = explode("_",$actionString);
if ($action[0] == "group") {
	$name = "group";
} else {
	$name=$_SESSION["name"];	
}

$filename="pb_".$name.".sj";

if ($action[1] == "complete") {
	$index=$_POST["index"];
	$i=0;
	$filename="pb_".$name.".sj";	
	$orifile=file($filename);
	$newfile=array();
	foreach ($orifile as $item) {
		if ($i != $index ) {
			array_push($newfile,$item."\n");	
			echo("keep_".$i);
		} else {
			$newItem= explode("|",$item);
			$newItem[1]="c";
			$item=$newItem[0]."|".$newItem[1];
			array_push($newfile,$item."\n");
			echo("change_".$i);
		}
		$i++;
	}
	print_r($newfile);
	file_put_contents($filename,$newfile);
	echo("complete");
} else {
	$item=$_POST["item"];
	file_put_contents($filename,$item."|uc\n",FILE_APPEND);
	echo("add");
}
	header("Location: progress.php");
?>