define("Ti/_/declare,Ti/_/dom,Ti/_/event,Ti/_/style,Ti/_/lang,Ti/_/UI/FontWidget,Ti/UI".split(","),function(i,f,g,j,k,l,e){var c=require.on,h=j.set;return i("Ti._.UI.TextBox",l,{constructor:function(){this._addEventModifier("click,singletap,blur,change,focus,return".split(","),function(a){a.value=this.value})},_preventDefaultTouchEvent:!1,_initTextBox:function(){var a=this._field;this._form=f.create("form",null,this.domNode);var b=null,d="";this._addStyleableDomNode(this._setFocusNode(a));c(a,"keydown",
this,function(b){this.editable?13===b.keyCode&&(this.suppressReturn&&(g.stop(b),a.blur()),this.fireEvent("return")):g.stop(b)});c(a,"keypress",this,function(){this._capitalize()});c(a,"focus",this,function(){this.fireEvent("focus");b=setInterval(k.hitch(this,function(){var b=a.value;if(d.length!==b.length||d!==b)this.fireEvent("change"),d=b}),200)});c(a,"blur",this,function(){clearInterval(b);this.fireEvent("blur")})},_capitalize:function(a){var b=this._field,a="off";switch(a||this.autocapitalization){case e.TEXT_AUTOCAPITALIZATION_ALL:b.value=
b.value.toUpperCase();break;case e.TEXT_AUTOCAPITALIZATION_SENTENCES:a="on"}this._field.autocapitalize=a},blur:function(){this._field.blur()},focus:function(){this._field.focus()},hasText:function(){return!!this._field.value.length},properties:{autocapitalization:{value:e.TEXT_AUTOCAPITALIZATION_SENTENCES,set:function(a,b){a!==b&&this._capitalize(a);return a}},autocorrect:{value:!1,set:function(a){this._field.autocorrect=a?"on":"off";return a}},editable:!0,returnKeyType:{value:e.RETURNKEY_DEFAULT,
set:function(a){var b="",d=this.domNode,c="none";a!==e.RETURNKEY_DEFAULT&&(d=this._form,c="inherit",~[4,8,10].indexOf(a)&&(b="Search"));h(this._form,"display",c);this._field.title=b;f.place(this._fieldWrapper,d);return a}},suppressReturn:!0,textAlign:{set:function(a){h(this._field,"textAlign",/(center|right)/.test(a)?a:"left");return a}},value:{get:function(){return this._field.value},set:function(a){return this._capitalize(this._field.value=a)},value:""}}})});