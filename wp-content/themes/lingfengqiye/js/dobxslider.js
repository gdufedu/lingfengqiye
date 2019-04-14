jQuery(document).ready(function(){
	jQuery('.bxslider').bxSlider({
		mode : 'horizontal',		//幻灯片切换的方式  可选值: 'horizontal', 'vertical', 'fade'  默认值：horizontal
		speed: 500,						//图片切换的时间（毫秒）   默认值：500
		startSlide:2,					//起始图片编号。 0-第一张图片，1-第二张图片……  默认值：0
		captions:true,					//是否显示图片注释(注释内容在img的tiltle属性中)? true-显示，false-不显示。默认值：false
		ticker: false,					//跑马灯效果。true-开启，false-关闭
		pager:true,						//图片数字切换。true-开启，false-关闭
		controls:false,					//是否显示上一个/下一个链接 ?  true-显示，false-不显示		默认值：true
		autoControls:false,			//是否显示“开始”和“停止”按钮，true-开启，false-停止  默认值：false
		startText:'开始',				//"开始"按钮的锚文本, 默认值：Start
		stopText:'停止',				//"停止"按钮的锚文本, 默认值：Stop
		auto: true,						//幻灯片自动切换。true-自动切换，false-不自动切换。默认值：false
		pause:4000,					//两张图片切换的时间间隔。默认值：4000（毫秒）
		autoHover:true				//鼠标放到图片时要不要暂停切换图片。true-暂停，fals-不暂停。默认值：false
	});
	jQuery('.chuzhi-bxslider').bxSlider({
		mode : 'vertical',		//幻灯片切换的方式  可选值: 'horizontal', 'vertical', 'fade'  默认值：horizontal
		speed: 500,						//图片切换的时间（毫秒）   默认值：500
		startSlide:2,					//起始图片编号。 0-第一张图片，1-第二张图片……  默认值：0
		captions:true,					//是否显示图片注释(注释内容在img的tiltle属性中)? true-显示，false-不显示。默认值：false
		ticker: false,					//跑马灯效果。true-开启，false-关闭
		pager:true,						//图片数字切换。true-开启，false-关闭
		controls:false,					//是否显示上一个/下一个链接 ?  true-显示，false-不显示		默认值：true
		autoControls:false,			//是否显示“开始”和“停止”按钮，true-开启，false-停止  默认值：false
		startText:'开始',				//"开始"按钮的锚文本, 默认值：Start
		stopText:'停止',				//"停止"按钮的锚文本, 默认值：Stop
		auto: true,						//幻灯片自动切换。true-自动切换，false-不自动切换。默认值：false
		pause:4000,					//两张图片切换的时间间隔。默认值：4000（毫秒）
		autoHover:true				//鼠标放到图片时要不要暂停切换图片。true-暂停，fals-不暂停。默认值：false
	});
});