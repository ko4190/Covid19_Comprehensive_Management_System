<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$prodplan_pharmaceuticalCom = $_POST["prodplan_pharmaceuticalCom"];
	$prodVolume = $_POST["prodVolume"];
	$targetDate = $_POST["targetDate"];
	$totalVolume = $_POST["totalVolume"];

	$sql = "UPDATE `systemdb`.`prodplan tbl` SET `prodVolume`=".$prodVolume.", `targetDate`='".$targetDate."', `totalVolume`=".$totalVolume.", `expectedVolume`=".$totalVolume."+".$prodVolume." WHERE `prodplan_pharmaceuticalCom`='".$prodplan_pharmaceuticalCom."'";
	$ret = mysqli_query($con, $sql);


	echo "<h1> 백신 생산정보 수정 결과 </h1>";
	if($ret) {
		echo "백신 생산정보가 성공적으로 수정됨.";
	}
	else {
		echo "백신 생산정보 수정 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='moderna_main.html'> <--초기화면</a> ";
?>

	