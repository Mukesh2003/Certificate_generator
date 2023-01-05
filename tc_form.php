<?php
    require_once("connect.php"); 
    $id=$_POST["admin_noo"];
    if(!$id){
        header('Location: roll.html'); 
    }
    if(isset($_POST["admin_noo"])){
    $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        $queryfire1 = mysqli_query($conn, $query1);
        $num1=mysqli_num_rows($queryfire1); 
        $result1=mysqli_query($conn,$query1); 
        $row1=mysqli_fetch_assoc($result1);

        $q1=" SELECT * from `study` where `Roll_Number` = '".$id."' ";
        $qfire1 = mysqli_query($conn, $q1);
        $n1=mysqli_num_rows($qfire1); 
        $r1=mysqli_query($conn,$q1); 
        $row11=mysqli_fetch_assoc($r1);
    
    $query=" SELECT * from samplestudent where RollNumber = '".$id."' ";
    $queryfire = mysqli_query($conn, $query);
    $num=mysqli_num_rows($queryfire); 
    $query2="SELECT `TC` FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    $query3="SELECT `STUDY` FROM serial";
    $queryfire3 = mysqli_query($conn, $query3);
    $row3=mysqli_fetch_assoc($queryfire3);
    if($num){
        $result=mysqli_query($conn,$query); 
        $row=mysqli_fetch_assoc($result);
    }
    else{
        header('Location: roll.html');  
    }
}
else{
    $q1=" SELECT * from `study` where `Roll_Number` = '".$id."' ";
        $qfire1 = mysqli_query($conn, $q1);
        $n1=mysqli_num_rows($qfire1); 
        $r1=mysqli_query($conn,$q1); 
        $row11=mysqli_fetch_assoc($r1);
    $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        $queryfire1 = mysqli_query($conn, $query1);
        $num1=mysqli_num_rows($queryfire1); 
        $result1=mysqli_query($conn,$query1); 
        $row1=mysqli_fetch_assoc($result1);
    $query2="SELECT TC FROM serial";
    $queryfire2 = mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($queryfire2);
    $query3="SELECT `STUDY` FROM serial";
    $queryfire3 = mysqli_query($conn, $query3);
    $row3=mysqli_fetch_assoc($queryfire3);
    if(isset($_POST['print'])){
        $val4=$row2['TC']+1;
        $query4="UPDATE serial SET TC='$val4'";
        $query_run4=mysqli_query($conn,$query4);
        $idd=$_POST['admin_no'];
        $date=$_POST['date'];
        $query5=" SELECT * from `tc` where `Roll_Number` = '".$idd."' ";
        $num5 = mysqli_query($conn, $query5);
        $num6 =mysqli_num_rows($num5); 

        if($num6)
        {
            $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }
        else{
            $query1= "INSERT into `tc`(`Roll_Number`,`Date`) values ('".$idd."','".$date."')";
            $query_run=mysqli_query($conn,$query1);
            $query1= "UPDATE `tc` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$query1);
        }

        $v4=$row3['STUDY']+1;
        $q4="UPDATE serial SET STUDY='$v4'";
        $q_run4=mysqli_query($conn,$q4);
        $i=$_POST['adm_no'];
        $d=$_POST['date'];
        $q5=" SELECT * from `study` where `Roll_Number` = '".$i."' ";
        $n5 = mysqli_query($conn, $q5);
        $n6 =mysqli_num_rows($n5); 

        if($n6)
        {
            $q1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$i."'";
            $q_run=mysqli_query($conn,$q1);
        }
        else{
            $q1= "INSERT into `study`(`Roll_Number`,`Date`) values ('".$i."','".$d."')";
            $query_run=mysqli_query($conn,$q1);
            $q1= "UPDATE `study` SET `dup`='DUPLICATE' WHERE `Roll_Number`='".$idd."'";
            $query_run=mysqli_query($conn,$q1);
        }
    }
}
?> 
<html>
<head>
<!-- <title>jntugv1</title> -->
<link rel="stylesheet" href="fom.css">
<style>
    input[type=text] {
  width: 150;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  /* border-bottom: 2px solid black; */
  text-align: center;

}
.cls{
margin-top:150px;
margin-left:400px;
font-size:15px;
}
*{
 font-family:Calibri;
 }

h2{
    font-family: Calibri; 
    font-size: 26pt;         
    font-style: normal; 
    color:black;
    text-align: center; 
  }
  /* table,th,td{
  border: 1px solid black;
} */

