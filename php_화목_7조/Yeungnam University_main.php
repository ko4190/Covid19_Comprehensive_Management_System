<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
</HEAD>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
</HEAD>
  <BODY  style="background-color:white;">



<font size="6em">

<center><h1> 영남대학교 병원 </h1></center>
</font>

<a href='Yeungnam University_info.php'> (1) 병원 정보 조회 (조회 후 수정가능) </a> <br><br>

<a href='patient_YH.php'>               (2) 환자 관리 시스템             </a> <br><br>










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