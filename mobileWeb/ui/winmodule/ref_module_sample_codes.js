var Window=require("ui/handheld/ApplicationWindow"),win1=new Window(L("home"),"TYPE_WEB",[!0,!0,"WebView form TableView","http://tw.yahoo.com"]),AccountWindow=require("ui/winmodule/AccountWindow"),win2=new AccountWindow("Account"),WebVideoWindow=require("ui/winmodule/WebVideoWindow"),win3=new WebVideoWindow(!0,!0,"WebVideo","Youtube","511XK1L-Btg"),tableview_rowdata=[];
tableview_rowdata[0]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Web View Sample",targetWindow:"TYPE_WEB",targetWindowParameters:[!0,!0,"Web Page","http://tw.yahoo.com"]});tableview_rowdata[1]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Image View Sample",targetWindow:"TYPE_IMAGE",targetWindowParameters:[!0,!0,"Image","http://graffletopia.com/images/previews/872/thumb.png?1334680174"]});
tableview_rowdata[2]=Ti.UI.createTableViewRow({hasDetail:!0,title:"CoverFlow View Sample",targetWindow:"TYPE_COVERFLOW",targetWindowParameters:[!0,!0,"CoverFlow","http://graffletopia.com/images/previews/872/thumb.png?1334680174"]});tableview_rowdata[3]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Contact View Sample",targetWindow:"TYPE_CONTACT",targetWindowParameters:[!0,!0,"Contact","Pepper","impepper@gmail.com","+886-933095673","\u65b0\u5317\u5e02\u677f\u6a4b\u5340\u6c11\u751f\u8def\u4e00\u6bb5\u4e00\u865f15\u6a13"]});
tableview_rowdata[4]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Web Video Sample",targetWindow:"TYPE_WEBVIDEO",targetWindowParameters:[!0,!0,"WebVidew","Youtube","511XK1L-Btg"]});var second_tableview_rowdata=[];second_tableview_rowdata[0]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Web View Sample",targetWindow:"TYPE_WEB",targetWindowParameters:[!0,!0,"Web Page","http://tw.yahoo.com"]});
second_tableview_rowdata[1]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Image View Sample",targetWindow:"TYPE_IMAGE",targetWindowParameters:[!0,!0,"Image","http://graffletopia.com/images/previews/872/thumb.png?1334680174"]});second_tableview_rowdata[2]=Ti.UI.createTableViewRow({hasDetail:!0,title:"CoverFlow View Sample",targetWindow:"TYPE_COVERFLOW",targetWindowParameters:[!0,!0,"CoverFlow","http://graffletopia.com/images/previews/872/thumb.png?1334680174"]});
second_tableview_rowdata[3]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Contact View Sample",targetWindow:"TYPE_CONTACT",targetWindowParameters:[!0,!0,"Contact","Pepper","impepper@gmail.com","+886-933095673","\u65b0\u5317\u5e02\u677f\u6a4b\u5340\u6c11\u751f\u8def\u4e00\u6bb5\u4e00\u865f15\u6a13"]});second_tableview_rowdata[4]=Ti.UI.createTableViewRow({hasDetail:!0,title:"Web Video Sample",targetWindow:"TYPE_WEBVIDEO",targetWindowParameters:[!0,!0,"WebVidew","Youtube","511XK1L-Btg"]});
tableview_rowdata[5]=Ti.UI.createTableViewRow({hasChild:!0,title:"another TableView ...",targetWindow:"TYPE_TABLE",targetWindowParameters:[!0,!0,"2nd TableView",second_tableview_rowdata]});tableview_rowdata[6]=Ti.UI.createTableViewRow({hasDetail:!0,title:"RSS Window",targetWindow:"TYPE_RSS",targetWindowParameters:[!0,!0,"RSS Title","http://feeds.feedburner.com/5i01?format=xml"]});
tableview_rowdata[7]=Ti.UI.createTableViewRow({hasDetail:!0,title:"RSS Window 2",targetWindow:"TYPE_RSS2",targetWindowParameters:[!0,!0,"RSS2 Title","http://v2.0.news.tmg.s3.amazonaws.com/feeds/news.xml"]});
var TableViewWindow=require("ui/winmodule/TableViewWindow"),win4=new TableViewWindow(!0,!0,"Table View",tableview_rowdata),ContactWindow=require("ui/winmodule/ContactWindow"),win5=new ContactWindow(!0,!0,"Contact","Pepper","impepper@gmail.com","+886-933095673","\u65b0\u5317\u5e02\u677f\u6a4b\u5340\u6c11\u751f\u8def\u4e00\u6bb5\u4e00\u865f15\u6a13"),ImageViewWindow=require("ui/winmodule/ImageViewWindow"),win6=new ImageViewWindow(!0,!1,"Test","http://graffletopia.com/images/previews/872/thumb.png?1334680174",
!1),ImageViewWindow=require("ui/winmodule/ImageViewWindow"),win6=new ImageViewWindow(!0,!1,"Test","http://graffletopia.com/images/previews/872/thumb.png?1334680174",!0),WebViewWindow=require("ui/winmodule/WebViewWindow"),win7=new webViewWindow(!0,!0,"Web Page","http://tw.yahoo.com"),RSSWindow=require("ui/winmodule/RSSWindow"),win8=new RSSWindow(!0,!0,"RSS Title","http://feeds.feedburner.com/5i01?format=xml"),RSSWindow2=require("ui/winmodule/RSSWindow2"),win9=new RSSWindow2(!0,!0,"RSS2 Title","http://v2.0.news.tmg.s3.amazonaws.com/feeds/news.xml");