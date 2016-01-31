<!DOCTYPE HTML> 
<html>
<head>
</head>
<body align="center"> 

    <script>
    
   function test_input() {
   var street=document.getElementById("street").value;
   var city=document.getElementById("city").value;
   var state=document.getElementById("state").value;
   var degree=document.getElementsByName("degree")[0].value;    
   var warn="";
   var ret=true;
          if(street.length==0)
       {
           warn+="Street Address";
           ret=false;
       }
       if(city.length==0)
       {
           if(warn.length==0)
       {
               warn+="City";
       }
       else 
       {
           warn+=" and City";
       }
           ret=false;
       }
       if(state.length==0)
       {
           if(warn.length==0)
       {
           warn+="State";
       }
       else
       {
           warn+=" and State";
       }
           ret=false;
       }
       if(ret==false){
    alert("Please enter the "+ warn);
          return;
        }
   }
        
    function SaveUserInput(street,city,state,degree)
        {
     
    document.getElementById("street").value=street;
    document.getElementById("city").value=city;
    for(var i=0;i<document.getElementById("state")[0].length;i++)
    {
        if(document.getElementById("state")[0].value==state)
        {
            document.getElementsByName("state")[0].selectedIndex=i;
            break;
        }
    }
        if(document.getElementsByName("degree")[0].value==degree)
        {
            document.getElementsByName("degree")[0].checked=true;
        }
            else
            {
                document.getElementsByName("degree")[1].checked=true;
            }
        }
        
                
        
    function clear_input()
			{
				document.getElementById("userinput").reset();
			}
           
    function displayOUT(summary,temperature,icon,precipIntensity,precipProbability,windSpeed,dewPoint,humidity,visibility,sunriseTime,sunsetTime,deg)
			{
                alert("here again");
var Temp="",Wind="",Visibility="";
var SunRise=new Date(0);
var SunSet=new Date(0);

var humidi=parseFloat(humidity)*100;
var precip=parseFloat(precipProbability)*100;
				
precip=formatString(precip+"");
humidi=formatString(humidi+"");
SunRise.setUTCSeconds(sunriseTime);
SunSet.setUTCSeconds(sunsetTime);
if(deg=="us")
{
    Temp="F";
	Wind="mph"
	Visibility="mi";
}
else
{
	Temp="C";
    Wind="mts/s"
	Visibility="mts";
}

var weatherInfo="<table id ='weatherinfo'>";
weatherInfo+="<tr><td colspan='2'><h2 style='text-align:center;'>"+summary;
weatherInfo+="<br/>"+parseInt(temperature)+" <sup>o</sup>"+Temp+"</h2></td></tr>";
weatherInfo+="<tr> <td colspan='2'><img src='"+GetIcon(icon)+"' alt='"+GetIcon(icon)+"' style=' display: block; margin: 0 auto; width:20%;' /></td></tr>";

weatherInfo+="<tr><td>Precipitation:</td>";
weatherInfo+="<td>"+GetPrecip(precipIntensity)+"</td></tr>";
weatherInfo+="<tr><td>Chance of Rain:</td>";
weatherInfo+="<td>"+precip+"%</td></tr>";
weatherInfo+="<tr><td>Wind Speed:</td>";
weatherInfo+="<td>"+parseInt(windSpeed)+" "+Wind+"</td></tr>";
weatherInfo+="<tr><td>Dew Point:</td>";
weatherInfo+="<td>"+parseInt(dewPoint)+"</td></tr>";
weatherInfo+="<tr><td>Humidity:</td>";
weatherInfo+="<td>"+humidi+"%"+"</td></tr>";
weatherInfo+="<tr><td>Visibility:</td>";
weatherInfo+="<td>"+parseInt(visibility)+" "+Visibility+"</td></tr>";
weatherInfo+="<tr><td>Sunrise:</td>";
weatherInfo+="<td>"+GetTime(SunRise.getHours(),SunRise.getMinutes(),SunRise.getSeconds())+"</td></tr>";
weatherInfo+="<tr><td>Sunset:</td>";
weatherInfo+="<td>"+GetTime(SunSet.getHours(),SunSet.getMinutes(),SunSet.getSeconds())+"</td></tr>";
weatherInfo+="</table>";
document.write(weatherInfo);
}
        
 function GetIcon(icon)
{
if(icon=="clear-day")
{
	return "clear.png";
}
else if(icon=="clear-night")
{
	return "clear_night.png";
}
else if(icon=="rain")
{
	return "rain.png";
}
else if(icon=="snow")
{
	return "snow.png";
}
else if(icon=="sleet")
{
	return "sleet.png";
}
else if(icon=="wind")
{
	return "wind.png";
}
else if(icon=="fog")
{
	return "fog.png";
}
else if(icon=="cloudy")
{
	return "cloudy.png";
}
else if(icon=="partly-cloudy-day")
{
	return "cloud_day.png";
}
else if(icon=="partly-cloudy-night")
{
	return "cloud_night.png";
}
return null;
}

        
function GetPrecip(precipIntensity)
{
var precip=parseInt(precipIntensity);
if(precip>=0 && precip<0.002)
{
	return "None";
}
else if(precip>=0.002 && precip<0.017)
{
	return "Very Light";
}
else if(precip>=0.017 && precip<0.1)
{
	return "Light";
}
else if(precip>=0.1 && precip<0.4)
{
	return "Moderate";
}
else if(precip>=0.4 )
{
	return "Heavy";
}
return null;
}
    
