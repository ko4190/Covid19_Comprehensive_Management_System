<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$pharmaceuticalCom = $_POST["pharmaceuticalCom"];
	$price = $_POST["price"];
	$vaccineHoldings = $_POST["vaccineHoldings"];
	$salesVolume = $_POST["salesVolume"];
	$sideeffectRate = $_POST["sideeffectRate"];
	$preventionRate = $_POST["preventionRate"];

	$sql = "UPDATE `systemdb`.`vaccine tbl` SET `price`=".$price.", `vaccineHoldings`=".$vaccineHoldings.", `salesVolume`=".$salesVolume.", `sideeffectRate`=".$sideeffectRate.", `preventionRate`=".$preventionRate." WHERE `pharmaceuticalCom`='".$pharmaceuticalCom."'";
	$ret = mysqli_query($con, $sql);

	echo "<h1> 화이자 백신 정보 수정 결과 </h1>";
	if($ret) {
		echo "화이자 백신 정보 수정 완료.";
	}
	else {
		echo "화이자 백신정보 수정 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='pfizer_main.html'> <--초기화면</a> ";
?>
	