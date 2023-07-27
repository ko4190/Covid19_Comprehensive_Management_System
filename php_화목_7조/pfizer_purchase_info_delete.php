<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`purchasing tbl` WHERE `purchasing tbl`.`orderNumber` = '".$_GET['orderNumber']."'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo "화이자 제약사의 정보가 없음."."<br>";
			echo "<br> <a href='pfizer_main.html'> <--초기 화면</a> ";
			exit();
		}
	}
	else {
		echo "데이터조회 실패."."<br>";
		echo "실패 원인 : ".mysqli_error($con);
		echo "<br> <a href='pfizer_main.html'> <--초기 화면</a> ";
		exit();
	}

	$row = mysqli_fetch_array($ret);

	$purchasing_pharmaceuticalCom = $row['purchasing_pharmaceuticalCom'];
	$purchaseVolume = $row['purchaseVolume'];
	$purchasingDate = $row['purchasingDate'];
	$hospitalName = $row['hospitalName'];
	$orderNumber = $row['orderNumber'];

?>



<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 백신 정보 삭제 </h1>

<FORM METHOD="post" ACTION="pfizer_purchase_info_delete_result.php">
	제약사 : <INPUT TYPE = "text" NAME="purchasing_pharmaceuticalCom" VALUE=<?php echo $purchasing_pharmaceuticalCom ?> READONLY> <br>
	구매수량 : <INPUT TYPE ="text" NAME="purchaseVolume" VALUE=<?php echo $purchaseVolume ?> READONLY> <br>
	구매날짜 : <INPUT TYPE ="text" NAME="purchasingDates" VALUE=<?php echo $purchasingDate ?> READONLY> <br>
	구매기관 : <INPUT TYPE = "text" NAME="hospitalName" VALUE=<?php echo $hospitalName ?> READONLY> <br>
	주문번호 : <INPUT TYPE = "text" NAME="orderNumber" VALUE=<?php echo $orderNumber ?> READONLY> <br>
	<BR>
	<p>내역 삭제 하시겠습니까?</p>
	<INPUT TYPE="submit" VALUE="삭제">

</FORM>

	<a href="pfizer_purchase_info.php"><button>취소</button></a>
</BODY>
</HTML>