table1{
  border: 1px solid black;
  width:200%;
}
 table2 {
  border: 1px solid black;
}
table3 {
  border: 1px solid black;
}
.sum
{
  font-size:27px;
}
.sum1
{
  font-size:24px;
}
.sum2
{
  font-size:22px;
}
.sum3
{
 font-size:15px;
}
</style>

<script>

 var prFun=function(){
    var pr=document.getElementById("print");
    var sa=document.getElementById("save");
    pr.style.visibility = 'hidden';
    sa.style.visibility = 'hidden';
    window.print();
}
</script>


</head>
 
<body>
<form action="tc_form.php" method = "post">
<!-- <h1><center>----------------------------------------------------------------------</center></h1> -->
<table  align="center" cellpadding="0" width="100%">
<tr>
<tr>
<td>Serial No:<input type="text" name="serial" maxlength="1000" value="<?php 
   echo $row2['TC'];
   ?>">
</td>
<td></td>
<td align="right"> <input type="text"  name="dup" value= "<?php 
      if($num1){
        echo $row1['dup'];
      }
     ?>"></td> 
</tr>
<tr>
<td class="sum" colspan="4" ><center>JAWAHARLAL  NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA</center>
</td>

</tr>
<tr>
<td class="sum1" colspan="4"><center>UNIVERSITY COLLEGE OF ENGINEERING,VIZINAGARAM-535003(AP)</center></td>
</tr>

<tr>
<td width=250 >Adm.No:<input type="text" name="admin_no" value = "<?php    
       echo $id;
    ?>"></td>
    <td width = 180 align="center"> <img src="logo.jpg" alt ="LOGO" height = 140 width = 140></td>
<td width=300 align="center">Date:<input type="text" name="date" value="<?php
  echo "".date("d-m-Y");
?>"></td>
</td>
</tr>
<table>

<table  align="center" cellpadding="0" width="100%">
<tr>
<td class="sum2" colspan="4"><center><b>TRANSFER CERTIFICATE</b></center>
</td>
</tr>
</table>
<table  align="center" cellpadding="0" width="100%">

<tr>
<td class="t1">1.</td>
<td width=300>Name of the College which the pupil is leaving</td>
<td width=10 align="center">....</td>
<td align="left"><input type="text" name="college_name" maxlength="1000" style="width:100%;" value = "<?php    
       echo  "University College of Engineering,Vizianagaram" ;
    ?>"/>
</td>
</tr>
<tr>
<td class="t1">2.</td>
<td> Name of the pupil</td>
<td align="center">....</td>
<td align="center"><input type="text" name="sur_name" maxlength="1000" value = "<?php    
       echo $row['Student_Sur_Name']." ".$row['Student_Name'];?>"></td>
</tr>
<tr>
<td >3.</td>
    <td>Name of the Father/Guardian</td>
<td align="center">....</td>
    <td align="center"><input type="text" name="father_sur_name" maxlength="1000" width ="100" value = "<?php    
       echo $row['Father_Sur_Name']." ".$row['Father_Name'];?>"></td>
    </tr>
    <tr>
        <td >4.</td>
        <td>Nationality,Religion,Caste</td>
         <td>....</td><td align="center">
        <input type="text" name="religion" maxlength="1000" style="width:100%;" value = "<?php    
        echo $row['Nation'].",".$row['Religion'].",".$row['Caste'];
    ?>"/>
        </td>
        </tr>
<tr>
<td >5.</td>
<td>Date Of Birth as entered in the adimission register(in words)</td>
 <td align="center">....</td>
 <td align="left"><input type="text" name="dob" maxlength=1000 style="width:100%;" value = "<?php  
          $r=$row['Date_of_Birth']; 
            $d=date_format(date_create_from_format('Y-m-d',$r),'d-m-Y');     
            echo $d;
       
 ?>"></td></tr>
 <tr>
<td></td>
<td></td>
<td></td>
<td align="left"><input type="text" name="dob" maxlength=1000 style="width:100%;" value = "<?php  
       
       $k=$row['Date_of_Birth'];
$x=date($k);
$y=date('Y',strtotime($x));
$m=date('F',strtotime($x));
$d=date('d',strtotime($x));
function convert(int $num){
    $digit=array(
        0=>"zero",
        1=>"one",
        2=>"two",
        3=>"three",
        4=>"four",
        5=>"five",
        6=>"six",
        7=>"seven",
        8=>"eight",
        9=>"nine"
        );
    $str=null;
    while($num>0){
        $r=$num%10;
        $x=$digit[$r];
        $str=$x.' '.$str;
        $num=floor($num/10);
        }
        return $str;
}
$date=null;
$p=convert($y);
$n=convert($d);
$date=$n.' '.$m.' '.$p;
echo $date;

    ?>"></td>
