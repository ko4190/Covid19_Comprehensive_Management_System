<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$purchasing_pharmaceuticalCom = $_POST["purchasing_pharmaceuticalCom"];
	$purchaseVolume = $_POST["purchaseVolume"];
	$purchasingDate = $_POST["purchasingDate"];
	$hospitalName = $_POST["hospitalName"];

 	$get_vaccine_sql = "SELECT * FROM `systemdb`.`vaccine tbl` WHERE `pharmaceuticalCom` = '".$purchasing_pharmaceuticalCom."'";

	$vaccine_ret = mysqli_query($con, $get_vaccine_sql);
	if($vaccine_ret) {
		$count = mysqli_num_rows($vaccine_ret);
		if($count==0) {
			echo "Moderna 제약사의 정보가 없음."."<br>";
			echo "<br> <a href='moderna_main.html'> <--초기 화면</a> ";
			exit();
		}
	}
	$row = mysqli_fetch_array($vaccine_ret);
	
	$vaccineHoldings = $row['vaccineHoldings'];
	$salesVolume = $row['salesVolume'];
	
	$sql ="INSERT INTO `systemdb`.`purchasing tbl` (`purchasing_pharmaceuticalCom`, `purchaseVolume`, `purchasingDate`, `hospitalName`) VALUES('".$purchasing_pharmaceuticalCom."', ".$purchaseVolume.", '".$purchasingDate."', '".$hospitalName."')";
	
	/*백신을 구매하면, 구매량만큼 백신 보유량에서 빼고, 백신 판매량에서 더함*/
	$update_vaccine_info_sql = "UPDATE `systemdb`.`vaccine tbl` SET `vaccineHoldings` = ".$vaccineHoldings." - ".$purchaseVolume.", `salesVolume` = ".$salesVolume." + ".$purchaseVolume." WHERE `pharmaceuticalCom`='".$purchasing_pharmaceuticalCom."'";

	$ret = mysqli_query($con, $sql);
	$update_ret = mysqli_query($con, $update_vaccine_info_sql);

	if($ret and $update_ret) {
		echo "백신 구매정보가 성공적으로 입력됨.";
	}
	else {
		echo "백신 구매정보 입력 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='moderna_main.html'> <--초기화면</a> ";
?>