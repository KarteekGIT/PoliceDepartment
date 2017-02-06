<?php 
include('lib/Config.php');
$str=$_REQUEST['str'];
$sel="select DISTINCT circle from police_data where subdivision='$str'";
$rec=getAssoc($sel, $PDODB);
?>
<select name="circle" id="circlee" <?php if(isset($_REQUEST['type']) && $_REQUEST['type']==2){?> onchange="getcasedatayear('circle')" <?php }else{?>onchange="getps(this.value)"<?php }?>>
<option value="">--Select Cicle--</option>
<?php foreach($rec as $key => $value){?>
<option value="<?php echo $value['circle'];?>"><?php echo $value['circle'];?></option>
<?php }?>

</select>