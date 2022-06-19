<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;

class ApiTestController extends Controller
{
    public function test() {
        $test="接続完了";
        return $test;
    }
    public function test2(Request $request) {
        $test=$request->GB1;
        return $test;
    }
    public function plan() {
        $plans = Plan::all();
        return $plans;
    }

    public function plan1(Request $request) {
        $plan = Plan::where('plan_id', $request->plan_id)->first();
        if($plan == null){
            $ans = 'plan_id is null';
        }else {
            $ans = 'get';
        }
        return (['status' => $ans,'result'=>$plan]);

    }
}
