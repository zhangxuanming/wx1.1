<?php
//require_once "jssdk.php";
//$jssdk = new JSSDK("wx05fe1a08ee8d2a7b", "684bc37baad5b76148c9344275d83682");
//$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
<head lang = "en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="target-densitydpi=device-dpi,width=640,width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>嗨！冒险 之 逃离深山 大冒险 现在起动啦！ 快来嗨一把吧！</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
        <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
	<img src="src/img/head.jpg" style="position:absolute;width: 0;height: 0;">
    <script src="js/juicer-min.js"></script>
<!--    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>-->

    <!--模板-->
    <script id="pageTpl" type="text/template">
        <div class="row page page${id} full zh-hidden zh-read-yellow" data-page="${id}">
            <div class="col-md-12 full" style="position: relative;">
                <div class="row">
                    <div class="col-sm-12 zh-img-block">
	                    {@if img}
	                        <img src="src/img/${img}" class="zh-img-story img-responsive center-block" alt="Responsive image" >
	                    {@/if}
                    </div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-sm-12 zh-txt">
                        {@each txt as item,index}
                            {@if item==""}
                                <br/>
                            {@else}
                                <p class="zh-t-white zh-story-text">$${item}</p>
                            {@/if}
                        {@/each}
                    </div>
                </div>
                <div class="row zh-option">
                    <div class="col-md-12">
                        <button class="btn center-block btn-block zh-btn zh-showoptbtn zh-black"></button>
                    </div>
                    <div class="col-sm-12 zh-btnblock">

                        {@each actions as item,index}
                            <button data-from="${item.from}" data-to="${item.to}" data-score="${item.score}" class="btn btn-block zh-btn zh-sbtn">${item.txt}</button>
                        {@/each}

                    </div>
                </div>
            </div>
        </div>
    </script>
</head>

<body class="zh-black" ontouchstart="">
<div class="container" style="overflow-x: hidden">
<!--	上个用户页面-->
	<div class="row page pagelastuser full zh-hidden zh-yellow">
		<div class="col-md-12 full">
			<div class="row">
				<!--徽章-->
				<div class="col-xs-12" style="background-color: #ffffff">
					<div id="lastuserbadge" class="zh-stamp center-block"
					     style="background-image: url(./src/img/badge/angry.png);"></div>
				</div>
				<div id="lastusersummary" class="col-xs-12">
					<h2 id="lastusername" style="font-weight: bold"></h2>
					<h4>在字嗨逃离深山 大冒险中</h4>
					<h4>获得称号</h4>
					<h3 id="lastuserdes"></h3>
				</div>
			</div>
		</div>
		<div class="col-xs-12" style="position: absolute;bottom: 0;left: 0">
			<div class="row" >
				<div class="col-xs-12">
					<button data-from="0" data-to="1"
					        class="btn btn-block zh-btnwant"
					        style="font-weight: bold;">我也要玩</button>
				</div>
			</div>
		</div>
	</div>
<!--	splash页面-->
	<div class="row page pagesplash full zh-hidden">
		<div class="col-xs-12 v-center ">
			<img class="splash-logo" src="src/img/splash/bg2.png" />
		</div>
	</div>
