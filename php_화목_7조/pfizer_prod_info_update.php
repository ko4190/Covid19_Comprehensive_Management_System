<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`prodplan tbl` WHERE `prodplan tbl`.`prodplan_pharmaceuticalCom` = '".$_GET['prodplan_pharmaceuticalCom']."'";
	
	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo $_GET['prodplan_pharmaceuticalCom'].".생산 정보 없음."."<br>";
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

	$prodplan_pharmaceuticalCom = $row["prodplan_pharmaceuticalCom"];
	$prodVolume = $row["prodVolume"];
	$targetDate = $row["targetDate"];
	$expectedVolume = $row["expectedVolume"];
	$totalVolume = $row["totalVolume"];
	
?>


<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 화이자 백신 생산정보 수정 </h1>

<FORM METHOD="post" ACTION="pfizer_prod_info_update_result.php">
	제약사 : <INPUT TYPE = "text" NAME="prodplan_pharmaceuticalCom" VALUE=<?php echo $prodplan_pharmaceuticalCom ?> READONLY> <br>
	생산수량 : <INPUT TYPE ="text" NAME="prodVolume" VALUE=<?php echo $prodVolume ?>> <br>
	예상 생산일자 : <INPUT TYPE ="text" NAME="targetDate" VALUE=<?php echo $targetDate ?>> <br>
	총 생산량 : <INPUT TYPE = "text" NAME="totalVolume" VALUE=<?php echo $totalVolume ?> > <br>
	예상 총 생산량 : <INPUT TYPE = "text" NAME="expectedVolume" VALUE=<?php echo $expectedVolume ?> READONLY> <br>
	<BR><BR>
	<INPUT TYPE="submit" VALUE="수정">
</FORM>
	
	 <a href="pfizer_prod_info.php"><button>취소</button></a>

</BODY>
</HTML>