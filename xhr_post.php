<?php
$_rd = $_GET['rd'];
$client = $_GET['client'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Javascript Test (XHR POST)</title>
<script type="text/javascript">
var xmlhttp=false;
var rq_url = "echo2.php";
var post_str1 = "s=init";
var post_str2 = "s=ping";
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

xmlhttp.open("POST", rq_url, true);
xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
xmlhttp.onreadystatechange=function() {
	if (xmlhttp.readyState==4) {

		//alert(xmlhttp.responseText);

		var tmp_t = new Date().getTime();
		if(xmlhttp.responseText == "ok") {
			t2 = tmp_t;
			xmlhttp.open("POST", rq_url, true);
			xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
			t3 = new Date().getTime();
			xmlhttp.send(post_str2);
		} else if(xmlhttp.responseText == "pong") {
			t4 = tmp_t;
			store_url = "insert_data.php?type=xhr_post&rd=<?php echo $_rd; ?>&t1=" + t1 + "&t2=" + t2 + "&t3=" + t3 + "&t4=" + t4 +"&client=<?php echo $client; ?>";
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

//alert(t1);
xmlhttp.send(post_str1);
t1 = new Date().getTime();
</script>
</head>

<body>
<p id="t1"></p>
<p id="t2"></p>
<p id="t3"></p>
<p id="t4"></p>
<p id="s"></p>
</body>
</html>
