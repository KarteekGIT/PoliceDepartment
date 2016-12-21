<?php include('lib/Config.php');?>
<select name="type" id="req3">
                          <?php 
						  $sel="select * from proxy_users where type='Agent'";
						  $res=executeQuery($sel);
						  while($rec=getAssoc($res)){
						  ?>
                            <option <?php if($action=='edit'){if($edi['agent']==$rec['id']){echo 'selected';}}?> value="<?php echo $rec['id']?>"><?php echo $rec['name']?></option>
                            <?php }?>
                            
                          
                        </select>
