<?php 
session_start();
//error_reporting();
include_once '../../include/voting-class.php';
$user = new User();
$db = new Database();
$db->connectMySQL();
if (!$user->get_sesi()) {
	header("location:index.php");
}else{
	$mod = $_GET['mod'];
	$act = $_GET['act'];
	$validasi = new VotingValidasi;
	$pem = new DataPemilih();

	if ($mod=='datapemilih' AND $act=='delete') {
		$id = $validasi->sql($_GET['kode']);
		$query = $pem->deleteDataPemilih($id);
		if($query){
			header('location:../../home.php?mod='.$mod);
		}else{
			echo mysql_error();
		}
	}
}
?>