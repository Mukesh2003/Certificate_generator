<?php
     require_once("connect.php");
     $id=$_POST["fname"];
     if(!$id){
         header('Location:roll.html');
    }
    if(isset($_POST["fname"])){
        $query1=" SELECT * from `tc` where `Roll_Number` = '".$id."' ";
        $queryfire1 = mysqli_query($conn, $query1);
        $num1=mysqli_num_rows($queryfire1); 
        $result1=mysqli_query($conn,$query1); 
        $row1=mysqli_fetch_assoc($result1);
        $query=" SELECT * from samplestudent where RollNumber = '".$id."' ";
        $queryfire = mysqli_query($conn, $query);
        $num=mysqli_num_rows($queryfire); 
        $query2="SELECT `TC` FROM serial";
        $queryfire2 = mysqli_query($conn, $query2);
        $row2=mysqli_fetch_assoc($queryfire2);
        if($num){
            $result=mysqli_query($conn,$query); 
            $row=mysqli_fetch_assoc($result);
        }
        else{
            header('Location: roll.html');  
        }
    }
    else{
        if(isset($_POST['save'])){
            $id=$_POST['admin_no'];
            $course=$_POST['course'];
            $sur_name=$_POST['sur_name'];
            $name=$_POST['name'];
            $father_name=$_POST['father_name'];
            $father_sur_name=$_POST['father_sur_name'];
            $nation=$_POST['nation'];
            $religion=$_POST['religion'];
            $caste=$_POST['caste'];
            $dob=$_POST['dob'];
            //$dob=date_format(date_create_from_format('Y-m-d',$dob1),'d-m-Y');
            $date_adm=$_POST['date_adm'];
            $qualify=$_POST['qualify'];
            $fee_pay=$_POST['fee_pay'];
            $date_left=$_POST['date_left'];
            $remarks=$_POST['remarks'];
            $conduct=$_POST['conduct'];

         

            $query="UPDATE samplestudent SET Course='$course',Student_Name='$name',Student_Sur_Name='$sur_name',Father_Name='$father_name',Father_Sur_Name='$father_sur_name',
Nation='$nation',Religion='$religion',Caste='$caste',Date_of_Birth='$dob',Admission_date='$date_adm',
            Promoted='$qualify',Fee_paid='$fee_pay',Date_college_left='$date_left',
            Remarks='$remarks',Conduct='$conduct' where RollNumber='$id'";
            $query_run=mysqli_query($conn,$query);
        }
    } 
?>

<html>
<head>
<title>jntugv1</title>
<link rel="stylesheet" href="fom.css">

</head>
<body>


<!-- <form id="form1" action="tc_form.php" method = "post"></form> -->
<form action="TC_edit.php" method = "post">
<table class="image" align="center" cellpadding="8" width="75%">
<tr>
<td class="t1">1.</td>
<td>Admission Number</td>
<td>....</td>
<td align="center"><input type="text" name="admin_no" maxlength="1000" value="<?php
        echo $id;
        ?>"/>
</td>
</tr>
<tr>
<td class="t1">2.</td>
<td>Name of the College </td>
<td>....</td>
<td align="center"><input type="text" name="college_name" maxlength="1000" value = "<?php    
       echo  "University College of Engineering,Vizianagaram" ;
    ?>"/>
</td>
</tr>
<tr>
<td class="t1">3.</td>
<td> Student Sur Name</td>
<td>....</td>
<td align="center"><input type="text" name="sur_name" maxlength="1000" value = "<?php    
       echo $row['Student_Sur_Name'];?>"/>
</td>
</tr>
<tr>
<td class="t1">4.</td>
<td> Student Name</td>
<td>....</td>
<td align="center"><input type="text" name="name" maxlength="1000" value = "<?php    
       echo $row['Student_Name'];?>"/>
</td>
</tr>

<tr>
<td >7.</td>
    <td>Nationality</td>
<td>....</td>
    <td align="center"><input type="text" name="nation" maxlength="1000" value = "<?php    
       echo $row['Nation'] ;?>"/>
