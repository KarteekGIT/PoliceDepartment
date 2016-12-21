<?php 
include('lib/Config.php');
$str=$_REQUEST['str'];
$subd=$_REQUEST['subd'];
$sel="select DISTINCT ps_name from police_data where subdivision='$subd' and circle='$str'";
$rec=getAssoc($sel, $PDODB);
?>
<select name="ps_name" id="pss" <?php if(isset($_REQUEST['type']) && $_REQUEST['type']==2){?>onchange="getcasedatayear('ps_name')"<?php }?> >
<option value="">--Select Station--</option>
<?php foreach($rec as $key => $value){?>
<option value="<?php echo $value['ps_name'];?>"><?php echo $value['ps_name'];?></option>
<?php }?>

</select>