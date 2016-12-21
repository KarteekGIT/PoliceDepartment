<?Php include('includes/top.php');
$action=$_GET['action'];
?>
<?php 
if($action=='delete'){
$id=$_GET['id'];
$del="delete from proxy_users where id='$id'";
executeQuery($del);

header('Location: addagents.php?action=list');
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
	$agent=$_POST['agent'];
	if($action=='addnew'){
	$in = "INSERT INTO proxy_users(name,password, email,pword,type) VALUES('$name','$password','$email','$pword','Agent')";
	
	 if(executeQuery($in)){
		 
		  
		  }else{
		showError($in);
		
	}
	}
	if($action=='edit'){
	 $up = "UPDATE  `proxy_users` SET  `name` =  '$name',`password` =  '$password',`email` =  '$email',`pword` =  '$pword',`type` =  'Agent'  WHERE  `proxy_users`.`id` =$id";
	 executeQuery($up);
	 
	}
header('Location: addagents.php?action=list');
	}
	}
	?>	
    	<div class="title"><h5>AGENTS</h5></div>
        
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
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Add AGENT</h5></div>
                        
                        <div class="rowElem"><label>Username:</label><div class="formRight"><input type="text" name="name" class="validate[required]" id="req1" value="<?php if($action=='edit'){echo $edi['name'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Password:</label><div class="formRight"><input type="text" name="password" class="validate[required]" id="req2" value="<?php if($action=='edit'){echo $edi['pword'];}?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>EMAIL:</label><div class="formRight"><input type="text" name="email" class="validate[required]" value="<?php if($action=='edit'){echo $edi['email'];}?>" id="req3" /></div><div class="fix"></div></div>
                        
                       
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
  
			$sel="select * from proxy_users where type='Agent'";   
			
			$res=executeQuery($sel);
			?> 
        <div class="table">
            <div class="head"><h5 class="iFrames">AGENT List</h5></div>
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>NAME</th>
								   <th>Email</th>
								   <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							 while($rec=getAssoc($res)){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><a href="addaffilicate.php?action=list&agt_id=<?php echo $rec['id'];?>"><?php echo $rec['name'];?></a></td>
									<td><?php echo $rec['email'];?></td>
									<td>
										
										 <a href="addagents.php?action=edit&id=<?php echo $rec['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="addagents.php?action=delete&id=<?php echo $rec['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
										 
										
									</td>
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
            <a href="addagents.php?action=addnew" title="" class="btnIconLeft mr10 mt5"><img src="images/icons/dark/adminUser.png" alt="" class="icon" /><span>Add Agent</span></a>
        </div>
        <?Php }?>     
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
