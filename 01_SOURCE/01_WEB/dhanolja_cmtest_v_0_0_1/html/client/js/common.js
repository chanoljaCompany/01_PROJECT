function reg_email_check(reg_email) {
    var regex = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    // return (reg_email != '' && reg_email != 'undefined' && regex.test(reg_email));
    if (regex.test(reg_email)) {
      return true;
    }
    else {
      return false;
    }
}

function Tcheck(target, astr, lmin, lmax, targetname,checkval) {
  var i
  var t = target
  if (t.length < lmin || t.length > lmax) {
    if (lmin == lmax) alert( + lmin + "글자로  " + targetname + "를 입력하십시오.");
    else alert(+ lmin + ' ~ ' + lmax + "글자로  " + targetname + "를 입력하십시오.");
    return true;
  }
//  alert(' checkval ' + checkval);
  if(checkval == 'id'){
    if (astr.length > 1)  {
    for (i=0; i<t.length; i++)
      if(astr.indexOf(t.substring(i,i+1))<0) {
        alert(targetname + "에 허용할 수 없는 문자가 입력되었습니다.");
//		target.focus()
        return true ;
      }
  }
  }
  return false ;

}