<?php 
include('lib/Config.php');
$subd=$_REQUEST['subd'];
$year=$_REQUEST['year'];
$circle=$_REQUEST['circle'];
$ps=$_REQUEST['ps'];
$reason=$_REQUEST['reason'];
?>

            <table cellpadding="0" cellspacing="0" border="0" class="tableStatic resize" width="980" style="width:980px;">
                <thead>
                    <tr>
                        <th width="50">S.NO</th>
								   <th width="90">PS NAME</th>
								   <th width="90">CIRCLE</th>
                                   <th width="90">S.DIV</th>
								   <th width="90">Crime No</th>
								   <th width="100">Section</th>
                                   <th width="160">Stage</th>
                                   <th width="180">Reason</th>
                                    <th width="100">Crime Head</th>
                                   <?php if($_SESSION['police']['type']=='User'){?>
								   <th>Action</th>
                                   <?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php
							  $sno=1;
							 
							  $sel="select * from police_cases where year like '%$year%' and pt='No' and ps_name like '%$ps%' and subd like '%$subd%' and circle like '%$circle%' and reasons like '%$reason%'";
								 

			$res=executeQuery($sel);
							 while($rec=getAssoc($res)){?>
                    <tr <?Php if($sno%2==0){?>class="gradeX"<?Php }else{?>class="gradeC"<?php }?>>
                       <td><?php echo $sno;?></td>
									<td><?php echo $rec['ps_name'];?></td>
                                    <td><?php echo $rec['circle'];?></td>
                                    <td><?php echo $rec['subd'];?></td>
									<td><?php echo $rec['crime_no'];?>&nbsp;/&nbsp;<?php echo $rec['year'];?></td>
									
									<td><?php echo $rec['section_law'];?></td>
                                    <td><?php echo $rec['present_stage'];?></td>
                                     <td><?php echo $rec['reasons'];?></td>
                                       <td><?php echo $rec['crime_head'];?></td>
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
      