<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
include('simple_html_dom_ssl.php');

if(isset($_GET["keyword"]))
{
	$keyword=$_GET["keyword"];
	$keyword=str_replace(' ','+',$keyword);
	$response=requestClinicalKey($keyword);
	$screen=customizeRequest($response,$keyword);
	echo $screen;
	
}

function customizeRequest($response,$keyword)
{
	$screen="<img src='http://widgets.ebscohost.com/prod/simplekey/clinicalkey/clinicalkey.png' height='17' width='116'></img>";
	$showkeyword=str_replace('+',' ',$keyword);
	$screen.="<p style=\"font-weight:700\">Result for \"$showkeyword\"<p>";
	
	
 
	$element1=explode(",",$response);
	
	
	foreach($element1 as $e)
	    {
			
			
			if((strpos($e,"itemtitle") || strpos($e,"eid")) && !((strpos($e,"hubeid") || strpos($e,"pdfeid")) || strpos($e,"altlangeid")))
			   $element[]=$e;
				
			
		
		
		}

		
	if($element!=NULL)
	{
		$eid4=str_replace('"','',$element[4]);
		$eid4=str_replace('eid:','',$eid4);
		$title3=str_replace('"','',$element[3]);
		$title3=str_replace('itemtitle:','',$title3);
		
		
		$screen.="<a target='_blank'; href=\"https://www.clinicalkey.com/#!/ContentPlayerCtrl/doPlayContent/".$eid4."/{%22scope%22:%22all%22,%22query%22:%22$keyword%22}\">$title3</a></br></br>";
		
		
		$eid6=str_replace('"','',$element[6]);
		$eid6=str_replace('eid:','',$eid6);
		$title5=str_replace('"','',$element[5]);
		$title5=str_replace('itemtitle:','',$title5);
		
		
	    $screen.="<a target='_blank'; href=\"https://www.clinicalkey.com/#!/ContentPlayerCtrl/doPlayContent/".$eid6."/{%22scope%22:%22all%22,%22query%22:%22$keyword%22}\">$title5</a>";
	}
	else
	{
		$screen.="There is no search result.</br>";
	}
	  
	$screen=str_replace("<a","<a target='_blank'; ",$screen);
	$screen .= "<a target='_blank'; style=\"font-weight:700\" href=\"https://www.clinicalkey.com/#!/SearchCtrl/doSearchResults/$keyword///\"></br></br>Click to view all results in Clinical Key</a>";
            
	return $screen;
}

function requestClinicalKey($keyword)
{
            $url="https://www.clinicalkey.com/search/resultsDS?query=$keyword&facet=&filter=&onlyEntitled=false&page=1&start=0&limit=2"; 
			$result=file_get_html($url);
			return $result;          
}

?> 
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<style>
h2
  {
  font: 10pt arial;
  font-weight:700;
  }
p
  {
  font: 10pt arial;
  font-weight:400;
  }
</style>
</html>