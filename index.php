<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title> 4w machine </title>
</head>
<body bgcolor="white" Text="black" 
Link="blue" Vlink="red" Alink="lime">
<h1 align="center">4w machine</h1>
<p>「いつ」「どこで」「だれが」「何をした」の4wをぐちゃぐちゃにして、ありえない文章を作ります。</p>
<p>このマシーンには、学習機能が付いています。学習させたい人は、<a href="learn.php">学習ページ</a>から新しい知識を教えてあげてください。いくらでも吸収するいい子です。あ、でも、へんなことは教えないように。ピュアなので。親(中の人)が、この子の成長に悪影響を及ぼすと判断した知識は、勝手に削除させていただきます。</p>
<?php
if(isset($_REQUEST["gen"])){
exec("python gen.py",$ret);
echo("<h2>生成しました。ご査収ください。</h2>");
foreach($ret as $elem){
echo("<p>".$elem."</p>");
}
}
?>

<form action="" method="get">
<input type="hidden" name="gen" value="true">
<?php
if(isset($_REQUEST["gen"])){
echo('<input type="submit" value="さらに10個作る">');
}else{
echo('<input type="submit" value="10個作る">');
}
?>
</form>
<p><a href="http://www.nyanchangames.com/misc/">どうでもいいもの置き場</a> <a href="http://www.nyanchangames.com/">サイトトップ</a></p>
</body>
</html>

