<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Ajax</title>
<style>
  a {cursor: pointer;color: #48769A;text-decoration: underline;}
</style>
</head>

<body>
<a class="js-start">START</a>
<a class="js-stop">STOP</a>
<a href="">GitHub</a>
  
<h1>結論</h1>  
<p>Ajax通信を中断することはできたけど、サーバーサイドの処理は止まらなかった。</p>
  
<h2>試したこと</h2>
<ol>
  <li>「START」をクリックでAjax通信開始する（ajax.phpを呼び出す）。</li>
  <li>ajax.php では、test.txt を5秒かけて更新する（1秒ごとに文字追加）</li>
  <li>「STOP」をクリックしてAjax通信を中断する</li>
</ol>
  
<h2>期待したこと</h2>
<p>「STOP」をクリックしたら、ajax.phpで処理中のtext.txtへの文字追加を中止する。→ 実現できず。</p>
  
<h2>解決できていないこと</h2>
<p>フロント側でAjax通信を中断したら、サーバーサイドの処理も中断させる方法</p>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(function(){
  var xhr;
  
  $(".js-start").on("click", function(){
    if (xhr) xhr.abort();
    xhr = $.ajax({
      type: 'GET',
      url: 'ajax.php',
      dataType: 'text',
      timeout: 10000
    })
    .done(function(d){
      console.log(d);
    })
    .fail(function(){
      console.log("fail");
    })
    .always(function(){
      console.log("always");
    });
    return false;
  });

  $(".js-stop").on("click", function(){
     if (xhr) xhr.abort();
    return false;
  });  
});
</script>
</body>
</html>
