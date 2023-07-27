<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("접속 실패!! 다시해!!");
	
	$sql = "SELECT * FROM `systemdb`.`prodplan tbl` WHERE `prodplan tbl`.`prodplan_pharmaceuticalCom` = 'Pfizer'";
	
	$ret = mysqli_query($con, $sql);

	if($ret) {
		$count = mysqli_num_rows($ret);
	}
	else {
		echo "화이자 백신 생산 계획 조회 실패". "<br>";
		echo "실패원인 : " . mysqli_error($con);
		exit();
	}
	
	echo "<br><h3> <a href='pfizer_main.html'> <--초기화면</a></h3>";
	echo "<h1> 백신 생산 계획 조회 결과 </h1>";

	echo "<TABLE border =1>";
	echo "<TR bgcolor=#E8DECA align =center>";
	echo "<TH>제약사</TH><TH>생산수량</TH><TH>예상 생산일자</TH><TH>총 생산량</TH><TH>예상 총 생산량</TH><TH>수정</TH>";
	echo "</TR>";

	while($row = mysqli_fetch_array($ret)){
		echo "<TR>";
		echo "<TD>", $row['prodplan_pharmaceuticalCom'], "</TD>";
		echo "<TD>", number_format($row['prodVolume']), "</TD>";
		echo "<TD>", $row['targetDate'], "</TD>";
		echo "<TD>", number_format($row['totalVolume']), "</TD>";
		echo "<TD>", number_format($row['expectedVolume']), "</TD>";
		echo "<TD>", "<a href= 'pfizer_prod_info_update.php?prodplan_pharmaceuticalCom=", $row['prodplan_pharmaceuticalCom']. "'>수정</a></TD>";
		echo "</TR>";
	}

	mysqli_close($con);
	echo "</TABLE>";
	
?>

<style>
h3{
font-size:20px;
}


h1 {
  margin: 0.5em 0 1em 0;
font-size:3em;
text-align: center;
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
 
</style>