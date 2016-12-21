<?php 
include("lib/Config.php");
$commonFilePath = $_SERVER['DOCUMENT_ROOT']."/wglpolice/lib/functions/Common.php";
include ($commonFilePath);

checkadminlogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<!---->
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.4.js" type="text/javascript"></script>

<link href="css/clustermain.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>

<script type="text/javascript" src="js/pagenation.js"></script>
<script type="text/javascript" src="js/spinner/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<script type="text/javascript" src="js/fileManager/elfinder.min.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/flot/excanvas.min.js"></script>
<script type="text/javascript" src="js/wysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.table.js"></script>


<script type="text/javascript" src="js/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/dataTables/colResizable.min.js"></script>

<script type="text/javascript" src="js/forms/forms.js"></script>
<script type="text/javascript" src="js/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="js/forms/autotab.js"></script>
<script type="text/javascript" src="js/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/forms/jquery.validationEngine.js"></script>

<script type="text/javascript" src="js/colorPicker/colorpicker.js"></script>

<script type="text/javascript" src="js/uploader/plupload.js"></script>
<script type="text/javascript" src="js/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="js/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="js/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="js/ui/progress.js"></script>
<script type="text/javascript" src="js/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/ui/jquery.alerts.js"></script>

<script type="text/javascript" src="js/jBreadCrumb.1.1.js"></script>
<script type="text/javascript" src="js/cal.min.js"></script>
<script type="text/javascript" src="js/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="js/jquery.ToTop.js"></script>
<script type="text/javascript" src="js/jquery.listnav.js"></script>
<script type="text/javascript" src="js/jquery.sourcerer.js"></script> 
       
<script type="text/javascript" src="js/custom.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>

</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="welcome">
				<a href="#" title=""><img src="images/userPic.png" alt="" /></a><span>Welcome, <?php echo $_SESSION['police']['name'];?>!</span>
			</div>
            <div class="userNav"> <?php if($_SESSION['police']['type']=='SP'){?>
             <ul>
                   <li><a href="chg_pwd.php" title=""><img src="images/icons/topnav/tasks.png" alt="" /><span>Change Password</span></a></li>
                   <li><a href="logout.php" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Logout</span></a></li>
            </ul>
            <?php }else{?>
              <ul>
                    <li><a href="chg_pwd.php" title=""><img src="images/icons/topnav/tasks.png" alt="" /><span>Change Password</span></a></li>
                    <li><a href="logout.php" title=""><img src="images/icons/topnav/profile.png" alt="" /><span>Logout</span></a></li>
              </ul>
                <?php }?>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Header -->
<div id="header" class="wrapper">
    <div class="logo"><a href="index.php" title=""><img src="images/logo.png" width="200" alt="" /></a></div>
    <div class="middleNav">
    <?php if($_SESSION['police']['type']=='SP'){?>
    <ul>
        	<li class="iMes"><a href="data_sp.php?action=list" title=""><span>Cases</span></a></li>
            <li class="iStat"><a href="sp_dashboard.php" title=""><span>Dashboard</span></a></li>
        </ul>
    <?php }else{?>
    	<ul>
             <?php if($_SESSION['police']['type']=='Admin'){?>
             <li class="iStat"><a href="dashboard.php" title=""><span>Dashboard</span></a></li>
             <?php }?>
        </ul>
        <?php }?>
    </div>
    <div class="fix"></div>
</div>

<!-- Main wrapper -->
<div class="wrapper">
	
<!-- Left navigation -->
<?php include('includes/mainmenu.php')?>

<!-- Content -->
<div class="content" id="container">