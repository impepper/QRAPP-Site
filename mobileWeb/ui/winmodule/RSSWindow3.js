function RSSWindow2(c,a,e,f){var i=Ti.UI.createWindow({title:e,backgroundColor:"white",navBarHidden:!1}),c=f,c="http://v2.0.news.tmg.s3.amazonaws.com/feeds/news.xml",j=[],a=Ti.Network.createHTTPClient();a.open("GET",c);a.onload=function(){try{for(var b=this.responseXML.documentElement,a=b.getElementsByTagName("item"),c=0,e=b.evaluate("//channel/title/text()").item(0).nodeValue,b=0;b<a.length;b++){var g=a.item(b),h=g.getElementsByTagName("media:thumbnail");if(h&&0<h.length){var f=h.item(0).getAttribute("url"),
m=g.getElementsByTagName("title").item(0).text,d=Ti.UI.createTableViewRow({height:80}),n=Ti.UI.createLabel({text:m,left:72,top:5,bottom:5,right:5});d.add(n);var k;k=Ti.UI.createImageView({image:f,left:5,height:60,width:60});d.add(k);j[c++]=d;d.url=g.getElementsByTagName("link").item(0).text}}var l=Titanium.UI.createTableView({data:j});i.add(l);l.addEventListener("click",function(a){var b=Ti.UI.createWindow({title:e}),a=Ti.UI.createWebView({url:a.row.url});b.add(a);a=Titanium.UI.createButton({title:"Close",
style:Titanium.UI.iPhone.SystemButtonStyle.PLAIN});b.setLeftNavButton(a);a.addEventListener("click",function(){b.close()});b.open({modal:!0})})}catch(o){alert(o)}};a.send();return i}module.exports=RSSWindow2;