<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패 !!");
    $sql ="SELECT * FROM `systemdb`.`patient tbl` WHERE `patient tbl`.`Resident registration number` = '".$_GET['Resident_registration_number']."'";
   
   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['hospital tbl_Hospital Name']." 환자 정보 없음!!!"."<br>";
		   echo "<br> <a href='Kyungpook University_main.html'> <--초기 화면</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href='Kyungpook University_main.html'> <--초기 화면</a> ";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $Resident_registration_number = $row['Resident registration number'];
   $hospital_tbl_Hospital_Name = $row["hospital tbl_Hospital Name"];
   $Hospitalization_date = $row["Hospitalization date"];
   $Discharge_date = $row["Discharge date"];
   $Date_of_death = $row["Date of death"];
   $Date_of_the_COVID_19_test = $row["Date of the COVID 19 test"];
   $COVID_19_confirmed= $row["COVID-19 confirmed"];
   $Record_of_vaccination = $row["Record of vaccination"];
   $Date_of_1st_vaccination = $row["Date of 1st vaccination"];
   $Date_of_2nd_vaccination = $row["Date of 2nd vaccination"];
   $Side_effects_of_vaccination = $row["Side effects of vaccination"];
   $Vaccine_number = $row["Vaccine number"];
   
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 환자 정보 수정 </h1>
<FORM METHOD="post"  ACTION="Kyungpook University_patient_info_update_result.php">
	주민번호 : <INPUT TYPE ="text" NAME="Resident_registration_number" VALUE=<?php echo $Resident_registration_number ?> READONLY> <br>
	병원 이름 : <INPUT TYPE ="text" NAME="hospital_tbl_Hospital_Name" VALUE=<?php echo $hospital_tbl_Hospital_Name ?>> <br> 
	입원일 : <INPUT TYPE ="text" NAME="Hospitalization_date" VALUE=<?php echo $Hospitalization_date ?>> <br>
	퇴원일 : <INPUT TYPE ="text" NAME="Discharge_date" VALUE=<?php echo $Discharge_date ?>> <br>
	사망일 : <INPUT TYPE ="text" NAME="Date_of_death" VALUE=<?php echo $Date_of_death ?>> <br>
	코로나 검사일 : <INPUT TYPE ="text" NAME="Date_of_the_COVID_19_test" VALUE=<?php echo $Date_of_the_COVID_19_test ?>> <br>
	코로나 확진 여부 : <INPUT TYPE ="text" NAME="COVID_19_confirmed" VALUE=<?php echo $COVID_19_confirmed ?>> <br>
	백신 종류 : <INPUT TYPE ="text" NAME="Record_of_vaccination" VALUE=<?php echo $Record_of_vaccination ?>> <br>
	백신 1차 접종일 : <INPUT TYPE ="text" NAME="Date_of_1st_vaccination" VALUE=<?php echo $Date_of_1st_vaccination ?>> <br>
	백신 2차 접종일 : <INPUT TYPE ="text" NAME="Date_of_2nd_vaccination" VALUE=<?php echo $Date_of_2nd_vaccination ?>> <br>
	백신 부작용 유무 : <INPUT TYPE ="text" NAME="Side_effects_of_vaccination" VALUE=<?php echo $Side_effects_of_vaccination ?>> <br>
	백신 넘버 : <INPUT TYPE ="text" NAME="Vaccine_number" VALUE=<?php echo $Vaccine_number ?>> <br>
	<BR>
	<INPUT TYPE="submit"  VALUE="정보 수정">
    <br> <h3> <a href='patient_KH.php'> <--환자 조회 화면</a> </h3>
</FORM>

</BODY>
</HTML>