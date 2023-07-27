<HTML>
<HEAD>
<META http-equiv="content-Type" content="text/html; charset=utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
</HEAD>
  <BODY  style="background-color:white;">

<a href='Yeungnam University_main.html'> <--- YEUNGNAM HOME</a>

<font size="6em">

<center><h1>영남대 병원 정보 조회 </h1></center>
</font>







<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("접속 실패!! ");
  
   $sql = "SELECT * FROM `systemdb`.`hospital tbl` WHERE `hospital tbl`.`Hospital Name` = 'Yeungnam'";
   
   $ret = mysqli_query($con, $sql);

   if($ret) {
      $count = mysqli_num_rows($ret);
   }
   else {
      echo "병원 정보 조회 실패". "<br>";
      echo "실패원인 : " . mysqli_error($con);
      exit();
   }
   
   $sql_h = "SELECT * FROM `patient tbl` WHERE (`Hospitalization date`IS NOT NULL)AND(`Discharge date` IS NULL)AND(`hospital tbl_Hospital Name` = 'Yeungnam')";
   $ret_h = mysqli_query($con, $sql_h);
   if($ret_h) {
      $Number_of_hospitalized_patient = mysqli_num_rows($ret_h);
      if($Number_of_hospitalized_patient==0) 
     {
         echo "입원 환자 수 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
   
   $sql_d = "SELECT * FROM `patient tbl` WHERE (`Discharge date`IS NOT NULL)AND(`Date of death` IS NULL)AND(`hospital tbl_Hospital Name` = 'Yeungnam')";
   $ret_d = mysqli_query($con, $sql_d);
   if($ret_d) {
      $Number_of_discharged_patient = mysqli_num_rows($ret_d);
      if($Number_of_discharged_patient==0) 
     {
         echo "퇴원 환자 수 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
     
   $sql_p = "SELECT * FROM `patient tbl` WHERE (`Date of death`IS NOT NULL)AND(`hospital tbl_Hospital Name` = 'Yeungnam')";
   $ret_p = mysqli_query($con, $sql_p);
   if($ret_p) {
      $Number_of_dead_patient = mysqli_num_rows($ret_p);
      if($Number_of_dead_patient==0) 
     {
         echo "사망 환자 수 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
     
   $sql_c = "SELECT * FROM `patient tbl` WHERE (`COVID-19 confirmed` = 'Y')AND(`hospital tbl_Hospital Name` = 'Yeungnam')";
   $ret_c = mysqli_query($con, $sql_c);
   if($ret_c) {
      $Number_of_COVID_19_confirmed_patient = mysqli_num_rows($ret_c);
      if($Number_of_COVID_19_confirmed_patient==0) 
     {
         echo "확진 여부 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
     
   $sql_v1 = "SELECT * FROM `systemdb`.`patient tbl` WHERE (`Date of 1st vaccination`IS NOT NULL)AND(`Date of 2nd vaccination`IS NULL)AND(`hospital tbl_Hospital Name` = 'Yeungnam')";
   $ret_v1 = mysqli_query($con, $sql_v1);
   if($ret_v1) {
      $Number_of_1st_vaccinated_patient = mysqli_num_rows($ret_v1);
      if($Number_of_1st_vaccinated_patient==0) 
     {
         echo "백신 1차 접종 환자 수 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
   
   $sql_v2 = "SELECT * FROM `systemdb`.`patient tbl` WHERE (`Date of 1st vaccination`IS NOT NULL) AND (`hospital tbl_Hospital Name` = 'Yeungnam') AND (`Date of 2nd vaccination`IS NOT NULL)";
   $ret_v2 = mysqli_query($con, $sql_v2);
   if($ret_v2) {
      $Number_of_2nd_vaccinated_patient = mysqli_num_rows($ret_v2);
      if($Number_of_2nd_vaccinated_patient==0) 
     {
         echo "백신 2차 접종 환자 수 정보가 없음."."<br>";
         echo "<br> <a href='Yeungnam University_main.html'> <--초기 화면</a> ";
         exit();
   }}
    
   
   

   
   echo "<TABLE border =1>";
   echo "<TR>";
   echo "<TH>병원 이름</TH><TH>입원 환자 수</TH><TH>퇴원 환자 수</TH><TH>사망 환자 수</TH><TH>코로나 확진판정 환자 수</TH><TH>백신 1차 접종 환자 수</TH><TH>백신 2차 접종 환자 수</TH><TH>병상 수</TH><TH>수정</TH>";
   echo "</TR>";
   
 
  
   
$row = mysqli_fetch_array($ret);

      echo "<TR>";

      echo "<TD>", $row['Hospital Name'], "</TD>";
      echo "<TD>", $Number_of_hospitalized_patient, "</TD>";
      echo "<TD>", $Number_of_discharged_patient, "</TD>";
      echo "<TD>", $Number_of_dead_patient, "</TD>";
      echo "<TD>", $Number_of_COVID_19_confirmed_patient,"</TD>";
      echo "<TD>", $Number_of_1st_vaccinated_patient,"</TD>";
      echo "<TD>", $Number_of_2nd_vaccinated_patient,"</TD>";
      echo "<TD>", $row['Number of hospital bed'],"</TD>";
      echo "<TD>", "<a href= 'Yeungnam University_info_update.php?Hospital Name=", $row['Hospital Name']. "'>수정</a></TD>";
      echo "</TR>";
   
   
   echo "</TABLE>";
   

  
  
  $sql1 ="UPDATE `systemdb`.`hospital tbl` SET `Number of hospitalized patient`=".$Number_of_hospitalized_patient.", `Number of discharged patient`=".$Number_of_discharged_patient.", `Number of dead patient`=".$Number_of_dead_patient.", `Number of COVID-19 confirmed patient`=".$Number_of_COVID_19_confirmed_patient.", `Number of 1st vaccinated patient`=".$Number_of_1st_vaccinated_patient.",`Number of 2nd vaccinated patient`=".$Number_of_2nd_vaccinated_patient.", `Number of hospital bed`=".$row['Number of hospital bed']." Where `Hospital Name`='".$row['Hospital Name']."'";
  $ret1 = mysqli_query($con, $sql1);
   



?>








  <style>
    
#sform{
text-align:right;

}


h3{
font-size:25px;
padding: 0.5em 3em;
    background: #E8E8E8;
    border-left: 0.28em solid #7C7567;
width:24%
}


th, td {
    
 text-align: center;
border-bottom: 2px solid #444444;


    padding: 15px;
 width: 100px;
    height: 5px;
border-radius:10px;

   }
   
  table {
    width: 300px;
    height: 200px;

    border-style: none;
    padding: 15px;
 width: 100%;
font-size:25px;


  }
 tr:hover { background-color: #F5F5F5; }//마우스 올렸을 때 색


 font-family: 'Black Han Sans', sans-serif;
 

/*body 초기화*/
body {
  margin: 0;
  padding: 0;
  font-family: "Roboto", serif;
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: center;
  overflow-x: hidden;  
}

h1 {
  margin: 0.5em 0 1em 0;
}

nav {
  width: 100%;
  display: flex;
  justify-content: center;
  position: relative;
  background: #F2D295; /*메인*/


}

ul, li {
  margin: 1.5;
  padding: 0;
  list-style: none;

}

#main-menu > li {
  float: left;
  position: relative;
}

#main-menu > li > a {
  font-size: 1.75rem;
  color: black;
  text-align: center;
  text-decoration: none;
  letter-spacing: 0.08em;
  display: block;
  padding: 13px 50px;
  border-right: 1px solid white;
 
  
}

#main-menu > li:nth-child(1) > a {
  border-left: 1px solid white;
}

#sub-menu {
  position: absolute;
  background: #182952;
  opacity: 0;
  visibility: hidden;
  transition: all 0.15s ease-in;
  width:100%;
margin:0px auto
  
}

#sub-menu > li {
  padding: 16px 28px;
  border-bottom: 0px solid rgba(0,0,0,0.15);
 
}

#sub-menu > li >  a {
  color: rgba(255,255,255,0.6);
  text-decoration: none;

}

#main-menu > li:hover #sub-menu {
  opacity: 1;
  visibility: visible;
}

#sub-menu > li >  a:hover {
 text-decoration: underline;
  
  
}






  </style>
  
</BODY>
</HTML>