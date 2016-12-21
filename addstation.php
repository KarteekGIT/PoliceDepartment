<?Php include('includes/top.php');
$action=$_GET['action'];
?>

<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from police_stations where id='$id'";
executeQuery($del, $PDODB);

header('Location: addstation.php?action=list');
}
?>
	<?php 
	if($action=='addnew' || $action== 'edit'){
	if($action=='edit'){
	$id=$_GET['id'];
	}
	if(isset($_POST['submit']) || isset($_POST['update'])){
		
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pword=$_POST['password'];
	$password=md5($pword);
	$subd=$_POST['subd'];
	$circle=$_POST['circle'];
	$ps_name=$_POST['ps_name'];
	if($action=='addnew'){
	$in = "INSERT INTO police_stations(name,password, circle, ps_name,subd,pword) VALUES('$name','$password','$circle','$ps_name','$subd','$pword')";
	
	 if(executeQuery($in, $PDODB)){
		 
		  
		  }else{
		showError($in, $PDODB);
		
	}
	}
	if($action=='edit'){
	 $up = "UPDATE  `police_stations` SET  `name` =  '$name',`password` =  '$password',`subd` =  '$subd',`circle` =  '$circle',`ps_name` =  '$ps_name',`pword` =  '$pword'  WHERE  `police_stations`.`id` =$id";
	 executeQuery($up, $PDODB);
	 
	}
header('Location: addstation.php?action=list');
	}
	}
	?>	
    	<div class="title"><h5>STATION USERS</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <div class="fix"></div>
        </div>
       <?php if($action=='addnew' || $action=='edit'){?> 
       <?php if($action=='edit'){
					$id=$_GET['id'];
					$e="select * from police_stations where id='$id'";
					$edi=getAssoc($e, $PDODB);
					}?>
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add Station User</h5></div>
                        
                        <div class="rowElem"><label>Username:</label><div class="formRight"><input type="text" name="name" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi[0]['name'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Password:</label><div class="formRight"><input type="text" name="password" class="validate[required]" id="req2" value="<?php if($action=='edit'){echo $edi[0]['pword'];}?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>EMAIL:</label><div class="formRight"><input type="text" name="email" class="validate[required]" value="<?php if($action=='edit'){echo $edi[0]['email'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem">
                        <label>Subdivision :</label>
                        <div class="formRight">
                        <select name="subd"  onchange="getcircle(this.value)" class="validate[required]" id="req3">
                        <option value="">--Select Sub division--</option>
                          <?php 
						  $s="select DISTINCT subdivision from police_data";
						  $sub=getAssoc($s, $PDODB);
						  foreach($sub as $key => $value){
						  ?>						  
                            <option <?php if($action=='edit'){if($edi[0]['subd']==$value['subdivision']){ echo 'selected';}}?> value="<?php echo $value['subdivision'];?>"><?php echo $value['subdivision'];?></option>
                            <?php }?>
                           
                        </select>
                        <span id="ajax_age"></span>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem">
                        <label>Circle :</label>
                        <div class="formRight" id="circle">
                        <select name="circle" id="req4" onchange="getps(this.value)" class="validate[required]">
                        
                         <option value="">--Select Cicle--</option>
                         <?php 
						 if($action=='edit'){
							 
							$sel="select DISTINCT circle from police_data where subdivision='$edi[subd]'";
							$res=getAssoc($sel, $PDODB);
					foreach($res as $key => $value ){?>
<option <?php if($edi[0]['circle']==$value['circle']){?> selected="selected"<?php }?> value="<?php echo $value['circle'];?>"><?php echo $value['circle'];?></option>

                         
                         <?php }}?>
                           
                        </select>
                        <span id="ajax_age"></span>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <div class="rowElem">
                        <label>Police Station :</label>
                        <div class="formRight" id="station">
                        <select name="ps_name" id="req5" class="validate[required]">
                         <option value="">--Select Cicle--</option>
                          <?php 
						 if($action=='edit'){
							 
$sel="select DISTINCT ps_name from police_data where subdivision='$edi[0][subd]' and circle='$edi[0][circle]'";
$rec=getAssoc($sel, $PDODB);					
					foreach($rec as $key => $value){?>
<option <?php if($edi[0]['ps_name']==$value['ps_name']){?> selected="selected"<?php }?> value="<?php echo $value['ps_name'];?>"><?php echo $value['ps_name'];?></option>

                         
                         <?php }
						 }?>
                           
                        </select>
                        <span id="ajax_age"></span>
                        </div>
                        <div class="fix"></div>
                    </div>
                    <script type="text/javascript">
                    	function getcircle(str){
						 var id = 0;
						 $.ajax({
								'url':'getcircle.php',
								'type':'POST',
								'async':false,
								'data':{'str': str},
								'success':function(data){
											 id = data;
								 }
						   });
						document.getElementById("circle").innerHTML=id;
						}
						function getps(str){
							subd=document.getElementById("req3").value;
						 var id = 0;
						 $.ajax({
								'url':'getps.php',
								'type':'POST',
								'async':false,
								'data':{'str': str,'subd': subd},
								'success':function(data){
											 id = data;
								 }
						   });
						document.getElementById("station").innerHTML=id;
						}
                    </script>
                        
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

			$sel="select * from police_stations";
			?> 
        <div class="table">
            <div class="head"><h5 class="iFrames">Users List</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>NAME</th>
								   <th>Sub Division</th>
								   <th>Circle</th>
                                   <th>Station</th>
								   <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							  $rec=getAssoc($sel, $PDODB);
							 foreach($rec as $key => $value){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $value['name'];?></td>
									<td><?php echo $value['subd'];?></td>
									
									<td><?php echo $value['circle'];?></td>
                                    <td><?php echo $value['ps_name'];?></td>
									<td>
										
										 <a href="addstation.php?action=edit&id=<?php echo $value['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="addstation.php?action=delete&id=<?php echo $value['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
										 
										
									</td>
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
            <a href="addstation.php?action=addnew" title="" class="btnIconLeft mr10 mt5"><img src="images/icons/dark/adminUser.png" alt="" class="icon" /><span>Add Users</span></a>
        </div>
        <?Php }?>     
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
