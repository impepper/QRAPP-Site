function strTrim(str) {  
  var start = -1,  
  end = str.length;  
  while (str.charCodeAt(--end) < 33);  
  while (str.charCodeAt(++start) < 33);  
  return str.slice(start, end + 1);  
}; 

function strTrimSize(str){
	var strStart=-1;
	var strEnd=str.length;
	while(str.charCodeAt(--strEnd) < 125);
	while(str.charCodeAt(++strStart) < 33);	
	return str.slice(strStart, strEnd);
};

function strTrimSize2(str){
	var strStart=-1;
	
	while(str.charCodeAt(++strStart) < 125);
	var strEnd=str.length-strStart+1;
	return str.slice(strStart+1, str.length);
};

//將數字加上千位數逗號
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}