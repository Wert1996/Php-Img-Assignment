function checkusername(str){
  if(str.length==0)
  { document.getElementById('message').innerHTML="";
    return;
  }
  else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("message").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxcheck.php?q=" + str, true);
    xmlhttp.send();

  }
}


