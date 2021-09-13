<!DOCTYPE html>

<html lang="en">
<head>
<title>
满庭芳丨沧海
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{asset('css/contribution.css')}}" rel="stylesheet">
</head>
<body>
<main>
<article id="demonstration">
<h3>
《满庭芳丨沧海》每周战功考核规则
</h3>
<p>
1、最低标准：最低战功2w对应起始势力1.5w；
<br>
2、第一档：战功每增加10000，势力提高2000,一直到25000势力时，战功须到达7w，进入二档；
<br>
3、第二档：战功每增加10000，势力提高1000,一直到30000势力时，战功须达到12w，进入三档；
<br>
4、第三档：战功每增加10000，势力提高500,一直到35000势力，战功须达到22w，进入最终档；
<br>
5、终极档：战功每增加10000，势力提高200，上不封顶，能者多得。
<br>
<i id="in-addition">另外，周贡献排名前十的周战功打8折、周贡献排名前三的周战功打7折。</i>
</p>
</article>
<article id="look-up">
<form method="post" action="/zg">
@csrf

<label for="discount">
折扣：
</label>
<input class="discount" placeholder="如：0.8，默认无" id="discount" type="text" name="discount">

<div class="contribution">
<label for="contribution">
查当前战功下的<b>势力上限</b>：
</label>
<input id="contribution" placeholder="请输入战功，如：50000" type="number" name="contribution">
<button type="submit">
查询
</button>


@isset($land)
<div class="result" >
	<div>
		<span>
		势力上限为：
		</span>
		<span class="result">
		{{$land}}
		</span>
	</div>
</div>
@endisset

<div class="land">
<label for="land">
查当前势力下的<b>所需战功</b>：
</label>
<input id="land" placeholder="请输入势力，如：20000" type="number" name="land">

<button type="submit">
查询
</button>


@isset($contribution)
<div class="result">
	<div>
		<span>
		所需战功为：
		</span>
		<span class="result">
		{{$contribution}}
		</span>
	</div>
</div>
@endisset


</form>
</article>
</main>

</body>
</html>
