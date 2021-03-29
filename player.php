<!DOCTYPE html>
<html lang="ja">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title>人狼Online
    </title>
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="https://s3.amazonaws.com/jetstrap-site/lib/bootstrap/2.3.0/css/bootstrap.css" rel="stylesheet">
    <link href="https://s3.amazonaws.com/jetstrap-site/lib/bootstrap/2.3.0/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://s3.amazonaws.com/jetstrap-site/lib/bootstrap/2.3.0/js/bootstrap.js"></script>
    
    <meta name="description" content="スマホとPCでオンライン対戦できる人狼ゲームです。"/>
    <meta name="keywords" content="人狼,iPhone,Android,スマホ,PC,Webアプリ,人狼Online" />
    
    <link rel="apple-touch-icon-precomposed" href="/img/jinro_logo.jpg">
    <meta name="format-detection" content="telephone=no" /> 
    <script src="/js/lib.js?1"></script>
    <link rel="icon" href="/img/apple-touch-icon.png" type="image/png" />
    
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport" />  
    <meta content="yes" name="apple-mobile-web-app-capable" /> 
    <meta name=”apple-mobile-web-app-status-bar-style” content=”black-translucent” />
    <link rel="apple-touch-startup-image" href="/img/jinro_startup.png" sizez="640x1096">
    <link rel="apple-touch-startup-image" href="/img/jinro_startup_640x920.png" sizez="640x920">
    <link rel="apple-touch-icon-precomposed" href="/img/jinro_logo.jpg">
    <script src="/js/iosFullscreen.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    <link href="/css/bootstrapSwitch.css" rel="stylesheet">
    <script src="/js/jquery.toggle.buttons.js"></script>
    
    
    <link href="/css/base.css" rel="stylesheet">
    <!-- adsense -->
      </head>
<script>
// アプリに送信
function app(msg) {
  }
function isApp() {
  return false;
}
function isAppAnd() {
  return false;
}
function isAppIos() {
  return false;
}
</script>
  <body>

<div class="container-fluid">
<div class="row-fluid">
  <div class="span6">

   
    <div class="normalScene">
            <div style="font-size:small">
                黒毛玉さん(色々確認)
            </div>




<style>
.nightScene {
background-image:url('/img/jinro_night.png');
border:1px solid white;
padding:2px;
margin:1px;
border-radius:10px;
}
.voteScene {
background-image:url('/img/jinro_vote.png');
border:1px solid white;
padding:2px;
margin:1px;
border-radius:10px;
}
.morningScene {
background-image:url('/img/jinro_morning.png');
border:1px solid white;
padding:2px;
margin:1px;
border-radius:10px;
}
.nightAction {
background-color:rgba(0,0,0,0.5);
border:1px solid red;
color:white;
padding:10px;
}
.voteAction {
background-color:rgba(0,0,0,0.5);
border:1px solid orange;
color:white;
padding:10px;
}
</style>


            【開始前】</div>

<script>
app('scene:開始前'); // アプリにシーン通知
var g_limit_sec = 0;
var date = new Date();
var g_limit_time = parseInt(date.getTime() / 1000 + g_limit_sec);
if (g_limit_sec) {
    countDown();
}
function countDown() {
    date = new Date();
    g_limit_sec = g_limit_time - parseInt(date.getTime() / 1000);
    //g_limit_sec--;
    $('#limit_sec').html(g_limit_sec);
    setTimeout("countDown()",1000);
        if (g_limit_sec <= 0) {
        location.href = '/m/player.php?mode=updateScene&from=開始前';
    }
    1
    if (g_limit_sec <= 4) {
        setTimeout("reload()", 6000);
    }
    }
</script>


    
    
