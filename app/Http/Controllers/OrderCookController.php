<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderCookController extends Controller
{
	public function cook(Request $request)
	{
		$date=$request['date'];
		$time=$request['time'];
		$target = $request['target'];
		$task = $request["task"];
		$requirement = $request["requirement"];
		$forbiddenTime = $request["forbiddenTime"];
		$recoverTime = $request["recoverTime"];
		$lastSentence = $request["lastSentece"];

		$title = "====== @{$time}@开#{$target}# ======";
		$output = "{$title}\n时间：{$time}\n任务：{$task}\n要求：{$requirement}\n:forbiddenTime:\n:recoverTime:\n:lastSentence:
		";

		$output = str_replace(":forbiddenTime:", $forbiddenTime."开始禁地", "$output");

		$output = str_replace(":recoverTime:", $recoverTime."解除禁地", "$output");

		$output = str_replace(":lastSentence:", $lastSentence, "$output");

		return view("result", ["result" => $output]);

		
	}

	public function format(Request $request){
		$colors=["#","@","$","&"];
		$order = $request['order'];
		$order = str_replace("\r", "", $order);
		$subOrders = explode("\n", $order);
		#dd($subOrders);
		$output = "";
		$temp = "";
		$one = "";
		$color = "";
		for($i = 0; $i < count($subOrders); $i++){
			$one= $subOrders[$i];
			$color = $colors[$i%count($colors)];
			$output .= $color.$one.$color."\\n";
		}
		#dd($output);
		return view("result", ["result"=>$output]);
	}
}
