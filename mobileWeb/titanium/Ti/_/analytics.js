define("Ti/_,Ti/_/dom,Ti/_/has,Ti/_/lang,Ti/App,Ti/Platform".split(","),function(k,i,y,z,l,A){function m(){var a=localStorage.getItem("ti:analyticsEvents");return a?JSON.parse(a):[]}function j(a){localStorage.setItem("ti:analyticsEvents",JSON.stringify(a))}function q(a){if(r(a.data,"Object")&&a.data.success){var a=s[a.data.callback],e=[],c=m(),b=0,f=c.length,d;if(a){for(;b<f;)d=c[b++],~a.indexOf(d.id)||e.push(d);j(e)}}}var r=require.is,t=l.analytics,n=null,s={},u,x={add:function(a,e,c,b){if(t){var f=
m();f.push({id:k.uuid(),type:a,evt:e,ts:(new Date).toISOString().replace("Z","+0000"),data:c});j(f);this.send(b)}},send:function(a){if(t){var e=Math.floor(1E6*Math.random()),c=(new Date).getTime(),b=[],f=[],d=sessionStorage.getItem("ti:sessionId"),g=sessionStorage.getItem("ti:analyticsSeqId"),j=m(),v=0,w=j.length;r(g,"String")&&(g=JSON.parse(g));clearTimeout(u);if(w&&(a||null===n||6E4<=c-n)){d||(d=k.uuid());for(null===g&&(g=0);v<w;)a=j[v++],b.push(a.id),f.push(JSON.stringify({id:a.id,mid:A.id,rdu:null,
type:a.type,aguid:l.guid,event:a.evt,seq:g++,ver:"2",deploytype:l.deployType,sid:d,ts:a.ts,data:a.data})),"ti.end"===a.type&&(g=0,d=k.uuid());sessionStorage.setItem("ti:sessionId",d);sessionStorage.setItem("ti:analyticsSeqId",g);s[e]=b;n=c;if(y("analytics-use-xhr")){var h=new XmlHttpRequest;h.onreadystatechange=function(){if(4===h.readyState&&200===h.status)try{q({data:eval("("+h.responseText+")")})}catch(a){}};h.open("POST","https://api.appcelerator.net/p/v2/mobile-web-track",!0);h.setRequestHeader("Content-Type",
"application/x-www-form-urlencoded");h.send(z.urlEncode({content:f}))}else{var c=document.body,b="analytics"+e,o=i.create("iframe",{id:b,name:b,style:{display:"none"}},c),p=i.create("form",{action:"https://api.appcelerator.net/p/v2/mobile-web-track?callback="+e+"&output=html",method:"POST",style:{display:"none"},target:b},c);i.create("input",{name:"content",type:"hidden",value:"["+f.join(",")+"]"},p);setTimeout(function(){function a(){setTimeout(function(){i.destroy(p);i.destroy(o)},1)}o.onload=a;
o.onerror=a;p.submit()},25)}}u=setTimeout(function(){x.send(1)},6E4)}}};require.on(window,"message",q);return x});