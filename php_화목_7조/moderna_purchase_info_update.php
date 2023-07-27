<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`purchasing tbl` WHERE `purchasing tbl`.`orderNumber` = '".$_GET['orderNumber']."'";
	$get_total_sql = "SELECT * FROM `systemdb`.`vaccine tbl` WHERE `vaccine tbl`.`pharmaceuticalCom` = 'Moderna'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo "Moderna 제약사의 정보가 없음."."<br>";
			echo "<br> <a href='moderna_main.html'> <--초기 화면</a> ";
			exit();
		}
	}
	else {
		echo "데이터조회 실패."."<br>";
		echo "실패 원인 : ".mysqli_error($con);
		echo "<br> <a href='moderna_main.html'> <--초기 화면</a> ";
		exit();
	}

	$ret2 = mysqli_query($con, $get_total_sql);
	if($ret2) {
		$count = mysqli_num_rows($ret2);
		if($count==0) {
			echo "Moderna 제약사의 정보가 없음."."<br>";
			echo "<br> <a href='moderna_main.html'> <--초기 화면</a> ";
			exit();
		}
	}
	else {
		echo "데이터조회 실패."."<br>";
		echo "실패 원인 : ".mysqli_error($con);
		echo "<br> <a href='moderna_main.html'> <--초기 화면</a> ";
		exit();
	}

	$row = mysqli_fetch_array($ret);
	$row2 = mysqli_fetch_array($ret2);

	$purchasing_pharmaceuticalCom = $row['purchasing_pharmaceuticalCom'];
	$purchaseVolume = $row['purchaseVolume'];
	$purchasingDate = $row['purchasingDate'];
	$hospitalName = $row['hospitalName'];
	$orderNumber = $row['orderNumber'];

	$vaccineHoldings = $row2['vaccineHoldings'];
	$salesVolume = $row2['salesVolume'];

	/*값을 수정해야하니까, 백신 보유량, 판매량을 판매전 수량으로 돌려놓음*/
	$revaccineHoldings = $vaccineHoldings + $purchaseVolume;
	$resalesVolume = $salesVolume - $purchaseVolume;

	
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 백신 정보 수정 </h1>
<FORM METHOD="post" ACTION="moderna_purchase_info_update_result.php">
	제약사 : <INPUT TYPE = "text" NAME="purchasing_pharmaceuticalCom" VALUE=<?php echo $purchasing_pharmaceuticalCom ?> READONLY> <br>
	구매수량 : <INPUT TYPE ="text" NAME="purchaseVolume" VALUE=<?php echo $purchaseVolume ?>> <br>
	구매날짜 : <INPUT TYPE ="text" NAME="purchasingDate" VALUE=<?php echo $purchasingDate ?>> <br>
	구매기관 : <INPUT TYPE = "text" NAME="hospitalName" VALUE=<?php echo $hospitalName ?>> <br>
	주문번호 : <INPUT TYPE = "text" NAME="orderNumber" VALUE=<?php echo $orderNumber ?> READONLY> <br><br>
	
	백신보유량 : <INPUT TYPE = "text" NAME="vaccineHoldings" VALUE=<?php echo $revaccineHoldings ?> READONLY> <br>
	총판매량 : <INPUT TYPE = "text" NAME="salesVolume" VALUE=<?php echo $resalesVolume ?> READONLY> <br>
	
	<BR><BR>
	<INPUT TYPE="submit" VALUE="수정">
</FORM>
	<a href="moderna_purchase_info.php"><button>취소</button></a>
</BODY>
</HTML>