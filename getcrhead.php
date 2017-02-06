<?php 
include('lib/Config.php');
 $str=$_REQUEST['str'];
 $s="select DISTINCT crime_head from police_cases where type = '$str'";
$res=executeQuery($s);
?>
<select name="chead"  onchange="getcasedatayear('reason')"  id="ched">
<option value="">---Select Crime Head</option>
<?php while($rec=getAssoc($res)){?>
<option value="<?php echo $rec['crime_head'];?>"><?php echo $rec['crime_head'];?></option>
<?php }?>

</select>