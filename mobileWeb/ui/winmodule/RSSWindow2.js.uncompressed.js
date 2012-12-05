function RSSWindow2(tabbed_window,show_navbar,title,rssurl) {
	var win = Ti.UI.createWindow({
		title:title,
		backgroundColor:'white',
		navBarHidden:false
	});
	var url = rssurl;
	// var url = 'http://v2.0.news.tmg.s3.amazonaws.com/feeds/news.xml';
	// url= 'http://feeds.feedburner.com/5i01?format=xml';
	Titanium.include('ui/winmodule/strip_tags.js');  
	
	var data = [];
	
	var xhr = Ti.Network.createHTTPClient();
	xhr.open("GET",url);
	xhr.onload = function()
	{
		try
		{
			//alert(this.responseText)
			var doc = this.responseXML.documentElement;
			
			var items = doc.getElementsByTagName("item");
			var x = 0;
			var doctitle=doc.getElementsByTagName("channel").item(0).getElementsByTagName("title").item(0).text;
			
			if (doctitle) {win.title =doctitle}
			// if (typeof doc.evaluate("//channel/title/text()").item(0).nodeValue != 'undefined'){
				// doctitle = doc.evaluate("//channel/title/text()").item(0).nodeValue;
			// }
			// 
			//var docchannel = doc.getElementsByTagName("channel")[0];
			//alert(docchannel)
			//var doctitle = docchannel.getElementsByTagName("title")[0].textContent;
			//alert(doctitle)
			//var doctitle = doc.getElementsByTagName("channel")[0].getElementsByTagName("title")[0].textContent;
			for (var c=0;c<items.length;c++)
			{
				var item = items.item(c);
				var row = Ti.UI.createTableViewRow({height:70});
				
				var thumbnails = item.getElementsByTagName("media:thumbnail");
				var content_left_margin=0;
				if (thumbnails && thumbnails.length > 0)
				{
					var media = thumbnails.item(0).getAttribute("url");
					var img;
					img = Ti.UI.createImageView({
						image:media,
						left:5,
						height:60,
						width:60
					});
					row.add(img);					
					
					content_left_margin=67
				}	
				var title = item.getElementsByTagName("title").item(0).text;
				var desc= item.getElementsByTagName("description").item(0).text;
				
				var label_title = Ti.UI.createLabel({
					text:strip_tags(title),
					left:content_left_margin+5,
					top:5,
					height:20,
					right:5,
					font:{fontFamily:'Helvetica Neue',fontWeight:'bold',fontSize:16}				
				});
				row.add(label_title);					
				
				var label_desc = Ti.UI.createLabel({
					text:strip_tags(desc),
					left:content_left_margin+5,
					top:30,
					height:35,
					right:5,
					font:{fontSize:12}				
				});					
				row.add(label_desc);
				
				data[x++] = row;
				var urls=item.getElementsByTagName("link");
				if (urls && urls.length > 0)
				{
					row.url = urls.item(0).text
					for (var i=0; i<urls.length;i++){
						if (urls.item(i).text!==''){
							row.url = urls.item(i).text
						}					
					}
				}
			}
			
			var tableview = Titanium.UI.createTableView({data:data});
			win.add(tableview);
			tableview.addEventListener('click',function(e)
			{
				var w = Ti.UI.createWindow({title:doctitle});
				var wb = Ti.UI.createWebView({url:e.row.url});
				w.add(wb);
				var b = Titanium.UI.createButton({
					title:'Close',
					style:Titanium.UI.iPhone.SystemButtonStyle.PLAIN
				});
				w.setLeftNavButton(b);
				b.addEventListener('click',function()
				{
					w.close();
				});
				w.open({modal:true});
			});
		}
		catch(E)
		{
			alert(E);
		}
	};
	xhr.send();
	
	return win
};

module.exports = RSSWindow2;
