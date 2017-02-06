<?php
function generateCode($size){
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$shuffled_str = str_shuffle($str);
	return substr($shuffled_str, 0, $size);
}
// Email address verification, do not edit.
function isEmail($email) { 

	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
		
}
function checkadminlogin(){
	if (!isset($_SESSION['police']['id']) ) {
		header('location:index.php?action=invalidlogin');
		exit;
	}
}
function datef($dat){
	$da=explode("-",$dat);
	if($da[1]=="JAN"){
		$mon=01;
		}
		if($da[1]=="FEB"){
		$mon=02;
		}
		if($da[1]=="MAR"){
		$mon=03;
		}
		if($da[1]=="APR"){
		$mon=04;
		}
		if($da[1]=="MAY"){
		$mon=05;
		}
		if($da[1]=="JUN"){
		$mon=06;
		}
		if($da[1]=="JUL"){
		$mon=07;
		}
		if($da[1]=="AUG"){
		$mon=08;
		}
		if($da[1]=="SEP"){
		$mon=09;
		}
		if($da[1]=="OCT"){
		$mon=10;
		}
		if($da[1]=="NOV"){
		$mon=11;
		}
		if($da[1]=="DEC"){
		$mon=12;
		}
		$start=$da[2]."-".$mon."-".$da[0];
		return $start;
}
function dateof($dat){
	$da=explode("-",$dat);
	if($da[1]=="JAN"){
		$mon='01';
		}
		if($da[1]=="FEB"){
		$mon='02';
		}
		if($da[1]=="MAR"){
		$mon='03';
		}
		if($da[1]=="APR"){
		$mon='04';
		}
		if($da[1]=="MAY"){
		$mon='05';
		}
		if($da[1]=="JUN"){
		$mon='06';
		}
		if($da[1]=="JUL"){
		$mon='07';
		}
		if($da[1]=="AUG"){
		$mon='08';
		}
		if($da[1]=="SEP"){
		$mon='09';
		}
		if($da[1]=="OCT"){
		$mon='10';
		}
		if($da[1]=="NOV"){
		$mon='11';
		}
		if($da[1]=="DEC"){
		$mon='12';
		}
		$start=$da[0].$mon.substr($da[2],2,2);
		return $start;
}
function times($dat){
	$da=explode("-",$dat);
	if($da[1]=="JAN"){
		$mon=1;
		}
		if($da[1]=="FEB"){
		$mon=2;
		}
		if($da[1]=="MAR"){
		$mon=3;
		}
		if($da[1]=="APR"){
		$mon=4;
		}
		if($da[1]=="MAY"){
		$mon=5;
		}
		if($da[1]=="JUN"){
		$mon=6;
		}
		if($da[1]=="JUL"){
		$mon=7;
		}
		if($da[1]=="AUG"){
		$mon=8;
		}
		if($da[1]=="SEP"){
		$mon=9;
		}
		if($da[1]=="OCT"){
		$mon=10;
		}
		if($da[1]=="NOV"){
		$mon=11;
		}
		if($da[1]=="DEC"){
		$mon=12;
		}
		
		$start=mktime(0, 0, 0, $mon, $da[0], $da[2]);;
		return $start;
}
function timesto($dat,$cnt){
	$da=explode("-",$dat);
	if($da[1]=="JAN"){
		$mon=1;
		}
		if($da[1]=="FEB"){
		$mon=2;
		}
		if($da[1]=="MAR"){
		$mon=3;
		}
		if($da[1]=="APR"){
		$mon=4;
		}
		if($da[1]=="MAY"){
		$mon=5;
		}
		if($da[1]=="JUN"){
		$mon=6;
		}
		if($da[1]=="JUL"){
		$mon=7;
		}
		if($da[1]=="AUG"){
		$mon=8;
		}
		if($da[1]=="SEP"){
		$mon=9;
		}
		if($da[1]=="OCT"){
		$mon=10;
		}
		if($da[1]=="NOV"){
		$mon=11;
		}
		if($da[1]=="DEC"){
		$mon=12;
		}
		
		$start=mktime(0, 0, 0, $mon+$cnt, $da[0], $da[2]);;
		return $start;
}
function flo($inte){
	$j=explode(".",$inte);
	$d=$j[0];
	if(isset($j[1])){
		$d.= ".".substr($j[1],0,2);
	}
	return $d; 
}	
function Pages($numOfRows, $sql, $limit,$path)
{
	//$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$row = mysql_fetch_array(mysql_query($query));
	//$total_pages = $row['num'];
	$total_pages = $numOfRows;

	$adjacents = "2";

	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);

	if($page)
	$start = ($page - 1) * $limit;
	else
	$start = 0;

	$sql .= "LIMIT $start, $limit";
	$result = mysql_query($sql);

	$prev = $page - 1;
	$next = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$lpm1 = $lastpage - 1;

	$pagination = "";
	if($lastpage > 1)
	{   
		$pagination .= "<div class='pagination'>";
	if ($page > 1)
		$pagination.= "<a href='".$path."page=$prev'>« previous</a>";
	else
		$pagination.= "<span class='disabled'>« previous</span>";   

	if ($lastpage < 7 + ($adjacents * 2))
	{   
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
		if ($counter == $page)
			$pagination.= "<span class='current'>$counter</span>";
		else
			$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
		}
	}
	elseif($lastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))       
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
	$pagination.= "...";
	$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
	$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
}
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
	$pagination.= "<a href='".$path."page=1'>1</a>";
	$pagination.= "<a href='".$path."page=2'>2</a>";
	$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
	$pagination.= "..";
	$pagination.= "<a href='".$path."page=$lpm1'>$lpm1</a>";
	$pagination.= "<a href='".$path."page=$lastpage'>$lastpage</a>";       
}
else
{
	$pagination.= "<a href='".$path."page=1'>1</a>";
	$pagination.= "<a href='".$path."page=2'>2</a>";
	$pagination.= "..";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
	$pagination.= "<span class='current'>$counter</span>";
else
	$pagination.= "<a href='".$path."page=$counter'>$counter</a>";                   
}
}
}

