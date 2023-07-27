<?php
   $con=mysqli_connect("localhost","root","1234")or die("MySQL 접속 실패");
 
$Resident_registration_number = $_GET['Resident_registration_number'];

$sql  = "SELECT  * FROM   `systemdb`.`people tbl` JOIN `systemdb`.`patient tbl` 
ON  `systemdb`.`people tbl`.`Resident registration number` =  `systemdb`.`patient tbl`.`Resident registration number`
WHERE `systemdb`.`people tbl`.`Resident registration number`='".$Resident_registration_number."'";

$ret = mysqli_query($con, $sql);
if($ret) {
	$count = mysqli_num_rows($ret);
	if ($count==0) {
	  echo $_GET['Resident_registration_number']." 주민번호의 환자가 없습니다."."<br>";
	  echo "<br> <a href ='patient_DH.php'> <--초기화면</a> ";
	  exit(); }
	}

else {
	echo "데이터 조회 실패"."<br>";
	echo "실패 원인 :".mysqli_error($con);
	echo "<br> <a href='patient_DH.php'> <--초기 화면</a> ";
	exit();
      }

echo "<h1> 환자 조회 결과 <h1/>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>주민번호</TH><TH>이름</TH><TH>주소</TH><TH>전화번호</TH><TH>입원일</TH><TH>퇴원일</TH><TH>사망일</TH><TH>코로나 검사일</TH><TH>확진상태</TH><TH>백신 종류</TH><TH>백신 1차 접종일</TH><TH>백신 2차 접종일</TH><TH>백신 부작용</TH><TH>백신 번호</TH><TH>수정</TH><TH>삭제</TH>";
echo "</TR>";
while($row=mysqli_fetch_array($ret)){
	echo "<TR>";
	echo "<TD>",$row['Resident registration number'],"</TD>";
	echo "<TD>",$row['name'],"</TD>";
	echo "<TD>",$row['addr'],"</TD>";
	echo "<TD>",$row['mobile'],"</TD>";
	echo "<TD>",$row['Hospitalization date'],"</TD>";
	echo "<TD>",$row['Discharge date'],"</TD>";
	echo "<TD>",$row['Date of death'],"</TD>";
	echo "<TD>",$row['Date of the COVID 19 test'],"</TD>";
	echo "<TD>",$row['COVID-19 confirmed'],"</TD>";
	echo "<TD>",$row['Record of vaccination'],"</TD>";
	echo "<TD>",$row['Date of 1st vaccination'],"</TD>";
	echo "<TD>",$row['Date of 2nd vaccination'],"</TD>";
	echo "<TD>",$row['Side effects of vaccination'],"</TD>";
	echo "<TD>",$row['Vaccine number'],"</TD>";
	echo "<TD>", "<a href='Daegu_patient_info_update.php?Resident_registration_number=",$row['Resident registration number'],"'>수정</a></TD>";
	echo "<TD>", "<a href='delete_DH.php?Resident_registration_number=",$row['Resident registration number'],"'>삭제</a></TD>";
	echo "</TR>";
}

echo "</TABLE>";
echo "<br> <a href='patient_DH.php'> <--초기 화면</a> ";

?>