<!--	起始页-->
    <div class="row page pagestart full zh-hidden zh-yellow" style="background:url(../src/img/yure1/startbg.png);">
	    <div class="col-xs-12 ps-block">
		    <h3 class="center-block text-center zh-t-white"
		        style="float: left;margin-left: 5%;font-size: 1.2em;color: rgba(255, 255, 255, 0.78);"
			    >嗨！冒险 之</h3>
		    <h1 class="center-block text-center zh-t-white"
		        style="float: left;margin-left: 5%;clear: both;margin-top: 5px;"
			    >逃离深山</h1>
		    <h3 class="center-block zh-t-white"
		        style="float: left;text-align: left;margin:5%;font-size: 1.2em;color: rgba(255, 255, 255, 0.78);line-height: 1.5em;"
			    >你从酒吧出来已是午夜，夜灯下无人的马路自有其浪漫风味。忽然你觉得脑后一疼……</h3>
		    <div class="row zh-name-wrap">
			    <input id="zh-name" class="zh-name" type="text" maxlength="8" value="你的名字?" placeholder="默认嗨客">
		    </div>
		    <div class="row">
			    <button data-from="0" data-to="1"
			            class="col-xs-10 col-xs-offset-1 btn btn-lg zh-btn zh-btn-yellow zh-btnstart"
			            style="font-weight: bold;"
				    >开始嗨</button>
		    </div>
	    </div>
    </div>

    <!--剧情会被插入这里-->

    <!--结局页-->
    <div class="row page pageend full zh-hidden zh-yellow" style="background-color: #ffe681">
	    <div class="col-xs-12" style="margin-top: -6%;">
		    <div class="row"><!--徽章-->
			    <div class="col-xs-12" style="background:#fff;"><!--分值-->
				    <p id="zh-summaryPage-title" class="text-center" style="padding-top: 10%;color: #777;">根据您的战斗表现，我们觉得您的战斗力为 :</p>
				    <p class="text-center">
					    <span class="zh-totalscore text-center" style="font-size:60pt;color:#FFF054;line-height: 1"></span>
				    </p>
				    <p class="text-center zh-t-yellow1">战斗力</p>
				    <!--结语-->
				    <img class="zh-stamp center-block" style="margin-top: -3px;margin-bottom: 4%;" src="./src/img/badge/stamp_3.png" />
			    </div>
		    </div>
	    </div>
	    <div class="col-xs-12 v-bottom" style="background-color: #ffe681">
		    <div class="row">
			    <div class="col-xs-12" style="margin-top: 2%;">
				    <br>
				    <h4 class="zh-summarytext text-center" style="    font-size: 24px;margin-top: 5%;color: #8A6E00;"></h4>
			    </div>
			    <div class="col-xs-6 col-xs-offset-3">
				    <button class="btn btn-block btn-lg zh-btn zh-restartbtn">重玩一次</button>
			    </div>
		    </div>
	    </div>
    </div>

</div>

<!--遮罩层-->
<div class="zh-overlay-mask" style=" overflow:  hidden;">
	<div id="zh-modal-wrap">
		<div id="zh-modal" class="zh-modal zh-item-modal">
			<div class="zh-modal-top">
				<div class="row">
					<div class="col-xs-10">
						<span class="zh-m-name">看法宝！</span>
					</div>
					<div class="col-xs-2">
						<span class="zh-m-img" style="background: url(./src/img/logo1.jpg) center;background-size: cover"></span>
					</div>
					<div class="col-xs-12" style="margin-top: 1em">
						<p class="zh-m-des" ">点击文字拾取宝物哟</p>
					</div>
				</div>
				<button class="zh-btn zh-btn-yellow btn-block zh-m-btn" data-modal="close" data-txt="嗯，朕知道了">额。。这是啥</button>
			</div>
		</div>
		<div id="zh-modal-noty" class="zh-modal-noty">
			<div class="row">
				<div class="col-xs-12 zh-noty-title">
					<p>君上威武！</p>
				</div>
				<div class="col-xs-12 zh-noty-content">
					<p>获得: [<span>吃饭睡觉</span>] 剧情选项</p>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<script src="js/vue/vue.js"></script>-->
<script src="js/jquery-2.1.4.min.js"></script>
<!--配置页面-->
<script src="js/config.js"></script>
<script src="css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="js/greensock-js/src/minified/TweenMax.min.js"></script>
<script src="js/zh-game.js"></script>
<script src="js/zh-story.js"></script>
<!--<script src="js/hammer/hammer.js"></script>-->

<script>
	var lastUser = null;
	var lastDes = null;
	var lastImg = null;
	var cUser = null;
	var cScore = null;
	//配置页面在config.js
	//加载页面
	<?php
		$name = isset($_GET["name"])?htmlspecialchars(trim($_GET["name"])):null;
		$des = isset($_GET["des"])?htmlspecialchars(trim($_GET["des"])):null;
		$img = isset($_GET["img"])?htmlspecialchars(trim($_GET["img"])):null;
		if($name && $des && $img){
			echo "lastUser ='".$name."';"."\n";
			echo "lastDes ='".$des."';"."\n";
			echo "lastImg ='".$img."';"."\n";
		}
	?>

