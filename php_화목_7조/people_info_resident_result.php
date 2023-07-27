<?php 
     $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");
     
     $Resident_registration_number = $_GET['Resident_registration_number'];

     $sql ="SELECT p.name AS name, p.`Resident registration number` AS Rrn, p.addr AS addr, p.mobile AS mobile, pat.`COVID-19 confirmed` AS coronapeople, n.Nation_Name AS nat FROM systemdb.`people tbl` AS p LEFT JOIN systemdb.`patient tbl` AS pat ON p.`Resident registration number`=pat.`Resident registration number` LEFT JOIN systemdb.nation AS n ON n.Nation_ID=p.Nation_Nation_ID  where p.`Resident registration number`='".$Resident_registration_number."'";
 
      $ret = mysqli_query($con, $sql);
   if($ret) {
       $count=mysqli_num_rows($ret);
       if ($count==0) {
         echo $_GET['Resident_registration_number']." 일치하는 주민등록번호의 국민이 없음!!!"."<br>";
         echo "<br> <a href='government.php'> <--초기화면</a> ";
         exit();
        }
    }
    else {
          echo "데이터 조회 실패!!!"."<br>";
          echo "실패 원인 :".mysqli_error($con);
          echo "<br> <a href='goverment.php'> <--초기화면</a> ";
          exit();
     }

     
     echo "<TABLE border=1>";
     echo "<TR>";
     echo "<TH>이름</TH><TH>주민등록번호</TH><TH>국적</TH><TH>지역</TH><TH>전화번호</TH><TH>코로나 확진여부</TH>";
     echo "</TR>";
     while($row = mysqli_fetch_array($ret)) {
            echo "<TR>";
            echo "<TD>", $row['name'], "</TD>";
            echo "<TD>", $row['Rrn'], "</TD>";
            echo "<TD>", $row['nat'], "</TD>";
            echo "<TD>", $row['addr'], "</TD>";
            echo "<TD>", $row['mobile'], "</TD>";
            echo "<TD align=center>", $row['coronapeople'], "</TD>";
            
            echo "</TR>";
     }
     mysqli_close($con);
     echo "</TABLE>";
     echo "<br> <h3> <a href='government.php'> <-- 정부 사이트로 이동</a> </h3> ";

?>