</tr>
<tr>
<td >6.</td>
    <td>Class in which the pupil was studying at the time of leaving</td>
<td align="center">....</td>
    <td align="left"><input type="text" name="course" maxlength="1000"  style="width:100%;" value = "<?php    
       echo $row['Course'];
    ?>"/>
    
    </td>
    </tr>

    <tr>
        <td>7.</td>
        <td>Date of admission</td>
<td align="center">....</td>
        <td align="left"><input type="text" name="date_adm" maxlength="1000" style="width:100%;" value = "<?php    
         echo date('F-Y', strtotime($row['Admission_date']));
    ?>"/>
        
        </td>
        </tr>
             

<tr>
<td width=10>8.</td>
<td>Whether qualified for promotion to a higher class</td>
<td align="center">....</td>
<td align="left"><input type="text" name="qualify" maxlength="1000" style="width:100%;" value = "<?php    
       echo $row['Promoted'];
    ?>"/>

</td>
</tr>
 

<tr>
<td>9.</td>
    <td> Whether the pupil has paid all the fees due to the college</td>
<td align="center">....</td>
    <td align="left"><input type="text" name="fee_pay" maxlength="1000" style="width:100%;"
    value = "<?php    
       echo $row['Fee_paid'];
    ?>"/>
    
    </td>
    </tr>
     

<tr>
<td>10.</td>
<td>Date on which pupil actually left the college</td>
<td align="center">....</td>
<td align="left"><input type="text" name="date_left" maxlength="1000" style="width:100%;"
value = "<?php    
       echo date('F-Y', strtotime($row['Date_college_left']));
    ?>"/>
</td>
</tr>
 



 

<tr>
<td>11.</td>
    <td>Date on which appilication for Transfer Certificate was made
        <br> on behalf the pupil by his/her parent or Guardian </td>
<td align="center">....</td>
    <td align="left"><input type="text" name="date_made" maxlength="1000" style="width:100%;"
    value = "<?php    
        echo "".date("d-m-Y");
    ?>"/></td>
    </tr>
 
<tr>
<td>12.</td>
<td>Counduct and Character</td>
<td align="center">....</td>
<td align="left"><input type="text" name="conduct" maxlength="1000" style="width:100%;"
value = "<?php    
       echo $row['Conduct'];
    ?>"/>
</td>
</tr>

<tr>
<td>13.</td>
<td>General Remarks</td>
<td align="center">....</td>
<td align="left"><input type="text" name="remarks" maxlength="1000" style="width:100%;"
value = "<?php    
       echo $row['Remarks'];
    ?>"/>
</td>
</tr>

</table>
<div class="cls">
<center>
PRINCIPAL<br>
UNIVERSITY COLLEGE OF ENGINEERING<br>
JNTUK VIZIANAGARAM CAMPUS
</center>
<!-- <tr>
    <td><input id="save" type="submit" value="save" name="save"></td>
    <td><input id="print" type="submit" value="print" name="print" onclick = "prFun()">  </td>
</tr> -->
    </div>
</body>
</html>

<html>
<head>
<!-- <style>
input[type=text] {
  width: auto;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
  text-align: center;

}
.a{
input[type=text] {
  width: auto;
  padding: 0.5px 0.5px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid black;
  text-align: left;
}
}
#sum{
font-size:21px;
}
#sum1{
font-size:17px;
}
#s1{
font-size:14px;
}
#s2{
font-size:18px;
}
#s3{
font-size:18px;
}
#sum3{
font-size:22px;
}
#sum4{
font-size:60px;
}
.sum5{
margin:30px;
margin-left:400px;
}
.sum6{
margin:30px;
margin-left:450px;
margin-right:410px;
font-size:17px;
}
.sum7{
margin-left:410px;
}
.sum8
{
font-size:30px;;
}

.noout:  {
    outline: none;
    border:none;
    background-color: transparent;
    resize:none;
}
</style> -->

<!-- <script>

var prFun=function(){

    var pr=document.getElementById("print");
    var sa=document.getElementById("save");
    pr.style.visibility = 'hidden';
    sa.style.visibility = 'hidden';
    window.print();
}
</script>
 -->

</head>
<body>
<!-- <h1><center>--------------------------------------------------------------------</center></h1> -->
<table  align="center" cellpadding="0" width="95%">
    <!-- <tr>
        <td width = 700 align = left><label>Serial.No :</label><input type="text" value=" <?php 
   echo $row3['STUDY'];
   ?>"> </font></td>
