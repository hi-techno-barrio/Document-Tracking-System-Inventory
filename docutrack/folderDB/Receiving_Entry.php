<?php
error_reporting(0);
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];


//--------------Add data-----------------	
if(isset($_POST['btn_sub'])){
				$Date_Received = $_POST['Date_Received_txt'];
				$Control_No = $_POST['Control_No_txt'];
				$From_Unit = $_POST['From_Unit_txt'];
				$College_Dept = $_POST['College_Dept_txt'];
				$Last_Name = $_POST['Last_Name_txt'];
				$First_Name = $_POST['First_Name_txt'];
				$Subject = $_POST['Subject_txt'];
				$Action = $_POST['Action_txt'];
				$Remarks = $_POST['Remarks_txt'];
				$Date_Released = $_POST['Date_Released_txt'];
				$Tobe = $_POST['To_txt'];
				$Notes = $_POST['Notes_txt'];
				$Care_off_by = $_POST['Care_off_by_txt'];	
$sql_ins=mysqli_query($conn,"INSERT INTO incomingtbl 
						VALUES(
						NULL,						
						'$Date_Received',
						'$Control_No' ,
						'$From_Unit',
						'$College_Dept',
						'$Last_Name',
						'$First_Name',
						'$Subject',
						'$Action',
						'$Remarks',
						'$Date_Released',
						'$Tobe',
						'$Notes',
						'$Care_off_by'
						)
					");		
			if($sql_ins==true)
				echo "<fz>Profile stored successfully</fz>";
			else
				echo "<ft>Invalid Customer ID</ft>";
				
}
//------------------update data----------
if(isset($_POST['btn_upd'])){
					$Date_Received = $_POST['Date_Received_txt'];
					$Control_No = $_POST['Control_No_txt'];
					$From_Unit = $_POST['From_Unit_txt'];
					$College_Dept = $_POST['College_Dept_txt'];
					$Last_Name = $_POST['Last_Name_txt'];
					$First_Name = $_POST['First_Name_txt'];
					$Subject = $_POST['Subject_txt'];
					$Action = $_POST['Action_txt'];
					$Remarks = $_POST['Remarks_txt'];
					$Date_Released = $_POST['Date_Released_txt'];
					$Tobe = $_POST['To_txt'];
					$Notes = $_POST['Notes_txt'];
					$Care_off_by = $_POST['Care_off_by_txt'];
					
$sql_update= mysqli_query($conn," UPDATE incomingtbl SET  
                    Date_Received = '$Date_Received',
                    Control_No = '$Control_No',
					From_Unit = '$From_Unit', 
				    College_Dept = '$College_Dept', 
					Last_Name = '$Last_Name', 
					First_Name = '$First_Name',
					Subject = '$Subject', 
					Action = '$Action', 
					Remarks = '$Remarks', 
					Date_Released = '$Date_Released',
					Tobe = '$Tobe',
					Notes = '$Notes',
					Care_off_by = '$Care_off_by'
			      WHERE
				        incomingtbl_id=$id 
				  ");
			 if($sql_update==true)
				{
					
					header("location:?tag=view_package&update=done");
					
					echo "<fz>Profile stored successfully</fz>";
				}
				else{
					echo "<ft>Update Failed</ft>";
				}
  
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />

<title>::.Document Tracking.::</title>
</head>
<body>

<style>
ft{
	color: red;
}
fz{
	color: green;
}
</style>

<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($conn,"SELECT * FROM incomingtbl WHERE incomingtbl_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	//list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        Documents Update </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_incoming"><input type="button" name="btn_view" title="View Documents" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 
<div id="style_informations">
	<form method="post" >
    	<div>
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td>Date Received:</td>
						<td>
							<input type="text" name="Date_Received_txt" id="textbox" value="<?php echo $rs_upd['Date_Received'];?>"/>
						</td>
					</tr>
					
					<tr>
						<td>Control Number:</td>
						<td>
							<input type="text" name="Control_No_txt" id="textbox" value="<?php echo $rs_upd['Control_No'];?>"/>
						</td>
					</tr>
					  <tr>
						<td>From Unit:</td>
						<td>
							<input type="text" name="From_Unit_txt" id="textbox" value="<?php echo $rs_upd['From_Unit'];?>"/>
						</td>
					</tr>
					<tr>
						<td>College Department:</td>
						<td>
							<input type="text" name="College_Dept_txt" id="textbox" value="<?php echo $rs_upd['College_Dept'];?>"/>
						</td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td>
							<input type="text" name="Last_Name_txt" id="textbox" value="<?php echo $rs_upd['Last_Name'];?>"/>
						</td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td>
							<input type="text" name="First_Name_txt" id="textbox" value="<?php echo $rs_upd['First_Name'];?>"/>
						</td>
					</tr>
					<tr>
						<td>Subject:</td>
						<td>
							<textarea name="Subject_txt" cols="26" rows="5"><?php echo $rs_upd['Subject'];?></textarea>
						</td>
					</tr>
					
					<tr>
						<td colspan="2">
							<input type="reset" value="Cancel" id="button-in"/>
							<input type="submit" name="btn_upd" value="Update" id="button-in"  />
						</td>
					</tr>
				</table>
		   </div>
 
	        <div>
			<table border="0" cellpadding="4" cellspacing="0">
        	
            <tr>
            	<td>Action:</td>
            	<td>
                	<input type="text" name="Action_txt" id="textbox" value="<?php echo $rs_upd['Action'];?>"/>
                </td>
            </tr>
           <tr>
            	<td>Date Released:</td>
                <td>
                	<input type="text" name="Date_Released_txt" id="textbox" value="<?php echo $rs_upd['Date_Released'];?> "/>
                </td>
            </tr>
            <tr>
            	<td>To:</td>
                <td>
                	<input type="text" name="To_txt"  id="textbox" value="<?php echo $rs_upd['Tobe'];?> "/>
                </td>
            </tr>
			<tr>
            	<td>Notes:</td>
                <td>
                	<input type="text" name="Notes_txt"  id="textbox" value="<?php echo $rs_upd['Notes'];?> "/>
                </td>
            </tr>
            <tr>
            	<td>Care Off By:</td>
            	<td>
                	<input type="text" name="Care_off_by_txt" id="textbox" value="<?php echo $rs_upd['Care_off_by'];?>" />
                </td>
            </tr>
            <tr>
            	<td>Remarks:</td>
                <td>
                	<textarea name="Remarks_txt" cols="26" rows="5"><?php echo $rs_upd['Remarks'];?></textarea>
                </td>
            </tr>
    	</table>
    	
            </div>
    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">
        Document Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_incoming"><input type="button" name="btn_view" title="View Documets" value="View Documents" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post" >
       <div>
			  <table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td>Date Received:</td>
						<td>
							<input type="date"  name="Date_Received_txt" id="textbox" required="required"/>
						</td>
					</tr>
					
					<tr>
						<td>Control Number:</td>
						<td>
							<input type="text" name="Control_No_txt" id="textbox" required="required"/>
						</td>
					</tr>
					<tr>
						<td>From Unit:</td>
						<td>
							<input type="text" name="From_Unit_txt" id="textbox" required="required"/>
						</td>
					</tr>
					<tr>
						<td>College Department:</td>
						<td>
							<input type="text" name="College_Dept_txt" id="textbox" id="textbox" required="required"/>
						</td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td>
							<input type="text" name="Last_Name_txt" id="textbox" required="required"/>
						</td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td>
						   <input type="text" name="First_Name_txt" id="textbox"required="required"/>
						</td>
					</tr>
					
					<tr>
					  <td>Subject:</td>
					  <td><textarea name="Subject_txt" cols="26" rows="5" required="required"/></textarea></td>
					</tr>
					
					<tr>
						<td colspan="2">
							<input type="reset" value="Cancel" id="button-in"/>
							<input type="submit" name="btn_sub" value="Register" id="button-in"  />
						</td>
					</tr>
			  </table>
        </div>
 
		<div>
				  <table border="0" cellpadding="4" cellspacing="0">
						<tr>
						  <td>Action:</td>
						  <td><input type="text" name="Action_txt" id="textbox" required="required"/></td>
						</tr>
					   
						 <tr>
						  <td>Date Released:</td>
						  <td><input type="date" name="Date_Released_txt" id="textbox" required="required"/></td>
						</tr>
						 <tr>
						  <td>To:</td>
						  <td><input type="text" name="To_txt" id="textbox"  required="required"/></td>
						</tr>
						 <tr>
						  <td>Notes:</td>
						  <td><input type="text" name="Notes_txt"  id="textbox" required="required"/></td>
						</tr>
						 <tr>
						  <td>Care Off By:</td>
						  <td><input type="text" name="Care_off_by_txt" id="textbox"  required="required"/></td>
						</tr>
						
						<tr>
						  <td>Remarks:</td>
						  <td><textarea name="Remarks_txt" cols="26" rows="5" required="required"></textarea></td>		  
						</tr>
				</table>
					  
		</div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
?>
</body>
</html>