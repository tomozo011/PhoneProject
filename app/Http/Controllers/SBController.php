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

class SBController extends Controller
{
    public function SB(Request $request){
        $getNet = $request->net;
        $getCard = $request->card;
        $getMem = $request->member;
        $getGBs = [];
        $getages = [];
        $gettells = [];
        $getnows = []; 
        $count = 0;
        $Plans = [];
        $Plans_answer = [];
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
            if($request->{$GBs[$count]} <= 1){
                $Plans[] = Plan::where('id', 11)->first();   
            }elseif(1 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=2) {
                $Plans[] = Plan::where('id',12)->first();
            }elseif(2 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=3) {
                $Plans[] = Plan::where('id',13)->first();
            }elseif(3 <= $request->{$GBs[$count]}){
                $Plans[] = Plan::where('id',10)->first();
            }

            $Plans_free = Plan::where('id',10)->first();

            // 通話
            $Tells = Tell::where('carrier', 'ソフトバンク')->get();
            foreach($Tells as $Tell){
                if($request->{$tells[$count]} == $Tell->name){
                    $Tells_name[] = $Tell->name;
                    $Tells_price[] = $Tell->price;
                }
            }    
                if($request->{$tells[$count]} === '1回10分以内 無料' || $request->{$tells[$count]} === '月間60分未満 無料 (UQのみ)') {
                    $Tells_name[] = '１回５分以内 無料';
                    $Tells_price[] = 770;
                }
                
            // 家族割
            $Families_6 = Family::where('id',6)->first();
            $Families_7 = Family::where('id',7)->first();
            if($getMem == $Families_6->member){
                $Member_price = $Families_6->price;
            }elseif($getMem >= $Families_7->member) {
                $Member_price = $Families_7->price;
            }else{
                $Member_price = 0;
            }

            // ネット 
            $Net1 = Net::where('plan_id','301')->first();
            $Net2 = Net::where('plan_id','302')->first();
            // dd($Net1,$Net2);
            if($request->net == $Net1->name && $Plans[$count]->plan_id == $Net1->plan_id){
                $Nets_price[] = $Net1->price;
            }elseif($request->net == $Net2->name && $Plans[$count]->plan_id == $Net2->plan_id){
                $Nets_price[] = $Net2->price;
            }else{
                $Nets_price[] = 0;
            }


            // 学割
            // $Students = Student::where('carrier', 'ソフトバンク')->first();
            // if($Students->min_age <= $request->{$ages[$count]} && $request->{$ages[$count]} <= $Students->max_age && $Plans[$count]->plan_id == $Students->plan_id){
            //     $Students_price[] = $Students->price;
            // }else{
            //     $Students_price[] = 0;
            // }

            // 合計
            foreach($Plans as $Plan){
                if(isset($Plan)){
                    $Total1 = $Plan->price + $Tells_price[$count] - $Nets_price[$count] ;
                }
            }

            $Total2 = $Plans_free->price + $Tells_price[$count] - $Member_price  - $Nets_price[$count];

            if(isset($Total1) && $Total1 < $Total2) {
                $Totals[] = $Total1;
                $Plans_answer[] = $Plans[$count];
            }elseif(isset($Total1) && $Total1 > $Total2) {
                $Totals[] = $Total2;
                $Plans_answer[] = $Plans_free;
            }else{
                $Totals[] = $Total2;
                $Plans_answer[] = $Plans_free;
            }

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
        foreach($Plans_answer as $Plan_answer){
            $plansName[] = $Plan_answer->name;
            $plansPrice[] = $Plan_answer->price;
        }

        $auths = Auth::user();
        if($auths == null){
            $name = 'null';
            $user_id = 'null';
        }else{
            $name = $auths->name;
            $user_id = $auths->id;
        }
        return view('phone.SB',compact('name','user_id','a','plansName', 'plansPrice', 'getMem','getNet','getCard', 'getGBs', 'gettells', 'getages', 'getnows', 'Plans_answer', 'Tells_name', 'Tells_price','Nets_price','Member_price','Cards_price', 'Students_price', 'Totals', 'answers', 'auths'));
    }
}
