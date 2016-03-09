var a;
function f(){
  var count=0;
  for(var i=0;i<8;i++)
  {
    a.push(document.getElementsByTagName('input')[i].value);
        }
  if(a[3]===a[4])
  {
  count=1;
  }
  else
  {
  document.getElementById('formerror').innerHTML="The passwords do not match.";
  return false;
  }
  for(var j=0;j<8;j++)
  {
    if(a[j].search(" ")==-1)
    {
      document.getElementsById('formerror').innerHTML="Blank spaces not allowed";count=0;break;
      }
   }
  if(count)
  {
  return true;
  }
}

