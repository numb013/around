<a href="https://px.a8.net/svt/ejp?a8mat=3BQLBB+DK7GTU+3QFG+BYT9D" rel="nofollow">
<img border="0" width="100%" height="10%" alt="" src="https://www24.a8.net/svt/bgt?aid=201114983820&wid=001&eno=01&mid=s00000017422002010000&mc=1"></a>
<img border="0" width="1" height="1" src="https://www10.a8.net/0.gif?a8mat=3BQLBB+DK7GTU+3QFG+BYT9D" alt="">



<script type="text/javascript">
var targetId=document.getElementById("banner"),//動かすタグのid
timer=null;//表示非表示のフラグ
//addEventListenerがIE9以下で使えないので条件分岐
if(targetId.addEventListener){//他ブラウザバージョン
window.addEventListener("scroll",bannerHover);//スクロール時にbannerHoverを実行
}else if(targetId.attachEvent){//IE8以下
window.attachEvent("onscroll",bannerHover);//上に同じく
}
function bannerHover(){//1
//変数timerの中身がnullの場合(要素が表示されてる場合)IDbannerのクラスbannerhoverを削除
if(timer==null){targetId.classList.remove("bannerhover");}
clearTimeout(timer);//timerのカウントを初期化(スクロールする毎に初期化される)
timer=setTimeout("bannerHover_hover()",500);//500秒後にbannerHover_hoverを実行
}
function bannerHover_hover(){//2
targetId.classList.add("bannerhover");//IDbannerにクラスbannerhoverを追加
timer=null;//表示フラグ
}
bannerHover();//ページロード時にbannerHoverを呼び出して最初に出す
</script>