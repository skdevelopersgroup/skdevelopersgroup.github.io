print <<END_of_Multiline_Text;
Content-type: text/html

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>PHP test page.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/tabs.css" />
<!--[if lte IE 7]><style type="text/css">#tabs li, #tabs a { display: inline; zoom: 1; }</style><![endif]-->
<script type="text/javascript" src="/header.js"></script>
<script type="text/javascript">
//<![CDATA[
writeCopyFlag();
//]]>
</script>
</head>
<body>
<div class="page">
  <div class="header clear">
    <script type="text/javascript">
    //<![CDATA[
      if (window.product_copyrights) { writeHeader(window.plesk_promo.virtuozzo); }
    //]]>
    </script>
  </div>
  <div class="wrapper test">
    <div class="pathbar"><a href="/index.html">Site Home Page</a> &gt;</div>
    <h2>Perl possibilities test page</h2>
    <div id="tabs">
      <ul><li id="current" class="first"><a href="test.pl"><span>Environment</span></a></li></ul>
    </div>
    <div class="tab-content clear">
      <p>This page allows to check the possibility to get the extension environment settings.</p>
      <div class="form-container">
      <fieldset>
        <legend>Installed modules</legend>
        <div class="form-fields">
          <p>Perl version: $]</p>
          <iframe src="test_info.pl" height ="320px" width="100%"></iframe>
        </div>
      </fieldset>
      </div>
    </div>
  </div>
  <div class="footer">
    <div class="footer-area">
    <script type="text/javascript">
    //<![CDATA[
      if (window.product_copyrights) { writeFooter(window.plesk_promo.virtuozzo); }
    //]]>
    </script>
    </div>
  </div>
</div>
</body>
</html>
END_of_Multiline_Text
