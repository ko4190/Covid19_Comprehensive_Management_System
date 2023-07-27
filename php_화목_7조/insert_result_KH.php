<?php
$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패") ;
	
$Resident_registration_number = $_POST["Resident_registration_number"];
$Hospitalization_date = $_POST["Hospitalization_date"];
$Date_of_the_COVID19_test = $_POST["Date_of_the_COVID19_test"];
$Record_of_vaccination = $_POST["Record_of_vaccination"];
$Date_of_1st_vaccination = $_POST["Date_of_1st_vaccination"];
$Date_of_2nd_vaccination = $_POST["Date_of_2nd_vaccination"];
$Side_effects_of_vaccination = $_POST["Side_effects_of_vaccination"];
$Vaccine_number = $_POST["Vaccine_number"];


$sql ="INSERT INTO `patient tbl` (`hospital tbl_Hospital Name`, `Hospitalization date`,`Resident registration number`, `Date of the COVID 19 test`,`COVID-19 confirmed`, `Record of vaccination`,`Date of 1st vaccination`,`Date of 2nd vaccination`,`Side effects of vaccination`,`Vaccine number`)";

$sql .=" VALUES ('Kyungpook', '$Hospitalization_date','$Resident_registration_number','$Date_of_the_COVID19_test', 'Y', '$Record_of_vaccination','$Date_of_1st_vaccination','$Date_of_2nd_vaccination','$Side_effects_of_vaccination','$Vaccine_number')";

$ret = mysqli_query($con, $sql);

echo "<h1> 신규 환자 입력 결과 </h1>";
if ($ret) {
	echo $Resident_registration_number." 환자가  성공적으로  입력되었습니다.";
}

else {
echo "데이터 입력 실패"."<br>";
echo "실패 원인 :".mysqli_error($con);
}
mysqli_close($con);

echo "<br><br> <a href='patient_KH.php'> <--초기화면</a> ";
?>


