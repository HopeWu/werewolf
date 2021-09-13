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
<article>
<div style="border:solid;">
<pre style="font-size:1.5em;">{{$result}}</pre>
</div>
<div>
<input type="hidden" id="result" value="{{$result}}">
</div>
<button id="copy">
复制
</button>
</article>
<aside>
</aside>
</main>

<footer>
</footer>

<script>
function copy() {
  var copyText = document.querySelector("#result");
  copyText.select();
  document.execCommand("copy");
}

document.querySelector("#copy").addEventListener("click", copy);
</script>
</body>
</html>

