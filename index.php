<!DOCTYPE html> 
<html lang="en">
<head>
	<title>Analyzer</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="background">
	<div class="navbar">
		<ul>
			<li><img src="https://bucket.mlcdn.com/a/1192/1192164/images/c9b0cfe3970c4a7ab4c0b3ac6ce5f57a0b55117b.png" class="logo"></li> 
			<!--Continuous improvement-->
  			<!--  <div class="dropdown"><li class="dropdown"><button class="dropbutton" onclick="contImp()">Continuous Improvement</button> -->
  			<!--dropdown for continuous improvement
  			<div class="dropdown-content" id="cont-imp">
  				<form>
  					<p class="text" align="center"> Select batch to view their performance till date</p>
  					<select name="batch" align="center" class="dropdown-box">
                	<option class="dropdown-option"> --Select Batch-- </option>
                	<option value="14" class="dropdown-option"> 2014-2018 </option>
                	<option value="15" class="dropdown-option"> 2015-2019 </option>
                	<option value="16" class="dropdown-option"> 2016-2020 </option>
                	<option value="17" class="dropdown-option"> 2017-2021 </option> 
              		</select>
              		<p><input type="submit" name="batch" value="View" class="button"></p>
  				</form>
  			</div></li></div> -->
  				<?php
  				session_start();
  				if(!isset($_SESSION['admin-name']))
  				{
  					echo '<div class="dropdown" style="float: right;"><li class="dropdown"><button class="dropbutton" onclick="LogIn()"><i class="fa fa-user" aria-hidden="true"></i>  Admin Login</button>
  				<!--dropdown for login-->
  			<div class="dropdown-content" id="login">
  				<form class="login-form" style="width: 100%" method="post" action="login.php">
  					<p><input type="text" name="admin-name" placeholder="Enter Username" id="username-box" class="input-box" required></p>
  					<p><input type="password" name="admin-pass" placeholder="Enter Password" id="password-box" class="input-box" required></p>
  					<p class="text" align="left" style="color: white;"><input type="checkbox" onclick="showPassword()"> Show Password</p>
              		<p><input type="submit" name="loginbutton" value="Log In" class="button"></p>
  				</form>
  			</div></li></div>';
  				}

  				else
  				{
  					echo ' <li><a href="admin.php">Dashboard</a></li>
             <li style="float: right;"><form action="login.php" method="post">
  					<input type="submit" name="logout" value="Logout" class="logout">
  				</form></li>';
  				}
  				?>

  				
		</ul>
	</div>

	<!--main-->
	<div class="main">
		<form>
			<div class="acad-year" style="padding: 5px;"><p class="text">Academic Year 
				<select name="academic_year" class="dropdown-box" >
 					<option> --Select Academic Year-- </option>
 					<option value="2016-2017"> 2016-2017 </option>
 					<option value="2015-2016"> 2015-2016 </option>
 					<option value="2014-2015"> 2014-2015 </option> </select>
			</p> </div>

		<div class="year" style="padding: 5px;"><p class="text"> Year 
				<select name="year" id="year-dropdown" class="dropdown-box">
 					<option> --Select Year-- </option>
 					<option value="fe"> First Year (F.E.) </option>
 					<option value="se"> Second Year (S.E.) </option>
 					<option value="te"> Third Year (T.E.) </option>
 					<option value="be"> Final Year (B.E.) </option>
 				</select> </p> </div>


 		<div class="semester" style="padding: 5px;"><p class="text"> Semester 
 			<select name="sem"  onchange="javascript:selectSem();" id="sem-dropdown" class="dropdown-box">
 				<option> --Select Semester-- </option>
 				<option value="odd"> Odd </option>
 				<option value="even"> Even </option>
 				<option value="yearly"> Yearly </option> 
 			</select> </p> </div>

 		<div class="radio-option" id="hidethis" style="padding: 10px;">  
 			<div class="radioopt"><input type="radio" name="option" onclick="javascript:hideall();" value="overall" id="overall-option" /><font class="text"> All Subjects</font> </div>
 			<div class="radioopt"><input type="radio" name="option" value="subject" onclick="javascript:subjectSem();" id="subject-option" /><font class="text"> Subject Result </font></div>
 		</p>
 		</div>

 		<!--subject dropdowns-->
 	<div id="sub1" class="dd" style="padding: 5px;">    <p class="text"> Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="101"> USHC101 Applied Mathematics – I </option>
    <option value="102"> USHC102 Applied Physics – I </option>
    <option value="103"> USHC103 Applied Chemistry – I </option>
    <option value="104"> USHC104 Engineering Graphics </option>
    <option value="105"> USHC105 Basic Electrical and Electronics Engineering </option> 
    <option value="106"> USHC106 Communicaton Skills </option> </select> </p></div>
    

    <div id="sub2" class="dd" style="padding: 5px;">    <p class="text">Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="201"> USHC201 Applied Mathematics – II </option>
    <option value="202"> USHC202 Applied Physics – II </option>
    <option value="203"> USHC203 Applied Chemistry – II </option>
    <option value="107"> USHC107 Engineering Mechanics </option>
    <option value="108"> USHC108 Fundamentals of Computer Programming </option> 
    <option value="109"> USHC109 Environmental Studies </option> </select> </p> </div>


 		<div id="sub3" class="dd" style="padding: 5px;"><p class="text">	  Subject <select name="subject" class="dropdown-box">
 		<option> --Select Subject-- </option>
 		<option value="301"> UCEC301 Applied Mathematics – III </option>
 		<option value="302"> UCEC302 Object Oriented Programming Methodology </option>
 		<option value="303"> UCEC303 Data Structure </option>
    <option value="304"> UCEC304 Computer Organization and Architecture </option>
    <option value="305"> UCEC305 Discrete Structure and Graph Theory </option> </select></p> </div>

    <div id="sub4" class="dd" style="padding: 5px;"><p class="text">   Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="401"> UCEC401 Applied Mathematics – IV </option>
    <option value="402"> UCEC402 Microprocessor </option>
    <option value="403"> UCEC403 Analysis of Algorithm </option>
    <option value="404"> UCEC404 Relational Database Management Systems </option>
    <option value="405"> UCEC405 Digital Communication and Network </option> </select></p> </div>

    <div id="sub5" class="dd" style="padding: 5px;"> <p class="text">  Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="501"> UCEC501 Operating Systems </option>
    <option value="502"> UCEC502 Data Networks </option>
    <option value="503"> UCEC503 Theory of Computer Science </option>
    <option value="504"> UCEC504 Advanced Database Management System </option>
    <option value="505"> UCEC505 Software Engineering </option></select></p> </div>

    <div id="sub6" class="dd" style="padding: 5px;">  <p class="text"> Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="601"> UCEC601 Artificial Intelligence </option>
    <option value="602"> UCEC602 System Programming and Compiler Construction </option>
    <option value="603"> UCEC603 Digital Signal and Image Processing </option>
    <option value="604"> UCEC604 Mobile Cellular and Ad Hoc Networks </option>
    <option value="605"> UCEC605 Professional Communication Skills </option> </select></p> </div>

    <div id="sub7" class="dd" style="padding: 5px;"> <p class="text">  Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="701"> UCEC701 Digital Signal Processing </option>
    <option value="702"> UCEC702 Cryptography and System Security </option>
    <option value="703"> UCEC703 Artificial Intelligence </option> </select> </p></div>

    <div id="sub8" class="dd" style="padding: 5px;"> <p class="text">  Subject <select name="subject" class="dropdown-box">
    <option> --Select Subject-- </option>
    <option value="801"> UCEC801 Data Warehouse and Mining </option>
    <option value="802"> UCEC802 Human Machine Interaction </option>
    <option value="803"> UCEC803 Parallel and Distributed Systems </option> </select></p> </div> 
    <!--view button-->
 		<p style="padding: 5px;"> <input type="submit" value="View Result" class="button"/> </p>
		</form>
	</div>
<script src="indexpage.js" type="text/javascript"></script>    
</body>
</html>
