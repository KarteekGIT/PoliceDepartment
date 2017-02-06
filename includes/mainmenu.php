<div class="leftNav">
    	<ul id="menu">
			<li class="dash">
				<a href="dashboard.php" class="<?php if(basename($_SERVER['SCRIPT_FILENAME'])=="dashboard.php" ){echo "active";}?>" title="">
					<span>Home</span>
				</a>
			</li>
      	<?php if($_SESSION['police']['type']=='Admin'){?>
       
            <li class="contacts">
				<a href="#" title="" class="exp <?php if(basename($_SERVER['SCRIPT_FILENAME'])=="adduser.php" ){echo "active";}?>" >
					<span>Administrators</span>
				</a>
            	<ul class="sub ">
                  <li>
					<a href="adduser.php?action=addnew">Add new Administrator</a>
				  </li>
				  <li>
					<a href="adduser.php?action=list">Administrators List</a>
				  </li>
                </ul>
            </li>
            
            <li class="contacts">
				<a href="#" title="" class="exp <?php if(basename($_SERVER['SCRIPT_FILENAME'])=="addstation.php" ){echo "active";}?>" >
					<span>Station Users</span>
				</a>
            	<ul class="sub ">
                  <li><a href="addstation.php?action=addnew">Add new Station User</a></li>
				  <li><a href="addstation.php?action=list">Station Users List</a></li>
                </ul>
            </li>
            <?php }?>
            
            <li class="contacts">
				<a href="#" title="" class="exp <?php if(basename($_SERVER['SCRIPT_FILENAME'])=="adddata.php" || basename($_SERVER['SCRIPT_FILENAME'])=="pt_data.php" ){echo "active";}?>" >
					<span>Cases</span>
				</a>
            	<ul class="sub ">
                  <?php if($_SESSION['police']['type']=='SP'){?>
						<li><a href="data_sp.php?action=list">Cases List</a></li>
                        <?php }else{?>
                        <li><a href="adddata.php?action=list">Cases List</a></li>
                        <?php }?>
                         <?php if($_SESSION['police']['type']!='Admin' && $_SESSION['police']['type']!='SP'){?>
									<li><a href="pt_data.php?action=list">PT Cases List</a></li>
						 <?php }?>
                 
                </ul>
            </li>
            
            
        </ul>
    </div>