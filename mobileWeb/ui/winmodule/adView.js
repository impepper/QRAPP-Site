var osname=Ti.Platform.osname,version=Ti.Platform.version,height=Ti.Platform.displayCaps.platformHeight,width=Ti.Platform.displayCaps.platformWidth,isTablet="ipad"===osname||"android"===osname&&(899<width||899<height);Ti.API.info("Called");var adgap=isTablet?90:50,adwidth=isTablet?728:320,ad_role=Ti.App.Properties.getInt("cloud_userrole",0),view_header_gap=0;
if(5>ad_role){var view_header_gap=adgap,Admob=require("ti.admob"),ad,win=Ti.UI.currentWindow;win.add(ad=Admob.createView({top:0,width:adwidth,height:adgap,publisherId:"a14fc70a8d46176",adBackgroundColor:"black",gender:"male",keywords:"movie"}));Ti.Geolocation.accuracy=Ti.Geolocation.ACCURACY_BEST;Ti.Geolocation.distanceFilter=0;Ti.Geolocation.purpose="To show you local ads, of course!";Ti.Geolocation.getCurrentPosition(function(a){a.success&&!a.error&&win.add(Admob.createView({bottom:0,width:adwidth,
height:adgap,publisherId:"a14fc70a8d46176",adBackgroundColor:"black",gender:"female",keywords:"shopping",location:a.coords}))})};