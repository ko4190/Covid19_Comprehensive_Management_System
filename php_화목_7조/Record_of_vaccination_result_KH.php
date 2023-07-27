<HTML>
<HEAD>
<META http-equiv="content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
<?php
     $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");

     $Record_of_vaccination = $_GET['Record_of_vaccination'];

 $sql ="SELECT * FROM systemdb.`people tbl` AS p LEFT JOIN systemdb.`patient tbl` AS pat ON p.`Resident registration number`=pat.`Resident registration number` LEFT JOIN systemdb.nation AS n ON n.Nation_ID=p.Nation_Nation_ID where `Record of vaccination`='$Record_of_vaccination' AND `hospital tbl_Hospital Name`='Kyungpook'";
 

    

    $ret = mysqli_query($con, $sql);
     
      if($ret) {
       $count=mysqli_num_rows($ret);
       if ($count==0) {
         echo $_GET['Record_of_vaccination']." 백신 접종 내역이 없음!"."<br>";
         echo "<br> <a href='patient_KH.php'> <--초기화면</a> ";
         exit();
        }
    }
    else {
          echo "데이터 조회 실패!!!"."<br>";
          echo "실패 원인 :".mysqli_error($con);
          echo "<br> <a href='patient_KH.php'> <--초기화면</a> ";
          exit();
     }

echo "<TABLE>";
 echo "<h1> 환자 정보 조회 결과 </h1>";
     echo "<TABLE border=1>";
     echo "<TR>";
     echo "<TH>백신 종류</TH><TH>주민등록번호</TH><TH>이름</TH><TH>주소</TH><TH>전화번호</TH><TH>입원일</TH><TH>퇴원일</TH><TH>사망일</TH><TH>코로나 검사일</TH><TH>확진 상태</TH><TH>백신 1차 접종일</TH><TH>백신 2차 접종일</TH><TH>백신 부작용</TH><TH>백신 번호</TH>";
     echo "</TR>";
     while($row = mysqli_fetch_array($ret)) {
            echo "<TR>";
            echo "<TD>", $row['Record of vaccination'], "</TD>";
            echo "<TD>", $row['Resident registration number'], "</TD>";
            echo "<TD>", $row['name'], "</TD>";
			echo "<TD>", $row['addr'], "</TD>";
			echo "<TD>", $row['mobile'], "</TD>";
			echo "<TD>", $row['Hospitalization date'], "</TD>";
            echo "<TD>", $row['Discharge date'], "</TD>";
            echo "<TD>", $row['Date of death'], "</TD>";
			echo "<TD>", $row['Date of the COVID 19 test'], "</TD>";
			echo "<TD>", $row['COVID-19 confirmed'], "</TD>";
			echo "<TD>", $row['Date of 1st vaccination'], "</TD>";
			echo "<TD>", $row['Date of 2nd vaccination'], "</TD>";
			echo "<TD>", $row['Side effects of vaccination'], "</TD>";
			echo "<TD>", $row['Vaccine number'], "</TD>";
            echo "</TR>";
     }
     mysqli_close($con);;
   echo "</TABLE>";


     echo "<br> <h3> <a href='patient_KH.php'> <--초기화면</a> </h3>";
?>

</BODY>
</HTML>