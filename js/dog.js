var xmlHttp

function changephoto(dog)
{
	document.getElementById("main").innerHTML="";
	//alert('change');
	switch(dog){
	case 'abby': 
			document.getElementById("main").innerHTML="<img src='images/abby.jpg' halign='centered'>";
		break;
	case 'ajax':
			document.getElementById("main").innerHTML="<img src='images/ajax.jpg' halign='centered'>";
		break;
	case 'benji':
			document.getElementById("main").innerHTML="<img src='images/benji.jpg' halign='centered'>";
		break;
	case 'callie':
			document.getElementById("main").innerHTML="<img src='images/callie1.jpg' halign='centered'>";
		break;
	case 'freckles':
			document.getElementById("main").innerHTML="<img src='images/freckles.jpg' halign='centered'>";
		break;
	case 'herbie':
			document.getElementById("main").innerHTML="<img src='images/herbie.jpg' halign='centered'>";
		break;
	case 'ivan':
		document.getElementById("main").innerHTML = "<img src='images/ivan3.jpg' halign='centered'>";
		break;
	case 'jasper':
			document.getElementById("main").innerHTML="<img src='images/jasper.jpg' halign='centered'>";
		break;
	case 'kisses':
			//alert('kisses');
			document.getElementById("main").innerHTML="<img src='images/kisses1.jpg' halign='centered'>";
		break;
	case 'laska':
			//alert('laska');
			document.getElementById("main").innerHTML="<img src='images/laska.png' halign='centered'>";
		break;
	case 'petey':
			document.getElementById("main").innerHTML="<img src='images/petey1.jpg' halign='centered'>";
		break;
	case 'rio':
			document.getElementById("main").innerHTML="<img src='images/rio2.png' halign='centered'>";
		break;
	case 'rocket':
			document.getElementById("main").innerHTML="<img src='images/rocket1.jpg' halign='centered'>";
		break;
	case 'snoopy':
			document.getElementById("main").innerHTML="<img src='images/snoopy1.jpg' halign='centered'>";
		break;
	case 'stella':
			document.getElementById("main").innerHTML="<img src='images/stella.jpg' halign='centered'>";
		break;
	case 'tempy':
			document.getElementById("main").innerHTML="<img src='images/tempy2.png' halign='centered'>";
		break;
	
	}
}

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
var url="getdog.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4)
{ 
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}

function ajaxFunction()
{
	xmlHttp=GetXmlHttpObject();

	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4)
    	{
    		document.myForm.time.value=xmlHttp.responseText;
    	}
	}
	xmlHttp.open("GET","time.php",true);
	xmlHttp.send(null);
}
