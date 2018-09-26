<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title> learning - 4w machine </title>
</head>
<body bgcolor="white" Text="black" 
Link="blue" Vlink="red" Alink="lime">
<h1 align="center">学習ページ</h1>
<p>4wの各要素を学習させることができます。</p>
<?php
if(isset($_REQUEST["learn"]) and isset($_REQUEST["when"]) and isset($_REQUEST["where"]) and isset($_REQUEST["who"]) and isset($_REQUEST["what"])){
$str='"'.$_REQUEST["when"]."、".$_REQUEST["where"]."、".$_REQUEST["who"]."、".$_REQUEST["what"].'"';
$ret=exec("python reg.py ".$str);
echo("<h2>".$str.": ".$ret."</h2>");
}
?>

<h2>学習データ入力</h2>
<form action="" method="get">
<table caption="学習データテーブル">
<tr><th>いつ(when)</th> <th>どこで(where)</th> <th>誰が(who)</th> <th>何をした(what)</th></tr>
<tr>
<td><input type="text" name="when"></td>
<td><input type="text" name="where"></td>
<td><input type="text" name="who"></td>
<td><input type="text" name="what"></td>
</tr>
</table>
<input type="hidden" name="learn" value="true">
<?php
if(isset($_REQUEST["learn"])){
echo('<input type="submit" value="さらに学習する">');
}else{
echo('<input type="submit" value="学習する">');
}
?>
</form>

<h2>入力例</h2>
<table caption="学習データの入力例">
<tr><th>いつ(when)</th> <th>どこで(where)</th> <th>誰が(who)</th> <th>何をした(what)</th></tr>
<tr><td>今日</td> <td>道ばたで</td> <td>鳩が</td> <td>食パンを食べていた</td></tr>
</table>

<p><a href="index.php">学習を終了する</a> <a href="http://www.nyanchangames.com/misc/">どうでもいいもの置き場</a> <a href="http://www.nyanchangames.com/">サイトトップ</a></p>
</body>
</html>

