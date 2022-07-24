<%@ Language=VBScript %> 
<!--METADATA TYPE="typelib" UUID="CD000000-8B95-11D1-82DB-00C04FB1625D" NAME="CDO for Windows 2000 Library" --> 
<% 
gname=request("name")
gemail=request("email")
gphone=request("phone")
gsource=request("source")
gquery=request("query")


on error resume next 

Set objMail = Server.CreateObject("CDO.Message") 

Set objMailConfig = Server.CreateObject("CDO.Configuration") 
objMailConfig.Fields(cdoSendUsingMethod) = cdoSendUsingPort 
objMailConfig.Fields(cdoSMTPConnectionTimeout) = 60 
objMailConfig.Fields(cdoSMTPServer) = "smtp.gmail.com"

objMailConfig.Fields(cdoSMTPConnectionTimeout) = 60
objMailConfig.Fields(cdoSMTPServerPort) = 25
objMailConfig.Fields(cdoSMTPAuthenticate) = True
objMailConfig.Fields(cdoSMTPUseSSL) = True
objMailConfig.Fields(cdoSendUserName) = "mailer@skdevelopersgroup.com"
objMailConfig.Fields(cdoSendPassword) = "mailsk$45"
objMailConfig.Fields(cdoReplyTo) = gemail 


objMailConfig.Fields.Update 

Set objMail.Configuration = objMailConfig 

objMail.From = gemail 
objMail.To = "info@skdevelopersgroup.com" 
objMail.Bcc = "" 
objMail.Subject = "Online Enquiry from website"

objMail.HTMLBody ="You have received a business enquiry from your website www.skdevelopersgroup.com. Below are the details of the enquiry.<br><br>"

objMail.HTMLBody = objMail.HTMLBody+"<table width=100% bgcolor=00b0ff align=center><tr><td><font color=white face=arial size=2><b>Enquiry Details</b></font></td></tr></table>"

objMail.HTMLBody = objMail.HTMLBody+"<table width=100% ><tr><td width=175>Name</td><td>"&gname&"</td></tr>"

objMail.HTMLBody = objMail.HTMLBody+"<tr><td>Email</td><td>"&gemail&"</td></tr>"

objMail.HTMLBody = objMail.HTMLBody+"<tr><td>Phone No</td><td>"&gphone&"</td></tr>"
objMail.HTMLBody = objMail.HTMLBody+"<tr><td>How did you know about our project ?</td><td>"&gsource&"</td></tr>"

objMail.HTMLBody = objMail.HTMLBody+"<tr><td>Message</td><td> "&gquery&"</td></tr></table><br><hr>"
objMail.Send 

If Err.Number <> 0 Then 
Response.Write Err.Description 
Else 
Response.Redirect "thank-you.html" 
End If 

Set objMail = Nothing 
Set objMailConfig = Nothing 
%>