</td>
</tr>
<tr>
<td >5.</td>
    <td>Sur Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_sur_name" maxlength="1000" value = "<?php    
       echo $row['Father_Sur_Name'];?>"/>
    </td>
    </tr>
<tr>
<td >6.</td>
    <td>Name of the Father/Guardian</td>
<td>....</td>
    <td align="center"><input type="text" name="father_name" maxlength="1000" value = "<?php    
       echo $row['Father_Name'];?>"/>
</td>
</tr>


<tr>
<td >8.</td>
        <td>Religion</td>
         <td>....</td>
        <td align="center">
        <select id="religion" name="religion">
        <option value="<?php echo $row['Religion'] ?>"><?php echo $row['Religion'] ?></option>
        <option value="HINDU">hindu</option>
        <option value="MUSLIM">muslim</option>
</td>
</tr>
<tr>
<td >9.</td>
        <td>Caste</td>
         <td>....</td>

<td align="center">
<select id="caste" name="caste">
<option value="<?php echo $row['Caste'] ?>"><?php echo $row['Caste'] ?></option>
<option value="GENERAL">general</option>
<option value="SC">sc</option>
<option value="BC">bc</option>
<option value="ST">st</option>
</td>
</tr>
<tr>
<td >10.</td>
<td>Date Of Birth (in words)</td>
 <td>....</td>
<td align="center">
<label for="dob"></label>
  <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy" value="<?php 
  echo $row['Date_of_Birth'];
//   $d=date_format(date_create_from_format('Y-m-d',$r),'d-m-Y');      
 ?>"></td>
</tr>
<tr>
<td >11.</td>
    <td>Class studying at time of leaving</td>
<td>....</td>
    
    <td align="center">
<select id="course" name="course">
<option value="<?php echo $row['Course'] ?>"><?php echo $row['Course'] ?></option>
<option value="BTECH">btech</option>
<option value="MTECH">mtech</option>
<option value="MCA">mca</option>
</td>
    
    </tr>

    <tr>
        <td>12.</td>
        <td>Date of admission</td>
<td>....</td>
<td align="center">
  <label for="date_adm"></label>
  <input type="month" id="date_adm" name="date_adm" min="2000-01" max="2023-12" value="<?php echo $row['Admission_date'] ?>">
</td>        
        </tr>
<tr>
<td>13.</td>
<td>Whether promoted or not</td>
<td>....</td>
<td align="center">
<select id="qualify" name="qualify">
<option value="yes">Yes</option>
<option value="No">No</option>
</td>

</td>
</tr>
 

<tr>
<td>14.</td>
    <td> Fee paid or not</td>
<td>....</td>
    <td align="center">
<select id="fee_pay" name="fee_pay">
<option value="yes">Yes</option>
<option value="No">No</option>
</td>
    
    </td>
    </tr>
     

<tr>
<td>15.</td>
<td>Date left the college</td>
<td>....</td>
<td align="center">
<label for="birthday"></label>
  <input type="month" name="date_left" min="2000-01" max="2023-12" value="<?php echo $row['Date_college_left']; ?>" ></td>
</tr>
<td>16.</td>
<td>Conduct and Character</td>
<td>....</td>
<td align="center">
<select id="conduct" name="conduct">
<option value="Satisfactory">Satisfactory</option>
<option value="Good">Good</option>
</td>
</td>
</tr>

<tr>
<td>17.</td>
<td>General Remarks</td>
<td>....</td>
<td align="center">
<select id="remarks" name="remarks">
<option value="-">-</option>
</td>
</td>
</tr>
<tr>
    <td><input id="save" type="submit" value="save" name="save"></td>
</tr>
</form>
<form action="tc_form.php" method = "post">
    
    <tr>
        <td class="t1"></td>
        <td align="center" hidden><input type="text" name="admin_noo" maxlength="1000" value="<?php
        echo $id;
        ?>" />
</td>
</tr>
<tr>
    <td><input id="save" type="submit" value="next" name="save2" ></td>
</tr>
</form>
</table>
</body>
</html>