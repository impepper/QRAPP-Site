function RSSWindow(f,v,t,q){function u(c){for(var a=0;a<c.length;a++){var h=null,j=null,k=null,f=null,h=c.item(a).getElementsByTagName("title").item(0).text,j=c.item(a).getElementsByTagName("description").item(0).text,k=c.item(a).getElementsByTagName("pubDate").item(0).text,b=c.item(a).getElementsByTagName("link");if(b&&0<b.length)for(var f=b.item(0).text,d=0;d<b.length;d++)""!==b.item(d).text&&(f=b.item(d).text);h=h.replace(/\n/gi," ");j=j.replace(/\n/gi," ");k=k.replace(/\n/gi," ");b=Ti.UI.createTableViewRow({height:40,
backgroundColor:"#eeeeee"});b.backgroundColor=Math.round(a/2)!=a/2?"#ddd":"#aaa";d=Ti.UI.createLabel({text:h,color:"#000",textAlign:"left",left:60,height:35,width:"auto",top:2,font:{fontWeight:"bold",fontSize:14}});b.add(d);d=Ti.UI.createImageView({image:"http://river-traveler.org/wp-content/plugins/social-sharing-toolkit/images/icons_large/rss.png",left:3,top:4,width:45,height:30});b.add(d);b.thisTitle=h;b.thisDesc=j;b.thisPubDate=k;b.thisLink=f;m[r]=b;r++}n=Titanium.UI.createTableView({data:m,top:0,
width:320,height:260});i.add(n);n.addEventListener("click",function(a){Ti.API.info("item index clicked :"+a.index);Ti.API.info("title  :"+a.rowData.thisTitle);Ti.API.info("description  :"+strip_tags(a.rowData.thisDesc));e.link=a.rowData.thisLink;g.text=strip_tags(a.rowData.thisTitle);o.text=strip_tags(a.rowData.thisPubDate);l.text=strip_tags(a.rowData.thisDesc)})}function s(c){m=[];Ti.API.info(">>>> loading RSS feed "+c);xhr=Titanium.Network.createHTTPClient();xhr.open("GET",c);xhr.onload=function(){Ti.API.info(">>> got the feed! ... ");
var a=this.responseXML;p=a.documentElement.getElementsByTagName("channel").item(0).getElementsByTagName("title").item(0).text;Ti.API.info("FEED TITLE "+p);i.title=p;a=a.documentElement.getElementsByTagName("item");Ti.API.info("found "+a.length+" items in the RSS feed");g.text="DONE";l.text="";u(a)};g.text="LOADING RSS FEED..";g.textAlign="center";l.text="";o.text="";xhr.send()}var i=Ti.UI.createWindow({title:t,backgroundColor:"white",navBarHidden:!1});Titanium.include("ui/winmodule/strip_tags.js");
var m,r=0,n,p="";Ti.Media.createAudioPlayer();var e=Ti.UI.createView({backgroundColor:"#69b",borderRadius:8,right:5,left:5,height:100,bottom:5});e.addEventListener("click",function(){Ti.API.info(e.link);var c=Ti.UI.createWindow({title:g.text}),a=Ti.UI.createWebView({url:e.link});c.add(a);a=Titanium.UI.createButton({title:"Close",style:Titanium.UI.iPhone.SystemButtonStyle.PLAIN});c.setLeftNavButton(a);a.addEventListener("click",function(){c.close()});c.open({modal:!0})});i.add(e);var g=Ti.UI.createLabel({text:"",
color:"#fff",textAlign:"center",left:10,right:10,top:2,height:38,font:{fontFamily:"Helvetica Neue",fontWeight:"bold",fontSize:16}});e.add(g);var o=Ti.UI.createLabel({text:"",color:"#000",textAlign:"right",left:10,right:10,top:42,height:10,textAlign:"right",font:{fontFamily:"Helvetica Neue",fontWeight:"bold",fontSize:10}});e.add(o);var l=Ti.UI.createLabel({text:"",color:"#000",textAlign:"left",left:10,right:10,top:55,height:45,font:{fontFamily:"Helvetica Neue",fontWeight:"bold",fontSize:14}});e.add(l);
if("iphone"==Ti.Platform.osname||"ipad"==Ti.Platform.osname||"ipod"==Ti.Platform.osname)f=Titanium.UI.createButton({systemButton:Titanium.UI.iPhone.SystemButton.REFRESH}),f.addEventListener("click",function(){s(q)}),i.setRightNavButton(f);s(q);return i}module.exports=RSSWindow;