<script>
// メッセージ送信
$(function(){
//    $('#messageForm').submit(function(){
//        $.cookie('message_input','');
//        $.cookie('message_multi_input','');
//    });
$('#messageForm').submit(function(){
        $.cookie('message_input','');
        $.cookie('message_multi_input','');
    // HTMLでの送信をキャンセル
    event.preventDefault();
    var f = $(this);
f.mode = 'post_message';
    //console.log("onPostMessage", f.to_user.value);
    $.ajax({ type: "POST",
        url: '/m/api/',
        data: f.serialize(),
        success: function(result, textStatus, xhr) {
            console.log("post OK", f.serialize(), result);
            $('#message_input').val('');
            $('#message_multi_input').val('');
            pollingNewMessage(0); // 即メッセージを1回取得
        },
        error: function(xhr, textStatus, error) {
            console.log("NG");
        }
    });
    return false;
});
});
</script>
<form method="post" id="messageForm" action="/m/player.php" style="margin-bottom:2px">

                <input type="hidden" name="mode" value="post_message" />
                
                <input type="hidden" name="to_user" value=
                                    "ALL"
                                />

    <div class="input-append" style="width:90%;margin:0px;">
                <input class="span2" type="text" id="message_input" name="message" style="width:70%" autocomplete="off" value="" placeholder=
                                    "全員に発言"
                                />
                <a href="/m/player.php?inputMultiline=1" title="複数行にする" class="btn"><i class="icon-align-justify"></i></a>
                <input class="btn" type="submit" value="発言">
    </div>
    </form>


    <div id="message" class="message">
                <div id="message_text">
                
                </div>
    </div>


</div>
<div class="span6">



<div>
<!-- GM -->
            <a class="btn" href="/m/player.php?mode=start">開始</a>
        <a class="btn" onclick="location.href='/m/player.php'" title="更新"><i class="icon-refresh"></i></a>
  <!-- GM -->
    <a class="btn" role="button" data-toggle="modal" onclick="confirmDialog('ゲームを終了しますか?','確認','/m/player.php?mode=end')" title="終了">終了</a>
  <a class="btn" onclick="$('#memo').toggle();">メモ</a>
<div id="memo" style="margin-top:5px;display:none">
  <textarea id="memo_input" rows="8" style="width:90%"></textarea>
</div>

</div>



<div id="all_players">
</div>





<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>
<button class="btn" id="copy_btn" data-clipboard-target="#copy_text" onclick="var a=$('#copy_text'); if(a.css('display')=='none'){ a.show(); }else{ setTimeout('$(\'#copy_text\').hide()',100);}">
    <img src="https://clipboardjs.com/assets/images/clippy.svg" width="15px">URL
</button>
<input id="copy_text" style="display:none;width:450px"
value="色々確認村を作成しました! https://zinro.net/?8drY #人狼Online"/>
<script>
new Clipboard('#copy_btn');
</script>


<div>
<h4 class="title">設定</h4>
<table class="table table-striped table-bordered tbl" style="margin:5px">
<tbody>
    <tr>
        <td>
        サウンド
        </td>
        <td>
        <div id="sound-toggle-button">
            <input type="checkbox">
        </div>
        </td>
    </tr>
    <tr>
        <td>
        観戦コメント非表示
        </td>
        <td>
        <div id="ignoreAudience-toggle-button">
            <input type="checkbox">
        </div>
        </td>
    </tr>
</tbody>
</table>

<a href="#roomCommentModal" role="button" class="btn" data-toggle="modal">説明文変更</a><br />

</div>




