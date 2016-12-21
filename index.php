<?php
include("lib/Config.php");
$action = "";
if(isset($_GET["action"]))
	$action = $_GET["action"];
if($action == "logout")
	$PDODB = null;

$msg = "";
if(isset($_POST['uname'])){
$name = $_POST['uname'];
$pword = $_POST['pword'];
$pw=md5($pword);
$sel = "SELECT * FROM police_users WHERE name='$name' AND password='$pw'";	
$stmt = $PDODB->query($sel);
$res = $stmt->fetch(PDO::FETCH_ASSOC);
$row_count = $stmt->rowCount();
	if($row_count == 0){
		$msg= "Invalid username/ password";
	}else{
  
		$_SESSION['police']['id'] = $res['id'];
		$_SESSION['police']['name'] = $res['name'];
	
		$type = $res['type'];
		$_SESSION['police']['type'] = $res['type'];

		if($type=='Admin'){

			header("Location:dashboard.php");
			exit;
  
		} else if($type == 'SP'){
			
			header("Location:sp_dashboard.php");
			exit;
			
		}else{
	  
			header("Location:index.php");
			exit;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>

<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.4.4.js" type="text/javascript"></script>

<script type="text/javascript" src="js/spinner/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/spinner/ui.spinner.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<script type="text/javascript" src="js/fileManager/elfinder.min.js"></script>

<script type="text/javascript" src="js/wysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="js/wysiwyg/wysiwyg.table.js"></script>

<script type="text/javascript" src="js/flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/flot/excanvas.min.js"></script>

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

</head>

<body>

<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="backTo"><a href="#" title=""><img src="images/icons/topnav/mainWebsite.png" alt="" /><span>Main website</span></a></div>
            <div class="userNav">
                <ul>
                    <li><a href="#" title=""><img src="images/icons/topnav/contactAdmin.png" alt="" /><span>Contact admin</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<!-- Login form area -->
<div class="loginWrapper">
	<div class="loginLogo"><img src="images/logo.png" width="225" alt="" /></div>
     <center>
        <span style="color:#F22; font-weight:bold;">
                    <?php echo $msg; ?>
        </span>
	</center>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Login</h5></div>
        
        <form action="index.php" id="valid" class="mainForm" method="post">
            <fieldset>
                <div class="loginRow noborder">
                    <label for="req1">Username:</label>
                    <div class="loginInput">
						<input type="text" name="uname" class="validate[required]" id="req1" />
					</div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label for="req2">Password:</label>
                    <div class="loginInput">
						<input type="password" name="pword" class="validate[required]" id="req2" />
					</div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <input type="submit" name="submit" value="Log in" class="greyishBtn submitForm" />
					<div class="fix"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<!-- Footer -->
<div id="footer">
	<div class="wrapper">
    	<span></span>
    </div>
</div>

</body>
</html>
