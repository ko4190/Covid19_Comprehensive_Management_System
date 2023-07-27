<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`prodplan tbl` WHERE `prodplan tbl`.`prodplan_pharmaceuticalCom` = '".$_GET['prodplan_pharmaceuticalCom']."'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo $_GET['prodplan_pharmaceuticalCom']." 제약사의 백신 생산정보가 없음."."<br>";
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

	$prodplan_pharmaceuticalCom = $row['prodplan_pharmaceuticalCom'];
	$prodVolume = $row['prodVolume'];
	$targetDate = $row['targetDate'];
	$totalVolume = $row['totalVolume'];
	$expectedVolume = $row['expectedVolume'];
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1>백신 정보 수정</h1>

<FORM METHOD="post" ACTION="moderna_prod_info_update_result.php">
	제약사 : <INPUT TYPE = "text" NAME="prodplan_pharmaceuticalCom" VALUE=<?php echo $prodplan_pharmaceuticalCom ?> READONLY> <br>
	생산량 : <INPUT TYPE ="text" NAME="prodVolume" VALUE=<?php echo $prodVolume ?>> <br>
	예상 생산일자 : <INPUT TYPE ="text" NAME="targetDate" VALUE=<?php echo $targetDate ?>> <br>
	총 생산량 : <INPUT TYPE = "text" NAME="totalVolume" VALUE=<?php echo $totalVolume ?>> <br>
	예상 총 생산량 : <INPUT TYPE = "text" NAME="expectedVolume" VALUE=<?php echo $expectedVolume ?> READONLY> <br>
	<BR><BR>
	<INPUT TYPE="submit" VALUE="수정">
</FORM>
	<a href="moderna_prod_info.php"><button>취소</button></a>
</BODY>
</HTML>

<style>


