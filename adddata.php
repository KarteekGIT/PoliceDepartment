<?Php include('includes/top.php');
$action=$_GET['action'];

if($_SESSION['police']['type']=='User'){
 $usid=$_SESSION['police']['id'];
	$subd=getRecord('id','police_stations',$usid,'subd', $PDODB);
	$circle=getRecord('id','police_stations',$usid,'circle', $PDODB);
	$ps_name=getRecord('id','police_stations',$usid,'ps_name', $PDODB);
}
?>

<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from police_cases where id='$id'";
executeQuery($del, $PDODB);

header('Location: adddata.php?action=list');
}
if($action=='move_pt'){
$id=$_GET['id'];
$up = "UPDATE  `police_cases` SET  `pt` =  'Yes'  WHERE  `police_cases`.`id` =$id";
executeQuery($up,$PDODB);

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
	$subd=getRecord('id','police_stations',$usid,'subd',$PDODB);
	$circle=getRecord('id','police_stations',$usid,'circle',$PDODB);
	$ps_name=getRecord('id','police_stations',$usid,'ps_name',$PDODB);
	$crime_no=$_POST['crime_no'];
	$section_law=$_POST['section_law'];
	$present_stage=$_POST['present_stage'];
	$reasons=$_POST['reasons'];
	$date=$_POST['date'];
	$type=$_POST['type'];
	$d=explode("-",$date);
	
	$crime_head=$_POST['chead'];
	$year=$d[2];
	if($action=='addnew'){
	$in = "INSERT INTO police_cases(subd,circle, ps_name, crime_no,section_law,present_stage,reasons,crime_head,user_id,year,date,type) VALUES('$subd','$circle','$ps_name','$crime_no','$section_law','$present_stage','$reasons','$crime_head','$usid','$year','$date','$type')";
	
	 if(executeQuery($in, $PDODB)){
		 
		  
		  }else{
		showError($in,$PDODB);
		
	}
	}
	if($action=='edit'){
	 $up = "UPDATE  `police_cases` SET  `subd` =  '$subd',`circle` =  '$circle',`ps_name` =  '$ps_name',`crime_no` =  '$crime_no',`section_law` =  '$section_law',`present_stage` =  '$present_stage',`reasons` =  '$reasons',`crime_head` =  '$crime_head',`user_id` =  '$user_id',`type` =  '$type'  WHERE  `police_cases`.`id` =$id";
	 executeQuery($up,$PDODB);
	 
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
					$edi=getAssoc($e, $PDODB);
					}?>
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add New Case</h5></div>
                    
                        
                        
                        <div class="rowElem"><label>Crime No:</label><div class="formRight"><input type="text" name="crime_no" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi[0]['crime_no'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Section Of Law:</label><div class="formRight"><input type="text" name="section_law" class="validate[required]" id="req2" value="<?php if($action=='edit'){echo $edi[0]['section_law'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Present Stage:</label><div class="formRight"><input type="text" name="present_stage" class="validate[required]" value="<?php if($action=='edit'){echo $edi[0]['present_stage'];}?>" id="req3"/></div><div class="fix"></div></div>
                        
                        
                         <div class="rowElem"><label>Date Of Report:</label><div class="formRight"><input type="text" name="date" class="validate[required] datepicker" id="req4" value="<?php if($action=='edit'){echo $edi[0]['date'];}else{echo date('d-m-Y');}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem">
                        <label>Reasons :</label>
                        <div class="formRight">
                        <select name="reasons"  class="validate[required]" id="req5">
                        <option value="">--Select Reassons--</option>
                         						  
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="FSL/PME/MCs and Chemical reports"){echo 'selected';}}?> value="FSL/PME/MCs and Chemical reports">FSL/PME/MCs and Chemical reports</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Deletion of accused."){echo 'selected';}}?> value="Deletion of accused.">Deletion of accused.</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Arrest of accused"){echo 'selected';}}?> value="Arrest of accused">Arrest of accused</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="CC/PRC .No awaited"){echo 'selected';}}?> value="CC/PRC .No awaited">CC/PRC .No awaited</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Record of the 164 Cr.PC. Statements"){echo 'selected';}}?> value="Record of the 164 Cr.PC. Statements">Record of the 164 Cr.PC. Statements</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Vacation of High Court stay"){echo 'selected';}}?> value="Vacation of High Court stay">Vacation of High Court stay</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Information from other department/Prosecution Orders"){echo 'selected';}}?> value="Information from other department/Prosecution Orders">Information from other department/Prosecution Orders</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="For want of Clues"){echo 'selected';}}?> value="For want of Clues">For want of Clues</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Colletion of Further evidence"){echo 'selected';}}?> value="Colletion of Further evidence">Colletion of Further evidence</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Closure orders from Superior Officers"){echo 'selected';}}?> value="Closure orders from Superior Officers">Closure orders from Superior Officers</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="Legal/Other experts reports"){echo 'selected';}}?> value="Legal/Other experts reports">Legal/Other experts reports</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['reasons']=="For want of Clues"){echo 'selected';}}?> value="For want of Clues">For want of Clues</option>
                           
                        </select>
                        <span id="ajax_age"></span>
                        </div>
                        <div class="fix"></div>
                    </div>
                    
                   
                    
                    <div class="rowElem"><label>TYPE:</label><div class="formRight">
                    
                    
                     <select name="type"  class="validate[required] select" id="req6"  onchange="getcrhead(this.value)">
                  
                         						  
                    <option <?php if($action=='edit'){if($edi[0]['type']=="NG"){echo 'selected';}}?> value="NG">Non-Grave</option>
                    
                    <option <?php if($action=='edit'){if($edi[0]['type']=="G"){echo 'selected';}}?> value="G">Grave</option>
                    
                    
                    </select> 
                    </div><div class="fix"></div></div>
                    
                     <div class="rowElem"><label>Crime Head:</label><div class="formRight" id="chh">
                    
                    
                     <select name="chead"  class="validate[required] select" id="req7">
                      <option value="">--Select Crime Head--</option>
                      
                     <?php  if($action=='edit'){
						 $s="select DISTINCT crime_head from police_cases where type='$edi[type]'";
						 }else{ $s="select DISTINCT crime_head from police_cases where type='NG'";}
						$sub=getAssoc($s, $PDODB);
						  foreach($sub as $key => $value){
					 ?>
                   
                         						  
                    <option <?php if($action=='edit'){if($edi[0]['crime_head']==$value['crime_head']){echo 'selected';}}?> value="<?php echo $value['crime_head'];?>"><?php echo $value['crime_head'];?></option>
                    <?php }?>
                    
                    
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
        <script type="text/javascript">
        function getcrhead(str){
							//alert(str);
						 var id = 0;
						 $.ajax({
								'url':'getcrhead.php',
								'type':'GET',
								'async':false,
								'data':{'str': str},
								'success':function(data){
											 id = data;
								 }
						   });
						document.getElementById("chh").innerHTML=id;
						}
        </script>
        <?php }else if($action=='list'){
if($_SESSION['police']['type']=='Admin'){
			$sel="select * from police_cases where pt='No'";
}else{
	$sel="select * from police_cases where subd='$subd' and circle='$circle' and ps_name='$ps_name' and pt='No'";
	}
			
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
                                    <th>Type</th>
                                   <?php if($_SESSION['police']['type']=='User'){?>
								   <th>Action</th>
                                   <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							  $rec=getAssoc($sel, $PDODB);
							 foreach($rec as $key => $value){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $value['ps_name'];?></td>
									<td><?php echo $value['crime_no'];?>&nbsp;/&nbsp;<?php echo $value['year'];?></td>
									
									<td><?php echo $value['section_law'];?></td>
                                    <td><?php echo $value['present_stage'];?></td>
                                     <td><?php echo $value['reasons'];?></td>
                                     <td><?php if($value['type']=='G'){echo 'Grave';}else if($value['type']=='NG'){echo 'Non-Grave';}?></td>
                                      <?php if($_SESSION['police']['type']=='User'){?>
									<td>
										
										 <a href="adddata.php?action=edit&id=<?php echo $value['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="adddata.php?action=delete&id=<?php echo $value['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
                                         &nbsp;&nbsp;
										 <a href="adddata.php?action=move_pt&id=<?php echo $value['id'];?>" onClick="return confirm('Are you sure you want to move to PT ?')" title="Move To PT">Move&nbsp;To&nbsp;PT</a>
										 
										
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