if ($page < $counter - 1)
	$pagination.= "<a href='".$path."page=$next'>next »</a>";
else
	$pagination.= "<span class='disabled'>next »</span>";
	$pagination.= "</div>\n";       
}


return $pagination;
}
function paginateexte($start, $limit, $total, $otherParams='') {
	
	if ($otherParams!=''){
		$otherParams = $otherParams;
	}
	$allPages	 = ceil($total/$limit);
	$currentPage = floor($start/$limit) + 1;
	$pagination  = "";
	if ($allPages>10) {
		$maxPages = ($allPages>9) ? 9 : $allPages;

		if ($allPages>9) {
			if ($currentPage>=1&&$currentPage<=$allPages) {
				$pagination .= ($currentPage>4) ? "<td> ... </td>" : " ";
				$minPages    = ($currentPage>4) ? $currentPage : 5;
				$maxPages    = ($currentPage<$allPages-4) ? $currentPage : $allPages - 4;

				for($i = $minPages-4; $i<$maxPages+5; $i++) {
					$pagination .= ($i == $currentPage) ?$i : "<a href=\"".$otherParams."&start=".(($i-1)*$limit)."\">".$i."</a>";
				}
				$pagination .= ($currentPage<$allPages-4) ? "<td style='width:30px;'> ...</td> " : " ";
			} else {
				$pagination .= "<td style='width:30px;'>...</td> ";
			}
		}
	} else {
		for($i=1; $i<$allPages+1; $i++) {
			$pagination .= ($i==$currentPage) ?"<a class='number current'>".$i."</a>" : "<a class='number'  href=\"" . $otherParams."&start=" . (($i-1)*$limit)."\">" . $i . "</a>";
		}
	}

	 if ($currentPage>1){ 
		$pagination = "<a   href=\"" . $otherParams . "&start=0 \"><strong>&laquo;</strong> First</a><a  href=\"". $otherParams . "&start=" . (($currentPage-2)*$limit)."\"><strong >&laquo;</strong> Previous</a>" . $pagination;
	
	 }
	 if ($currentPage<$allPages){
		
		$pagination .= "<a  href=\"". $otherParams . "&start=" . ($currentPage*$limit)."\">Next <strong>&raquo;</strong></a><a  href=\"". $otherParams . "&start=" . (($allPages-1)*$limit)."\">Last <strong>&raquo;</strong></a>";
	 }
     echo $pagination;
	/*echo "<table align=\"center\" class=\"boxPagination\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style='width:300px'>".$pagination."</tr></table>";*/
}

?>