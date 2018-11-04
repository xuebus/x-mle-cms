/*MSClass (Class Of marquee Scroll通用不间断滚动JS封装类) Ver 1.65*\
　应用说明:页面包含<script type="text/javascript" src="./script/msclass.js"></script>
	
	创建实例:
		//参数直接赋值法
		new marquee("marquee")
		new marquee("marquee","top")
		......
		new marquee("marquee",0,1,760,52)
		new marquee("marquee","top",1,760,52,50,5000)
		......
		new marquee("marquee",0,1,760,104,50,5000,3000,52)
		new marquee("marquee",null,null,760,104,null,5000,null,-1)

	参数说明:
		ID		"marquee"	容器ID		(必选)
		Direction	(0)		滚动方向	(可选,默认为0向上滚动) 可设置的值包括:0,1,2,3,"top","bottom","left","right" (0向上 1向下 2向左 3向右)
		Step		(1)		滚动的步长	(可选,默认值为2,数值越大,滚动越快)
		Width		(760)		容器可视宽度	(可选,默认值为容器初始设置的宽度)
		Height		(52)		容器可视高度	(可选,默认值为容器初始设置的高度)
		Timer		(50)		定时器		(可选,默认值为30,数值越小,滚动的速度越快,1000=1秒,建议不小于20)
		DelayTime	(5000)		间歇停顿延迟时间(可选,默认为0不停顿,1000=1秒)
		WaitTime	(3000)		开始时的等待时间(可选,默认或0为不等待,1000=1秒)
		ScrollStep	(52)		间歇滚动间距	(可选,默认为翻屏宽/高度,该数值与延迟均为0则为鼠标悬停控制,-1禁止鼠标控制)

	使用建议:
		1、建议直接赋予容器的显示区域的宽度和高度，如(<div id="marquee" style="width:760px;height:52px;">......</div>)
		2、建议为容器添加样式overflow = auto，如(<div id="marquee" style="width:760px;height:52px;overflow:auto;">......</div>)
		3、为了更准确的获取滚动区域的宽度和高度，请尽可能将各滚动单位直接赋予正确宽高度
		4、对于TABLE标记的横向滚动，需要对TABLE添加样式display = inline，如(<div id="marquee" style="width:760px;height:52px;overflow:auto;"><table style="display:inline">......</table></div>)
		5、对于翻屏滚动或间歇滚动，要注意各滚动单位间的间距，同时需要对容器的可视高度和可视宽度做好准确的设置，对于各滚动单位间的间距可以通过设置行间距或者单元格的高宽度来进行调整
		6、对于LI自动换行的问题暂时没有更好的解决办法，建议将其转换成表格(TABLE)的形式来达到同等的效果
		7、针对横向滚动的文字段落，如果最末端是以空格" "结束的，请将空格" "转换成"&nbsp;"
		8、鼠标悬停滚动思想源自Flash，所以有一定的局限性（容器内仅允许用图片<img>或者带链接的图片<a><img></a>的形式，并需要禁止其自动换行）
***/
window.onerror = function(){return true;}
function marquee(){
	this.ID = document.getElementById(arguments[0]);
	if(!this.ID){
		this.ID = -1;
		return;
	}
	this.Direction = this.Width = this.Height = this.DelayTime = this.WaitTime = this.CTL = this.StartID = this.Stop = this.MouseOver = 0;
	this.Step = 1;
	this.Timer = 30;
	this.DirectionArray = {"top":0 , "up":0 , "bottom":1 , "down":1 , "left":2 , "right":3};
	if(typeof arguments[1] == "number" || typeof arguments[1] == "string")this.Direction = arguments[1];
	if(typeof arguments[2] == "number")this.Step = arguments[2];
	if(typeof arguments[3] == "number")this.Width = arguments[3];
	if(typeof arguments[4] == "number")this.Height = arguments[4];
	if(typeof arguments[5] == "number")this.Timer = arguments[5];
	if(typeof arguments[6] == "number")this.DelayTime = arguments[6];
	if(typeof arguments[7] == "number")this.WaitTime = arguments[7];
	if(typeof arguments[8] == "number")this.ScrollStep = arguments[8];
	this.ID.style.overflow = this.ID.style.overflowX = this.ID.style.overflowY = "hidden";
	this.ID.noWrap = true;
	this.IsNotOpera = (navigator.userAgent.toLowerCase().indexOf("opera") == -1);
	if(arguments.length >= 7)this.Start();
}

