<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");
	
	$sql = "SELECT * FROM `systemdb`.`prodlist tbl` WHERE `prodlist tbl`.`prodNumber` = '".$_GET['prodNumber']."'";

	$ret = mysqli_query($con, $sql);

	if($ret) {
		$count = mysqli_num_rows($ret);
		if($count==0) {
			echo "Pfizer 제약사의 정보가 없음."."<br>";
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

	$prodlist_pharmaceuticalCom = $row['prodlist_pharmaceuticalCom'];
	$prodNumber = $row['prodNumber'];
	$prodDate = $row['prodDate'];
	$prodVolume = $row['prodVolume'];

	
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 백신 생산내역 수정 </h1>
<FORM METHOD="post" ACTION="pfizer_prodlist_info_update_result.php">
	제약사 : <INPUT TYPE = "text" NAME="prodlist_pharmaceuticalCom" VALUE=<?php echo $prodlist_pharmaceuticalCom ?> READONLY> <br>
	생산번호 : <INPUT TYPE ="text" NAME="prodNumber" VALUE=<?php echo $prodNumber ?> READONLY> <br>
	생산날짜 : <INPUT TYPE ="text" NAME="prodDate" VALUE=<?php echo $prodDate ?>> <br>
	생산수량 : <INPUT TYPE = "text" NAME="prodVolume" VALUE=<?php echo $prodVolume ?>> <br>
	
	<BR><BR>
	<INPUT TYPE="submit" VALUE="수정">
</FORM>
	<a href="pfizer_prodlist_info.php"><button>취소</button></a>
</BODY>
</HTML>