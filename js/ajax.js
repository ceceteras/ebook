//BASIC AJAX CALL

<SCRIPT language = "javascript" type = "text/javascript">
var Request = false;
if (window.XMLHttpRequest) {
Request = new XMLHttpRequest();

} else if (window.ActiveXObject) {
Request = new ActiveXObject("Microsoft.XMLHTTP");
}
function retrieveJoke(url, elementID) {
if(Request) {
var RequestObj = document.getElementById(elementID);
Request.open("GET", url);
Request.onreadystatechange = function()
{
if (Request.readyState == 4 && Request.status == 200) {
RequestObj.innerHTML = Request.responseText;
}
}
Request.send(null);
}
}
</SCRIPT>