<?Php include('includes/top.php');
$action=$_GET['action'];
?>
<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from police_users where id='$id'";
executeQuery($del, $PDODB);

header('Location: adduser.php?action=list');
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
	$type=$_POST['type'];
	if($action=='addnew'){
	$in = "INSERT INTO police_users(name,password, type,email,pword) VALUES('$name','$password','$type','$email','$pword')";
	
	 if(executeQuery($in, $PDODB)){
		 
		 $msg = "Added Successfully"; 
		  }else{
		showError($in, $PDODB);
		$msg = "Some issue with the database. Please retry.";
	}
	}
	if($action=='edit'){
	 $up = "UPDATE  `police_users` SET  `name` =  '$name',`password` =  '$password',`type` =  '$type',`email` =  '$email',`pword` =  '$pword'  WHERE  `police_users`.`id` =$id";
	 if(executeQuery($up, $PDODB)){
		 $msg = "Updated successfully";
	 }
	 else{
		 $msg = "Some issue with the database. Please retry.";
	 }
	 
	}
header('Location: adduser.php?action=list');
	}
	}
	?>
    	<div class="title"><h5>Administrators</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <div class="fix"></div>
        </div>
       <?php if($action=='addnew' || $action=='edit'){?> 
       <?php if($action=='edit'){
					$id=$_GET['id'];
					$e="select * from police_users where id='$id'";
					$edi=getAssoc($e, $PDODB);
					}?>
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add Administrator</h5></div>
                        
                        <div class="rowElem"><label>Username:</label><div class="formRight"><input type="text" name="name" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi[0]['name'];}?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Type:</label><div class="formRight"><input type="text" name="type" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi[0]['type'];}?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Password:</label><div class="formRight"><input type="password" name="password" class="validate[required]" id="req2" value="<?php if($action=='edit'){echo $edi[0]['pword'];}?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>EMAIL:</label><div class="formRight"><input type="text" name="email" class="validate[required]" value="<?php if($action=='edit'){echo $edi[0]['email'];}?>"/></div><div class="fix"></div></div>
                        
                        
                        
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

			$sel="select * from police_users";
			$res=getAssoc($sel, $PDODB);
			?> 
        <div class="table">
            <div class="head"><h5 class="iFrames">Administrators List</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>NAME</th>
								   <th>Email</th>
								   <th>TYPE</th>
								   <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							 foreach($res as $key => $value){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $value['name'];?></td>
									<td><?php echo $value['email'];?></td>
									
									<td><?php echo $value['type'];?></td>
									<td>
										
										 <a href="adduser.php?action=edit&id=<?php echo $value['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="adduser.php?action=delete&id=<?php echo $value['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
										 
										
									</td>
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
            <a href="adduser.php?action=addnew" title="" class="btnIconLeft mr10 mt5"><img src="images/icons/dark/adminUser.png" alt="" class="icon" /><span>Add Users</span></a>
        </div>
        <?Php }?>     
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
