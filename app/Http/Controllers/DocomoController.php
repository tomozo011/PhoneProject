<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Tell;
use App\Card;
use App\Family;
use App\Student;
use App\Net;
use App\User;
use Auth;

class DocomoController extends Controller
{
    public function docomo(Request $request){
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
        $b =0 ;

        for($i=1; $i <= $request->member; $i++){
            
            $GBs[] = 'GB' . $i;
            $tells[] = 'tell' . $i;
            $ages[] = 'age' . $i;
            $nows[] = 'now' . $i;
            
            // GB取得
            if($request->{$GBs[$count]} <= 1){
                $Plans[] = Plan::where('id',2)->first();
            }elseif(1 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <= 3) {
                $Plans[] = Plan::where('id', 3)->first();
            }elseif(3 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=5) {
                $Plans[] = Plan::where('id',4)->first();
            }elseif(5 < $request->{$GBs[$count]} && $request->{$GBs[$count]} <=7) {
                $Plans[] = Plan::where('id',5)->first();
            }elseif(7 <= $request->{$GBs[$count]}){
                $Plans[] = Plan::where('id',1)->first();
            }

            $Plans_free = Plan::where('id',1)->first();

            // 通話
            $Tells = Tell::where('carrier', 'ドコモ')->get();
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
            $Families_2 = Family::where('id',1)->first();
            $Families_3 = Family::where('id',2)->first();
            if($getMem == $Families_2->member){
                $Member_price = $Families_2->price;
            }elseif($getMem >= $Families_3->member) {
                $Member_price = $Families_3->price;
            }else{
                $Member_price = 0;
            }
             
            // カード
            $Cards = Card::where('plan_id', 101)->first();
            if($request->card === $Cards->name){
                $Cards_price[] = $Cards->price;
            }
            // elseif(isset($Cards_price) && $request->card === $Cards->name && $Plans[$count]->plan_id === $Cards->plan_id) {
            //     array_push($Cards_price, $Cards->price);
            // }
            // else{
            //     $Cards_price[] = 0;
            // }

            // ネット 
            $Net1 = Net::where('plan_id','101')->first();
            $Net2 = Net::where('plan_id', '102')->first();
            if($request->net == $Net1->name && $Plans[$count]->plan_id == $Net1->plan_id){
                $Nets_price[] = $Net1->price;
            }elseif($Plans[$count]->id == 2){
                $Nets_price[] = 0;
            }elseif($request->net == $Net2->name && $Plans[$count]->plan_id == $Net2->plan_id){
                $Nets_price[] = $Net2->price;
            }else{
                $Netss_price[] = 0;
            }

            // 学割
            // $Students = Student::where('carrier', 'ドコモ')->first();
            // if($Students->min_age <= $request->{$ages[$count]} && $request->{$ages[$count]} <= $Students->max_age && $Plans[$count]->plan_id == $Students->plan_id){
            //     $Students_price[] = $Students->price;
            // }else{
            //     $Students_price[] = 0;
            // }
            $Students_price[] = 0;

            // 合計
            foreach($Plans as $Plan){
                if(isset($Plan)){
                        $Total1 = $Plan->price + $Tells_price[$count] - $Member_price - $Cards_price[$count] - $Nets_price[$count] - $Students_price[$count];
                }
            }


            $Total2 = $Plans_free->price + $Tells_price[$count] - $Member_price - $Cards_price[$count] - $Nets_price[$count] - $Students_price[$count];
            
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

        $getCount = count($getGBs);

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

        return view('phone.Docomo',compact('name','user_id', 'getCount', 'a', 'plansName', 'plansPrice', 'getMem','getNet','getCard', 'getGBs','gettells', 'getages', 'getnows', 'Plans_answer', 'Tells_name', 'Tells_price','Nets_price','Member_price','Cards_price', 'Students_price', 'Totals', 'answers', 'auths'));
    }
}
