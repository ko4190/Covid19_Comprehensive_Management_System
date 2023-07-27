<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");
   
   $sql ="SELECT p.name AS name, p.`Resident registration number` AS Rrn, p.Nation_Nation_ID AS nati, p.addr AS addr, p.mobile AS mobile FROM systemdb.`people tbl` AS p, systemdb.nation AS nat WHERE p.Nation_Nation_ID = nat.Nation_ID AND p.`Resident registration number`='".$_GET['Resident_registration_number']."'";
 
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
     $row = mysqli_fetch_array($ret);
     $name = $row["name"];
     $Resident_registration_number = $row['Rrn'];
     $nation_name=$row["nati"];
     $addr = $row["addr"];
     $mobile = $row["mobile"];
?>

<HTML>
<HEAD>
<MEATA http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<BODY>

<h1> 회원 정보 수정 </h1>
<FORM METHOD="post" ACTION="editpeople_result.php">
      이름 : <INPUT TYPE ="text" NAME="name" VALUE="<?php echo $name ?>"> <br>
      주민등록번호 : <INPUT TYPE ="text" NAME="Resident_registration_numbe" VALUE=<?php echo $Resident_registration_number ?>
          READONLY> <br>
      지역 : <INPUT TYPE ="text" NAME="natio" VALUE="<?php echo $nation_name ?>"> <br>
      지역 : <INPUT TYPE ="text" NAME="addr" VALUE="<?php echo $addr ?>"> <br>
      전화번호 : <INPUT TYPE ="text" NAME="mobile" VALUE=<?php echo $mobile ?>> <br>
      <h4>지역 변경시: 1-Korea, 2-Japan, 3-China, 4-USA, 5-Spain</h4>
      <INPUT TYPE="submit"  VALUE="정보 수정">
</FORM>

</BODY>
</HTML>