import sys
import os

def print_environ(environ=os.environ):
    """Dump the shell environment as HTML."""
    keys = environ.keys()
    keys.sort()
    print
    i = 0
    for key in keys:
        if i == 0:
            print "<tr class=alt><td>", escape(key), "</td><td>", escape(environ[key]), "</td></tr>"
            i = 1
        else:
            print "<tr class=normal><td>", escape(key), "</td><td>", escape(environ[key]), "</td</tr>"
            i = 0
    print

def escape(s, quote=None):
    """Replace special characters '&', '<' and '>' by SGML entities."""
    s = s.replace("&", "&amp;") # Must be done first!
    s = s.replace("<", "&lt;")
    s = s.replace(">", "&gt;")
    if quote:
        s = s.replace('"', "&quot;")
    return s


print "Content-type: text/html\n\n"
print """<html>
<body leftMargin=0 topMargin=0 marginwidth=0 marginheight=0 bgcolor=white>
<style type="text/css">
  table { background-color: white; color: black; font: 10pt verdana, arial; margin-bottom: 25px; }
  tr.subhead { background-color: #ccc;}
  th { padding: 0 3px; }
  th.alt { background-color: black; color: white; padding: 3px 3px 2px; }
  td { padding: 0 3px; }
  tr.alt { background-color: #eee; }
  h1 { font: 24pt verdana, arial; margin: 0; }
  h2 { font: 18pt verdana, arial; margin: 0; }
  h3 { font: 12pt verdana, arial; margin: 0; }
  th a { color: darkblue; font: 8pt verdana, arial; }
  a { color: darkblue; text-decoration: none; }
  a:hover { color: darkblue; text-decoration: underline; }
  div.outer { width:90%; margin: 15px; }
  table.viewmenu td { background-color: #069; color: white; padding: 0 5px; }
  table.viewmenu td.end { padding: 0; }
  table.viewmenu a { color: white; font: 8pt verdana, arial; }
  table.viewmenu a:hover { color: white; font: 8pt verdana, arial; }
  a.tinylink { color: darkblue; font: 8pt verdana, arial; text-decoration:underline; }
  a.link { color: darkblue; text-decoration: underline; }
  div.buffer { padding-top: 7px; padding-bottom: 17px; }
  .small { font: 8pt verdana, arial; }
  table td { padding-right: 20px; }
  table td.nopad { padding-right: 5px; }
</style>
<table cellspacing="0" cellpadding="0" border="0" style="width:100%; border-collapse: collapse;">
<tr class="subhead" align="Left">
<th>Name</th><th>Value</th>
</tr>"""
print_environ()
print """</table></body>
</html>"""
