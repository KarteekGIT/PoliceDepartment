//This functionis paginates year wise table
$(document).ready(function() { 
	var rows=$('table#YearWise').find('tbody tr').length; 
	var no_rec_per_page=10; 
	var no_pages= Math.ceil(rows/no_rec_per_page); 
	var $pagenumbers=$('<div id="pagesYear"></div>'); 
	for(i=0;i<no_pages;i++) { $('<span class="pageYear">'+'<button>'+(i+1)+'</button>'+'</span>').appendTo($pagenumbers); } 
	$pagenumbers.insertAfter('table#YearWise'); $('.page').hover( function(){ $(this).addClass('hover'); }, function(){ $(this).removeClass('hover'); } ); 
	$('table#YearWise').find('tbody tr').hide(); 
	var tr=$('table#YearWise tbody tr'); 
	for(var i=0;i<=no_rec_per_page-1;i++) { $(tr[i]).show(); } 
	$('span.pageYear').click(function(event){ 
		$('table#YearWise').find('tbody tr').hide(); 
		for(i=($(this).text()-1)*no_rec_per_page;i<=$(this).text()*no_rec_per_page-1;i++) { $(tr[i]).show(); } }); 
	});
//This functionis paginates crime wise table	
$(document).ready(function() { 
	var rows=$('table#CrimeWise').find('tbody tr').length; 
	var no_rec_per_page=10; 
	var no_pages= Math.ceil(rows/no_rec_per_page); 
	var $pagenumbers=$('<div id="pagesCrime"></div>'); 
	for(i=0;i<no_pages;i++) { $('<span class="pageCrime">'+'<button>'+(i+1)+'</button>'+'</span>').appendTo($pagenumbers); } 
	$pagenumbers.insertAfter('table#CrimeWise'); $('.page').hover( function(){ $(this).addClass('hover'); }, function(){ $(this).removeClass('hover'); } ); 
	$('table#CrimeWise').find('tbody tr').hide(); 
	var tr=$('table#CrimeWise tbody tr'); 
	for(var i=0;i<=no_rec_per_page-1;i++) { $(tr[i]).show(); } 
	$('span.pageCrime').click(function(event){ 
		$('table#CrimeWise').find('tbody tr').hide(); 
		for(i=($(this).text()-1)*no_rec_per_page;i<=$(this).text()*no_rec_per_page-1;i++) { $(tr[i]).show(); } }); 
	});