<?Php include('includes/top.php');

?>    	<div class="title"><h5>DASH BOARD</h5></div>
        
        <!-- Statistics -->
        <div class="stats">
            <div class="fix"></div>
        </div>
         <div class="widgets">
       
        </div>
		
    <div class="widgets">
    <div style="width:45%; float:left; margin-left:10px;">
        <div class="widget">
                    <div class="head"><h5 class="iChart8">Year Wise</h5></div>
                    <table cellpadding="0" cellspacing="0" width="100%" class="display" id = "example">
                        <thead>
                            <tr>
                              <td >Year</td>
							  <td >Sub Division</td>
                              <td width="21%">Cases</td>
                            </tr>
                        </thead>
                        <tbody>
                       <?php 
					
						if($_SESSION['police']['type']=='Admin'){
						 $c="select DISTINCT subd, year from police_cases";
						}else{
						$usid=$_SESSION['police']['id'];
						$subd=getRecord('id','police_stations',$usid,'subd', $PDODB);
						$circle=getRecord('id','police_stations',$usid,'circle', $PDODB);
						$ps_name=getRecord('id','police_stations',$usid,'ps_name', $PDODB);
						$c="select DISTINCT subd, year from police_cases where subd='$subd' and circle='$circle' and ps_name='$ps_name' and pt='No'";	
							}
						$cri = getAssoc($c, $PDODB);
						
						foreach($cri as $key => $value ){
						?>
                            <tr>
                                <td><?php echo $value['year'];?></td>
								<td><?php echo $value['subd'];?></td>
                                <td align="center"><?php if($_SESSION['police']['type']=='Admin'){echo getRecordCountCon('year','police_cases',$value['year'],'pt','No', $PDODB);}else{echo getRecordCountCon('year','police_cases',$value['year'],'ps_name',$ps_name, $PDODB);}?></a></td>
                                
                            </tr>
                            <?php }?>
                           
                        </tbody>
                    </table>                    
                </div>
        </div>    
        <div style="width:45%; float:left; margin-left:10px;">
        <div class="widget">
                    <div class="head"><h5 class="iChart8">Crime Head Wise</h5></div>
					
                    <table cellpadding="0" cellspacing="0" width="100%" class="display" id="CrimeWise">
                        <thead>
                            <tr>
                              <td >Crime Head</td>
                              <td width="21%">Cases</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
						if($_SESSION['police']['type']=='Admin'){
							$c="select DISTINCT crime_head from police_cases";
						}else{
							$usid = $_SESSION['police']['id'];
							$subd = getRecord('id','police_stations',$usid,'subd',$PDODB);
							$circle = getRecord('id','police_stations',$usid,'circle',$PDODB);
							$ps_name = getRecord('id','police_stations',$usid,'ps_name',$PDODB);
							$c = "select DISTINCT crime_head from police_cases where subd='$subd' and circle='$circle' and ps_name='$ps_name' and pt='No'";	
						}
						$cri=getAssoc($c, $PDODB);
						foreach($cri as $key => $value){
						?>
                            <tr>
                                <td><?php echo $value['crime_head'];?></td>
                                <td align="center">
									<a href="#" title="" class="webStatsLink">
										<?php if($_SESSION['police']['type']=='Admin'){
											echo getRecordCountCon('crime_head','police_cases',$value['crime_head'],'pt','No', $PDODB);
										}else{
											echo getRecordCountCon('crime_head','police_cases',$value['crime_head'],'ps_name',$ps_name, $PDODB);
										}?>
										</a></td>
                                
                            </tr>
                        <?php }?>
                            <tr>
								<td id = "pageNavCrime"></td>
							</tr>
                        </tbody>
                    </table>
            </div>
        </div>  
     
     </div>
     <div style="clear:both;"></div>
       
                
    </div>
    
<div class="fix"></div>
</div>

<!-- Footer -->
<?Php include('includes/footer.php')?>
