<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($conn,"DELETE FROM incomingtbl WHERE incomingtbl_id=$id");
	if($del_sql)
		echo "Profile has been Deleted... !";
	else
		$msg="Could not Delete :".mysqli_error();	
			
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::.OVCAA Document Tracking.::</title>
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">Document Track</td>
        <td>
        	<a href="?tag=incoming_entry"><input type="button" title="Add new Documents" name="butAdd" value="Add New" id="button-search" /></a>
        </td>
        <td>
        	<input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/>
        </td>
        <td style="float:right">
        	<input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Student" />
        </td>
    </tr>
</table>
</form>
</div><!--- end of style_div -->
<br />
<div id="content-input">
<form method="post">

    <table border="1" width="1050px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th>Date Received</th>
			<th>Control Number</th>
            <th>From Unit</th>
            <th>College Department</th>            
            <th>Last Name</th>
            <th>First Name</th>
            <th>Subject</th>
            <th>Action</th>
			<th>Remarks</th>
			<th>Date Released</th>
            <th>To</th>
            <th>Notes</th>
			<th>Care Off By</th>
            <th colspan="2">Operation</th>
        </tr>
        
        <?php
	$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($conn,"SElECT * FROM incomingtbl WHERE First_Name like '%$key%' or Last_Name like '%$key%'");
	    //$sql_sel="SElECT * FROM stu_tbl WHERE f_name  like '%$key%' or l_name like '%$key%'";
	else
		 $sql_sel=mysqli_query($conn,"SELECT * FROM incomingtbl");
	    //$sql_sel="SELECT * FROM stu_tbl";
	
	//$cout = $conn->query($sql_sel);
  
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)) {   //mysqli_fetch_array
	//while($row=mysql_fetch_array($sql_sel,MYSQLI_ASSOC)){ 
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>	
      <tr bgcolor="<?php echo $color?>">
			<td><?php echo $row['Date_Received'];?></td>
            <td><?php echo $row['Control_No'];?></td>
            <td><?php echo $row['From_Unit'];?></td>
            <td><?php echo $row['College_Dept'];?></td>
            <td><?php echo $row['Last_Name'];?></td>
            <td><?php echo $row['First_Name'];?></td>
            <td><?php echo $row['Subject'];?></td>
		    <td><?php echo $row['Action'];?></td>
			<td><?php echo $row['Remarks'];?></td>
            <td><?php echo $row['Date_Released'];?></td>
            <td><?php echo $row['Tobe'];?></td>
            <td><?php echo $row['Notes'];?></td>
			<td><?php echo $row['Care_off_by'];?></td>
            <td><a href="?tag=incoming_entry&opr=upd&rs_id=<?php echo $row['incomingtbl_id'];?>" title="Update"><img src="picture/update.png" /></a></td>
            <td><a href="?tag=view_incoming&opr=del&rs_id=<?php echo $row['incomingtbl_id'];?>" title="Delete"><img src="picture/delete.png" /></a></td>
             
        </tr>
    <?php	
    } //while
	// ----- for search documents------	
		
 
    ?>
    </table>
</form>
</div>
</body>
</html>