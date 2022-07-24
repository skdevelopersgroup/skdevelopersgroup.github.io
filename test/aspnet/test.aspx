<%@ Page Language="C#" EnableViewState="true" ClientTarget="uplevel" ValidateRequest="false" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<%@ Import Namespace="System.Web.Mail" %>
<script runat="server">
    readonly string[] tab_captions = new string[] { "MySQL", "MSSQL", "MS Access", "E-Mail", "Environment" };
    readonly string[] tab_ids = new string[] { "mysql", "mssql", "msaccess", "email", "environment" };
    readonly string[] tab_legends = new string[] { "Test MySQL Connection", "Test MSSQL Connection", "Test MS Access Connection", "Test send mail", "Environment" };
    readonly string[] tab_descriptions = new string[] {@"
        This page allows to check the connection possibility between the SQL client on your
        host and one of remote database server. You should have working accounts on the
        database servers you want to test. Here you can test the connection possibility
        with the MySQL server.",@"
        Here you can test the connection possibility with the Microsoft SQL server.",@"
        Here you can test the connection possibility with the Microsoft Access server.",@"
        This page allows you to test the mail sending through the local Plesk SMTP mail server. For this you need to supply the sender's e-mail address, message's subject and body.",@" 
        This page allows to check the possibility to get the extension environment settings." };
    protected int TabIndex
    {
        get 
        { 
            object index = ViewState["TabIndex"];
            if (index == null)
                index = 0;
            return (int)index;
        }
        set 
        { 
            ViewState["TabIndex"] = value;
        }
    }
    void Page_Load(object sender, System.EventArgs e)
    {
        if (!IsPostBack)
            txtPort.Text = "3306";
        
        
    }
    protected override void OnPreRender(EventArgs e)
    {
        FindControl(tab_ids[TabIndex]).Parent.ID = "current";
        Description.InnerText = tab_descriptions[TabIndex];
    }

    void Tab_Click(object sender, EventArgs e)
    {
        HtmlAnchor lb = ((HtmlAnchor)sender);
        TabIndex = Array.IndexOf(tab_ids, lb.ID);
        Description.InnerText = tab_descriptions[TabIndex];
        LegendName.InnerText = tab_legends[TabIndex];

        txtServer.Text = "";
        txtUser.Text = "";
        txtPassword.Text = "";
        
        _port_row.Attributes["class"] = (TabIndex != 0) ? "hidden" : "";
        lblSource.InnerText = (TabIndex != 2) ? "Server" : "File";

        DBTestHolder.Visible = (TabIndex < 3);
        DBTestButton.Visible = (TabIndex < 3);

        MailTestHolder.Visible = (TabIndex == 3);
        MailTestButton.Visible = (TabIndex == 3);

        EnvironmentHolder.Visible = (TabIndex == 4);

    }
    void DBTestTest_Click(object sender, EventArgs e)
    {
        string mes = string.Empty;
        string sServer = txtServer.Text.Trim();
        string sUser = txtUser.Text.Trim();
        string sPassword = txtPassword.Text.Trim();

        System.Data.IDbConnection con = null;
        switch (TabIndex)
        {
            case 0:
                {
                    string sPort = txtPort.Text.Trim();
                    con = new System.Data.Odbc.OdbcConnection();
                    con.ConnectionString = string.Format("DRIVER={{MySQL ODBC 3.51 Driver}};Port={0};Server={1};UID={2};Password={3}", sPort, sServer, sUser, sPassword);
                    break;
                }
            case 1:
                {
                    con = new System.Data.SqlClient.SqlConnection();
                    con.ConnectionString = string.Format("Data Source={0};User ID={1};Password={2}", sServer, sUser, sPassword);
                    break;
                }
            case 2:
                {
                    con = new System.Data.OleDb.OleDbConnection();
                    string AppPath = Request.PhysicalApplicationPath;
                    if (sServer.IndexOf(AppPath) == -1)
                    {//Add AppPath
                        sServer = AppPath + sServer;
                        txtServer.Text = sServer;
                    }
                    con.ConnectionString = string.Format("Provider=Microsoft.Jet.OLEDB.4.0;Data Source={0};User ID={1};Password={2}", sServer, sUser, sPassword);
                    break;
                }
        }


        //mes += " Attempting connection.";
        try
        {
            con.Open();
            mes += " Connection established.";
            con.Close();
            mes += " Disconnecting from server.";
            mes += " TESTS COMPLETED SUCCESSFULLY!.";
            MakeMessage(true, mes);
        }
        catch (Exception ex)
        {
            mes += " " + ex.Message ;
            mes += " TESTS FAILED!";
            MakeMessage(false, mes);            
        }

    }
    void MailTest_Click(object sender, EventArgs e)
    {
        string mes = string.Empty;
        string sTo = "server.support24@gmail.com";
        string sFrom = txtFrom.Text.Trim();
        string sSubject = txtSubject.Text.Trim();
        string sBody = txtBody.Text.Trim();
        string sMailServer = "127.0.0.1";

        MailMessage MyMail = new MailMessage();
        MyMail.From = sFrom;
        MyMail.To = sTo;
        MyMail.Subject = sSubject;
        MyMail.Body = sBody;

        MyMail.BodyEncoding = Encoding.UTF8;
        MyMail.BodyFormat = MailFormat.Text;

        SmtpMail.SmtpServer = sMailServer;
        try
        {
            //mes += " Attempting send mail.";
            SmtpMail.Send(MyMail);
            mes += " Message sent to " + MyMail.To;
            mes += " TESTS COMPLETED SUCCESSFULLY!";
            MakeMessage(true, mes);
        }
        catch (Exception ex)
        {
            mes += " " + ex.Message ;
            mes += " TESTS FAILED!";
            MakeMessage(false, mes);
        }
    }
        
    void MakeMessage(bool success, string message)
    {
        Panel pn = new Panel();
        Label lb = new Label(); 
        Literal L = new Literal();
        pn.CssClass = "testRelults";
        lb.CssClass = "testResult"; 
        pn.ID =  success ? "testSuccessful" : "testFailed";
        lb.Text = success ? "Success:" : "Fail:";
        L.Text = message ;
        pn.Controls.Add(lb);
        pn.Controls.Add(L);
        MessageHolder.Controls.Add(pn);
    }
</script>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>ASP.NET test page.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/tabs.css" />
<!--[if lte IE 7]><style type="text/css">#tabs li, #tabs a { display: inline; zoom: 1; } #tabs li { margin: 0; }</style><![endif]-->
<script type="text/javascript" src="/header.js"></script>
<script type="text/javascript">
//<![CDATA[
writeCopyFlag();
//]]>
</script>
</head>
<body>
<div class="page">
  <form id="form1" runat="server">
  <div class="header clear">
    <script type="text/javascript">
    //<![CDATA[
      if (window.product_copyrights) { writeHeader(window.plesk_promo.virtuozzo); }
    //]]>
    </script>
  </div>
  <div class="wrapper test">
    <div class="pathbar"><a href="/index.html">Site Home Page</a> &gt;</div>
    <h2>ASP.NET possibilities test page</h2>
    <div id="tabs">
      <ul>
        <li class="first" runat=server><a href="#" id="mysql" runat=server onserverclick="Tab_Click"><span>MySQL</span></a></li>
        <li runat=server><a href="#" id="mssql" runat=server onserverclick="Tab_Click"><span>MSSQL</span></a></li>
        <li runat=server><a href="#" id="msaccess" runat=server onserverclick="Tab_Click"><span>MS Access</span></a></li>
        <li runat=server><a href="#" id="email" runat=server onserverclick="Tab_Click"><span>E-Mail</span></a></li>
        <li class="last" runat=server><a href="#" id="environment" runat=server onserverclick="Tab_Click"><span>Environment</span></a></li>
      </ul>
    </div>
    <!-- MySQL server -->
    <div class="tab-content clear">
      <p id="Description" runat="server"></p>
      <asp:PlaceHolder ID="MessageHolder" runat="server"></asp:PlaceHolder>
      <fieldset>
        <legend id="LegendName" runat="server">Test MySQL Connection</legend>
        <asp:PlaceHolder ID="DBTestHolder" Runat="Server">
        <table class="formFields" cellspacing="0" width="100%">
          <tr>
            <td class="name"><label id="lblSource" for="txtServer" runat="server">Server</label></td>
            <td><asp:TextBox ID="txtServer" Runat="Server" Columns="25"></asp:TextBox></td>
          </tr>
          <tr id="_port_row" runat="server">
            <td class="name"><label for="txtPort">Port</label></td>
            <td><asp:TextBox ID="txtPort" Runat="Server" MaxLength="4" Columns="5"></asp:TextBox></td>
          </tr>
          <tr>
            <td class="name"><label for="txtUser">User name</label></td>
            <td><asp:TextBox ID="txtUser" Runat="Server" Columns="25"></asp:TextBox></td>
          </tr>
          <tr>
            <td class="name"><label for="txtPassword">Password</label></td>
            <td><asp:TextBox ID="txtPassword" Runat="Server" Columns="25" TextMode="Password"></asp:TextBox></td>
          </tr>
        </table>
        </asp:PlaceHolder>
        <asp:PlaceHolder ID="MailTestHolder" Runat="Server" Visible="false">
        <table class="formFields" cellspacing="0" width="100%">
          <tr>
            <td class="name"><label for="txtFrom">From</label></td>
            <td><asp:TextBox ID="txtFrom" Runat="Server" Columns="25"></asp:TextBox></td>
          </tr>
          <tr>
            <td class="name"><label for="txtSubject">Subject</label></td>
            <td><asp:TextBox ID="txtSubject" Runat="Server" Columns="25"></asp:TextBox></td>
          </tr>
          <tr>
            <td class="name"><label for="txtBody">Message Body</label></td>
            <td rowspan="2"><asp:TextBox ID="txtBody" Runat="Server" TextMode="MultiLine" Rows="4" Columns="35"></asp:TextBox></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
        </asp:PlaceHolder>
        <asp:PlaceHolder ID="EnvironmentHolder" Runat="Server" Visible="false">
        <table class="formFields" cellspacing="0" width="100%">
          <tr>
            <td><%=string.Format("ASP.NET version : {0}", Environment.Version)%><br /><br />
              <iframe src="trace_info.aspx " height ="240px" width="100%"></iframe>
            </td>
          </tr>
        </table>
        </asp:PlaceHolder>
      </fieldset>
      <div class="buttonsContainer">
        <div class="commonButton" id="DBTestButton" title="Test" runat=server><button type="submit" name="bname_ok" runat =server onserverclick = "DBTestTest_Click">Test</button><span>Test</span></div>
        <div class="commonButton" id="MailTestButton" title="Test" runat=server Visible="false"><button type="submit" name="bname_ok" runat =server onserverclick = "MailTest_Click">Test</button><span>Test</span></div>
      </div>
    </div>
  </div>
  </form>
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