function GetTime(hours,min,sec)
{
var amorpm=" AM";
if(hours>12)
{
	hours-=12;
	amorpm=" PM";
}
else if(hours==0)
{
	hours=12;
	amorpm=" AM";
}
else if(hours==12)
{
	amorpm=" PM";
}
if((hours+"").length<2)
{
	hours="0"+hours;
}
if((min+"").length<2)
{
	min="0"+min;
}
if((sec+"").length<2)
{
	sec="0"+sec;				}
return hours+":"+min+":"+sec+amorpm;
}
    
function formatString(DataString)
{
				
var SplitStr=DataString.split(".");
if(SplitStr.length<2)
{
	return DataString;
}
else
{
	if(SplitStr[1].length>2)
	{
		SplitStr[1]=SplitStr[1].substring(0,2);
	}
	return SplitStr[0]+"."+SplitStr[1];
}
}    
    
    </script>

<h2 style="text-align:center"> Forecast Search </h2>
  <form method="POST" action="forecastinfo.php" name="userinput" id="userinput">
      <table style="border:2px solid; padding-right:100px" align=center> 
<tr>
    <td>Street Address:* </td>
    <td><input type="text" name="street" id="street" size="30"></td>
</tr>    
<tr>
   <td>City:*</td> 
   <td><input type="text" name="city" id="city" size="30"></td>
</tr>    
<tr>
   <td>State:*</td>
   <td><select name="state" id="state">
<option value="" selected> Select a State.. </option>
<option value='AL'>Alabama</option>
<option value='AK'>Alaska </option>
<option value='AZ'>Arizona </option>
<option value='AR'>Arkansas </option>
<option value='CA'>California </option>
<option value='CO'>Colorado </option>
<option value='CT'>Connecticut </option>
<option value='DE'>Delaware </option>
<option value='DC'>District Of Columbia </option>
<option value='FL'>Florida </option>
<option value='GA'>Georgia </option>
<option value='HI'>Hawaii </option>
<option value='ID'>Idaho </option>
<option value='IL'>Illinois </option>
<option value='IN'>Indiana </option>
<option value='IA'>Iowa </option>
<option value='KS'>Kansas </option>
<option value='KY'>Kentucky </option>
<option value='LA'>Louisiana </option>
<option value='ME'>Maine </option>
<option value='MD'>Maryland </option>
<option value='MA'>Massachusetts </option>
<option value='MI'>Michigan </option>
<option value='MN'>Minnesota </option>
<option value='MS'>Mississippi </option>
<option value='MO'>Missouri </option>
<option value='MT'>Montana </option>
<option value='NE'>Nebraska </option>
<option value='NV'>Nevada </option>
<option value='NH'>New Hampshire </option>
<option value='NJ'>New Jersey </option>
<option value='NM'>New Mexico </option>
<option value='NY'>New York </option>
<option value='NC'>North Carolina </option>
<option value='ND'>North Dakota </option>
<option value='OH'>Ohio </option>
<option value='OK'>Oklahoma </option>
<option value='OR'>Oregon </option>
<option value='PA'>Pennsylvania </option>
<option value='RI'>Rhode Island </option>
<option value='SC'>South Carolina </option>
<option value='SD'>South Dakota </option>
<option value='TN'>Tennessee </option>
<option value='TX'>Texas </option>
<option value='UT'>Utah </option>
<option value='VT'>Vermont </option>
<option value='VA'>Virginia </option>
<option value='WA'>Washington </option>
<option value='WV'>West Virginia </option>
<option value='WI'>Wisconsin </option>
<option value='WY'>Wyoming </option>
      </select></td>
