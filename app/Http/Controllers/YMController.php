<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Tell;
use App\Card;
use App\Family;
use App\Student;
use App\Net;
use Auth;

class YMController extends Controller
{
    public function YM(Request $request){
        $getNet = $request->net;
        $getCard = $request->card;
        $getMem = $request->member;
        $getGBs = [];
        $getages = [];
        $gettells = [];
        $getnows = []; 

        $count = 0;
        $Plans = [];
        $Tells_name = [];
        $Tells_price = [];
        $Cards_price = [];
        $Nets_price = [];
        $Students_price = [];
        $Totals = [];
        $answers = [];
        $a = 0;

        for($i=1; $i <= $request->member; $i++){
            
            $GBs[] = 'GB' . $i;
            $tells[] = 'tell' . $i;
            $ages[] = 'age' . $i;
            $nows[] = 'now' . $i;
            
            // GB取得
            if($request->{$GBs[$count]} <= 3){
                $Plans[] = Plan::where('id',17)->first();   
            }elseif(3 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=15) {
                $Plans[] = Plan::where('id',18)->first();
            }elseif(15 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=25) {
                $Plans[] = Plan::where('id',19)->first();
            }elseif(25 <= $request->{$GBs[$count]}){
                $Plans[] = Plan::where('id',19)->first();
            }

            // 通話
            $Tells = Tell::where('carrier', 'Y!mobile')->get();
            foreach($Tells as $Tell){
                if($request->{$tells[$count]} == $Tell->name){
                    $Tells_name[] = $Tell->name;
                    $Tells_price[] = $Tell->price;
                }
            }    
                if($request->{$tells[$count]} === '月間60分未満 無料' || $request->{$tells[$count]} === '１回５分以内 無料') {
                    $Tells_name[] ='1回10分以内 無料' ;
                    $Tells_price[] = 770;
                }

            // ネット 
            $Net1 = Net::where('plan_id','501')->first();
            $Net2 = Net::where('plan_id','502')->first();
            $Net3 = Net::where('plan_id','503')->first();
            if($request->net == $Net1->name && $Plans[$count]->plan_id == $Net1->plan_id){
                $Nets_price[] = $Net1->price;
            }elseif($request->net == $Net2->name && $Plans[$count]->plan_id == $Net2->plan_id){
                $Nets_price[] = $Net2->price;
            }elseif($request->net == $Net3->name && $Plans[$count]->plan_id == $Net3->plan_id){
                $Nets_price[] = $Net3->price;
            }else{
                $Nets_price[] = 0;
            }    

            // 家族割
            $Families_2 = Family::where('id',1)->first();
            $Families_3 = Family::where('id',2)->first();
            if($request->net == 'ソフトバンク光/ソフトバンクAir') {
                $Member_price = 0;
            }elseif($getMem == $Families_2->member){
                $Member_price = $Families_2->price;
            }elseif($getMem >= $Families_3->member) {
                $Member_price = $Families_3->price;
            }else{
                $Member_price = 0;
            }

            // 学割
            $Students = Student::where('carrier', 'Y!mobile')->first();
            if($Students->min_age <= $request->{$ages[$count]} && $request->{$ages[$count]} <= $Students->max_age && $Plans[$count]->plan_id == $Students->plan_id){
                $Students_price[] = $Students->price;
            }else{
                $Students_price[] = 0;
            }

            // 合計
            $Totals[] = $Plans[$count]->price + $Tells_price[$count] - $Member_price - $Nets_price[$count] - $Students_price[$count];

            // 差分
            // foreach($Totals as $Total){
                if($Totals[$count] > $request->{$nows[$count]}){
                    $answers[] = $Totals[$count] - $request->{$nows[$count]};
                }elseif($Totals[$count] < $request->{$nows[$count]}){
                    $answers[] = $request->{$nows[$count]} - $Totals[$count];
                }
            // }
            
            $count++;
        }

        foreach($GBs as $GB){
            $getGBs[] = $request->$GB;
        }
        foreach($ages as $age){
            $getages[] = $request->$age;
        }
        foreach($tells as $tell){
            $gettells[]= $request->$tell;
        }
        foreach($nows as $now){
            $getnows[] = $request->$now; 
        }

        $plansName = [];
        $plansPrice = [];
        foreach($Plans as $Plan){
            $plansName[] = $Plan->name;
            $plansPrice[] = $Plan->price;
        }

        $auths = Auth::user();
        if($auths == null){
            $name = 'null';
            $user_id = 'null';
        }else{
            $name = $auths->name;
            $user_id = $auths->id;
        }
        return view('phone.YM',compact('name','user_id', 'a', 'plansName', 'plansPrice', 'getMem','getNet','getCard', 'getGBs', 'gettells', 'getages', 'getnows', 'Plans', 'Tells_name', 'Tells_price','Nets_price','Member_price','Cards_price', 'Students_price', 'Totals', 'answers', 'auths'));
    }
}
