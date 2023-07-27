<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`vaccine tbl` WHERE `vaccine tbl`.`pharmaceuticalCom` = '".$_GET['pharmaceuticalCom']."'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo $_GET['pharmaceuticalCom']." 제약사의 정보가 없음."."<br>";
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

	$pharmaceuticalCom = $row['pharmaceuticalCom'];
	$price = $row['price'];
	$vaccineHoldings = $row['vaccineHoldings'];
	$salesVolume = $row['salesVolume'];
	$sideeffectRate = $row['sideeffectRate'];
	$preventionRate = $row['preventionRate'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 백신 정보 수정 </h1>
<FORM METHOD="post" ACTION="moderna_vaccine_info_update_result.php">
	제약사 : <INPUT TYPE = "text" NAME="pharmaceuticalCom" VALUE=<?php echo $pharmaceuticalCom ?> READONLY> <br>
	가격(원) : <INPUT TYPE ="text" NAME="price" VALUE=<?php echo $price ?>> <br>
	보유량 : <INPUT TYPE ="text" NAME="vaccineHoldings" VALUE=<?php echo $vaccineHoldings ?>> <br>
	판매량 : <INPUT TYPE = "text" NAME="salesVolume" VALUE=<?php echo $salesVolume ?>> <br>
	부작용률(%) : <INPUT TYPE = "text" NAME="sideeffectRate" VALUE=<?php echo $sideeffectRate ?>> <br>
	예방률(%) : <INPUT TYPE = "text" NAME="preventionRate" VALUE=<?php echo $preventionRate ?>> <br>
	<BR><BR>
	<INPUT TYPE="submit" VALUE="수정">
</FORM>
	<a href="moderna_vaccine_info.php"><button>취소</button></a>
</BODY>
</HTML>