marquee.prototype.Start = function(){
	if(this.ID == -1)return;
	if(this.WaitTime < 800)this.WaitTime = 800;
	if(this.Timer < 20)this.Timer = 20;
	if(this.Width == 0)this.Width = parseInt(this.ID.style.width);
	if(this.Height == 0)this.Height = parseInt(this.ID.style.height);
	if(typeof this.Direction == "string")this.Direction = this.DirectionArray[this.Direction.toString().toLowerCase()];
	this.HalfWidth = Math.round(this.Width / 2);
	this.HalfHeight = Math.round(this.Height / 2);
	this.BakStep = this.Step;
	this.ID.style.width = this.Width + "px";
	this.ID.style.height = this.Height + "px";
	if(typeof this.ScrollStep != "number")this.ScrollStep = this.Direction > 1 ? this.Width : this.Height;
	var templateLeft = "<table cellspacing='0' cellpadding='0' style='border-collapse:collapse;display:inline;'><tr><td noWrap=true style='white-space: nowrap;word-break:keep-all;'>MSCLASS_TEMP_HTML</td><td noWrap=true style='white-space: nowrap;word-break:keep-all;'>MSCLASS_TEMP_HTML</td></tr></table>";
	var templateTop = "<table cellspacing='0' cellpadding='0' style='border-collapse:collapse;'><tr><td>MSCLASS_TEMP_HTML</td></tr><tr><td>MSCLASS_TEMP_HTML</td></tr></table>";
	var msobj = this;
	msobj.tempHTML = msobj.ID.innerHTML;
	if(msobj.Direction <= 1){
		msobj.ID.innerHTML = templateTop.replace(/MSCLASS_TEMP_HTML/g,msobj.ID.innerHTML);
	} else {
		if(msobj.ScrollStep == 0 && msobj.DelayTime == 0){
			msobj.ID.innerHTML += msobj.ID.innerHTML;
		} else	{
			msobj.ID.innerHTML = templateLeft.replace(/MSCLASS_TEMP_HTML/g,msobj.ID.innerHTML);
		}
	}
	var timer = this.Timer;
	var delaytime = this.DelayTime;
	var waittime = this.WaitTime;
	msobj.StartID = function(){msobj.Scroll()}
	msobj.Continue = function(){
		if(msobj.MouseOver == 1){
			setTimeout(msobj.Continue,delaytime);
		} else {	
			clearInterval(msobj.TimerID);
			msobj.CTL = msobj.Stop = 0;
			msobj.TimerID = setInterval(msobj.StartID,timer);
		}
	}
	msobj.Pause = function(){
		msobj.Stop = 1;
		clearInterval(msobj.TimerID);
		setTimeout(msobj.Continue,delaytime);
	}
	msobj.Begin = function(){
		msobj.ClientScroll = msobj.Direction > 1 ? msobj.ID.scrollWidth / 2 : msobj.ID.scrollHeight / 2;
		if((msobj.Direction <= 1 && msobj.ClientScroll <= msobj.Height + msobj.Step) || (msobj.Direction > 1 && msobj.ClientScroll <= msobj.Width + msobj.Step)){
			msobj.ID.innerHTML = msobj.tempHTML;
			delete(msobj.tempHTML);
			return;
		}
		delete(msobj.tempHTML);
		msobj.TimerID = setInterval(msobj.StartID,timer);
		if(msobj.ScrollStep < 0) return;
		msobj.ID.onmousemove = function(event){
			if(msobj.ScrollStep == 0 && msobj.Direction > 1){
				var event = event || window.event;
				if(window.event){
					if(msobj.IsNotOpera){
						msobj.EventLeft = event.srcElement.id == msobj.ID.id ? event.offsetX - msobj.ID.scrollLeft : event.srcElement.offsetLeft - msobj.ID.scrollLeft + event.offsetX;
					} else {
						msobj.ScrollStep = null;
						return;
					}
				} else {
					msobj.EventLeft = event.layerX - msobj.ID.scrollLeft;
				}
				msobj.Direction = msobj.EventLeft > msobj.HalfWidth ? 3 : 2;
				msobj.AbsCenter = Math.abs(msobj.HalfWidth - msobj.EventLeft);
				msobj.Step = Math.round(msobj.AbsCenter * (msobj.BakStep*2) / msobj.HalfWidth);
			}
		}
		msobj.ID.onmouseover = function(){
			if(msobj.ScrollStep == 0) return;
			msobj.MouseOver = 1;
			clearInterval(msobj.TimerID);
		}
		msobj.ID.onmouseout = function(){
			if(msobj.ScrollStep == 0){
				if(msobj.Step == 0) msobj.Step = 1;
				return;
			}
			msobj.MouseOver = 0;
			if(msobj.Stop == 0){
				clearInterval(msobj.TimerID);
				msobj.TimerID = setInterval(msobj.StartID,timer);
			}
		}
	}
	setTimeout(msobj.Begin,waittime);
}

marquee.prototype.Scroll = function(){
	switch(this.Direction){
		case 0:
			this.CTL += this.Step;
			if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
				this.ID.scrollTop += this.ScrollStep + this.Step - this.CTL;
				this.Pause();
				return;
			} else {
				if(this.ID.scrollTop >= this.ClientScroll){
					this.ID.scrollTop -= this.ClientScroll;
				}
				this.ID.scrollTop += this.Step;
			}
			break;

		case 1:
			this.CTL += this.Step;
			if(this.CTL >= this.ScrollStep && this.DelayTime > 0)	{
				this.ID.scrollTop -= this.ScrollStep + this.Step - this.CTL;
				this.Pause();
				return;
			} else {
				if(this.ID.scrollTop <= 0){
					this.ID.scrollTop += this.ClientScroll;
				}
				this.ID.scrollTop -= this.Step;
			}
			break;

		case 2:
			this.CTL += this.Step;
			if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
				this.ID.scrollLeft += this.ScrollStep + this.Step - this.CTL;
				this.Pause();
				return;
			} else {
				if(this.ID.scrollLeft >= this.ClientScroll){
					this.ID.scrollLeft -= this.ClientScroll;
				}
				this.ID.scrollLeft += this.Step;
			}
			break;

		case 3:
			this.CTL += this.Step;
			if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
				this.ID.scrollLeft -= this.ScrollStep + this.Step - this.CTL;
				this.Pause();
				return;
			} else {
				if(this.ID.scrollLeft <= 0) {
					this.ID.scrollLeft += this.ClientScroll;
				}
				this.ID.scrollLeft -= this.Step;
			}
			break;
	}
}