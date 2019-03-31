<?php
$_rd = $_GET['rd'];
$client = $_GET['client'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Websocket</title>
<script type="text/javascript">
var xmlhttp=false;
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

var msg = "init";
var msg2 = "ping";
var msg3 = "end";
var socket;

var t1;
var t2;
var t3;
var t4;

function init(){
  var host = "ws://192.168.109.32:8080/server.php";
  try{
    socket = new WebSocket(host);
		socket.onopen = function(event){
			t1 = new Date().getTime();
			send(msg);
		};
		
		socket.onmessage = function(Message) {
			var Data = Message.data;
			var tmpt = new Date().getTime();
			//alert(Data);
			if(Data == "ok") {
				t2 = tmpt;
				t3 = new Date().getTime();
				send(msg2);
			} else if(Data == "pong") {
				t4 = tmpt;
				send(msg3);
			} else {
				store_url = "insert_data.php?type=websocket&rd=<?php echo $_rd; ?>&t1=" + t1 + "&t2=" + t2 + "&t3=" + t3 + "&t4=" + t4 +"&client=<?php echo $client; ?>";
				xmlhttp.open("GET", store_url, true);
				xmlhttp.send(null);
				
				var s1 = document.getElementById("t1");
				var s2 = document.getElementById("t2");
				var s3 = document.getElementById("t3");
				var s4 = document.getElementById("t4");
				var s5 = document.getElementById("s");
				s1.innerHTML = t1;
				s2.innerHTML = t2;
				s3.innerHTML = t3;
				s4.innerHTML = t4;
				s5.innerHTML = store_url;
				xmlhttp=false;
				quit();
			}
		}
  }
  catch(ex){ 
		//log(ex); 
		alert("Not connected.");
	}
  //$("msg").focus();
	//send();
}

function send(s){
  try{
		socket.send(s);
	}
	catch(ex){
		alert("Send error.");
	}
}

function quit(){
  socket.close();
  socket=null;
}

// Utilities
function $(id){ return document.getElementById(id); }
</script>
</head>

<body onload="init();">
<p id="t1"></p>
<p id="t2"></p>
<p id="t3"></p>
<p id="t4"></p>
<p id="s"></p>
</body>
</html>
