<?php
	use yii\helpers\Html;
	use yii\bootstrap\Carousel;
	use yii\bootstrap\Tabs;
?>
<!-- 二级菜单、轮播、登陆 -->

<div class="page-container">
		
		<div class="page-index">
			<div class="page-top _orange-red">
				<div class="search">
					<div class="search-so">
						<input />
						<div class="so-btn" ><i class="icons-so"></i></div>
					</div>
				</div> 
				<div class="banner">
				
				    <div class='dnSlide-main' style=" width: 300%;margin-left: -100%;">
				    	<?php echo '<img id="#" src="'.$YxBanner[0]->banner_pic.'" width="100%">'.'<img id="#" src="'.$YxBanner[1]->banner_pic.'" width="100%">'.'<img id="#" src="'.$YxBanner[2]->banner_pic.'" width="100%">'.'<img id="#" src="'.$YxBanner[3]->banner_pic.'" width="100%">'.'<img id="#" src="'.$YxBanner[3]->banner_pic.'" width="100%">';
		    			?>
					</div>
					<div style="position: absolute; width: 100%; z-index: 100; left: 0px; bottom: -35px; text-align: center;">
						<?php for($i=0;$i<7;$i++){
						echo '
						<span class="banner-btn" id="banner'.$i.'"></span> ';
						}?>
					</div>
	 
				</div>
				<img class="slide-bottom" src="/static/img/bannerbottom.png" width="100%">
			</div> <!-- top so-->
			
			<div class="navlist">  
				<?php 
					$x=0;
					$YxListli = array('/basic-clean/index?server_parent=103&sort=fraction' => '日常保洁', 
                        '/other-services/index?server_parent=105&sort=fraction' => '保姆',
                        '/other-services/index?server_parent=106&sort=fraction'=>'月嫂',
                        '/other-services/index?server_parent=107&sort=fraction' => '育儿嫂',
                        '/basic-clean/index?server_parent=103&server_id=113&sort=fraction' => '擦玻璃',

                        '/basic-clean/index?server_parent=105&server_id=119&sort=fraction' => '长期钟点工',
                        '/other-services/index?server_parent=108&sort=fraction' => '家电清洗',
                        '/special-clean/index?server_parent=104&sort=fraction' => '深度保洁',
                        '/special-clean/index?server_parent=104&server_id=115&sort=fraction' => '开荒保洁',
                        '/special-clean/index?server_parent=104&server_id=116&sort=fraction' => '厨房保养',
                        '/special-clean/index?server_parent=104&server_id=117&sort=fraction' => '卫生间保养',
                        '/other-services/index?server_parent=111&sort=fraction' => '开锁换锁',
                        '/other-services/index?server_parent=110&sort=fraction' => '维修',
                        '/other-services/index?server_parent=109&sort=fraction' => '家居保养',
                        '' => '全部服务'
                            ); 
						//日常保洁、保姆、月嫂、育儿嫂、擦玻璃
						//长期钟点工、家电清洗、深度保洁、开荒保洁、厨房保养、
						//卫生间保养、开锁换锁、维修安装、家居保养、全部服务

    				foreach ($YxListli as $url => $value) {
        				$x++;
						echo '
						<div class="list-li">
							<a href="'.$url.'">
								<div style="height: 65px; background-repeat: no-repeat; background-position: center center; background-size: contain; background-image: url(/static/img/icon.png);"></div>
								<div class="li-name" >'.$value.'</div>
							</a>
						</div>';
					}
				?>
			</div>
			<div class="tpl-wrapper">
  				<div class="tpl-wiget" style="width: 54%;"><img src="/static/img/16b9.png" ></div>
  				<div class="tpl-wiget" style="width: 31%;"><img src="/static/img/1b1.png" ></div>
  				<div class="tpl-wiget" style="width: 88%;"><img src="/static/img/3b1.png" ></div>
			</div> 
		</div>
		
		
		<script type="text/javascript">

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as anonymous module.
    define(['jquery'], factory);
  } else if (typeof exports === 'object') {
    // Node / CommonJS
    factory(require('jquery'));
  } else {
    // Browser globals.
    factory(jQuery);
  }
}(function ($) {

    'use strict';
    /* Defind Plugin */
    var _PLUGIN_    = 'dnSlide';
    var _VERSION_   = '1.0.0';

    if ( $[ _PLUGIN_ ] && $[ _PLUGIN_ ].version > _VERSION_ )
    {
        return;
    }

    /* Init Object */
    $[_PLUGIN_] = function($container,options){
        var self = this ;
        this.container = $container ;
        this.options   = options ;
        this.api       = [ "init", "destroy", "hide", "show"];
        this.init();
        return this ;
    };

    $[_PLUGIN_].version = _VERSION_;

    $[_PLUGIN_].defaults = {
        "switching"    : "normal" ,         //custom
        "isOddShow" : false ,            //偶数时是否复制一张，默认是需要复制防止错位
        "precentWidth" : "50%" ,
        "autoPlay"  : false ,
        "delay"     : 5000 ,
        "scale"     : 0.9 ,
        "speed"     : 500 ,
        "verticalAlign" : "middle",
        "afterClickBtnFn" : null 
    }; 

    /* Prototype Function */
    $[_PLUGIN_].prototype = {
        init : function (){
            var _this_ = this ;

            this.data();
            this.settingDOM();  
            this.isIE7 = /MSIE 6.0|MSIE 7.0/gi.test(window.navigator.userAgent);

            this.dnSlideMain = this.container.find('.dnSlide-main');
            this.dnSlideItems = this.container.find('ul.dnSlide-list');
            this.dnSlideLi = this.container.find('.dnSlide-item');
            this.firstItem   = this.container.find('ul.dnSlide-list > li:first-child');
            this.dnSlideItemsLength = this.container.find('ul.dnSlide-list>li').length;
            this.dnSlideFirstItem = this.container.find('ul.dnSlide-list>li:first-child');
            this.dnSlideLastItem = this.container.find('ul.dnSlide-list>li:last-child');
            if(this.options.isOddShow) this.isEvenPicNum();
            if(this.options.response) this.container.addClass('dn-response');
        
            this.prevBtn = this.container.find('.dnSlide-left-btn');
            this.nextBtn = this.container.find('.dnSlide-right-btn');

            this.prevBtn =  this.container.find('div.dnSlide-left-btn');
            this.nextBtn =  this.container.find('div.dnSlide-right-btn');
            this.rotateFlag = true;

            //DEFAULT SETTING START
            this.clearLiStyle();
            this.countSettingValue();
            this.setPositionValue(); 
            this.setDefaultLiJson();

            if(this.options.switching === "custom"){
                this.dnSlideLi.off().on("click",function(){
                    _this_.clickCurrentLI($(this).index());
                });
            }
            
            if(this.options.autoPlay){
                this.autoPlay();
                this.container.hover(function(){
                    clearTimeout(_this_.timer);
                },function(){
                    _this_.autoPlay();
                });
            }
            //DEFAULT SETTING END

            // EVENTS START
            this.prevBtn.off().on('click', function(event) {
                event.stopPropagation();
                var afterClickPrevBtn = _this_.options.afterClickPrevBtnFn;
                if(_this_.rotateFlag){
                    _this_.rotateFlag = false;
                    _this_.dnSlideRotate('right');
                }
                if( typeof afterClickPrevBtn === "function" && afterClickPrevBtn ) afterClickPrevBtn();
            });
            this.nextBtn.off().on('click', function(event) {
                event.stopPropagation();
                var afterClickNextBtn = _this_.options.afterClickNextBtnFn;
                if(_this_.rotateFlag){
                    _this_.rotateFlag = false;
                    _this_.dnSlideRotate('left') ;  
                }
                if( typeof afterClickNextBtn === "function" && afterClickNextBtn ) afterClickNextBtn();
            });

            $(window).resize(function(){
                _this_.WndwResize();
            });
            // EVENTS END

        },
        data : function(){
            var data = this.container.data(_PLUGIN_);   
            if(!data ) {
                this.container.data(_PLUGIN_, {
                   target : this.container
                })
            }
        },
        destroy : function()
        {
            this.container.empty().html(this.defalutHtml);
        },
        hide : function(callback)
        {
            this.container.addClass('dnSlide-hide');
            if( callback && typeof callback === "function" ) callback();
        },
        show : function(callback)
        {
            this.container.removeClass('dnSlide-hide');
            if( callback && typeof callback === "function" ) callback();
        },    
        settingDOM : function (){
            var _this_  = this ,
                btnHTML = (this.options.switching === "normal") ? "<div class='dnSlide-btn dnSlide-left-btn'></div><div class='dnSlide-btn dnSlide-right-btn'></div>" : null ;

            this.defalutHtml = this.container.html();

            this.resourceSrcArr = this.container.find('img').map(function(i,e){return e.src;});
			this.resourceHrefArr = this.container.find('img').map(function(i,e){return e.id;});
            var ulDOM = this.container.html('<ul class="dnSlide-list"></ul>').find('.dnSlide-list');

            jQuery.each(this.resourceSrcArr , function(i,e){
                ulDOM.append('<li class="dnSlide-item"><a href="'+_this_.resourceHrefArr[i]+'"><img class="slide-img" src="'+_this_.resourceSrcArr[i]+'" width="100%"></a></li>');
            });

            ulDOM.parents('.dnSlide-main').append(btnHTML);
        },
        WndwResize : function(){
            var _this_ = this ,
                timeId = '';

            if(timeId){
                clearTimeout(timeId);
                timeId = null ;
            }
            timeId = setTimeout(function(){
                _this_.clearLiStyle();
                _this_.countSettingValue();
                _this_.setPositionValue();
                _this_.setDefaultLiJson();
            } , 250 );
        },
        //是否带有自定义设置
        getCustomSetting : function(){
            var setting = this.setting ;
            if(setting && setting !== ""){
                return setting;
            }else{
                return {};
            }
        },
        clearLiStyle : function(){
            this.dnSlideLi.attr("style","");
        },
        //设置默认值主要是为了当用户修改默认属性后CSS也相对调整
        countSettingValue : function(){
            var _this_    = this ,
                response  = this.options.response ,
                precent   = 100 + "%" ,
                zIndex    = Math.floor(this.dnSlideItemsLength/2) ;

            this.firstItem.css({
                "width" : this.dnSlideItems.width() * (parseFloat(this.options.precentWidth.replace("px",""))/100)
            });

            this.firstItem.css({
                "height": this.dnSlideFirstItem.find(".slide-img").height()
            });

            this.container.css({
                "width" : null,
                "height": this.dnSlideFirstItem.find(".slide-img").height()
            });

            this.prevBtn.css({
                "width" : (this.container.width() - this.firstItem.width())/2 ,
                "height": precent 
            });

            this.nextBtn.css({
                "width" : (this.container.width() - this.firstItem.width())/2 ,
                "height": precent 
            });

            this.dnSlideFirstItem.css({
                "left"  : (this.container.width() - this.firstItem.width())/2 ,
                "zIndex": zIndex
            });
        },
        //设置默认加载进来时所有图片对应的位置
        setPositionValue : function(){

            var self_ = this ,
                response  = this.options.response ,
                level = Math.floor(this.dnSlideItemsLength/2) ,
                items = this.container.find('.dnSlide-list > li').slice(1),
                leftItems = items.slice( 0 , items.length/2 ),
                rightItems = items.slice( items.length/2 ),
                optionImgLeft = (this.container.width() - this.firstItem.width())/1.6 ,
                gap = optionImgLeft / level,
                dw = this.dnSlideFirstItem.width()  ,
                dh = this.dnSlideFirstItem.height() ;

            leftItems.each(function(i,e){
                dw *= self_.options.scale;
                dh *= self_.options.scale;
                var j = i ;
                $(e).css({
                    "width"  : dw,
                    "height" : dh,
                    "zIndex"  : --level, 
                    "opacity" : 1/(++j),
                    "left" : optionImgLeft + self_.dnSlideFirstItem.width() + ((++i) * gap ) - dw ,
                    "top"  :  self_.settingVerticalAlign(dh)
                });
            });

            var rw = leftItems.last().width(),
                rh = leftItems.last().height(),
            oloop = Math.floor(this.dnSlideItemsLength/2);

            rightItems.each(function(i,e){

                $(e).css({
                    "width"  : rw,
                    "height" : rh,
                    "zIndex" : level++, 
                    "opacity" : 1 / oloop--,
                    "left" : gap*i/2.5 ,
                    "top"  :  self_.settingVerticalAlign(rh)
                });
                rw = rw / self_.options.scale;
                rh = rh / self_.options.scale;
            });

        },
        //设置垂直居中位置
        settingVerticalAlign : function(height){
            var verticalAlign = this.options.verticalAlign,
                top,
                wid = this.dnSlideFirstItem.find(".slide-img").height() ;
            if( verticalAlign === 'middle' ){
                top = ( wid - height) / 2;
            }else if( verticalAlign === 'top' ){
                top = 10;
            }else if( verticalAlign === 'bottom' ){
                top = (wid - height);
            }else{
                top = (wid - height) / 2;
            }
            return top;
        },
        //向左向右事件
        dnSlideRotate : function(dir){
            var self_ = this ,
                indexArr = [] ,
                arr      = [] ;
            if(dir==='left'){
                this.dnSlideItems.find('li').each(function(index, el) {
                    var prev = $(el).prev().get(0) ? $(el).prev() : self_.dnSlideLastItem,
                        width = prev.width(),
                        height = prev.height(),
                        zIndex = prev.css('zIndex'),
                        top = prev.css('top'),
                        left = prev.css('left'),
                        opacity = prev.css('opacity');
                        indexArr.push(zIndex);

                        $(el).animate({
                            width: width,
                            height: height,
                            //zIndex: zIndex,
                            top: top,
                            left: left,
                            opacity: opacity
                        },self_.options.speed,function(){
                            self_.rotateFlag = true ;
                        });
                });
                //让z-index转化效果优先于别的提高交互
                this.dnSlideItems.find('li').each(function(i){
                    $(this).css("zIndex",indexArr[i]);
                    arr.push(parseInt(indexArr[i]));
                });
            }else if(dir==='right'){
                this.dnSlideItems.find('li').each(function(index, el) {
                    var next = $(el).next().get(0) ? $(el).next() : self_.dnSlideFirstItem,
                        width = next.width(),
                        height = next.height(),
                        zIndex = next.css('zIndex'),
                        top = next.css('top'),
                        left = next.css('left'),
                        opacity = next.css('opacity');
                        indexArr.push(zIndex);

                        $(el).animate({
                            width: width,
                            height: height,
                            //zIndex: zIndex,
                            top: top,
                            left: left,
                            opacity: opacity
                        },function(){
                            self_.rotateFlag = true ;
                        });
                });
                this.dnSlideItems.find('li').each(function(i){
                    $(this).css("zIndex",indexArr[i]);
                    arr.push(parseInt(indexArr[i]));
                });
            }
            var max =  Math.max.apply(null, arr);
            var i   =  jQuery.inArray(max,arr);
            this.options.afterClickBtnFn.apply(this,[i]);
        },
        setDefaultLiJson : function(){
            this.setliArr = this.dnSlideLi.map(function(i,e){ 
                        var arr = [];
                        arr.push({
                            "width"   : $(e).css("width") ,
                            "height"  : $(e).css("height") ,
                            "opacity" : $(e).css("opacity") ,
                            "z-index" : $(e).css("z-index") ,
                            "left"    : $(e).css("left") ,
                            "top"     : $(e).css("top") ,
                            "current" : i
                        });
                        return arr; 
                    }).get();
        },
        clickCurrentLI: function(index){
            var _this_  = this ,
                li       = this.dnSlideLi , 
                indexArr = li.map(function(i){ return $(this).index(); }).get() ,
                thisArr = indexArr ,
                cutArr = thisArr.splice( thisArr.indexOf(index) ,  _this_.dnSlideItemsLength );

                _this_.rotateFlag = false;
                cutArr.reverse().forEach(function(e,i){
                    thisArr.unshift(cutArr[i]);
                });              
                this.setliArr.forEach(function(e,i){
                    e.index = indexArr[i];
                    li.eq(_this_.setliArr[i].index).css("zIndex",_this_.setliArr[i]["z-index"]).animate(_this_.setliArr[i] , function(){ _this_.rotateFlag = false; });
                });
        },
        //是否自动播放
        autoPlay : function(){ 
            var self_ = this;
            this.timer = setInterval(function(){
                self_.dnSlideRotate('left');
            } , self_.options.delay );
        },
        //防止上传的图片数量为基数（通过后插入方式保持偶数图片数量）
        isEvenPicNum:function(){
            if(this.dnSlideItemsLength%2 === 0){
                this.dnSlideItems.append(this.dnSlideFirstItem.clone());
                this.dnSlideItemsLength = this.dnSlide.find('ul.dnSlide-list>li').length;
                this.dnSlideFirstItem = this.dnSlide.find('ul.dnSlide-list>li:first-child');
                this.dnSlideLastItem = this.dnSlide.find('ul.dnSlide-list>li:last-child');
            }
        },   
        _api_: function()
        {
            var self_ = this,
                api = {};

            $.each( this.api,
                function( i )
                {
                    var fn = this;
                    api[ fn ] = function()
                    {   
                        var re = self_[ fn ].apply( self_, arguments );
                        return ( typeof re == 'undefined' ) ? api : re;
                    };
                }
            );
            return api;
        }
    }

    /* The jQuery plugin */
    $.fn[_PLUGIN_] = function(options){

        options = $.extend( true, {} , $[_PLUGIN_].defaults , options );
        return this.each(function(){
            $(this).data( _PLUGIN_, new $[_PLUGIN_]( $(this), options )._api_() );
            $(this).addClass('done');
        });

    };

}));

		</script> 
    	<script src="/static/js/expandJS.js"></script>
   <script>

    jQuery(document).ready(function($) {
    	$("#banner0").addClass("bannernow");
        $(".dnSlide-main").each(function(index, el) {
            var setting = {
                "response" : true ,
				"autoPlay" : true , 
                afterClickBtnFn :function(i){ console.log(i);$(".bannernow").removeClass("bannernow");$("#banner"+i).addClass("bannernow"); }
            };
            switch (index) {
                case 0:
                    setting.verticalAlign = "top" ;
                    setting.switching     = "custom" ;
                    setting.precentWidth  = "25%" ;
                    var api = $(el).dnSlide(setting).data( "dnSlide" ); 
                    $(".hide").on("click",function(){
                        api.hide(function(){
                            alert('HIDEEN！！！');
                        });
                    });
                    $(".show").on("click",function(){
                        api.show(function(){
                            alert('SHOW！！！');
                        });
                    });
                    break;
                case 1:
                    setting.autoPlay  =  true ;
                    $(el).dnSlide(setting); 
                    break;
                case 2:
                    setting.verticalAlign = "bottom" ;
                    $(el).dnSlide(setting); 
                    break;
                default:
                    $(el).dnSlide(setting); 
                    break;
            }
        });
    });
    </script>
	</div>


