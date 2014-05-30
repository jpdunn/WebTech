<html>
<head>
    <script>
        function showRSS(str) {
            if (str.length==0) {
                document.getElementById("rssOutput").innerHTML="";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("rssOutput").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","getrss.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<script>showRSS("Google");</script>

<div id="rssOutput">RSS-feed will be listed here...</div>
</body>
</html>