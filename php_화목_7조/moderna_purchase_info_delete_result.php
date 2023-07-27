<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$orderNumber = $_POST["orderNumber"];

	$sql = "DELETE FROM `systemdb`.`purchasing tbl` WHERE `orderNumber`=".$orderNumber."";
	
	$ret = mysqli_query($con, $sql);

	echo "<h1> 백신정보 삭제 결과 </h1>";

	if($ret) {
		echo "백신 구매내역이 성공적으로 수정됨.";
	}
	else {
		echo "백신 구매내역 수정 실패."."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);
	echo "<br> <a href='moderna_main.html'> <--초기화면</a> ";
?>