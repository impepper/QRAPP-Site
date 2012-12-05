function CustomPageWindow(tabbed_window,show_navbar,title,url,pagecontent) {
	var win = Ti.UI.createWindow({
		title:title,
		backgroundColor:'white',
		navBarHidden:true
	});
	
	var htmlContent = '<html><head></head><body>'+pagecontent+'</body><html>';
	var webview = Ti.UI.createWebView({
		content:htmlContent
	})
			
	win.add(webview);
	
	if (tabbed_window && show_navbar) {
		win.navBarHidden = false;
	} else {
		win.navBarHidden = true;
	}
	
	return win
};

module.exports = CustomPageWindow;
