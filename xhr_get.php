<?php
$_rd = $_GET['rd'];
$client = $_GET['client'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="data:;base64,=">
<title>Javascript Test (XHR GET)</title>
<script type="text/javascript">
var xmlhttp=false;
var rq_url1 = "echo1.php?s=init";
var rq_url2 = "echo1.php?s=ping";
var t1 = 0;
var t2 = 0;
var t3 = 0;
var t4 = 0;

if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	try {
		xmlhttp = new XMLHttpRequest();
	} catch (e) {
		xmlhttp=false;
	}
}
if (!xmlhttp && window.createRequest) {
	try {
		xmlhttp = window.createRequest();
	} catch (e) {
		xmlhttp=false;
	}
}

xmlhttp.open("GET", rq_url1, true);
xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4) {
	
	  // alert(xmlhttp.responseText);
	   
		var tmp_t = new Date().getTime();
		if(xmlhttp.responseText == "ok") {
			t2 = tmp_t;
			xmlhttp.open("GET", rq_url2, true);
			t3 = new Date().getTime();
			xmlhttp.send(null);
		} else if(xmlhttp.responseText == "pong") {
			t4 = tmp_t;

			store_url = "insert_data.php?type=xhr_get&rd=<?php echo $_rd; ?>&t1=" + t1 + "&t2=" + t2 + "&t3=" + t3 + "&t4=" + t4 +"&client=<?php echo $client; ?>";
			//alert(store_url);
			xmlhttp.open("GET", store_url, true);
			xmlhttp.send(null);

			var s1 = document.getElementById("t1");
			var s2 = document.getElementById("t2");
			var s3 = document.getElementById("t3");
			var s4 = document.getElementById("t4");
			s1.innerHTML = t1;
			s2.innerHTML = t2;
			s3.innerHTML = t3;
			s4.innerHTML = t4;
			xmlhttp=false;
		}
	}
}


t1 = new Date().getTime();
//alert('position1');
xmlhttp.send(null);
</script>
</head>

<body>
<p id="t1"></p>
<p id="t2"></p>
<p id="t3"></p>
<p id="t4"></p>
</body>
</html>