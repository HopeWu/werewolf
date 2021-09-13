<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContributionController extends Controller
{
	public function calculate(Request $request)
	{
		$result = 0;
		if($request['discount'] and (
				floatval($request['discount']) > 0 and floatval($request['discount']) < 1
			) 
		){
			$discount = floatval($request['discount']);
		}else{
			$discount = 1;
		}
		if($request["contribution"]){
			$ctb = $request["contribution"];
			if($ctb <= 20000*$discount){
				return view("contribution", ["land"=>15000]);
			}elseif($ctb <= 70000*$discount){
				$result = ($ctb-20000*$discount)*2000/(10000*$discount) + 15000;
				return view("contribution", ["land"=>$result]);
			}elseif($ctb <= 120000*$discount){
				$result = ($ctb-70000*$discount)*1000/(10000*$discount) + 25000;
				return view("contribution", ["land"=>$result]);
			}elseif($ctb <= 220000){
				$result = ($ctb-120000*$discount)*500/(10000*$discount) + 30000;
				return view("contribution", ["land"=>$result]);
			}else{
				$result = ($ctb-220000*$discount)*200/(10000*$discount) + 35000;
				return view("contribution", ["land"=>$result]);
			}
		}elseif($request["land"]){
			$land = $request["land"];
			if($land <= 15000){
				return view("contribution", ["contribution"=>20000*$discount]);
			}elseif($land <= 25000){
				$result = 20000 + ($land-15000)*10000/2000;
				return view("contribution", ["contribution"=>$result*$discount]);
			}elseif($land <= 30000){
				$result = 70000 + ($land-25000)*10000/1000;
				return view("contribution", ["contribution"=>$result*$discount]);
			}elseif($land <= 35000){
				$result = 120000 + ($land-30000)*10000/500;
				return view("contribution", ["contribution"=>$result*$discount]);
			}else{
				$result = 220000 + ($land-35000)*10000/200;
				return view("contribution", ["contribution"=>$result*$discount]);
			}
		}
		else{
			return redirect("/zg");
		}
	}
}