//	加载剧情
	var zhLoadStory = (function(){
		var me = {};
		var storyObject = {};
		var _allItemsList = [];
		var _config = null;

		var _logicModal = null;
		var tpl = $('#pageTpl').html();

		var randerPage = function(data){
			return juicer(tpl,data);
		};

		//加载剧情，加载游戏模式
		function ajaxLoadStory(){
			var  _storyTpl = {}
				,_itemPoolTpl = {}
				,_storyObj = {}
				,_itemPoolObj = {}
				,_summaryTpl = {};
			$.get(_config.storyTpl,function(data){
				if(!data){
					alert('剧情加载错误。。。:(');
					return false
				}
				var t = $(data);
				_storyTpl   = t.filter("#stories").find("section");
				_itemPoolTpl  =t.filter("#itemlist").find("section");
//				_summaryTpl = t.filter("#summary");//暂时没用

				//分离剧情
				_storyObj = templateToObject(_storyTpl);
				renderStoryPage(_storyObj);

				//提取物品池模板返回Ojbect
				_itemPoolObj = templateToItemPoolObject(_itemPoolTpl);
				//载入游戏逻辑modal
				_logicModal.init({
					itemPool:_itemPoolObj
				});
			});
		}

		//取得剧情数据转化成object
		var templateToObject = function(storiesBlock){
			//template to object
			var _imgFolder = _config.storyName+'/';
			var _itemsInStory = [];
			$.each(storiesBlock,function(i,v){
				var st = {};
				var act = [];//actions
				var d = $(v);
				st.id = d.attr("id");
				st.img = d.find("img") ? _imgFolder + d.find("img").attr("data-img"): null;

				//初始化段落
				var _textLines = d.find('[data-txt=story]').find("p");
				st.txt = {};
				$.each(_textLines,function(i,v){
					//提取item列表
					var __itemInLine = $(v).get(0).children;
					if (__itemInLine.length>0){
						for (var j = 0, n = __itemInLine.length; j<n; j++){
							_itemsInStory.push(__itemInLine[j].innerHTML);
						}
					}
					var a = $(v).html();
					st.txt[i] = $.trim(a);
				});
				//初始化按钮
				if (d.find("button")){
					$.each(d.find("button"),function(i,v){
						var btn = {};
						var adom = $(v); //action dom
						btn.from = st.id;
						btn.to = adom.attr("data-to");
						btn.score = adom.attr("data-score");
						btn.txt = adom.text();
						act.push(btn);
					})
				}
				st.actions = act;
				storyObject[i] = st;
			});
			_allItemsList = $.unique(_itemsInStory);
			return storyObject;
		};
		//建立物品池
		var templateToItemPoolObject = function(itemPool){
			var _itemObejct = {}
				,_itemRef   = ''
				,_itemName  = ''
				,_itemDes   = ''
				,_itemImg   = ''
				,_itemType  = ''
				,$btn       = ''
				,_btn       = '';
			$.each(itemPool,function(i,v){
				var $v = $(v);
				_itemRef = $.trim($v.attr('data-ref')); //情节文字索引
				_itemName = $.trim($v.attr('data-name'));
				_itemType = $.trim($v.attr('data-type'));
				_itemDes = $.trim($v.find('p').html());
				$btn = $v.find('button');
				if ($btn.length > 0){
					_btn = {
						to    : $btn.attr('data-to'),
						score : $btn.attr('data-score'),
						txt   : $.trim($btn.html())
					}
				} else{
					_btn = null;
				}
				_itemObejct[_itemRef] = {
					itemRef  : _itemRef,
					itemName : _itemName,
					itemDes  : _itemDes,
					itemImg  : _itemImg,
					itemType : _itemType,
					buttons  : _btn
				};
			});
			return _itemObejct;
		};
		//渲染页面
		var renderStoryPage = function(storyObject){
			//模板装载页面
			var _html = '';
			$.each(storyObject,function(i,v){
				_html += randerPage(v);
			});
			$(".pagestart").after(_html);
		} ;

		me.init = function() {
			ajaxLoadStory();
		};

		me.setLogicModal = function(logicModal){
			_logicModal = logicModal;
		};
		me.setConfig = function(config){
			_config = config;
		};
		return me
	}());

