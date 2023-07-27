<?php 
     $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");

     $sql ="SELECT p.name AS name, p.`Resident registration number` AS Rrn, p.addr AS addr, p.mobile AS mobile, pat.`COVID-19 confirmed` AS coronapeople, n.Nation_Name AS nat FROM systemdb.`people tbl` AS p LEFT JOIN systemdb.`patient tbl` AS pat ON p.`Resident registration number`=pat.`Resident registration number` LEFT JOIN systemdb.nation AS n ON n.Nation_ID=p.Nation_Nation_ID";
 
     $ret = mysqli_query($con, $sql);
     if($ret) {
         $count = mysqli_num_rows($ret);
      }
     else {
          echo "people 데이터 조회 실패!!!","<br>";
          echo "실패 원인 :".mysqli_error($con);
          exit(); 
       }
echo"<br>";
echo"<br>";
 echo "<br> <h3> <a href='government.php'> <-- 정부 사이트로 이동</a> </h3> ";
     echo "<h1> <center> 국민 정보 조회 결과 </center></h1>";

echo"<br>";
echo"<br>";
echo"<br>";
     echo "<Center><TABLE></center>";
     echo "<TR bgcolor=#E8DECA align =center>";
     echo "<TH>이름</TH><TH>주민등록번호</TH><TH>국적</TH><TH>지역</TH><TH>전화번호</TH><TH>코로나 확진여부</TH><TH>수정</TH>";
     echo "</TR>";
     while($row = mysqli_fetch_array($ret)) {
            echo "<TR>";
            echo "<TH>", $row['name'], "</TH>";
            echo "<TH>", $row['Rrn'], "</TH>";
            echo "<TH>", $row['nat'], "</TH>";
            echo "<TH>", $row['addr'], "</TH>";
            echo "<TH>", $row['mobile'], "</TH>";
            echo "<TH align=center>", $row['coronapeople'], "</TH>";
            echo "<TH>", "<a href='editpeople.php?Resident registration number=", $row['Rrn'], "'>수정</a></TH>";
            echo "</TR>";
     }
     mysqli_close($con);
     echo "</TABLE>";
    

?>

<style>
    



h1{
font-size:35px;
padding: 0.5em 3em;
    background: #E8E8E8;
    border-left: 0.28em solid #7C7567;
width:100%
text-align:center;
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