<td align="right"> <input type="text"  name="dup" value= "<?php 
      if($n1){
        echo $row11['dup'];
      }
     ?>"></td>    
</tr>
</table>
<center>
<b>
<div id="sum3">JAWAHARLAL NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA <br></div>
</b>
<div id="sum">UNIVERSITY COLLEGE OF ENGINEERING, VIZIANAGARAM - 535003(A.P.)</div>
</center>
<center>
<table>
<tr>
<td width =300> <font size = "3"><label>Adm.No :</label><input type = "text"   name = "adm_no"  value = "<?php    
       echo $id;
    ?>"> </font> </td>
<td width = 180 align="center"> <img src="logo.jpg" alt ="LOGO" height = 120 width = 120></td>
<td> <font size = "3"><label>Date:</label><input type = text name = "date"  value = "<?php    
       echo "".date("d-m-Y");?>"> </font> <br></br></td>
 
     

    
</tr>
</table> -->
<!-- <table  align="center" cellpadding="0" width="95%">
    <tr>
<td align="center">STUDY & CONDUCT CERTIFICATE</td>
    </tr>
    </table> -->
    <table  align="center" cellpadding="0" width="100%">
<tr>
<tr>
<td>Serial No:<input type="text" name="serial" maxlength="1000" value="<?php 
   echo $row2['TC'];
   ?>">
</td>
<td></td>
<td align="right"> <input type="text"  name="dup" value= "<?php 
      if($num1){
        echo $row1['dup'];
      }
     ?>"></td> 
</tr>
<tr>
<td class="sum" colspan="4" ><center>JAWAHARLAL  NEHRU TECHNOLOGICAL UNIVERSITY KAKINADA</center>
</td>

</tr>
<tr>
<td class="sum1" colspan="4"><center>UNIVERSITY COLLEGE OF ENGINEERING,VIZINAGARAM-535003(AP)</center></td>
</tr>

<tr>
<td width=250 >Adm.No:<input type="text" name="admin_no" value = "<?php    
       echo $id;
    ?>"></td>
    <td width = 180 align="center"> <img src="logo.jpg" alt ="LOGO" height = 80 width = 80></td>
<td width=300 align="center">Date:<input type="text" name="date" value="<?php
  echo "".date("d-m-Y");
?>"></td>
</td>
</tr>
<table>

<table  align="center" cellpadding="0" width="100%">
<tr>
<td class="sum2" colspan="4"><center><b>STUDY & CONDUCT CERTIFICATE</b></center>
</td>
</tr>
</table>
</center>
</div>
<center>
<table  align="center" cellpadding="0" width="100%">
<tr>
<td width = 650px align ="center">
<label align="center">This is to certify that Mr./Ms. </label> <input type = text  size="10" name = "stu_sur_name" value = "<?php    
       echo $row['Student_Sur_Name']." ".$row['Student_Name'];?>">
    
<!-- </td></tr>
<tr><td align="left"> -->
    <label>S/o,D/o </label><input type = text size="22" name ="father_sur_name" value = "<?php    
       echo $row['Father_Sur_Name']." ".$row['Father_Name'];?>">
   </td></tr>
<tr><td align="left">    
       <label>has studied in the institution in the </label>
 <!-- </td></tr><tr><td> -->
 <input type = text size="22" name ="inst" value = "<?php    
       echo $row['Course'];
    ?>" width=20><label>course from </label> 
    <input type = text size="15" name = "course_from" value = "<?php    
    echo date('F-Y', strtotime($row['Admission_date']));
 ?>">
   </td></tr><tr><td align="left">
<label>to</label><input type = text size="15" name = "course_to" value = "<?php    
       echo date('F-Y', strtotime($row['Date_college_left']));
    ?>" ></td></tr><tr><td align="center"></div><br>

<label><center>During his/her stay at this college his/her conduct and character were found</center>
</label>
    </td></tr>
    <tr><td align="left">
<label align="left"> to be<input type = text size="15" name="conduct" value = "<?php    
       echo $row['Conduct'];
    ?>"></label></br>
</td>
</tr>
</table>
</center>
<br><br><br>
<div class="cls">
<center>
PRINCIPAL<br>
<align="left">UNIVERSITY COLLEGE OF ENGINEERING<br>
JNTUK VIZIANAGARAM CAMPUS
</center>
    </div>
<center>
<tr>
    <td><input id="save" type="submit" value="save" name="save"></td>
    <td><input id="print" type="submit" value="print" name="print" onclick = "prFun()">  </td>
</tr>
</center>
</form>
</body>
</html>