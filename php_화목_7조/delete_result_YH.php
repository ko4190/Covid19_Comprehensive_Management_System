<?php
$con=mysqli_connect("localhost","root","1234","systemdb") or die ("MySQL 접속 실패");

$Resident_registration_number = $_POST["Resident_registration_number"];

$sql ="DELETE FROM  `systemdb`.`patient tbl` WHERE `Resident registration number`='".$Resident_registration_number."'";

$ret = mysqli_query($con, $sql);

echo "<h1> 회원 삭제 결과 </h1>";
if ($ret) {
	echo $Resident_registration_number." 환자가 성공적으로 삭제됨";
}

else {
echo "데이터 삭제 실패"."<br>";
echo "실패 원인 :".mysqli_error($con);
}
mysqli_close($con);

echo "<br><br> <a href='patient_YH.php'> <--환자 조회 화면</a> ";
?>