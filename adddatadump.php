<?Php include('includes/top.php');
$action=$_GET['action'];

if($_SESSION['police']['type']=='User'){
 $usid=$_SESSION['police']['id'];
	$subd=getRecord('id','police_stations',$usid,'subd');
	$circle=getRecord('id','police_stations',$usid,'circle');
	$ps_name=getRecord('id','police_stations',$usid,'ps_name');
}
?>

<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from police_cases where id='$id'";
executeQuery($del);

header('Location: adddata.php?action=list');
}
if($action=='move_pt'){
$id=$_GET['id'];
$up = "UPDATE  `police_cases` SET  `pt` =  'Yes'  WHERE  `police_cases`.`id` =$id";
executeQuery($up);

header('Location: adddata.php?action=list');
}
?>
	<?php 
	if($action=='addnew' || $action== 'edit'){
	if($action=='edit'){
	$id=$_GET['id'];
	}
	if(isset($_POST['submit']) || isset($_POST['update'])){
		
	$usid=$_SESSION['police']['id'];
	$subd=getRecord('id','police_stations',$usid,'subd');
	$circle=getRecord('id','police_stations',$usid,'circle');
	$ps_name=getRecord('id','police_stations',$usid,'ps_name');
	$crime_no=$_POST['crime_no'];
	$section_law=$_POST['section_law'];
	$present_stage=$_POST['present_stage'];
	$reasons=$_POST['reasons'];
	$date=$_POST['date'];
	$d=explode("-",$date);
	
	$crime_head=$_POST['crime_head'];
	$year=$d[2];
	if($action=='addnew'){
	$in = "INSERT INTO police_cases(subd,circle, ps_name, crime_no,section_law,present_stage,reasons,crime_head,user_id,year,date) VALUES('$subd','$circle','$ps_name','$crime_no','$section_law','$present_stage','$reasons','$crime_head','$usid','$year','$date')";
	
	 if(executeQuery($in)){
		 
		  
		  }else{
		showError($in);
		
	}
	}
	if($action=='edit'){
	 $up = "UPDATE  `police_cases` SET  `subd` =  '$subd',`circle` =  '$circle',`ps_name` =  '$ps_name',`crime_no` =  '$crime_no',`section_law` =  '$section_law',`present_stage` =  '$present_stage',`reasons` =  '$reasons',`crime_head` =  '$crime_head',`user_id` =  '$user_id'  WHERE  `police_cases`.`id` =$id";
	 executeQuery($up);
	 
	}
header('Location: adddata.php?action=list');
	}
	}
	?>	
    	<div class="title"><h5>Cases</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <div class="fix"></div>
        </div>
       <?php if($action=='addnew' || $action=='edit'){?> 
       <?php if($action=='edit'){
					$id=$_GET['id'];
					$e="select * from police_cases where id='$id'";
					$ed=executeQuery($e);
					$edi=getAssoc($ed);
					}?>
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add New Case</h5></div>
                    
                        
                        
                        <div class="rowElem"><label>Crime No:</label><div class="formRight"><input type="text" name="crime_no" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi['crime_no'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Section Of Law:</label><div class="formRight"><input type="text" name="section_law" class="validate[required]" id="req2" value="<?php if($action=='edit'){echo $edi['section_law'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Present Stage:</label><div class="formRight"><input type="text" name="present_stage" class="validate[required]" value="<?php if($action=='edit'){echo $edi['present_stage'];}?>" id="req3"/></div><div class="fix"></div></div>
                        
                        
                         <div class="rowElem"><label>Date Of Report:</label><div class="formRight"><input type="text" name="date" class="validate[required] datepicker" id="req4" value="<?php if($action=='edit'){echo $edi['date'];}else{echo date('d-m-Y');}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem">
                        <label>Reasons :</label>
                        <div class="formRight">
                        <select name="reasons"  class="validate[required]" id="req5">
                        <option value="">--Select Reassons--</option>
                         						  
                    <option <?php if($action=='edit'){if($edi['reasons']=="FSL/PME/MCs and Chemical reports"){echo 'selected';}}?> value="FSL/PME/MCs and Chemical reports">FSL/PME/MCs and Chemical reports</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Deletion of accused."){echo 'selected';}}?> value="Deletion of accused.">Deletion of accused.</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Arrest of accused"){echo 'selected';}}?> value="Arrest of accused">Arrest of accused</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="CC/PRC .No awaited"){echo 'selected';}}?> value="CC/PRC .No awaited">CC/PRC .No awaited</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Record of the 164 Cr.PC. Statements"){echo 'selected';}}?> value="Record of the 164 Cr.PC. Statements">Record of the 164 Cr.PC. Statements</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Vacation of High Court stay"){echo 'selected';}}?> value="Vacation of High Court stay">Vacation of High Court stay</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Information from other department/Prosecution Orders"){echo 'selected';}}?> value="Information from other department/Prosecution Orders">Information from other department/Prosecution Orders</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="For want of Clues"){echo 'selected';}}?> value="For want of Clues">For want of Clues</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Colletion of Further evidence"){echo 'selected';}}?> value="Colletion of Further evidence">Colletion of Further evidence</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Closure orders from Superior Officers"){echo 'selected';}}?> value="Closure orders from Superior Officers">Closure orders from Superior Officers</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="Legal/Other experts reports"){echo 'selected';}}?> value="Legal/Other experts reports">Legal/Other experts reports</option>
                    
                    <option <?php if($action=='edit'){if($edi['reasons']=="For want of Clues"){echo 'selected';}}?> value="For want of Clues">For want of Clues</option>
                           
                        </select>
                        <span id="ajax_age"></span>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                    <div class="rowElem"><label>Crime Head:</label><div class="formRight">
                    
                    
                     <select name="crime_head"  class="validate[required] select" id="req6">
                    <option value="">--Select Reassons--</option>
                         						  
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Accident"){echo 'selected';}}?> value="Accident">Accident</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Cheating"){echo 'selected';}}?> value="Cheating">Cheating</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Death By Negligence"){echo 'selected';}}?> value="Death By Negligence">Death By Negligence</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Electricity"){echo 'selected';}}?> value="Electricity">Electricity</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Excise"){echo 'selected';}}?> value="Excise">Excise</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Fake Currency"){echo 'selected';}}?> value="Fake Currency">Fake Currency</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Fire Accident"){echo 'selected';}}?> value="Fire Accident">Fire Accident</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Hurt"){echo 'selected';}}?> value="Hurt">Hurt</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Mischiefe"){echo 'selected';}}?> value="Mischief">Mischief</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Missing"){echo 'selected';}}?> value="Missing">Missing</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="NDPS"){echo 'selected';}}?> value="NDPS">NDPS</option>
                    
                   
                    
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Other SLL"){echo 'selected';}}?> value="Other SLL">Other SLL</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Property"){echo 'selected';}}?> value="Property">Property</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Rioting"){echo 'selected';}}?> value="Rioting">Rioting</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Road Traffic Accident"){echo 'selected';}}?> value="Road Traffic Accident">Road Traffic Accident</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Sand"){echo 'selected';}}?> value="Sand">Sand</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="SC & ST Act"){echo 'selected';}}?> value="SC & ST Act">SC & ST Act</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Un-Claimed Property"){echo 'selected';}}?> value="Un-Claimed Property">Un-Claimed Property</option>
                    
                    <option <?php if($action=='edit'){if($edi['crime_head']=="Women"){echo 'selected';}}?> value="Women">Women</option>
                    
                   <option <?php if($action=='edit'){if($edi['crime_head']=="Other IPC"){echo 'selected';}}?> value="Other IPC">Other IPC</option>
                    
                    </select> 
                    </div><div class="fix"></div></div>
                   
                        
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
if($_SESSION['police']['type']=='Admin'){
			$sel="select * from police_cases where pt='No'";
}else{
	$sel="select * from police_cases where subd='$subd' and circle='$circle' and ps_name='$ps_name' and pt='No'";
	}
			$res=executeQuery($sel);
			?> 
             <a href="adddata.php?action=addnew"><button class="redBtn" >Add Cases</button></a>
        <div class="table">
            <div class="head"><h5 class="iFrames">Cases List</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>PS NAME</th>
								   <th>Crime No</th>
								   <th>Section</th>
                                   <th>Stage</th>
                                   <th>Reason</th>
                                   <?php if($_SESSION['police']['type']=='User'){?>
								   <th>Action</th>
                                   <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							 while($rec=getAssoc($res)){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $rec['ps_name'];?></td>
									<td><?php echo $rec['crime_no'];?>&nbsp;/&nbsp;<?php echo $rec['year'];?></td>
									
									<td><?php echo $rec['section_law'];?></td>
                                    <td><?php echo $rec['present_stage'];?></td>
                                     <td><?php echo $rec['reasons'];?></td>
                                      <?php if($_SESSION['police']['type']=='User'){?>
									<td>
										
										 <a href="adddata.php?action=edit&id=<?php echo $rec['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="adddata.php?action=delete&id=<?php echo $rec['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
                                         &nbsp;&nbsp;
										 <a href="adddata.php?action=move_pt&id=<?php echo $rec['id'];?>" onClick="return confirm('Are you sure you want to move to PT ?')" title="Move To PT">Move&nbsp;To&nbsp;PT</a>
										 
										
									</td>
                                    <?php }?>
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
            
        </div>
        <?Php }?>     
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