<div>
    <h4 class="title">村設定</h4>
    <form id="changeTeiinForm" action="/m/player.php" method="post">
    <input type="hidden" name="mode" value="changeTeiin">
    定員<select name="teiin" onchange="this.form.submit()">
                <option value="4" >4</option>
                <option value="5" >5</option>
                <option value="6" >6</option>
                <option value="7" >7</option>
                <option value="8" >8</option>
                <option value="9" >9</option>
                <option value="10" >10</option>
                <option value="11" >11</option>
                <option value="12" >12</option>
                <option value="13" >13</option>
                <option value="14" >14</option>
                <option value="15" >15</option>
                <option value="16" >16</option>
                <option value="17" >17</option>
                <option value="18" >18</option>
                <option value="19" >19</option>
                <option value="20" selected>20</option>
                <option value="21" >21</option>
                <option value="22" >22</option>
                <option value="23" >23</option>
                <option value="24" >24</option>
                <option value="25" >25</option>
                <option value="26" >26</option>
                <option value="27" >27</option>
                <option value="28" >28</option>
                <option value="29" >29</option>
                <option value="30" >30</option>
                <option value="31" >31</option>
                <option value="32" >32</option>
                <option value="33" >33</option>
                <option value="34" >34</option>
                <option value="35" >35</option>
                <option value="36" >36</option>
                <option value="37" >37</option>
                <option value="38" >38</option>
                <option value="39" >39</option>
                <option value="40" >40</option>
                <option value="41" >41</option>
                <option value="42" >42</option>
                <option value="43" >43</option>
                <option value="44" >44</option>
                <option value="45" >45</option>
                <option value="46" >46</option>
                <option value="47" >47</option>
                <option value="48" >48</option>
                <option value="49" >49</option>
                <option value="50" >50</option>
        
    </select>人
    </form>

    <form action="/m/player.php" method="post">
    <input type="hidden" name="mode" value="setOnenight">
    <label class="checkbox">
    <input type="checkbox" name="is_onenight" onclick="this.form.submit()"  />
    ワンナイト
    </label>
    </form>
    <br />

    <form action="/m/player.php" method="post">
    <input type="submit" class="btn" value="村設定変更" /> 
    <input type="hidden" name="mode" value="updateJobset">

    <label class="checkbox">
    <input type="checkbox" name="friend" >
    身内限定
    </label>

    <label class="checkbox">
    <input type="checkbox" name="shufflename" >
    プレイヤー名をランダムにする
    </label>
    <label class="checkbox">
    <input type="checkbox" name="yakukakenashi" >
    役欠けなし(初日犠牲者を村人にする)
    </label>

                    <table class="table table-striped table-bordered tbl" style="margin:5px">
                        <tbody>
                            <tr>
                                <th>
                                    役職
                                </th>
                                <th>
                                    人数
                                </th>
                            </tr>
                                <tr>
                                <td>
                                    人狼
                                </td>
                                <td>
                                    <select name="job_1" style="width:auto">
                                        <option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    占い師
                                </td>
                                <td>
                                    <select name="job_4" style="width:auto">
                                        <option value="0">0</option>
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    狩人
                                </td>
                                <td>
                                    <select name="job_3" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    霊能者
                                </td>
                                <td>
                                    <select name="job_5" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    狂人
                                </td>
                                <td>
                                    <select name="job_6" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    狂信者
                                </td>
                                <td>
                                    <select name="job_7" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    妖狐
                                </td>
                                <td>
                                    <select name="job_8" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    背徳者
                                </td>
                                <td>
                                    <select name="job_9" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    てるてる
                                </td>
                                <td>
                                    <select name="job_16" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    猫又
                                </td>
                                <td>
                                    <select name="job_10" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    共有者
                                </td>
                                <td>
                                    <select name="job_11" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    役人
                                </td>
                                <td>
                                    <select name="job_12" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    怪盗
                                </td>
                                <td>
                                    <select name="job_13" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    狼憑き
                                </td>
                                <td>
                                    <select name="job_14" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                                    <tr>
                                <td>
                                    ものまね
                                </td>
                                <td>
                                    <select name="job_15" style="width:auto">
                                        <option value="0" selected="selected">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>

                                    </select>
                                    名
                                </td>
                            </tr>
                            </tbody>
                    </table>

    <label class="checkbox">
    <input type="checkbox" name="beginner" >
    初心者歓迎
    </label>

    <label class="checkbox">
    <input type="checkbox" name="no_beginner" >
    中級以上
    </label>
 
    <label class="checkbox">
    <input type="checkbox" name="no_zinro" >
    雑談系
    </label>
 
    <label class="checkbox">
    <input type="checkbox" name="revote" >
    最多票が同数のとき再投票にする
    </label>

    </form>

    
