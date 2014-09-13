<?php
error_reporting(0);
include('simple_html_dom.php');

if(isset($_GET["keyword"]))
{
	$keyword=$_GET["keyword"];
	$keyword=str_replace(' ','+',$keyword);
	$response=requestBestPractice($keyword);
	$screen=customizeRequest($response,$keyword);
	echo $screen;
	
}

function customizeRequest($response,$keyword)
{
	$screen="<img src=\"http://widgets.ebscohost.com/prod/simplekey/bmjbestpractice/best_practice.png\" height='20' width='116'></img>";
	$showkeyword=str_replace('+',' ',$keyword);
	$screen.="<p style=\"font-weight:700\">Result for \"$showkeyword\"<p>";
	$element=$response->find('//dd//dl//dd//h2');
	if($element!=NULL)
	{
		$screen.=$element[0];
        $screen.=$element[1]; 
	}
	else
	{
		$screen.="There is no search result.</br>";
	}
	  
	$screen=str_replace('<dd>','',$screen);
	$screen=str_replace('</dd>','',$screen);
	$screen=str_replace("href=\"","href=\"http://bestpractice.bmj.com",$screen);
	$screen=str_replace("<a","<a target='_blank'; ",$screen);
	$screen .= "<a style=\"font-weight:700\" target=\"_blank\" href=\"http://bestpractice.bmj.com/best-practice/search.html?aliasHandle=&searchableText=$keyword\">Click to view all results in BMJ Best Practice</a>";
         
	return $screen;
}

function requestBestPractice($keyword)
{         
			$result=file_get_html("http://bestpractice.bmj.com/best-practice/search.html?aliasHandle=&searchableText=$keyword");  
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