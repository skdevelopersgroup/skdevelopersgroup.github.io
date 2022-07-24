function Inint_AJAX() {
		try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
		try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
		try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
		alert("XMLHttpRequest not supported");
		return null;
	};

	function getCookie_new(c_name)
	{
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++)
	  {
	  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
	  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
	  x=x.replace(/^\s+|\s+$/g,"");
	  if (x==c_name)
		{
		return unescape(y);
		}
	  }
	}

	function saveData() {
		var req = Inint_AJAX();

		req.onreadystatechange = function ()
		{
		 if (req.readyState==4) {
			
		      if (req.status==200) {
					
		      }
		 }
		};
	var random = Math.floor(Math.random()*11);	
	req.open("GET", "savedata.php?sid="+Math.random(),false); //make connection
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	req.send(null); //send value
	

	}

	function setCourseCookie(c_name,value,expiredays)
		{
		  var exdate=new Date();
		  exdate.setDate(exdate.getDate()+expiredays);
		  document.cookie=c_name+ "=" +escape(value)+
		  ((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
		}
		
	function setCookie() {
		        var mobile_value = document.getElementById('mobileId').value;
		        if (mobile_value.length > 9){
		  	    	setCourseCookie('cookie_mobile',mobile_value,5);
		  	    	saveData();
		        }	
		  	    
			}


	 function setCookieValue(c_name,value,expiredays)
      {
        var exdate=new Date();
        exdate.setDate(exdate.getDate()+expiredays);
        document.cookie=c_name+ "=" +escape(value)+
        ((expiredays==null) ? "" : ";expires="+exdate.toUTCString())+";path=/";
      }

      function getCookieVal (offset) {
        var endstr = document.cookie.indexOf (";", offset);
        if (endstr == -1) { endstr = document.cookie.length; }
        return unescape(document.cookie.substring(offset, endstr));
      }

      function GetCookie (name) {
      var arg = name + "=";
      var alen = arg.length;
      var clen = document.cookie.length;
      var i = 0;
      while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
          return getCookieVal (j);
          }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break;
        }
      return null;
      }

      function gup( name )
      {
        name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
        var regexS = "[\\?&]"+name+"=([^&#]*)";
        var regex = new RegExp( regexS );
        //var url = unescape(window.location.href.replace(/\+/g, " "));
        var results = regex.exec( window.location.href  );
        if( results == null )
          return "";
        else
          return results[1];
      }

	  function decode(str) {
		return unescape(str.replace(/\+/g, " "));
		}

      function call(){
		if (gup('utm_source') != '' || gup('utm_medium') != '' ||   gup('utm_campaignid') != '' || gup('utm_adgroupid') != '' || gup('utm_keyword') != '' || gup('utm_website') != '' || gup('utm_geo') != '' )
        {
          
		  var utm_source = gup('utm_source');
		  var utm_medium = gup('utm_medium');
		  //var utm_type = gup('utm_type');
		 // var utm_campaign = gup('utm_campaign');
		  var utm_campaignid = gup('utm_campaignid');
		  var utm_adgroupid = gup('utm_adgroupid');
		  var utm_keyword = gup('utm_keyword');
		  var utm_website = gup('utm_website');
		  var utm_geo = gup('utm_geo');
		 
		  
          setCookieValue('cookie_utm_source',utm_source,5);
		  document.getElementById('utm_source').value = utm_source;
		  
		  
          setCookieValue('cookie_utm_medium',utm_medium,5);
		  document.getElementById('utm_medium').value = utm_medium;
		 


          //setCookieValue('cookie_utm_type',utm_type,5);
		  //document.getElementById('utm_type').value = utm_type;
		 

		  //setCookieValue('cookie_utm_campaign_name',utm_campaign,5);
		 // document.getElementById('utm_campaign_name').value = utm_campaign;
		  

          setCookieValue('cookie_utm_campaignid',utm_campaignid,5);
		  document.getElementById('utm_campaignid').value = utm_campaignid;
		  

          setCookieValue('cookie_utm_adgroupid',utm_adgroupid,5);
		  document.getElementById('utm_adgroupId').value = utm_adgroupid;
		  

		  setCookieValue('cookie_utm_keyword',utm_keyword,5);
		  document.getElementById('utm_keyword').value = utm_keyword;
		 

		  setCookieValue('cookie_utm_website',utm_website,5);
		  document.getElementById('utm_website').value = utm_website;
		  
		  setCookieValue('cookie_utm_geo',utm_website,5);
		  document.getElementById('utm_geo').value = utm_geo;
		

        }
		else if(getCookie_new('cookie_utm_source') != "" || getCookie_new('cookie_utm_medium') != "" ||  getCookie_new('cookie_utm_campaignid') != "" || getCookie_new('cookie_utm_adgroupid') != "" || getCookie_new('cookie_utm_keyword') != "" || getCookie_new('cookie_utm_website') != ""  || getCookie_new('cookie_utm_geo') != ""){
		  
          
		  var utm_source = getCookie_new('cookie_utm_source');
		  document.getElementById('utm_source').value = utm_source;
		

		  var utm_medium = getCookie_new('cookie_utm_medium');
		  document.getElementById('utm_medium').value = utm_medium;
		  

		  //var utm_type = getCookie_new('cookie_utm_type');
		  //document.getElementById('utm_type').value = utm_type;
		

          // var utm_campaign_name = getCookie_new('cookie_utm_campaign_name');
		 // document.getElementById('utm_campaign_name').value = utm_campaign_name;
		 


           var utm_campaignid = getCookie_new('cookie_utm_campaignid');
		  document.getElementById('utm_campaignid').value = utm_campaignid;
		 
    
	      var utm_adgroupid = getCookie_new('cookie_utm_adgroupid');
		  document.getElementById('utm_adgroupId').value = utm_adgroupid;
		 
		  	
		   var utm_keyword = getCookie_new('cookie_utm_keyword');
		  document.getElementById('utm_keyword').value = utm_keyword;
		

		  var utm_website = getCookie_new('cookie_utm_website');
		  document.getElementById('utm_website').value = utm_website;
		  
		  var utm_geo = getCookie_new('cookie_utm_geo');
		  document.getElementById('utm_geo').value = utm_geo;
		 
		  
		  
		  
		}
     }

	 function deleteCookie(name){
		setCookieValue(name,"",-1);
	 }

	 function checkUndefined_contactForm(){
	   if (document.getElementById('utm_source').value == 'undefined')
		{
			document.getElementById('utm_source').value = "";
			document.getElementById('utm_keyword').value = "";
			document.getElementById('utm_medium').value = "";
			//document.getElementById('utm_type').value = "";
			//document.getElementById('utm_campaign_name').value = "";
			document.getElementById('utm_campaignid').value = "";
			document.getElementById('utm_adgroupId').value = "";
			document.getElementById('utm_bannername').value = "";
			document.getElementById('utm_websitecategory').value = "";
			document.getElementById('utm_website').value = "";
			document.getElementById('utm_geo').value = "";
		}
	}

	function checkUndefined_DiscussForm(){
	    if (document.getElementById('utm_source').value == 'undefined')
		{
			document.getElementById('utm_source').value = "";
			document.getElementById('utm_keyword').value = "";
			document.getElementById('utm_medium').value = "";
			//document.getElementById('utm_type').value = "";
			//document.getElementById('utm_campaign_name').value = "";
			document.getElementById('utm_campaignid').value = "";
			document.getElementById('utm_adgroupId').value = "";
			document.getElementById('utm_bannername').value = "";
			document.getElementById('utm_websitecategory').value = "";
			document.getElementById('utm_website').value = "";
			document.getElementById('utm_geo').value = "";
		}
	}

	function checkUndefined_detailForm(){
	    if (document.getElementById('utm_source').value == 'undefined')
		{
			document.getElementById('utm_source').value = "";
			document.getElementById('utm_keyword').value = "";
			document.getElementById('utm_medium').value = "";
			//document.getElementById('utm_type').value = "";
			//document.getElementById('utm_campaign_name').value = "";
			document.getElementById('utm_campaignid').value = "";
			document.getElementById('utm_adgroupId').value = "";
			document.getElementById('utm_bannername').value = "";
			document.getElementById('utm_websitecategory').value = "";
			document.getElementById('utm_website').value = "";
			document.getElementById('utm_geo').value = "";
		}
	}

	
