<!DOCTYPE html>

<html lang="en">
<head>
<title>
三国志法令
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
</header>
<nav>
<ul>
</ul>
<form>
</form>
</nav>

<main>

<article style="margin: 1em 0 0 1em;">
<form action="/cook" method="post">
@csrf
<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="date">攻城日期</label>
<input style="padding:4px;" id="date" name="date" type="date">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="time">攻城时间</label>
<input style="padding:4px;" id="time" name="time" type="time">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="target">攻城目标</label>
<input style="padding:4px;" id="target" name="target" type="text">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="task">任务</label>
<input style="padding:4px;" id="task" name="task" type="text">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="requirement">要求</label>
<input style="padding:4px;" id="requirement" name="requirement" type="text">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="forbiddenTime">开始禁地时间</label>
<input style="padding:4px;" id="forbiddenTime" name="forbiddenTime" type="time">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="recoverTime">禁地结束时间</label>
<input style="padding:4px;" id="recoverTime" name="recoverTime" type="time">
</div>

<div style="margin-bottom:0.5em;">
<label style="margin-right:1em;" for="lastSentece">最后一段话</label>
<textarea style="padding:4px;" id="lastSentece" name="lastSentece" >
</textarea>
</div>

<button style="padding:5px; margin-top:1em;" type="submit">
写好了
</button>

<form>
</article>
<aside>
</aside>
</main>

<footer>
</footer>

</body>
</html>