</div>


<br />
<a class="btn" onclick="$('#help').toggle();">ヘルプ</a><br />
<div id="help" style="display:none">
<div style="line-height:150%">役職リスト</div>
    <span style="color:">【人狼】</span> 人狼チーム<br />夜に1人噛み殺すことができます。人狼が2人以上いる場合、人狼全体で1人を噛む対象にします。人狼同士は誰が人狼か知ることができ、夜の間は人狼同士で会話することができます。<br />    <span style="color:">【占い師】</span> 村人チーム<br />別名預言者。夜に1人を人狼か人狼ではないか占うことができます。人狼ではなかった場合、役職まではわかりません。<br />    <span style="color:">【狩人】</span> 村人チーム<br />別名騎士、ボディガード。夜に1人を人狼から守ることができます。狩人が2人以上いる場合、狩人1人につき1人を守ることができ、狩人同士は誰が狩人か知ることができません。<br />    <span style="color:">【霊能者】</span> 村人チーム<br />別名霊媒師。投票により吊るされた人が人狼か人狼ではないか知ることができます。<br />    <span style="color:">【狂人】</span> 人狼チーム<br />別名多重人格者。別な能力は持っていません。人狼チームとして戦い、人狼が生き残ると狂人も勝ちになります。誰が人狼かわからず、人狼からも誰が狂人かわかりません。<br />    <span style="color:">【狂信者】</span> 人狼チーム<br />狂人の上位職。誰が人狼かわかります。<br />    <span style="color:">【妖狐】</span> 妖狐チーム<br />人狼が生き残ると妖狐チームの勝ちになり、村人チームと人狼チームは負けになります。人狼から噛まれても死にません。占われると死んでしまいます。<br />    <span style="color:">【背徳者】</span> 妖狐チーム<br />妖狐が生き残ると勝ちになります。妖狐が死ぬと自殺します。誰が妖狐かわかりますが、妖狐からは誰が背徳者かわかりません。<br />    <span style="color:">【てるてる】</span> てるてるチーム<br />投票されて吊るされるとてるてるの勝利です。投票されるように誘導しましょう。<br />    <span style="color:">【猫又】</span> 村人チーム<br />人狼に噛まれると人狼からランダムで1人を道連れにして死にます。投票で吊るされるとランダムで1人を道連れにして死にます。<br />    <span style="color:">【共有者】</span> 村人チーム<br />別名恋人。他の共有者が誰か知ることができ、夜に共有者同士で会話することができます。<br />    <span style="color:">【役人】</span> 村人チーム<br />投票を2票分持ちます。<br />    <span style="color:">【怪盗】</span> 村人チーム<br />夜に1人と役職を交換することができます。<br />    <span style="color:">【狼憑き】</span> 村人チーム<br />占われると人狼と判定される村人。<br />    <span style="color:">【ものまね】</span> 村人チーム<br />必ず村人チームの何かの役職を騙らないといけない村人。(そのとき村に設定されている、ものまね・村人を除いた、占い師や霊能者などの何かの役職を騙ってください)<br /></div>
        


</div>


        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h3 id="myModalLabel">
                    メッセージ
                </h3>
            </div>
            <form method="post" action="/m/player.php">
                <input type="hidden" name="mode" value="message" />
                <input type="hidden" id="to_user" name="to_user" value="" />
                <div class="modal-body">
                    <input type="text" name="message" style="width:90%" />
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="送る"/>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                        キャンセル
                    </button>
                    <!--<a class="btn btn-primary" onclick="alert(getElementById(&quot;message_to&quot;).value)">
                        送る
                    </a>-->
                </div>
            </form>
        </div>



        <div id="roomCommentModal" class="modal hide fade" tabindex="-1" role="dialog"
        aria-labelledby="roomCommentModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h3 id="roomCommentModalLabel">
                    説明文
                </h3>
            </div>
            <form method="post" action="/m/player.php">
                <input type="hidden" name="mode" value="update_room_comment" />
                <div class="modal-body">
                    <textarea rows="4" name="comment" style="width:98%">不穏ネームあると強制的に部屋落とします。理由は不穏ネームがコンテンツフィルタに引っかかるからですね。</textarea>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="OK"/>
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                        キャンセル
                    </button>
                </div>
            </form>
        </div>






