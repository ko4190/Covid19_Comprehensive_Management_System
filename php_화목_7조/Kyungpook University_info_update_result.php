<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패 !!");

   $Hospital_Name = $_POST["Hospital_Name"];
   $Number_of_hospitalized_patient = $_POST["Number_of_hospitalized_patient"];
   $Number_of_discharged_patient = $_POST["Number_of_discharged_patient"];
   $Number_of_dead_patient = $_POST["Number_of_dead_patient"];
   $Number_of_COVID19_confirmed_patient = $_POST["Number_of_COVID19_confirmed_patient"];
   $Number_of_1st_vaccinated_patient = $_POST["Number_of_1st_vaccinated_patient"];
   $Number_of_2nd_vaccinated_patient = $_POST["Number_of_2nd_vaccinated_patient"];
   $Number_of_hospital_bed = $_POST["Number_of_hospital_bed"];    
   
   $sql ="UPDATE `hospital tbl` SET `Number of hospitalized patient`='".$Number_of_hospitalized_patient."', `Number of discharged patient`='".$Number_of_discharged_patient."', `Number of dead patient`='".$Number_of_dead_patient."', `Number of COVID-19 confirmed patient`='".$Number_of_COVID19_confirmed_patient."', `Number of 1st vaccinated patient`='".$Number_of_1st_vaccinated_patient."',`Number of 2nd vaccinated patient`='".$Number_of_2nd_vaccinated_patient."', `Number of hospital bed`='".$Number_of_hospital_bed."'";
   
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
