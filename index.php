<?php

include "lib.php";
$data = [];
$ps = null;
$next = isset($_REQUEST['next'])?true:false;
$key = isset($_REQUEST['key'])?$_REQUEST['key']:false;
$query = isset($_REQUEST['q'])?$_REQUEST['q']:false;

if($key and $query){
	$ps = new proSearch($key);
	$ps->Search($query,$next);
}
	
elseif(!$ps->getTotal() or $ps->getItems())
	die(json_encode(["status"=>false]));
else
	die(json_encode(["status"=>false]));
if(isset($_REQUEST['reset']))
	$ps->Settings(["reset"=>true]);

$data["status"]=true;
$data["total"]=$ps->getTotal();
$i = [];
if($ps->getItems() === false)
	die(json_encode($ps->getItems()));
foreach ($ps->getItems() as $key => $item) {
	array_push($i,["title"=>$ps->getTitle($key),"desc"=>$ps->getDescription($key),"link"=>$ps->getLink($key)]);
}
$data["items"]=$i;
header("Content-Type:application/json; charset=UTF-8");
echo json_encode($data,JSON_PRETTY_PRINT);
?>