//	游戏逻辑
    var zhGameLogic = (function(option){
	    var _opt = {
		    "page":".page",
		    "badgeUrl":'./src/img/badge/'
	    };
	    if (option){
		    _opt = option
	    }
        var me = {};
        var totalScore = 0;
	    var _userName = "嗨客";
	    var _userScore = 0;
	    var _userDes = "";
	    var _userBadge = "";

	    var _lastUserName = null;
	    var _lastUserDes = null;
	    var _itemPool   = null;//物品池
	    var _pickedItemPool = {};//拾取过的物品记录
	    //绑定设定用户得分方法
	    var setUserScore = function(score){
		    _userScore = score;
	    };
	    //绑定,设定用户名方法
	    var setUserName = function(usr){
		    _userName = usr;
	    };
	    var setUserDes = function(des){
		    _userDes = des;
	    };
	    var setUserBadge = function(badge){
		    _userBadge = badge;
	    };
	    me.userName = function(){
		    return _userName;
	    };
	    me.userScore = function(){
		    return _userScore;
	    };
	    me.userDes = function(){
		    return _userDes;
	    };
	    me.userBadge = function(){
		    return _userBadge;
	    };
	    //设定上个用户名
	    me.setLastUserName = function(lusername){
		    _lastUserName = lusername;
	    };
	    //设定上个用户分数
	    me.setLastUserScore = function(luserDes){
		    _lastUserDes = luserDes;
	    };
	    me.setItemPool = function(itemPool){
		    _itemPool = itemPool;
	    };

	    //展示上个玩家页面
	    me.showLastUserResult = function(lastUser,lastDes,lastImg){
		    var $lastuserpage = $(".pagelastuser");
		    var $splashpage =  $(".pagesplash");
		    if (!lastUser || !lastDes || !lastImg) {
			    $splashpage.fadeIn(1000);
			    return false;
		    }
		    lastUser=decodeURIComponent(lastUser);
		    lastDes=decodeURIComponent(lastDes);
		    lastImg=_opt.badgeUrl + decodeURIComponent(lastImg);
		    var $stamp = $("#lastuserbadge");
		    TweenMax.set($stamp,{alpha:0});
		    $stamp.css('background-image','url('+lastImg+')');
		    $("#lastusername").html(lastUser);
		    $("#lastuserdes").html(lastDes);
		    $lastuserpage.fadeIn(500,function(){
			    TweenMax.fromTo($stamp,2,{alpha:1,scale:3,rotationY:360},{alpha:1,scale:1,rotationY:0,ease:Elastic.easeOut});
		    });
	    };

		//字嗨splash页面逻辑
	    var showSplash = function(){
		    $(".pagesplash").click(function(e){
			    var $startPage = $(".pagestart");
			    var tl = new TimelineMax();
			    tl.fromTo($(this),0.5,{},{display:'none'})
				    .fromTo($startPage,1,{alpha:0},{alpha:1,display:'block'});
		    });
	    };

	    //游戏开始页面逻辑
	    var startGame = function(){
		    $(".zh-btnstart").click(function(){
			    var $page1 = $(".page1");
			    var $pageStart = $(".pagestart");
			    var tl = new TimelineMax();
			    tl.fromTo($pageStart,0,{},{display:'none'})
			        .fromTo($page1,1,{alpha:0,scale:1.3},{alpha:1,scale:1,ease:Strong.easeOut,display:'block'});
		    });
	    };

	    //随机动画
	    var animationEffect = function(){
			var e = {};
		    var seffect = [
			    {alpha:0,x:-1000,y:0},
			    {alpha:0,x:1000,y:0},
			    {alpha:0,scale:1.3},
			    {alpha:0,rotationX:180},
			    {alpha:0},
			    {alpha:0,rotationY:180}
		    ];
		    return seffect[Math.floor(Math.random()*seffect.length)];
	    };

	    //页面跳转
	    var switchPage = function($btn){
		    var t = $btn;
		    var np = $(".page"+ t.attr('data-to')); //next page
		    var cp = $('.page'+ t.attr('data-from')); //current page
		    var score = t.attr('data-score');
		    var tl = new TimelineMax();
		    var d = 1; //动画时间

		    score = score ? parseInt(score) : 0;
		    if(cp.selector==np.selector){
			    return;
		    }
		    totalScore += score;
		    setUserScore(totalScore); //设定用户得分
		    if (t.attr('data-to') == "end"){
			    var summaryText = getSummary(totalScore);
			    setSummary(summaryText);
			    d = 0;
		    }
		    tl.fromTo(cp,0,{alpha:1},{alpha:0,ease:Strong.easeOut,display:'none'})
			    .fromTo(np,d,animationEffect(),
			    {alpha:1,scale:1,x:0,y:0,rotationX:0,rotationY:0,ease:Strong.easeOut,display:'block'});
	    };
        //剧情页面切换调度
        var bind_jumpAction = function(){
            $(".container").on({
                click:function(e){
	                switchPage($(this));
                }
            },".zh-sbtn");
        };

        //计算总结页和展示
        var getSummary = function(score){
            var des = null;
            var me = {};
            $.each(zhConfig.summaryText.scoreSummary,function(i,v){
                des = (score>= v.from && score<= v.to) ? v.text : null;
                if (des){
	                me.name = _userName;
                    me.text = v.text;
                    me.img = v.stamp;
	                me.score = score;
                    return false;
                }
            });
            return me;
        };

	    //设定结局页面
	    var setSummary = function(s){
		    $('#zh-summaryPage-title').html("本轮逃离深山故事，对你测脸结果为：");
		    $('.zh-stamp').attr("src","./src/img/badge/"+s.img);
		    $('.zh-totalscore').html(s.score);
		    $('.zh-summarytext').html('<span style="font-weight: bolder" ">'+s.name+'</span>' +', '+ s.text);
		    setUserDes(s.text);
		    setUserBadge(s.img);
	    };

	    //显示跳转按钮
	    var binding_showAction = function(){
		    $(document).on({
			    click:function(e){
				    var ob = $(this).parent().siblings(".zh-btnblock");
				    var _btn = ob.find(".zh-sbtn");
				    var tl = new TimelineMax();
				    var tl1 = new TimelineMax();
				    $(this).hide();
				    ob.show();
				    tl.fromTo(ob,0.5,{alpha:0,y:400},{alpha:1,y:0},-0.5);
				    tl1.staggerFromTo(_btn,1.5,{alpha:0,y:-100},{alpha:1,rotationX:0,y:0,x:0,ease:Back.easeOut},0.2);
			    }
		    },'.zh-showoptbtn');
	    };

	    //取得用户名
	    var binding_getUserName = function(){
		    var $nameTxt = $("#zh-name");
		    var _u = "";
		    $nameTxt.focus(function(){
			    $(this).val('');
		    });
		    $nameTxt.focusout(function(){
			    _u = $.trim($(this).val().length) > 0 ? $.trim($(this).val()) : "嗨客" ;
			    $(this).val(_u);
			    setUserName(_u);
		    });
	    };

	    //拾取宝物触发
	    var binding_itemOnClick = function(){
		    $(document).on({
			    click:function(e){
				    var _currentPage = $(this).parents('.page').attr('data-page');//取得当前页面
				    var _itemInfo = pickItemInfo($(this).text(),_currentPage);//取得物品信息
				    zhItemDialog.open(_itemInfo);
				    $(this).css({
					    'background-color':'transparent'
					    ,'color':'orangered'
				    });
			    }
		    },'.zh-story-text a');
	    };
	    //拾取物品信息方法
	    var pickItemInfo = function(itemRef,pageIndex){
		    pageIndex = pageIndex || null;
		    //判定是否拾取过
		    var _itemObj = _itemPool[itemRef];
		    if (!_itemObj) {return false;}
		    //如果拾取过，只展示，去除button按钮
		    if (_pickedItemPool[itemRef]) {
			    if (_itemObj.buttons){
				    _itemObj.buttons = null;
			    }
			    return _itemObj;
		    }
		    _pickedItemPool[itemRef] = true;//记录拾取过的物品
		    if (pageIndex && _itemObj.buttons) {
			    _itemObj.buttons.from = pageIndex;
		    }
		    return _itemObj;
	    };

		//物品对话框模块
	    var zhItemDialog = (function(){
			var me =  {};
		    var  _$modalMask    = $('.zh-overlay-mask')
			    ,_$modal    = $('#zh-modal')
			    ,_$modalAfter    = $("#zh-modal:after")
			    ,_$itemName = $('.zh-m-name')
			    ,_$itemImg  = $('.zh-m-img')
			    ,_$itemDes  = $('.zh-m-des')
			    ,_$itemBtn  = $('.zh-m-btn')
			    ,_$noty     = $('#zh-modal-noty')//获取物品提示层
			    ,_$notyMsg  = $('.zh-noty-content');
		    var _itemType = {
			    display :'display',
			    option  : 'option'
		    };
		    //添加按钮
		    var addButton = function(_itemObj){
			    var _item = _itemObj;
			    if (!_itemObj){
				    return false
			    }
			    var _$itemBtn = $($('.zh-sbtn').get(0)).clone();
			    _$itemBtn.attr('data-from',_item.buttons.from);
			    _$itemBtn.attr('data-to',_item.buttons.to);
			    _$itemBtn.attr('data-score',_item.buttons.score);
			    _$itemBtn.text(_item.buttons.txt);
			    _$itemBtn.hide();
			    $('.page'+_item.buttons.from).find('.zh-btnblock').find('.zh-sbtn').first().before(_$itemBtn);
			    _$itemBtn.fadeIn(1000);
		    };

		    //获得奖励的信息
		    var showNoty = function(notyMsg){
			    var _html = '';
			    $.each(notyMsg,function(i,v){
				   _html += "<p>"+v+"</p>";
			    });
			    _$notyMsg.html(_html);
			    _$noty.show();
		    };
		    var closeNoty = function(){
			    _$noty.hide();
		    };
		    var setNotyLayout = function(itemType){
			    switch (itemType){
				    case _itemType.display:
					    _$itemName.css({'color':'azure'});
//					    _$modal.css({'border-color':'dodgerblue'});
//					    _$modalAfter.css({'border-color':'dodgerblue'});
					    break;
				    case _itemType.option:
					    _$itemName.css({'color':'tomato'});
//					    _$modal.css({'border-color':'orange'});
					    break;
				    default :
			    }
		    };
		    //打开对话框
		    me.open  = function(_itemObj){
			    var _item = _itemObj;
			    var _notyMsg = [];
			    closeNoty();
			    setNotyLayout(_item.itemType);

			    if (!_item.itemName) {
				    return false
			    }
			    _$itemName.html(_item.itemName);
			    _$itemDes.html(_item.itemDes);
			    if (_item.buttons){
				    _$itemBtn.attr('data-from',_item.buttons.from);
					_$itemBtn.attr('data-to',_item.buttons.to);
				    _$itemBtn.attr('data-score',_item.buttons.score);
				    _$itemBtn.text(_$itemBtn.attr('data-txt'));
				    _notyMsg.push("获得: [<span>"+_item.buttons.txt+"</span>] 剧情选项");
				    addButton(_item);//添加按钮到下部跳转区
				    showNoty(_notyMsg);//处理消息层
			    }else{
				    _$itemBtn.removeAttr('data-from');
				    _$itemBtn.removeAttr('data-to');
				    _$itemBtn.removeAttr('data-score');
				    _$itemBtn.text(_$itemBtn.attr('data-txt'));
			    }
			    if (_item.img) { }//设定图片 暂时没用
			    _$modalMask.fadeIn(200);
		    };
		    //关闭对话框
		    me.close = function(callback){
			    var _callback = callback || false;
			    _$modalMask.fadeOut(200,_callback);
		    };
		    return me;
	    }());

	    //关闭模板层
	    var binding_pl_closeModal = function(){
		    $("[data-modal=close]").click(function(){
			    zhItemDialog.close();
//			    switchPage($(this));
		    });
	    };

	    //页面跳转
	    me.goPage = function(pageIndex,animation){
		    var $pages = $(_opt.page);
		    var $goPage = $(_opt.page+pageIndex);
		    $pages.hide();
		    $goPage.show();
	    };

        //重玩
        me.restart = function(){
            totalScore = 0;
	        setUserScore(-1000);
            $(".page").hide();
	        $(".pagesplash").fadeIn(500);
	        $(".zh-showoptbtn").show();
	        $(".zh-btnblock").hide();
        };

        //初始化
        me.init = function(config){
	        if (config) {
		        _itemPool = config.itemPool
	        }
	        startGame();
	        showSplash();
	        bind_jumpAction();
	        binding_getUserName();
	        binding_showAction();
	        binding_itemOnClick();
	        binding_pl_closeModal();
        };
        return me;
    }());

    $(document).ready(function(){
	    var myconfig = function(opt){
		    opt = opt ? opt : {};
		    var me = {};
		    if (opt.debug !== true) {
			    me.shareLink = 'http://wx.wordhi.com';
			    me.shareImgUrl = 'http://wx.wordhi.com/src/img/badge/';
			    me.shareImg = 'http://wx.wordhi.com/src/img/badge/stamp_3.png';
		    }else{
			    me.shareLink = 'http://dev.muyuruhai.com';
			    me.shareImgUrl = 'http://dev.muyuruhai.com/src/img/badge/';
			    me.shareImg = 'http://dev.muyuruhai.com/img/badge/stamp_3.png';
		    }
		    return me;
	    };



	    return;
//	    wx.config({
//		    debug: true,
//		    appId: '<?php //echo $signPackage["appId"];?>//',
//		    timestamp: <?php //echo $signPackage["timestamp"];?>//,
//		    nonceStr: '<?php //echo $signPackage["nonceStr"];?>//',
//		    signature: '<?php //echo $signPackage["signature"];?>//',
//		    jsApiList: [
//			    'onMenuShareTimeline',
//			    'onMenuShareAppMessage',
//			    'onMenuShareQQ',
//			    'onMenuShareWeibo'
//		    ]
//	    });

	    wx.ready(function() {
		    var thisLink = myconfig({debug:true});
		    console.log(thisLink);
		    var shareTitle = "嗨！冒险 之 逃离深山 大冒险 现在起动啦！ 快来嗨一把吧！";
		    var shareDesc = '你要逃离深山，看你啦';
		    var shareLink = thisLink.shareLink;
		    var shareImgUrl =thisLink.shareImgUrl;
		    var shareImg = thisLink.shareImg;
            wx.checkJsApi({
                jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
                success: function(res) {
                    // 以键值对的形式返回，可用的api值true，不可用为false
                    // 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
                }
            });

		    // 分享给朋友事件绑定
		    wx.onMenuShareAppMessage({
			    title: shareTitle,
			    desc: shareLink,
			    link: shareLink,
			    imgUrl: shareImg,
			    success:function(res){
			    },
			    trigger:function(){
				    if (zhGameLogic.userDes() !== ''){
					    this.title = '冒险者: '+zhGameLogic.userName();
					    this.imgUrl = shareImgUrl + zhGameLogic.userBadge();
					    this.desc = zhGameLogic.userDes();
					    this.link = shareLink+'?name='+zhGameLogic.userName()+'&des='+zhGameLogic.userDes()+'&img='+zhGameLogic.userBadge();
				    }else{
					    this.title = shareTitle;
					    this.imgUrl = shareLink + '/src/img/head.jpg';
					    this.desc = '字嗨之逃离深山';
					    this.link = shareLink;
				    }
			    }
		    });

		    // 分享到朋友圈
		    wx.onMenuShareTimeline({
			    title: shareTitle,
			    link: shareLink,
			    imgUrl: shareImg,
			    trigger:function(res){
				    if (zhGameLogic.userDes()!== ''){
					    this.title = '冒险者: '+zhGameLogic.userName()+' 在逃离深山冒险获得\n“'+zhGameLogic.userDes()+'”称号';
					    this.imgUrl = shareImgUrl + zhGameLogic.userBadge();
					    this.link = shareLink+'?name='+zhGameLogic.userName()+'&des='+zhGameLogic.userDes()+'&img='+zhGameLogic.userBadge();
				    }else{
					    this.title = shareTitle;
					    this.imgUrl = shareLink + '/src/img/head.jpg';
					    this.link = shareLink;
				    }
			    }
		    });

		    // 分享到QQ
		    wx.onMenuShareQQ({
			    title: shareTitle,
			    desc: shareDesc,
			    link: shareLink,
			    imgUrl: shareImg
		    });

		    // 分享到微博
		    wx.onMenuShareWeibo({
			    title: shareTitle,
			    desc: shareDesc,
			    link: shareLink,
			    imgUrl: shareImg
		    });
	    });
    });

	window.onload = function(){
		zhLoadStory.setConfig(zhConfig);
		zhLoadStory.setLogicModal(zhGameLogic);
		zhLoadStory.init();
		zhGameLogic.showLastUserResult(lastUser,lastDes,lastImg);
		$(".zh-restartbtn").click(function(e){
			zhGameLogic.restart();
		});
		$(".zh-btnwant").click(function(e){
			zhGameLogic.restart();
		});
		var $zhname = $('#zh-name');
		$zhname.focus(function(e){
			$(this).toggleClass("zh-name-active");
		});
		$zhname.blur(function(e){
			$(this).toggleClass("zh-name-active");
		})
	};
</script>
</body>
</html>