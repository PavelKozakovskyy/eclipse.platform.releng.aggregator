<?php
# Begin: page-specific settings.  Change these.
$pageTitle    = "Eclipse Project Downloads";
$pageKeywords = "";
$pageAuthor   = "";

//ini_set("display_errors", "true");
//error_reporting (E_ALL);
$eclipseStream="3";
$otherIndexFile="index.html";
$otherStream="4";
include('dlconfig3.php');
$subdirDrops="drops";

# Use the basic white layout if the file is not hosted on download.eclipse.org
$layout = (array_key_exists("SERVER_NAME", $_SERVER) && ($_SERVER['SERVER_NAME'] == "download.eclipse.org")) ? "default" : "html";

ob_start();

switch($layout){
case 'html':
  #If this file is not on download.eclipse.org print the legacy headers.?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../default_style.css" />
<title><?php echo $pageTitle;?></title>
<!--
note, for Nova (default) secion below, this 'refresh'
header is hadded 'by hand' after nova version is created ...
since it generates its own 'header section'
-->
<meta http-equiv="refresh" content="10; URL=index.html">
</head>
<body><?php
    break;
default:
  #Otherwise use the default layout (content printed inside the nova theme).
  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
  $App  = new App();
  $Nav  = new Nav();
  $Menu   = new Menu();
  break;
}?>
<div class="container_<?php echo $layout;?>">
<table border="0" cellspacing="5" cellpadding="2" width="100%" >

<tr>

<td align="left">
<font class="indextop"><br /> Eclipse Project <?php echo $eclipseStream;?>.x Stream Downloads</font> <br />
<br />
</td>

</tr>

</table>

<table border="0" cellspacing="5" cellpadding="2" width="100%" >
<tr>
<td align="left" valign="top" colspan="2" bgcolor="#0080C0"><font color="#FFFFFF" face="Arial,Helvetica">3.8.x
Downloads</font></td></tr> <!-- The Eclipse Projects --> <tr> <td>

<p>The build that used to be here has been moved to
<a href="http://archive.eclipse.org/eclipse/downloads/">archived builds</a>.
Specifically, for the last 3.8.x build see the <a href="http://archive.eclipse.org/eclipse/downloads/drops/R-3.8.2-201301310800/">3.8.2 build</a> there.</p>

<p>You should be re-directed within 10 seconds to the page for
<a href="http://download.eclipse.org/eclipse/downloads/">the most recent Eclipse builds</a>. If not,
simply click on the link. Please update your bookmarks.</p>

<p>This page
has been left in place for now, in case some have it bookmarked, but soon this
page itself will be removed (so update your bookmarks, as well as your build scripts, if needed).</p>

</td></tr>
</table>

<?php

  echo '</div>';
$html = ob_get_clean();

switch($layout){
case 'html':
  #echo the computed content with the body and html closing tag. This is for the old layout.
  echo $html;
  echo '</body>';
  echo '</html>';
  break;

default:
  #For the default view we use $App->generatePage to generate the page inside nova.
  $App->AddExtraHtmlHeader('<link rel="stylesheet" href="../default_style.css" />');
  $App->Promotion = FALSE;
  $App->generatePage('Nova', $Menu, NULL , $pageAuthor, $pageKeywords, $pageTitle, $html);
  break;
}

