function ApplicationWindow(title,win_type,win_parameters) {

	var self = Ti.UI.createWindow({
		title:title,
		backgroundColor:'black'
	});
	
	var button = Ti.UI.createButton({
		height:44,
		width:200,
		title:L('openWindow'),
		top:20
	});
	self.add(button);
	
	button.addEventListener('click', function() {
		//containingTab attribute must be set by parent tab group on
		//the window for this work
		var WindowRouter = require('ui/winmodule/WindowRouter');
		var routedWindow = new WindowRouter(win_type,win_parameters);

		routedWindow.containingTab=self.containingTab;
		self.containingTab.open(routedWindow);			
	});
	
	return self;
};

module.exports = ApplicationWindow;