<style>
        body {
          padding-top: 5px;
        }
      
#message {
          background-color: rgba(0,0,0,0.5);/*rgba(245,249,240,1);*/
          border-radius: 10px;
          border: 1px solid;
          padding: 5px;
          margin-bottom: 5px;
          overflow-y: scroll;
          height:300px;
          text-shadow: none;/*1px 1px 1px #666;*/
          color: white;
          font-size: x-small;
}
</style>


<script>
$(document).ready( function() {
    // 初期設定
    $.ajaxSetup({timeout:2000});
    // メッセージ枠の高さをブラウザの画面にあわせて変更
    //var c_width = $('html').prop('clientWidth');
    fitWindowSize();
    window.onresize = function() {
        fitWindowSize();
    };
    $('#message').css('font-size', isMobile() ? 'x-small' : 'small')
    updatePlayers();
    // BGM設定
    //$('#sound-toggle-button').toggleButtons('setState', $.cookie('PLAY_SOUND'));
    $('#sound-toggle-button').toggleButtons('setState', $.cookie('PLAY_SOUND')==1 ? true : false);
    $('#sound-toggle-button').toggleButtons({
    onChange: function ($el, status, e) {
        updateCookie('PLAY_SOUND', status ? 1 : 0);
        app(status?'volumeOn':'volumeOff');
        //console.log('onChange PLAY_SOUND',$.cookie('PLAY_SOUND'));
    }
    });

    // 観戦者コメント非表示設定
    $('#ignoreAudience-toggle-button').toggleButtons({
    onChange: function ($el, status, e) {
        if ($.cookie('ignoreAudience') != status) {
            location.href='/m/player.php?ignoreAudience=' + (status ? 1 : 0);
            $.cookie('ignoreAudience', status ? 1 : 0, {expires: 3650});
        }
    }
    });
    $('#ignoreAudience-toggle-button').toggleButtons('setState', $.cookie('ignoreAudience')==1 ? true : false);

    // 発言ボックス
    $('#message_input').val($.cookie('message_input'));
    $("#message_input").keyup(function() {
        $.cookie('message_input', $(this).val());
    });
    $("#message_input").change(function() {
        $.cookie('message_input', $(this).val());
    });
    $('#message_multi_input').val($.cookie('message_multi_input'));
    $("#message_multi_input").keyup(function() {
        $.cookie('message_multi_input', $(this).val());
    });
    
    // メモ
    $('#memo_input').val($.cookie('memo_input'));
    $("#memo_input").keyup(function() {
        $.cookie('memo_input', $(this).val());
    });

        if (g_message_json) {
        addMessage(g_message_json, false);
    }
    //setTimeout("pollingNewMessage()", 5 * 1000);
    pollingNewMessage();
});
var g_message_json = getLocalMessage();

function getLocalMessage() {
    var room_id = '189761';
    if (window.localStorage.getItem('room_id') != '189761') {
        window.localStorage.setItem('message', null);
    }
    window.localStorage.setItem('room_id', room_id);
    var message = JSON.parse(window.localStorage.getItem('message'));
    console.log('local.message', message);
    return message;
}

