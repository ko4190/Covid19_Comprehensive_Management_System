<?php
	$con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속실패 !!");

	$sql = "SELECT * FROM `systemdb`.`purchasing tbl` WHERE `purchasing tbl`.`purchasing_pharmaceuticalCom` = 'Moderna'";

	$ret = mysqli_query($con, $sql);
	if($ret) {
		$count = mysqli_num_rows($ret);
	}
	else {
		echo "vaccine tbl 데이터 조회 실패!!"."<br>";
		echo "실패원인 :".mysqli_error($con);
		exit();
	}

	echo "<br><h3> <a href='moderna_purchase_info_insert.html'> 구매내역 신규등록</a></h3>";
	echo "<h3> <a href='moderna_main.html'> <--초기화면</a></h3> ";

	echo "<h1> 모더나 백신 구매내역 조회 결과 </h1>";

	echo "<TABLE border=1>";
	echo "<TR bgcolor=#E8DECA align =center>";
	echo "<TH>제약사</TH><TH>구매수량(0개는 주문취소)</TH><TH>구매날짜</TH><TH>구매기관</TH><TH>주문번호</TH><TH>수정</TH><TH>삭제</TH>";
	echo "</TR>";
	
	while($row = mysqli_fetch_array($ret)) {
		echo "<TR>";
		echo "<TD>", $row['purchasing_pharmaceuticalCom'], "</TD>";
		echo "<TD>", number_format($row['purchaseVolume']), "</TD>";
		echo "<TD>", $row['purchasingDate'], "</TD>";
		echo "<TD>", $row['hospitalName'], "</TD>";
		echo "<TD>", $row['orderNumber'], "</TD>";
		echo "<TD>", "<a href= 'moderna_purchase_info_update.php?orderNumber=", $row['orderNumber']. "'>수정</a></TD>";
		echo "<TD>", "<a href= 'moderna_purchase_info_delete.php?orderNumber=", $row['orderNumber']. "'>삭제</a></TD>";
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