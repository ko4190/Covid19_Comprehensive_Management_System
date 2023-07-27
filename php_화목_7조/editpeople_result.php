<?php
     $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MuSQL 접속 실패!!");

     $name = $_POST["name"];
     $Resident_registration_numberr = $_POST["Resident_registration_numbe"];
     $nation_name = $_POST["natio"];
     $addr = $_POST["addr"];
     $mobile = $_POST["mobile"];
     
     $sql="UPDATE systemdb.`people tbl` SET name='".$name."', Nation_Nation_ID='".$nation_name."',addr='".$addr;
     $sql= $sql."', mobile='".$mobile."' WHERE `Resident registration number`='".$Resident_registration_numberr."'";
     
     $ret = mysqli_query($con, $sql);
   
       echo "<h1> 국민 정보 수정 결과 </h1>";

     if($ret) {
         echo "데이터가 성공적으로 수정됨.";
     }
     else {
         echo "데이터 수정 실패!!!"."<br>";
         echo "실패 원인 :".mysqli_error($con);
     }
     mysqli_close($con);

     echo "<br> <h3> <a href='government.php'> <--초기화면</a> </h3>";
?>