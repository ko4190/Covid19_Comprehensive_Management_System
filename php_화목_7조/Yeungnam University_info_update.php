<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패 !!");
   $sql = "SELECT * FROM `systemdb`.`hospital tbl` WHERE `hospital tbl`.`Hospital Name` = '".$_GET['Hospital_Name']."'";
   
   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['Hospital_Name']." 병원 정보 없음!!!"."<br>";
		   echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
	   exit();
   }   
   $row = mysqli_fetch_array($ret);
   $Hospital_Name = $row['Hospital Name'];
   $Number_of_hospitalized_patient = $row["Number of hospitalized patient"];
   $Number_of_discharged_patient = $row["Number of discharged patient"];
   $Number_of_dead_patient = $row["Number of dead patient"];
   $Number_of_COVID19_confirmed_patient = $row["Number of COVID-19 confirmed patient"];
   $Number_of_1st_vaccinated_patient = $row["Number of 1st vaccinated patient"];
   $Number_of_2nd_vaccinated_patient = $row["Number of 2nd vaccinated patient"];
   $Number_of_hospital_bed = $row["Number of hospital bed"];         
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 병원 정보 수정 </h1>
<FORM METHOD="post"  ACTION="Yeungnam University_info_update_result.php">
	병원 이름 : <INPUT TYPE ="text" NAME="Hospital_Name" VALUE=<?php echo $Hospital_Name ?> READONLY> <br>
	입원 환자 수 : <INPUT TYPE ="text" NAME="Number_of_hospitalized_patient" VALUE=<?php echo $Number_of_hospitalized_patient ?>> <br> 
	퇴원 환자 수 : <INPUT TYPE ="text" NAME="Number_of_discharged_patient" VALUE=<?php echo $Number_of_discharged_patient ?>> <br>
	사망 환자 수 : <INPUT TYPE ="text" NAME="Number_of_dead_patient" VALUE=<?php echo $Number_of_dead_patient ?>> <br>
	코로나 확진판정 환자 수 : <INPUT TYPE ="text" NAME="Number_of_COVID19_confirmed_patient" VALUE=<?php echo $Number_of_COVID19_confirmed_patient ?>> <br>
	백신 1차 접종 환자 수 : <INPUT TYPE ="text" NAME="Number_of_1st_vaccinated_patient" VALUE=<?php echo $Number_of_1st_vaccinated_patient ?>> <br>
	백신 2차 접종 환자 수 : <INPUT TYPE ="text" NAME="Number_of_2nd_vaccinated_patient" VALUE=<?php echo $Number_of_2nd_vaccinated_patient ?>> <br>
	병상 수 : <INPUT TYPE ="text" NAME="Number_of_hospital_bed" VALUE=<?php echo $Number_of_hospital_bed ?>> <br>
	<BR><BR>
	<INPUT TYPE="submit"  VALUE="정보 수정">
	<BR><BR>
	<a  href='Yeungnam University_main.html'> -  YEUNGNAM HOME </a>  <br><br>
</FORM>

</BODY>
</HTML>