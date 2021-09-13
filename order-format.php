<?php
$date="8月30日";
$time="明早8:00";
$target = "鄳县";
$task = "江夏郡的开鄳县";
$requirement = "主力25级以上出一主力和一器械; 主力25级以下两器械";
$forbiddenTime = "下午4:00";
$recoverTime = "下午8:30";
$lastSentence = "第一次打城，希望大家给力！";

$title = "====== @{$time}@开#{$target}# ======";

$output = "
{$title}
时间：{$time}
任务：{$task}
要求：{$requirement}
:forbiddenTime:
:recoverTime:
:lastSentence:
";

if($forbiddenTime)
{
	$output = str_replace(":forbiddenTime:", $forbiddenTime."开始禁地", "$output");
	if($recoverTime){
		$output = str_replace(":recoverTime:", $recoverTime."解除禁地", "$output");
	}
}

if($lastSentence)
{
	$output = str_replace(":lastSentence:", $lastSentence, "$output");
}

echo $output;
