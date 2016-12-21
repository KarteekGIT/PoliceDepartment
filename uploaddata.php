<?Php include('includes/top.php');
$action=$_GET['action'];
?>
<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from proxy_users where id='$id'";
executeQuery($del);

header('Location: uploaddata.php?action=list');
}
?>
	<?php 
	if($action=='addnew' || $action== 'edit'){
	if($action=='edit'){
	$id=$_GET['id'];
	}
	if(isset($_POST['submit']) || isset($_POST['update'])){

	if(move_uploaded_file($_FILES["file"]["tmp_name"],
				  "uploads/data/" .$code. $_FILES["file"]["name"])){
				$image1=$code.$_FILES["file"]["name"];	
				
				
				require_once 'phpExcelReader/Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read( "uploads/data/".$image1);
 
for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {
    $CALL_DATE_TIME = $data->sheets[0]["cells"][$x][1];
    $LRN = $data->sheets[0]["cells"][$x][2];
    $CALLTYPE = $data->sheets[0]["cells"][$x][3];
	
	$DURATION_IN_SECS = $data->sheets[0]["cells"][$x][4];
    $A_NUMBER = $data->sheets[0]["cells"][$x][5];
    $B_NUMBER = $data->sheets[0]["cells"][$x][6];
	
	$C_NUMBER = $data->sheets[0]["cells"][$x][7];
    $MSRN = $data->sheets[0]["cells"][$x][8];
    $IMSI = $data->sheets[0]["cells"][$x][9];
	
	$IMEI = $data->sheets[0]["cells"][$x][10];
    $MSCID = $data->sheets[0]["cells"][$x][11];
    $FIRST_CELL_ID = $data->sheets[0]["cells"][$x][12];
	
	$LAST_CELL_ID = $data->sheets[0]["cells"][$x][13];
    $INCOMINGROUTE = $data->sheets[0]["cells"][$x][14];
    $OUTGOINGROUTE = $data->sheets[0]["cells"][$x][15];
	
	$CUSTTYPE = $data->sheets[0]["cells"][$x][16];
    
	
    $sql = "INSERT INTO cal_details (CALL_DATE_TIME,LRN,CALLTYPE,DURATION_IN_SECS,A_NUMBER,B_NUMBER,C_NUMBER,MSRN,IMSI,IMEI,MSCID,FIRST_CELL_ID,LAST_CELL_ID,INCOMINGROUTE,OUTGOINGROUTE,CUSTTYPE) 
        VALUES ('$CALL_DATE_TIME' , '$LRN', '$CALLTYPE', '$DURATION_IN_SECS', '$A_NUMBER', '$B_NUMBER', '$C_NUMBER', '$MSRN', '$IMSI', '$IMEI', '$MSCID', '$FIRST_CELL_ID', '$LAST_CELL_ID', '$INCOMINGROUTE', '$OUTGOINGROUTE', '$CUSTTYPE')";
    echo $sql."\n";
    mysql_query($sql);
}
 }

header('Location: uploaddata.php?action=list');
	}
	}
	?>	
    	<div class="title"><h5>Details</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <div class="fix"></div>
        </div>
       <?php if($action=='addnew' || $action=='edit'){?> 
       <?php if($action=='edit'){
					$id=$_GET['id'];
					$e="select * from proxy_users where id='$id'";
					$ed=executeQuery($e);
					$edi=getAssoc($ed);
					}?>
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post" enctype="multipart/form-data">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add DETAILS</h5></div>
                        
                        <div class="rowElem"><label>Upload File:</label><div class="formRight"><input type="file" name="file" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi['name'];}?>"/></div><div class="fix"></div></div>
                        
                        
                        
                       
                      <?php 
								if($action=='addnew'){
								?>
                        <input type="submit" value="Submit" class="greyishBtn submitForm" name="submit" />
                        <?php }else if($action=='edit'){?>
                         <input type="submit" value="Update" class="greyishBtn submitForm" name="update" />
                        <?php }?>
                        <div class="fix"></div>

                </div>
            
                </div>
            </fieldset> 
        </form> 
        
        <?php }else if($action=='list'){
  
			$sel="select * from cal_details";   
			
			$res=executeQuery($sel);
			?> 
        <div class="table">
            <div class="head"><h5 class="iFrames">DETAILS</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>CALL_DATE_TIME</th>
								  
								   <th>A Number</th>
								   <th>B Number</th>
                                   <th>C Number</th>
                                   <th>IMEI</th>
								 
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							 while($rec=getAssoc($res)){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $rec['CALL_DATE_TIME'];?></td>
									<td><?php echo $rec['A_NUMBER'];?></td>
                                    <td><?php echo $rec['B_NUMBER'];?></td>
                                    <td><?php echo $rec['C_NUMBER'];?></td>
                                    <td><?php echo $rec['IMEI'];?></td>
									
									
									
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
            <a href="uploaddata.php?action=addnew" title="" class="btnIconLeft mr10 mt5"><img src="images/icons/dark/adminUser.png" alt="" class="icon" /><span>Add Agent</span></a>
        </div>
        <?Php }?>     
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
