<?php
error_reporting(0);
include('simple_html_dom.php');

if(isset($_GET["keyword"]))
{
	$keyword=$_GET["keyword"];
	$keyword=str_replace(' ','+',$keyword);
	$response=requestClinicalEvidence($keyword);
	$screen=customizeRequest($response,$keyword);
	echo $screen;
	
}

function customizeRequest($response,$keyword)
{
	$screen="<img src=\"http://widgets.ebscohost.com/prod/simplekey/clinicalevidence/Clinical_Evidence.png\" width='116'></img>";
	$showkeyword=str_replace('+',' ',$keyword);
	$screen.="<p style=\"font-weight:700\">Result for \"$showkeyword\"<p>";
	$element=$response->find('//dd//dl//dd');
	if($element!=NULL)
	{
		$screen.=substr($element[0],0,275)."...";
        $screen.=substr($element[1],0,275)."..."; 
	}
	else
	{
		$screen.="There is no search result.</br>";
	}
	  
	$screen=str_replace('<dd>','',$screen);
	$screen=str_replace('</dd>','',$screen);
	$screen .= "<a style=\"font-weight:700\" target=\"_blank\" href=\"http://search.clinicalevidence.bmj.com/s/search.html?query=$keyword&collection=bmj-clinical-evidence&profile=_default&form=simple\"></br></br>Click to view all results in Clinical Evidence</a>";
            
	return $screen;
}

function requestClinicalEvidence($keyword)
{
            $url="http://search.clinicalevidence.bmj.com/s/search.html?query=$keyword&collection=bmj-clinical-evidence&profile=_default&form=simple"; 
		            
			$result=file_get_html("http://search.clinicalevidence.bmj.com/s/search.html?query=$keyword&collection=bmj-clinical-evidence&profile=_default&form=simple");  
			return $result;          
}

?> 
<html>
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