Ti.include("create.js","query.js","remove.js","show.js");windowFunctions.Checkins=function(){var b=createWindow(),a=addBackButton(b),a=Ti.UI.createTableView({backgroundColor:"#fff",top:a+u,data:createRows(["Create Checkin","Query Checkin"])});a.addEventListener("click",handleOpenWindow);b.add(a);b.open()};