var g_last_id = 0;
function addMessage(json, isNew=true) {
    var update_players = false;
    for (var i in json) {
        var v = json[i];
        if (!v) {
            continue;
        }
        if (v.id == g_last_id) {
            continue;
        }
        g_last_id = v.id;

        // 観戦者コメント非表示設定時
        if ($.cookie('ignoreAudience')) {
            for (var p in g_players) {
                if (v.name == g_players[p].name && g_players[p].job == '観戦者') {
                    console.log('観戦者コメントのため非表示');
                    continue;
                }
            }
        }

        var bgcolor = '';
        if (v.from_user == '鯖') {
            update_players = true;
            //v.from_user = '';
        }
        if (v.to_user == '霊界') {
            bgcolor = 'gray';
            v.color = 'white';
        } else if (v.to_user == '人狼') {
            //bgcolor = 'black';
            v.color = 'red';
        }
        var text = '<div style="background-color:'+bgcolor+'"><span style="">'
         + v.from_user;
        if (v.to_user != 'ALL') {
            text = text + "→" + v.to_user;
        }
        text = text + '</span><span class="" style="color:' + v.color + '">'
        text = text + ": " + v.message + "</span></div>";
        $('#message').prepend(text);
        if (isNew && text.indexOf('【投票結果】') != -1) {
            reload();
        }
    }
    if (isNew && update_players) {
        updatePlayers();
    }
}

var g_room;

// メッセージ取得
// @param loop メッセージ取得ループをする場合は1、1回のみ取得する場合は0
function pollingNewMessage(loop=1) {
    $.ajax({ type: "GET",
        //data: {mode:'message'}
        dataType: 'json',
        url: '/m/api/?mode=message&id='+ ((g_message_json && g_message_json.length > 0) ? g_message_json[g_message_json.length - 1].id : 0)
    }).done(function(data, status, xhr) {
        if (data) {
            if (!g_message_json) {
                g_message_json = [];
            }
            // dataは0:直近 1:１つ前 2:２つ前の順に並んでいる
            // ローカルデータは 0:最後 1:最後から１つ前 の順に並べる
            data.reverse();
            for (var i in data) {
                // 重複チェック
                var bad = false;
                for (var j in g_message_json) {
                    if (g_message_json[j].id == data[i].id) {
                        bad = true;
                    }
                }
                if (bad) {
                    continue;
                }
                g_message_json.push(data[i]);
            }
            window.localStorage.setItem('message',  JSON.stringify(g_message_json));
            var isNew = loop ? true : false;
            addMessage(data, isNew);
        }
        if (loop) {
            setTimeout("pollingNewMessage()", 5 * 1000);
        }
    }).fail(function(xhr, status, error) {
        console.log('NG mode=message', xhr, xhr.status, xhr.statusText, status, error);
        setTimeout("reload()", 15 * 1000);
    });
}      

// ウィンドウサイズにあわせる
function fitWindowSize() {
    var c_height = $('html').prop('clientHeight');
    $('#message').height(c_height - 150);
}

// スマホか判定
function isMobile() {
    if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) 
        || navigator.userAgent.indexOf('iPod') > 0 
        || navigator.userAgent.indexOf('Android') > 0) {
        return true;
    }
    return false;
}

// 画面再読込
g_reloaded = false; // 重複読込防止
function reload() {
    if (!g_reloaded) { 
        location.href='/m/player.php';
        g_reloaded = true;
    }
}

var g_players;

