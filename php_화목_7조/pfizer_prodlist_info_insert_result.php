<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$prodlist_pharmaceuticalCom = $_POST["prodlist_pharmaceuticalCom"];
	$prodVolume = $_POST["prodVolume"];
	$prodDate = $_POST["prodDate"];
	
	$sql ="INSERT INTO `systemdb`.`prodlist tbl` (`prodlist_pharmaceuticalCom`, `prodVolume`, `prodDate`) VALUES('".$prodlist_pharmaceuticalCom."', ".$prodVolume.", '".$prodDate."')";

	$ret = mysqli_query($con, $sql);

	if($ret) {
		echo "백신 생산내역이 성공적으로 입력됨.";
	}
	else {
		echo "백신 생산내역 입력 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='pfizer_main.html'> <--초기화면</a> ";
?>