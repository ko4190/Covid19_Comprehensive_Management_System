<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$prodlist_pharmaceuticalCom = $_POST["prodlist_pharmaceuticalCom"];
	$prodNumber = $_POST["prodNumber"];
	$prodDate = $_POST["prodDate"];
	$prodVolume = $_POST["prodVolume"];

	$sql = "UPDATE `systemdb`.`prodlist tbl` SET `prodlist_pharmaceuticalCom`='".$prodlist_pharmaceuticalCom."', `prodVolume`=".$prodVolume.", `prodDate` = '".$prodDate."' WHERE `prodNumber`=".$prodNumber."";
	
	$ret = mysqli_query($con, $sql);


	echo "<h1> 백신 생산내역 수정 결과 </h1>";
	if($ret) {
		echo "백신 생산내역이 성공적으로 수정됨.";
	}
	else {
		echo "백신 생산내역 수정 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='pfizer_main.html'> <--초기화면</a> ";
?>