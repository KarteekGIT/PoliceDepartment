<?php
//DB wrapper functions

/*function dbConnect($host, $user, $pword, $name){
    mysql_connect($host, $user, $pword);
    mysql_select_db($name);
}*/

function executeQuery($query, $PDODB){
    return $PDODB->query($query);   
}

function totalRecords($result, $PDODB){
	$rows = $PDODB->query($result);
	$row_count = $rows->rowCount();
   return $row_count;
}

function getRecordId($PDODB){
   return $PDODB->lastInsertId();
}

function getAssoc($result, $PDODB){
	$stm = $PDODB->query($result);
   return $stm->fetchAll(PDO::FETCH_ASSOC);
}
function getRow($result, $PDODB){
	$stm = $PDODB->query($result);
   return $stm->fetch(PDO::FETCH_ASSOC);
}
function showError($query, $PDODB){
   die(mysql_error()."<br /> Query: ".$query);
}

function dbClose($PDODB){
   mysql_close();
   $PDODB = null;
}
function getRecord($key,$table,$value,$att, $PDODB){
  $sel="select * from $table where $key='$value'";
  $res=$PDODB->query($sel);
  $rec= $res->fetch(PDO::FETCH_ASSOC);
  return $rec[$att];
}
function getRecordCon($key,$table,$value,$att,$key1,$value1,$PDODB){
  $sel="select * from $table where $key='$value' and $key1='$value1'";
  $res=$PDODB->query($sel);
  $rec= $res->fetch(PDO::FETCH_ASSOC);
  return $rec[$att];
}



function getRecordTotal($key,$table,$value,$att,$PDODB){
  $sel="select * from $table where $key='$value'";
  $res=$PDOB->query($sel);
  $tot=0;
  while($rec= $res->fetch(PDO::FETCH_ASSOC)){
  $tot+= $rec[$att];
  }
  return $tot;
}

function getRecordTotalCon($key,$table,$value,$att,$key1,$value1,$PDODB){
  $sel=$PDODB->query("select * from $table where $key='$value' and $key1='$value1'");
  $tot=0;
  while($rec= $sel->fetch($sel)){
  $tot += $rec[$att];
  }
  return $tot;
}

function getRecordCount($key,$table,$value, $PDODB){
  $query = "select * from $table where $key='$value'";
  $sel = $PDODB->query($query);
    return $sel->rowCount();
}
function getRecordCountl($key,$table,$value, $PDODB){
  $sel=$PDODB->query("select * from $table where $key like '%$value%'");
    return $sel->rowCount();
}
function getRecordCountrev($key,$table,$value,$PDODB){
  $sel=$PDODB->query("select * from $table where $key!='$value'");
    return $sel->rowCount();
}
function getRecordCountCon($key,$table,$value,$key1,$value1, $PDODB){
  $sel=$PDODB->query("select * from $table where $key='$value' and $key1='$value1'");
    return $sel->rowCount();
}
function getRecordCountConCon($key,$table,$value,$key1,$value1,$key2,$value2,$PDODB){
  $sel=$PDODB->query("select * from $table where $key='$value' and $key1='$value1' and $key2='$value2'");
    return $sel->rowCount();
}
function getRecordCountConl($key,$table,$value,$key1,$value1,$PDODB){
  $sel=$PDODB->query("select * from $table where $key='$value' and $key1 like '%$value1%'");
    return $sel->rowCount();
}
function getRecordCountConlrev($key,$table,$value,$key1,$value1,$PDODB){
  $sel=$PDODB->query("select * from $table where $key!='$value' and $key1 like '%$value1%'");
    return $sel->rowCount();
}
function getCount($query,$PDODB){
  $sel=$PDODB->query($query);
    return $sel->rowCount();
}
function getOptions($key,$table,$value,$action,$parent,$i,$par,$PDODB){?>

	<option <?php if($action=='edit'){if($par==$value){echo 'selected';}}?> value="<?php echo $value;?>"><span style="font-size:<?php echo 26;?>px;"><?php 
	$j=$i;
	while($j>0){echo " ->";$j--;}echo getRecord('id','ven_categories',$value,'name') ?></span></option>
    
    <?php 
				$pid=$value;
				$s="select * from ven_categories where parent='$pid'";
				$su=executeQuery($s, $PDODB);
				$cnt=totalRecords($su, $PDODB);
				if($cnt!=0){
					$i++;
				}else{?>
										
					<?php }
					while($sub=getAssoc($su, $PDODB)){
														
						getOptions('id','ven_categories',$sub['id'],$action,$sub['parent'],$i,$par, $PDODB);
					}
											
	 }
	 function getOptionsprod($key,$table,$value,$action,$parent,$i,$par,$PDODB){
		  $cnt=getRecordCount('parent','ven_categories',$value,$PDODB);
		  if($cnt!=0){
		 ?>
     <optgroup label="<?php 
	$j=$i;
	while($j>0){echo " ->";$j--;}echo getRecord('id','ven_categories',$value,'name',$PDODB) ?>"></optgroup>
    <?php }else{?>

	<option <?php if($action=='edit'){if($par==$value){echo 'selected';}}?> value="<?php echo $value;?>"><span style="font-size:<?php echo 26;?>px;"><?php 
	$j=$i;
	while($j>0){echo " ->";$j--;}echo getRecord('id','ven_categories',$value,'name') ?></span></option>
    
    <?php }
		$pid=$value;
									$s = $PDODB->query("select * from ven_categories where parent='$pid'");
									$cnt = $s->rowCount();
									if($cnt!=0){
										$i++;
									}else{?>
										
									<?php }
									while($sub=getAssoc($su)){
										
									
										getOptionsprod('id','ven_categories',$sub['id'],$action,$sub['parent'],$i,$par,$PDODB);
										}
											
	 }
?>
