<?Php include('includes/top.php');
$err="";
$msg="";
?>
	<?php 
	
	if(isset($_POST['update'])){
		
	
	$old_password=$_POST['old_password'];
	$password=$_POST['password'];
	$conf_password=$_POST['conf_password'];
	$opword=md5($old_password);
	$pword=md5($password);
	
	 $type=$_SESSION['police']['type'];
	$user_id=$_SESSION['police']['id'];
	if($type=='User'){
	$old_pword=getRecord('id','police_stations',$user_id,'password', $PDODB);
	}else{
	$old_pword=getRecord('id','police_users',$user_id,'password', $PDODB);	
		}
		
		
		if($old_pword!=$opword){
			$err="Incorrect Old Password";
			}else if($password!=$conf_password){
			$err="Password Does not match";
			}else{
		
	if($type=='User'){
	$up = "UPDATE  `police_stations` SET  `password` =  '$pword',`pword` =  '$password'  WHERE  `police_stations`.`id` =$user_id";
	}else{
	$up = "UPDATE  `police_users` SET  `password` =  '$pword',`pword` =  '$password'  WHERE  `police_users`.`id` =$user_id";	
		}
	executeQuery($up, $PDODB);
	$msg = "Password changed successfully";
	unset($_POST['old_password']);
	}
	}
	
	?>	
    	<div class="title" style="width:100%;"><h5>CHANGE PASSWORD</h5>
		</div>
        
      <center><span style="color:#F00; font-weight:bold;"><?php if($err!=""){echo $err;}?></span></center><br />
	  
       <center><span style="color: #00B000; font-weight:bold;"><?php if(isset($_POST['password']) && !isset($_POST['old_password'])){echo "Password Changed Successfully";}?></span></center>
      
        <!-- Form begins -->
        <form action="" class="mainForm" id="valid" method="post">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">CHANGE PASSWORD</h5></div>
                    
                     
                        
                        <div class="rowElem"><label>OLD PASSWORD:</label><div class="formRight"><input type="password" name="old_password" class="validate[required]" id="req1" value="<?php if(isset($_POST['old_password'])){echo $_POST['old_password'];}?>"/></div><div class="fix"></div></div>
                        
                        <div class="rowElem"><label>Password:</label><div class="formRight"><input type="password" name="password" class="validate[required]" id="req2" value="<?php if(isset($_POST['old_password'])){echo $_POST['password'];}?>"/></div><div class="fix"></div></div>
                      
                       <div class="rowElem"><label>CONFIRM PASSWORD:</label><div class="formRight"><input type="password" name="conf_password" class="validate[required]" id="req3" value="<?php if(isset($_POST['old_password'])){echo $_POST['conf_password'];}?>"/></div><div class="fix"></div></div>
                      
                        
                        
                        
                      
                         <input type="submit" value="Update" class="greyishBtn submitForm" name="update" />
                        
                        <div class="fix"></div>

                </div>
            
                </div>
            </fieldset> 
        </form> 
        
        
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
