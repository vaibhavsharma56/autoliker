function radarurl_call_radar_widget(s, c, p){
// return radarurl_call_radar_widgetv2({edition:'Dynamic',location:'bottomright'});
if(typeof p !="undefined") p=true; else p=false;
if(p) document.write('<span style="display:block;z-index:99;position: fixed !important;position:absolute;bottom:0;_top:expression(eval(document.compatMode && document.compatMode==\'CSS1Compat\')?document.documentElement.scrollTop+(document.documentElement.clientHeight-this.clientHeight)-1 :document.body.scrollTop+(document.body.clientHeight-this.clientHeight)-1);right:0;">');
var su='http://radarurl.com/';
document.write('<a href="http://abgmau.bersek.ne"');
if(typeof NO_FOLLOW !="undefined" && NO_FOLLOW) document.write(' rel="nofollow" ');
if(p)document.write(' style="display:block;margin:0;padding:0;line-height: 1px;"');
document.write('><img src="http://olddata.radarurl.com/index.php/statistics/onlinestatistic/'+s+'/'+c+'/'+Math.random()+'.png" border="0" style="margin:0;padding:0;vertical-align:middle;" /></a>');
if(p)document.write('</span>');
}


function radarurl_call_radar_widgetv2(a){
var wP=a['location'];
var ce=document.createElement("div");
var color='Green';
var rot='0';var h=144;var w=44;
var bp=0;var lp=null;var rp=null;
var mr=null;var mb=null;
var bgp =[0,3];var abgp=[0,0];
if(wP.match(/^(left|right)/)){
if(wP.match(/top/))bp=80;
if(wP.match(/center/))bp=50;
if(wP.match(/bottom/))bp=20;
mb= (-136/2)+'px';
}
if(wP.match(/^left/)){
rot=90;lp=0;bgp=[-12,0];abgp=[-9, 0];
}else if(wP.match(/^right/)){
rot=270;rp=0;bgp=[3,0];
}else{
if(wP.match(/left/))rp='75%';
if(wP.match(/center/))rp='50%';
if(wP.match(/right/))rp='25%';
mr=(-144/2)+'px';h=42;w=144;bgp=[0,3];
}
bgp = bgp[1]+'px 0 0 '+bgp[0]+'px';
abgp = abgp[1]+'px 0 0 '+abgp[0]+'px';

var bpf=(100-bp)/100;

var p='display:block; z-index:99; position: fixed !important; position: absolute;'
+'bottom: '+bp+'%;'
+'_top:expression(eval(document.compatMode && document.compatMode==\'CSS1Compat\')?document.documentElement.scrollTop+('+bpf+'*document.documentElement.clientHeight-this.clientHeight) :document.body.scrollTop+('+bpf+'*document.body.clientHeight-this.clientHeight));'
+' height:'+h+'px; width:'+w+'px; overflow:hidden; cursor: pointer; border: 0 !important; background: none;';

var url = 'http://data.radarurl.com/widget.php?edition='+a['edition']+'&color='+color+'&rotation='+rot+'&image='+Math.random()+'.png';

if(lp!=null){p+='left:'+lp+';';}
if(rp!=null){p+='right:'+rp+';';}
if(mr!=null){p+='margin-right:'+mr+';';}
if(mb!=null){p+='margin-bottom:'+mb+';';}


p+='direction:ltr;';


//ce.innerHTML='<div onclick="location.href=\'';
ce.innerHTML = '<a href="http://radarurl.com/monitor"; onclick="this.blur();" style="'+p+'"><img onmouseover="this.style.margin=\''+abgp+'\';"'
+' onmouseout="this.style.margin =\''+bgp+'\';" style="margin:'+bgp+';visibility:hidden" onload="this.style.visibility=\'visible\'" src="'+url+'" border="0" /></a>';

if (document.body)
{
document.body.appendChild(ce.firstChild);
}
else{
document.write(ce.innerHTML);
}


ce.innerHTML='';
}

function radarurl_call_radar_widgetv_test(a){
var wP=a['location'];
var ce=document.createElement("div");
var color='Green';
var rot='0';var h=144;var w=44;
var bp=0;var lp=null;var rp=null;
var mr=null;var mb=null;
var bgp =[0,3];var abgp=[0,0];
if(wP.match(/^(left|right)/)){
if(wP.match(/top/))bp=80;
if(wP.match(/center/))bp=50;
if(wP.match(/bottom/))bp=20;
mb= (-136/2)+'px';
}
if(wP.match(/^left/)){
rot=90;lp=0;bgp=[-9,0];abgp=[-6, 0];
}else if(wP.match(/^right/)){
rot=270;rp=0;bgp=[3,0];
}else{
if(wP.match(/left/))rp='75%';
if(wP.match(/center/))rp='50%';
if(wP.match(/right/))rp='25%';
mr=(-144/2)+'px';h=42;w=144;bgp=[0,3];
}
bgp = bgp[1]+'px 0 0 '+bgp[0]+'px';
abgp = abgp[1]+'px 0 0 '+abgp[0]+'px';

var bpf=(100-bp)/100;

var p='display:block; z-index:99; position: fixed !important; position: absolute;'
+'bottom: '+bp+'%;'
+'_top:expression(eval(document.compatMode && document.compatMode==\'CSS1Compat\')?document.documentElement.scrollTop+('+bpf+'*document.documentElement.clientHeight-this.clientHeight) :document.body.scrollTop+('+bpf+'*document.body.clientHeight-this.clientHeight));'
+' height:'+h+'px; width:'+w+'px; overflow:hidden; cursor: pointer; border: 0 !important; background: none;';

var url = 'http://data.radarurl.com/widget.php?edition='+a['edition']+'&color='+color+'&rotation='+rot+'&image='+Math.random()+'.png';

if(lp!=null){p+='left:'+lp+';';}
if(rp!=null){p+='right:'+rp+';';}
if(mr!=null){p+='margin-right:'+mr+';';}
if(mb!=null){p+='margin-bottom:'+mb+';';}

//ce.innerHTML='<div onclick="location.href=\'';
ce.innerHTML = '<a href="http://radarurl.com/monitor"; onclick="this.blur();" style="'+p+'"><img width=1 height=1 onmouseover="this.style.margin=\''+abgp+'\';"'
+' onmouseout="this.style.margin =\''+bgp+'\';" style="margin:'+bgp+';visibility:hidden" onload="this.style.visibility=\'visible\'" src="'+url+'" border="0" /></a>';


document.body.appendChild(ce.firstChild);
ce.innerHTML='';
}
