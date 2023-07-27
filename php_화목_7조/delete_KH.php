<?php
$con=mysqli_connect("localhost","root","1234","systemdb") or die ("MySQL 접속 실패");
$sql ="SELECT * FROM  `systemdb`.`patient tbl`
WHERE 'Resident registration number'='".$_GET['Resident_registration_number']."'";

$ret = mysqli_query($con, $sql);
if($ret) {
	$count = mysqli_num_rows($ret);
	if ($count!=0) {
	  echo $_GET['Resident_registration_number']." 주민번호의 환자가 없습니다."."<br>";
	  echo "<br> <a href ='patient_KH.php'> <--초기화면</a> ";
	  exit(); }
	}

else {
	echo "데이터 조회 실패"."<br>";
	echo "실패 원인 :".mysqli_error($con);
	echo "<br> <a href='patient_KH.php'> <--초기 화면</a> ";
	exit();
      }

$row = mysqli_fetch_array($ret);
$Resident_registration_number =$_GET['Resident_registration_number'];

?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 환자 삭제 <h1>
<FORM METHOD="post" ACTION="delete_result_KH.php">
주민등록번호 : 
<INPUT TYPE = "text" NAME="Resident_registration_number" VALUE=<?php echo $Resident_registration_number ?> READONLY>

<br>
<BR><BR>
위 환자를 삭제하시겠습니까?
<INPUT TYPE="submit" VALUE="환자 삭제">
<br><h5> <a href='patient_KH.php'> <--환자 조회 화면</a> </h5>
</FORM>	 

</BODY>
</HTML>
