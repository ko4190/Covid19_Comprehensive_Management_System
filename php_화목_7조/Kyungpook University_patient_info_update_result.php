<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패 !!");

   $Resident_registration_number = $_POST["Resident_registration_number"];
   $hospital_tbl_Hospital_Name = $_POST["hospital_tbl_Hospital_Name"];
   $Hospitalization_date = $_POST["Hospitalization_date"];
   $Discharge_date = $_POST["Discharge_date"];
   $Date_of_death = $_POST["Date_of_death"]; 
   $Date_of_the_COVID_19_test = $_POST["Date_of_the_COVID_19_test"];
   $COVID_19_confirmed = $_POST["COVID_19_confirmed"];
   $Record_of_vaccination = $_POST["Record_of_vaccination"];
   $Date_of_1st_vaccination = $_POST["Date_of_1st_vaccination"];
   $Date_of_2nd_vaccination = $_POST["Date_of_2nd_vaccination"];
   $Side_effects_of_vaccination = $_POST["Side_effects_of_vaccination"];
   $Vaccine_number = $_POST["Vaccine_number"];
   
   $sql ="UPDATE `patient tbl` 
   SET `hospital tbl_Hospital Name`='".$hospital_tbl_Hospital_Name."', `Hospitalization date`='".$Hospitalization_date."',`Discharge date`='".$Discharge_date."',`Date of death`='".$Date_of_death."',`Date of the COVID 19 test`='".$Date_of_the_COVID_19_test."', `COVID-19 confirmed`='".$COVID_19_confirmed."', `Record of vaccination`='".$Record_of_vaccination."',`Date of 1st vaccination`='".$Date_of_1st_vaccination."',`Date of 2nd vaccination`='".$Date_of_2nd_vaccination."',`Side effects of vaccination`='".$Side_effects_of_vaccination."',`Vaccine number`='".$Vaccine_number."' WHERE `Resident registration number`='".$Resident_registration_number."'";
   
   $ret = mysqli_query($con, $sql);

    echo "<h1> 병원 정보 수정 결과 </h1>";
   if($ret) {
	   echo "데이터가 성공적으로 수정됨.";
   }
   else {
	   echo "데이터 수정 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   echo "<br> <a href='Kyungpook University_main.html'> <--초기 화면</a> ";
?>