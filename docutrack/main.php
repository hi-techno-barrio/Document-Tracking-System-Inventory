<?php
	session_start();
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::.Document Tracking.::</title>

<link rel="stylesheet" type="text/css" href="css/main_format.css" />
<link rel="stylesheet" type="text/css" href="css/menu.css"/>
<link rel="stylesheet" type="text/css" href="css/home.css"/>

</head>

<body>

   <div id="top">
      <div>Copyright  2018 | &nbsp;&nbsp;&nbsp; <b>Transactions:</b>
            <select name="#">
                <option value="#">OUTGOING &nbsp; &nbsp; &nbsp; </option>
                <option value="#">INCOMING   </option>
                <option value="#">TENURE     </option>
				<option value="#">VOUCHER    </option>
                <option value="#">APFC       </option>
            </select>
      </div>
</div>
<br /><br />
<div id="admin">
	
        <div id="lmain">
                <a href="#" title="logo" ><img src="picture/logo.png" /></a>
                <div id="leftmanu">
                	<div >
                        <a href="?tag=home" title="HOME (Shift+Ctrl+H)">HOME</a><br />
                	</div>
                    
                   <?php /*?> 
                    <?php 
						$sql_menu=mysql_query("SELECT * FROM  article_tbl WHERE loca_id=1");
						while($row=mysql_fetch_array($sql_menu)){
						?>
						 <div><a href="?tag=view&v_id=<?php echo $row['a_id'];?>"><?php echo $row['title'];?></a></div>
						<?php	
							}
						?>  <?php */?>
                    
                    
                    <div>
                    	<a href="main.php?tag=incoming_entry" title="Shift+1">&nbsp;Incoming Entry</a><br />
                    </div>
                    <div>
                    	<a href="main.php?tag=outgoing_entry" class="customer" title="Shift+2">&nbsp; Outgoing Entry</a>
                    </div>
					<div>
                    	<a href="main.php?tag=apfc_entry" class="customer" title="Shift+2">&nbsp;APFC Entry</a>
                    </div>
					<div>
                    	<a href="main.php?tag=receiving_entry" class="customer" title="Shift+2">&nbsp;Receiving Entry </a>
                    </div>
					<div>
                    	<a href="main.php?tag=tenure_entry" class="customer" title="Shift+2">&nbsp;Tenure Entry</a>
                    </div>
					<div>
                    	<a href="main.php?tag=vouchers_entry" class="customer" title="Shift+2">&nbsp;Vouchers Entry</a>
                    </div>
                    <div>
                    	<a href="main.php?tag=user_entry" class="customer" title="Shift+2">&nbsp;Users Entry</a>
                    </div>
                     <div>
                    	<a href="main.php?tag=printing" class="customer" title="Shift+2">&nbsp;Document Printing</a>
                    </div>
                    <div>
                    	<a href="logout.php" class="customer" title="Shift+Ctrl+C">&nbsp;Logout </a>
                    </div>
          
                </div><!-- end of leftmanu -->
        </div><!--end of lmaim -->
        
        <div>
  
        </div>
    <div id="rmain">
    	<div id="pic_manu">
		<a href="main.php?tag=user_entry" class="sales" title="Add User"><img src="picture/student.png" hspace="30px" /></a>
             </div><!--end of pic_manu -->
        
         <div id="menu2">
                
                <div style="width:4px; height:37px; padding:0px; margin:0px; float:left;"></div>
                
                <li id="li_menu"><a href="#">Document</a>
                    <ul>
                        <li id="li_submenu">
                        <li id="li_submenu"><a href="main.php?tag=view_incoming"    class="stocks">View Incoming</a></li>
						<li id="li_submenu"><a href="main.php?tag=view_outgoing"    class="stocks">View Outgoing</a></li>
						<li id="li_submenu"><a href="main.php?tag=view_receiving"   class="stocks">View Receiving</a></li>
						<li id="li_submenu"><a href="main.php?tag=view_tenure"      class="stocks">View Tenure</a></li>
						<li id="li_submenu"><a href="main.php?tag=view_apfc"        class="stocks">View APFC</a></li>
						<li id="li_submenu"><a href="main.php?tag=view_vouchers"    class="stocks">View Vouchers</a></li>
                    </ul>
                </li>
				  
      </div><!--end of menu2--> 
     
            <div id="contents">
            
            	<div id="informations">
                	<div id="in_informations">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
						//incoming 
                            elseif($tag=="incoming_entry")
                            include("dbPanel/Incoming_Entry.php");
							
							elseif($tag=="view_incoming")
                            include("dbPanel/View_Incoming.php");
							
						//outgoing 	
							elseif($tag=="outgoing_entry")
                            include("dbPanel/Outgoing_Entry.php");
							
							elseif($tag=="view_outgoing")
                            include("dbPanel/View_Outgoing.php");
							
						//receiving 	
							elseif($tag=="receiving_entry")
                            include("dbPanel/Receiving_Entry.php");
							
							elseif($tag=="view_receiving")
                            include("dbPanel/View_Receiving.php");
							
						//apfc entry	
                            elseif($tag=="apfc_entry")
                            include("dbPanel/APFC_Entry.php");
							
							elseif($tag=="view_apfc")
                            include("dbPanel/View_APFC.php");
							
						//tenure entry	
							elseif($tag=="tenure_entry")
							include("dbPanel/Tenure_Entry.php");
							
							elseif($tag=="view_tenure")
							include("dbPanel/View_Tenure.php");
							
					   //vouchers entry	
							elseif($tag=="vouchers_entry")
							include("dbPanel/Voucher_Entry.php");
							
							elseif($tag=="view_vouchers")
							include("dbPanel/View_Voucher.php");
							
						//printing document
                            elseif($tag=="printing")
                            include("dbPanel/Print.php");
							
						// user entry 	
							elseif($tag=="user_entry")
                            include("dbPanel/User_Entry.php");
                        	/*$tag= $_REQUEST['tag'];
							
							if(empty($tag)){
								include ("Customer_Entryphp");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div><!--end of in_informations -->
                </div><!--end of informations -->
    		</div><!--end of contens -->   
     </div><!--end of rmain -->
    	
    </div><!--end of admin -->

</body>
</html>