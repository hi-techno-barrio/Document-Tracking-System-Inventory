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
	$del_sql=mysqli_query($conn,"DELETE FROM package_tbl WHERE package_id=$id");
	if($del_sql)
		echo "Record Deleted... !";
	else
		$msg="Could not Delete :".mysql_error();	
			
}
	echo $msg;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>::.International Cargo.::</title>

<script type="text/javascript">

       function PrintDoc() {

        var toPrint = document.getElementById('printarea');

        var popupWin = window.open('', '_blank', 'width=595,height=842,location=no,left=200px');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }

</script>

</head>
<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">Search & Print </td>
		<td> <input type="button" value="Print" id="button-search" class="btn" onclick="PrintDoc()"/></td>
		<td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Package" /></td>
    </tr>
</table>
</form>
</div><!--end of style_div -->
<br />
<div id="printarea">
<div id="content-input">
<h3 align="center">Office of the Vice Chancellor for Academic Affairs,UP Diliman.</h3>
<p align="center"><strong>Telephone:</strong>9818500-2585<br>
<strong>Mobile:</strong> +639164282154<br>
<br<strong><strong>Email:</strong>christopher.coballes@up.edu.ph</p>
	 <table border="1" width="580px" align="center" cellpadding="2" class="mytable" cellspacing="0" >
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Pack.No.</th>
            <th>L</th>
            <th>W</th>
            <th>H</th>
            <th>Section</th>
            <th>Detail</th>
        </tr>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
        {
		$sql_sel= "SElECT * FROM package_tbl WHERE stu_id  like '%$key%' or pack like '%$key%'";
		$results = mysqli_query($conn,$sql_sel);
        }
	else
        {
		$sql_sel = "SELECT * FROM package_tbl";
        $results=mysqli_query($conn,$sql_sel);
        }
		
		//if (!$key) {
        //     printf("Error: %s\n", mysqli_error($con));
        //      exit();
        //		}
    $i=0;
	/* $sql = "select * from privinsi";
    $result = mysqli_query($connection,$sql);
    while($r = mysqli_fetch_array($result)
    {
    /// your code here
    }  */
	
    while($row=mysqli_fetch_array($results)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['stu_id'];?></td>
            <td><?php echo $row['pack'];?></td>
            <td><?php echo $row['plength'];?></td>
            <td><?php echo $row['pwidth'];?></td>
            <td><?php echo $row['pheight'];?></td>
            <td><?php echo $row['psection'];?></td>
            <td><?php echo $row['detail'];?></td>
            </tr>
    <?php	
    }
    ?>
    </table>

</div><!-- end of content-input -->
</div>
</body>
</html>