// プレイヤー一覧更新
function updatePlayers() {
    $.ajax({ type: "GET",
        url: '/m/api/',
        data: {mode:'players'},
        dataType: 'json'
    }).done(function(data, status, xhr) {
        //$.getJSON('/m/api/?mode=players', function(data) {
        var players = data.players;
        var player = data.player;
        var room = data.room;
        var html = "";
        if (!players) {
            return;//サーバーエラーなどの場合は更新しない
        }
        if (g_room && room.scene != g_room.scene) {
            reload();
        }
        g_room = room;
        g_players = players;
        var player_num = 0;
        for (var i in players) {
            var c = players[i];
            //console.log(c.name,c,c.alive);
            html += '<tr><td>';
            if (c.is_cpu == 1) {
                html += '<span class="label label-info">CPU</span>';
            }
            html += '<span style="';
            if (c.alive != 1) {
                html += 'color:red';
            }

            // プレイヤー名タップ時
            html += '" data-toggle="modal" onclick="confirmDialog' + "('トリップ：" + ((c.trip && c.trip_open==1) ? c.trip : '非公開') + '<br />';
	    html += "','情報','/m/player.php')";
            
            html += '">' + c.name;
            if (c.global_name && c.global_name != c.name){
                html += '(' + c.global_name + ')';
            }
            html += '</span></td><td>';
            if (c.job=='観戦者') {
                html += '観戦者';
            } else {
                player_num++;
                html += c.alive == 1 ? '生' : '死';
            }
            // GMならキックボタンをつける
            if (room.gm == player.name && c.name != player.name && c.name != '初日犠牲者') {
                html += '<a title="部屋からキックする" onclick="confirmDialog(\'' + c.name + 'さんを部屋からキックしますか?\',\'確認\',\'/m/player.php?kick=' + c.id + '&name=' + c.name + '\')"><i class="icon-minus-sign icon-red"></i></a>';
            }
            
//html += '<span data-toggle="modal" onclick="confirmDialog' + "('トリップ：" + (c.trip_open ? c.trip : '非公開') + '<br />';
//html += '<a href=\'/m/player.php?kick=' + c.name + '\'><i class="icon-minus-sign icon-red"></i>部屋からキック</a><br />';
//html += "','情報','/m/player.php')" + '">i</span>';
       /*
        役職表示条件
        ・プレイヤーが死者　かつ　観戦者ではない
        ・ゲーム終了
        ・相手が人狼　　かつ　（プレイヤーが人狼または狂信者）
        ・相手が妖狐　　かつ　（プレイヤーが妖狐または背徳者）
        ・相手が共有者　かつ　プレイヤーが共有者
        */
            if ((!player.alive && player.job != '観戦者')
              || (room.scene == '開始前' || room.scene == '終了')
              || (c.job=='人狼' && (player.job=='人狼' || player.job=='狂信者') )
              || (c.job=='妖狐' && (player.job=='妖狐' || player.job=='背徳者') )
              || (c.job=='共有者' && player.job=='共有者') ) {
                html += '(' + c.job + ')';
            }
            // 非アクティブならマークを表示
            if (!c.is_active) {
                html += ' <span style="color:red"><i class="icon-ban-circle icon-red" title="切断中' + (c.last_access ? (' [' + c.last_access  + ']') : '') + '"></i></span>';
            } else {
                html += ' <span style="color:green"><i class="icon-signal" title="通信中 [' + c.last_access+ ']"></i></span>';
            }
            html += '</td></tr>';
        }
        html += '</tbody></table>';
        html += '<div>【役職設定】' + room.jobSettingText + '<br />【村人】' + player_num + '人(CPU含む)';
//console.log(room);
        if (room.is_onenight == 1) {
            html += '<br /><span class="label label-info" style="margin:4px">ワンナイト</span><br />';
        }
        if (room.scene == '開始前' && room.gm == player.name) {
            html += '　<a href="/m/player.php?addCpu=1" class="btn">CPUを追加</a>';
        }
        html += '</div>';
        html = '<table width="90%" class="table table-striped table-bordered tbl" cellspacing="0" cellpadding="0" border="0"><tbody><tr><th class="jetstrap-selected">名前(' + player_num + '人)</th><th>状態</th></tr>' + html;
        //$('#all_players').html(html);
        $('#all_players').html(html);
    //});
    }).fail(function(xhr, status, error) {
        console.log('NG mode=players', xhr, xhr.status, xhr.statusText, status, error);
    });
}

// BGM再生(iOSの場合、マナーモードでも再生するため注意
function playSound(file) {
    if ($.cookie('PLAY_SOUND') != 1) {
        return;
    }
    html = '<audio id="audio" src="/sounds/' + file + '"></audio>';
    document.getElementById('sound').innerHTML = html;
    var aud = document.getElementById('audio');
    aud.load();
    aud.play();
}
</script>
<div id="sound"></div>


<div class="footer" style="text-align:center;margin-top:30px;">
</div>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-44563960-1', 'auto');
  ga('send', 'pageview');
</script>

</html>
