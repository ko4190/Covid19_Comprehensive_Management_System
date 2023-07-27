<HTML>
<HEAD>
<META http-equiv="content-Type" content="text/html; charset=utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
</HEAD>
  <BODY  style="background-color:white;">

<div id="sform">
<FORM METHOD="get" ACTION="editpeople.php"><strong>국민 정보 수정(주민등록번호 입력):</strong> <INPUT TYPE ="text" NAME="Resident_registration_number" size=30 style="width:300px; height:30px;">
      <INPUT TYPE="submit" VALUE="Modify">



</div>

<center><img src="./a.png" width="200"  style="vertical-align:middle;" ></center> 




<font size="6em">

<center><h1>COVID-19 Total Systems Management </h1></center>
</font>



<nav role="navigation">
  <ul id="main-menu">

   

    <li><a href='government.php'><strong>Home</strong></a></li>
    <li><a href="#"><strong>Hospital</strong></a>
      <ul id="sub-menu">
        <li><a href='Yeungnam University_main.html' aria-label="subemnu"><center><strong>Yeungnam</strong></center></a></li>
        <li><a href='Kyungpook University_main.html' aria-label="subemnu"><center><strong>Kyungpook</strong></center></a></li>
        <li><a href='Daegu_main.html' aria-label="subemnu"><center><strong>Daegu</strong></center></a></li>
        
      </ul>
    </li>
    <li><a href="#"><strong>Pharmaceutical company</strong></a>
      <ul id="sub-menu">
        <li><a href='moderna_main.html' aria-label="subemnu"><center><strong>Moderna</strong></center></a></li>
        <li><a href='Pfizer_main.html' aria-label="subemnu"><center><strong>Pfizer</strong></center></a></li>
        
      </ul>
    </li>

 <li><a href="#"><strong>Information</strong></a>
      <ul id="sub-menu">
        <li><a href='peopleinformation.php' aria-label="subemnu"><center><strong>Overall view</strong></center></a></li>
<li><a href='people_info_name.php' aria-label="subemnu"><center><strong>Name Inquiry</strong></center></a></li>
<li><a href='people_info_resident.php' aria-label="subemnu"><center><strong>Rrn Inquiry</strong></center></a></li>
<li><a href='people_info_mobile.php' aria-label="subemnu"><center><strong>Mobile Inquiry</strong></center></a></li>
        
        

        
      </ul>
    </li>

    
    
  </ul>
</nav>


<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");
   $sql ="SELECT DISTINCT g.`vaccine tbl_pharmaceuticalCom` AS Pharmacy, v.vaccineHoldings AS VaccineInventoryStatus FROM systemdb.government AS g LEFT JOIN systemdb.`vaccine tbl` AS v ON g.`vaccine tbl_pharmaceuticalCom`=v.pharmaceuticalCom";
   $ret = mysqli_query($con, $sql);

   
   if($ret) {
       $count = mysqli_num_rows($ret);
   }
   else {
       echo "제약사 정보 조회 실패!!","<br>";
       echo "실패 원인 :".mysqli_error($con);
       exit();
   }
   
   echo "<br>";


   
   echo "<center><h3>제약사 별 보유량</h3></center>";
   
   echo "<TABLE>";
   echo "<TR bgcolor=#E8DECA align =center>";
   echo "<TH>제약사</TH><TH>보유량</TH>";
   echo "</TR>";
   while($row=mysqli_fetch_array($ret)) {
      echo "<TR >";
      echo "<TH>", $row['Pharmacy'], "</TH>";
      echo "<TH>", number_format($row['VaccineInventoryStatus']), "</TH>";
      echo "</TR>";
   }
   

   mysqli_close($con);
   echo "</TABLE>";

?>
 


<?php
   $con=mysqli_connect("localhost", "root", "1234", "systemdb") or die("MySQL 접속 실패!!");

   $sql ="SELECT sum(h.`Number of hospitalized patient`)/sum(h.`Number of hospital bed`)*100 AS bedpercent, sum(h.`Number of hospital bed`) AS bednum, sum(h.`Number of hospital bed`)-sum(h.`Number of hospitalized patient`) AS possiblebed FROM systemdb.government AS g, systemdb.`hospital tbl` AS h WHERE g.`hospital tbl_Hospital Name`=h.`Hospital Name` AND g.`vaccine tbl_pharmaceuticalCom`='Pfizer'";
   $ret = mysqli_query($con, $sql);
   $ee ="SELECT sum(h.`Number of COVID-19 confirmed patient`) AS occurrenceTotal, sum(h.`Number of 1st vaccinated patient`)/sum(h.`Number of COVID-19 confirmed patient`)*100 AS vaccinationStatus1 , sum(h.`Number of 2nd vaccinated patient`)/sum(h.`Number of COVID-19 confirmed patient`)*100 AS vaccinationStatus2, sum(h.`Number of dead patient`) AS DeadNum, sum(h.`Number of hospitalized patient`) AS hospitalNum FROM systemdb.government AS g, systemdb.`hospital tbl` AS h WHERE g.`hospital tbl_Hospital Name`=h.`Hospital Name` AND g.`vaccine tbl_pharmaceuticalCom`='Pfizer'";
   $zz = mysqli_query($con, $ee);
   $row=mysqli_fetch_array($ret);
   
   if($ret) {
       $count = mysqli_num_rows($ret);
   }
   else {
       echo "병원 정보 조회 실패!!","<br>";
       echo "실패 원인 :".mysqli_error($con);
       exit();
   }
   echo "<br>";
   
   echo "<center><h3> 발생 현황 및 접종률 </h3></center>";
   echo "<TABLE >";
   echo "<TR  bgcolor=#E8DECA align =center>";
   echo "<TH>총 확진자</TH><TH>입원</TH><TH>사망</TH><TH>1차 접종률</TH><TH>2차 접종률</TH>";
   echo "</TR>";

     while($rows=mysqli_fetch_array($zz)) {
    echo "<TR align=center>";
    echo "<TH>", $rows['occurrenceTotal'] ,"</TH>";
    echo "<TH>", $rows['hospitalNum'], "</TH>";
    echo "<TH>", $rows['DeadNum'], "</TH>";
    echo "<TH>", $rows['vaccinationStatus1'], "%</TH>";
    echo "<TH>", $rows['vaccinationStatus2'], "%</TH>";
    echo "</TR>";
   }

  

   echo "</TABLE>";
   echo "<br>";

   echo "<center><h3> 병상 현황 </h3></center>";
   echo "<TABLE>";
   echo "<TR bgcolor=#E8DECA>";
   echo "<TH>가동률</TH><TH>보유병상</TH><TH>가용병상</TH>";
   echo "</TR>";
   echo "<TR>";
   echo "<TH>", $row['bedpercent'], "%</TH>";
   echo "<TH>", $row['bednum'], "</TH>";
   echo "<TH>", $row['possiblebed'], "</TH>";
   echo "</TR>";
   

   mysqli_close($con);
   echo "</TABLE>";
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