<tr>
   <td>Degree:*</td> 
   <td><input type="radio" name="degree" value="us" checked>Fahrenheit
       <input type="radio" name="degree" value="si">Celsius</td>
</tr>    
<tr>  
    <td></td>
    <td><input type="submit" name="submit" value="Search" onclick="test_input();">
        <input type="button" name="reset" value="Clear" onclick="clear_input()"><br><br></td>
</tr>
<tr>          
    <td>  * - <i>Mandatory fields.</i> </td></tr>
          <tr></tr>
          <tr> 
           <td> </td>   <td> <a href="http://forecast.io"> Powered by Forecast.io </a> </td> </tr>
    
</form>
</body>
</html>



<?php
GetUserInput();
function GetUserInput()
{
    
    if(!empty($_POST["submit"]))
    {
        $street=$_POST["street"];
        $city=$_POST["city"];
        $state=$_POST["state"];
        $degree=$_POST["degree"];
    
 
 echo "<script type='text/javascript'>
 SaveUserInput('".$street."','".$city."','".$state."','".$degree."');
 </script>";
  
if(!empty($street)&&!empty($city)&&!empty($state)&&!empty($degree))
{
    
$GeoCodeFile = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=".$street.",".$city.",".$state);
$Location = GetLocation($GeoCodeFile);
$CallAPI = "https://api.forecast.io/forecast/7d75118b73458c705f9b911f7d637507/".$Location[0].",".$Location[1]."?units=".$degree."&exclude=flags";  
echo $CallAPI;
GetJSON($CallAPI,$degree);
}
}

}


function GetJSON($CallAPI,$degree)
	{
        
        $JSON_File=file_get_contents($CallAPI);
		$JSON_Obj=json_decode($JSON_File, true);
		
		$summary=$JSON_Obj["currently"]["summary"];
		$temperature=$JSON_Obj["currently"]["temperature"];
		$icon=$JSON_Obj["currently"]["icon"];
		$precipIntensity=$JSON_Obj["currently"]["precipIntensity"];
		$precipProbability=$JSON_Obj["currently"]["precipProbability"]; 
		$windSpeed=$JSON_Obj["currently"]["windSpeed"];
		$dewPoint=$JSON_Obj["currently"]["dewPoint"];
		$humidity=$JSON_Obj["currently"]["humidity"];
		$visibility=$JSON_Obj["currently"]["visibility"];
		$sunriseTime=$JSON_Obj["daily"]["data"][0]["sunriseTime"];
		$sunsetTime=$JSON_Obj["daily"]["data"][0]["sunsetTime"];
		
		echo "<script type='text/javascript'>
		displayOUT('".$summary."','"
		.$temperature."','"
		.$icon."','"
		.$precipIntensity."','"
		.$precipProbability."','"
		.$windSpeed."','"
		.$dewPoint."','"
		.$humidity."','"
		.$visibility."','"
		.$sunriseTime."','"
		.$sunsetTime."','"
		.$degree."');
		</script>";
				
	}


function GetLocation($GeoCodeFile)
	{
		$Latitude=Array();
        $Longitude=Array();
		$Latitude=$GeoCodeFile->xpath("/GeocodeResponse/result/geometry/location/lat");
		$Longitude=$GeoCodeFile->xpath("/GeocodeResponse/result/geometry/location/lng");
		$Location=Array(2);
		$Location[0]=$Latitude[0];
		$Location[1]=$Longitude[0];
		return $Location;
	} 


?>        
    
        
