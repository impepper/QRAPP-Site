1.8>Ti.version&&alert("Sorry - this application template requires Titanium Mobile SDK 1.8 or later");
(function(){var e=Ti.Platform.osname,c=Ti.Platform.displayCaps.platformHeight,d=Ti.Platform.displayCaps.platformWidth;Ti.API.info("User:"+Ti.App.Properties.getString("cloud_useremail","000viewer.defaultui@fuihan.com"));Ti.API.info("Pass:"+Ti.App.Properties.getString("cloud_password","000viewer.defaultui@fuihan.com"));var g="ipad"===e||"android"===e&&(899<d||899<c),f=require("ti.cloud");Ti.App.Properties.getBool("auto_login",!1)?(c=Ti.App.Properties.getString("cloud_useremail","viewer.defaultui@fuihan.com"),
d=Ti.App.Properties.getString("cloud_userpassword","viewerInPub")):(c="viewer.defaultui@fuihan.com",d="viewerInPub",Ti.App.Properties.removeProperty("cloud_userid"),Ti.App.Properties.removeProperty("cloud_useremail"),Ti.App.Properties.removeProperty("cloud_userpassword"),Ti.App.Properties.removeProperty("cloud_Logged"));"mobileweb"==e&&(c="viewer."+Ti.Utils.base64decode(Ti.App.Properties.getString("viewerid","")).toString().toString().substr(9,200));Ti.API.info("User:"+c);Ti.API.info("Pass:"+d);f.Users.login({login:c,
password:d},function(b){b.success?(b=b.users[0],Ti.API.info("user_id:"+b.custom_fields.content_user_id),f.Objects.query({classname:"windows",page:1,per_page:10,where:{user_id:b.custom_fields.content_user_id,win_id:0,win_root_id:0}},function(a){a.success?(Ti.API.info("WinDows TYPE_TABBEDGROUP Count:"+a.windows.length),Ti.API.info("WinDows TYPE_TABBEDGROUP id:"+a.windows[0].id),a=a.windows[0],"TYPE_TABBEDGROUP"==a.win_type?(Ti.API.info("Create Tabgroup"),a=require("ui/common/ApplicationTabGroup"),Ti.API.info("Create Tabgroup"),
(new a(g)).open()):Ti.API.info("Tyep:"+a.win_type)):alert("Error:\\n"+(a.error&&a.message||JSON.stringify(a)))})):alert("Error:\\n"+(b.error&&b.message||JSON.stringify(b)))})})();