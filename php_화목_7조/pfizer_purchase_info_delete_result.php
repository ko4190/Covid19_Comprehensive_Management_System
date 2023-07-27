<?php

 	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("접속 실패!!");
  	
	
	$orderNumber = $_POST["orderNumber"];
	

	$sql = "DELETE FROM `systemdb`.`purchasing tbl` WHERE `orderNumber`=".$orderNumber."";
	$ret = mysqli_query($con, $sql);
	
	
	if($ret) {
	 echo " 내역이 삭제되었습니다.";
	 
	}
	else {
	  echo "구매 내역 삭제 실패"."<br>";
	  echo "실패 원인 : " .mysqli_error($con);
	}

	mysqli_close($con);
	
	echo "<br><a href='pfizer_main.html'> <--초기화면</a> ";

?>
