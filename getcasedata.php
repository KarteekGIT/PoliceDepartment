<?php 
include('lib/Config.php');
$att=$_REQUEST['att'];
$str=$_REQUEST['str'];
?>

            <table cellpadding="0" cellspacing="0" border="0" class="tableStatic resize">
                <thead>
                    <tr>
                        <th>S.NO</th>
								   <th>PS NAME</th>
								   <th>CIRCLE</th>
                                   <th>S.DIV</th>
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
							  if($str==""){
								 $sel="select * from police_cases where pt='No'";  
								  }else{
							  $sel="select * from police_cases where $att='$str' and pt='No'";
								  }

			$res=executeQuery($sel);
							 while($rec=getAssoc($res)){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $rec['ps_name'];?></td>
                                    <td><?php echo $rec['circle'];?></td>
                                    <td><?php echo $rec['subd'];?></td>
									<td><?php echo $rec['crime_no'];?></td>
									
									<td><?php echo $rec['section_law'];?></td>
                                    <td><?php echo $rec['present_stage'];?></td>
                                     <td><?php echo $rec['reasons'];?></td>
                                      <?php if($_SESSION['police']['type']=='User'){?>
									<td>
										
										 <a href="adddata.php?action=edit&id=<?php echo $rec['id'];?>" title="Edit"><img src="images/icons/middlenav/pencil.png" width="18" alt="Edit" /></a> &nbsp;&nbsp;
										 <a href="adddata.php?action=delete&id=<?php echo $rec['id'];?>" onClick="return confirm('Are you sure you want to delete ?')" title="Delete"><img width="18" src="images/icons/middlenav/denied.png" alt="Delete" /></a>
										 
										
									</td>
                                    <?php }?>
                    </tr>
                 <?php $sno++;}?>
                   
                </tbody>
            </table>
      