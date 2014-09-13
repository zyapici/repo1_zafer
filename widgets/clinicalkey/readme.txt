=============================================================================================
* WIDGET NAME: Clinical Key
* DESCRIPTION: Clinical Key widget get the search term of EDS and send to Clinical Key platform, show the users result from platform.
* KEYWORDS: Clinical, Clinical Key, search results 
* LOCATION: Search Results
* CUSTOMER PARAMETERS: None
* EBSCO PARAMETERS: widget label, ep.searchTerm
* IFRAME URL: http://widgets.ebscohost.com/prod/simplekey/clinicalkey/clinical_key.php?keyword=ep.SearchTerm
* CUSTOM HTML: <iframe frameborder="0" src="http://widgets.ebscohost.com/prod/simplekey/clinicalkey/clinical_key.php?keyword=ep.SearchTerm"></iframe>
* AUTHOR & EMAIL: Zafer Yapıcı - zyapici@ebsco.com
* DATE ADDED: 11/9/2014
* DATE MODIFIED: 11/9/2014
* LAST CHANGE DESCRIPTION: None
=============================================================================================

** EXTRA **

WIDGET TYPE: Results List 
DEPENDANCIES: --
RELATED WIDGETS: --
ID-URI: /prod/simplekey/clinicalkey


== Description ==

ClinicalKey widget get the search term of EDS and send to ClinicalKey platform, show the users result from platform.
It shows first two title from results and link to see all results. 


== Customer Parameters ==

* keyword - ep.SearchTerm

== Screenshots ==

1. http://widgets.ebscohost.com/prod/simplekey/clinicalkey/screenshot1.png


== Installation ==

1. Sign into Eadmin 
2. On an EDS profile, go to 'Viewing Results' / scroll down to Widgets / click 'Modify'
3. Click 'Add Item'
4. Enter the Label you would like (suggested: 'ClinicalKey')
5. Enter the pixel-height of the widget you would like
6. Enter the iFrame URL: http://widgets.ebscohost.com/prod/simplekey/clinicalkey/clinical_key.php?keyword=ep.SearchTerm
7. Click 'submit' and then 'View Changes on EBSCO', run a search


== Testing ==

Link to an EDS profile where the widget can be viewed.

http://search.ebscohost.com/login.aspx?authtype=uid&user=ns110997&password=password&profile=eds


Standalone version of the widget with real parameter values:
http://widgets.ebscohost.com/prod/simplekey/clinicalkey/clinical_key.php?keyword=ep.SearchTerm


== Frequently Asked Questions ==

= **Question** =

**Answer**


== SI and Github ==

Originating SI: < needs to be updated with link ! >
e.g. https://system.netsuite.com/app/common/custom/custrecordentry.nl?rectype=36&id=123456

Github repository: < needs to be updated with link ! >
e.g. https://github.com/EBSCO-GSS/Widgets/abcdefg

