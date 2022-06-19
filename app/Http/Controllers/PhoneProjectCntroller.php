<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Tell;
use App\Card;
use App\Family;
use App\Student;
use App\Net;
use App\Common;
use App\Save;
use Auth;


class PhoneProjectCntroller extends Controller
{
    public function top(){
        $auths = Auth::user();
        if($auths == null){
            $link = "/HikakuPhone/login";
        }else{
            $link = "/HikakuPhone/Mypage/low";
        }
        return view('phone.top', compact('auths', 'link'));
    }

    public function register() {
        return view('auth.register');
    }
    public function login() {
        return view('auth.login');
    }

    public function form_common(Request $request){
        $auths = Auth::user();
        $nets = ['ドコモ光/ドコモホームルーター', 'au光/eo光', 'ソフトバンク光/ソフトバンクAir', 'その他'];
        $cards = ['dカード', 'auPayカード', 'その他'];
        $members = ['1', '2', '3', '4'];
        return view('phone.form_common', compact('nets', 'cards', 'members', 'auths'));
    }

    public function form(Request $request){
        $auths = Auth::user();
        if($auths == null) {

        }else{
            $Common = Common::where('user_id', $auths->id)->first();
        }
        
        if($auths == null){

        }else if(isset($auths) && $Common == null){
            $Common = Common::where('user_id', $auths->id)->first();
            $common = new Common;
            $common->net = $request->net;
            $common->card = $request->card;
            $common->member = $request->member;
            $common->name = $auths->name;
            $common->user_id = $auths->id;
            $common->save();
        }elseif(isset($Common)){
            
        }

        $getNet = $request->net;
        $getCard = $request->card;
        $getMem = $request->member;
        return view('phone.form', compact('getMem', 'getNet', 'getCard', 'auths'));
    }

    

    public function save(Request $request) {
        $count = count($request->Plans_name);
        if($request->carrier == "ドコモ" || $request->carrier == "au"){
            for($i=0; $i < $count; $i++){
            $save = new Save;
            $save->carrier = $request->carrier;
            $save->Plans_name = $request->Plans_name[$i];
            $save->Plans_price = $request->Plans_price[$i];
            $save->Tells_name = $request->Tells_name[$i];
            $save->Tells_price = $request->Tells_price[$i];
            $save->Nets_price = $request->Nets_price[$i];
            $save->Member_price = $request->Member_price;
            $save->Cards_price = $request->Cards_price[$i];
            $save->Students_price = $request->Students_price[$i];
            $save->Totals = $request->Totals[$i];
            $save->name = $request->name;
            $save->user_id = $request->user_id;
            $save->save();
            }
        }elseif($request->carrier == "ソフトバンク" || $request->carrier == "Y!mobile"){
            for($i=0; $i < $count; $i++){
                $save = new Save;
                $save->carrier = $request->carrier;
                $save->Plans_name = $request->Plans_name[$i];
                $save->Plans_price = $request->Plans_price[$i];
                $save->Tells_name = $request->Tells_name[$i];
                $save->Tells_price = $request->Tells_price[$i];
                $save->Nets_price = $request->Nets_price[$i];
                $save->Member_price = $request->Member_price;
                $save->Cards_price = $request->Cards_price;
                $save->Students_price = $request->Students_price;
                $save->Totals = $request->Totals[$i];
                $save->name = $request->name;
                $save->user_id = $request->user_id;
                $save->save();
                }
        }elseif($request->carrier == 'UQ'){
            for($i=0; $i < $count; $i++){
                $save = new Save;
                $save->carrier = $request->carrier;
                $save->Plans_name = $request->Plans_name[$i];
                $save->Plans_price = $request->Plans_price[$i];
                $save->Tells_name = $request->Tells_name[$i];
                $save->Tells_price = $request->Tells_price[$i];
                $save->Nets_price = $request->Nets_price[$i];
                $save->Member_price = $request->Member_price;
                $save->Cards_price = $request->Cards_price;
                $save->Students_price = $request->Students_price[$i];
                $save->Totals = $request->Totals[$i];
                $save->name = $request->name;
                $save->user_id = $request->user_id;
                $save->save();
                }
        }elseif(Auth::check()==false){
            return false;
        }
        
        return 0;
        
    }

    public function page(Request $request) {
        $auths = Auth::user();
        $Common = Common::where('user_id', $auths->id)->first();
        $search = $request->input('search');

        $Save_Carriers = [];
        $Save_Names = [];
        $Save_Prices = [];
        $Save_TellNames = [];
        $Save_TellPrices = [];
        $Save_Nets = [];
        $Save_Cards = [];
        $Save_Members = [];
        $Save_Students = [];
        $Save_Totals = [];

        if($Common == null) {
            $Common_net = "保存されていません";
            $Common_card = "保存されていません";
            $Common_member = "保存されていません";
        }else {
            $Common_net = $Common->net;
            $Common_card = $Common->card;
            $Common_member = $Common->member;
        }

        $Saves = [];
        $set = Save::where('user_id', $auths->id)->first();
        if(isset($set)){
            $gets = Save::where('user_id', $auths->id)->get();
            foreach($gets as $get){
                $Saves[] = $get;
            }
        }else{
            $Saves = null;
        }

        if(isset($Saves) && !isset($search)){
            foreach($Saves as $Save){
                $Save_Carriers[] = $Save->carrier;
                $Save_Names[] = $Save->Plans_name;
                $Save_Prices[] = $Save->Plans_price;
                $Save_TellNames[] = $Save->Tells_name;
                $Save_TellPrices[] = $Save->Tells_price;
                $Save_Nets[] = $Save->Nets_price;
                $Save_Members[] = $Save->Member_price;
                $Save_Cards[] = $Save->Cards_price;
                $Save_Students[] = $Save->Students_price;
                $Save_Totals[] = $Save->Totals;
            }
        }elseif(isset($Saves) && isset($search)){
            $carriers = Save::where('carrier', $search)->get();
            foreach($carriers as $carrier){
                $Save_Carriers[] = $carrier->carrier;
                $Save_Names[] = $carrier->Plans_name;
                $Save_Prices[] = $carrier->Plans_price;
                $Save_TellNames[] = $carrier->Tells_name;
                $Save_TellPrices[] = $carrier->Tells_price;
                $Save_Nets[] = $carrier->Nets_price;
                $Save_Members[] = $carrier->Member_price;
                $Save_Cards[] = $carrier->Cards_price;
                $Save_Students[] = $carrier->Students_price;
                $Save_Totals[] = $carrier->Totals;
            }
        }elseif(!isset($Saves)){
            $Save_Carriers[] = '保存されていません';
            $Save_Names[] = '保存されていません';
            $Save_Prices[] = '保存されていません';
            $Save_TellNames[] = '保存されていません';
            $Save_TellPrices[] = '保存されていません';
            $Save_Nets[] = '保存されていません';
            $Save_Members[] = '保存されていません';
            $Save_Cards[] = '保存されていません';
            $Save_Students[] = '保存されていません';
            $Save_Totals[] = '保存されていません';
        }

        if(isset($Saves)){
            $count = count($Save_Names);
        }else{
            $count = 1;
        }
        

        return view('phone.mypage', compact('auths', 'Common_net', 'Common_card', 'Common_member','Save_Carriers', 'Save_Names', 'Save_Prices', 'Save_TellNames', 'Save_TellPrices', 'Save_Members', 'Save_Nets', 'Save_Cards', 'Save_Students', 'Save_Totals', 'count'));
    }

    public function page_low(Request $request) {
        $auths = Auth::user();
        $Common = Common::where('user_id', $auths->id)->first();
        $search = $request->input('search');

        $Save_Carriers = [];
        $Save_Names = [];
        $Save_Prices = [];
        $Save_TellNames = [];
        $Save_TellPrices = [];
        $Save_Nets = [];
        $Save_Members = [];
        $Save_Cards = [];
        $Save_Students = [];
        $Save_Totals = [];

        if($Common == null) {
            $Common_net = "保存されていません";
            $Common_card = "保存されていません";
            $Common_member = "保存されていません";
        }else {
            $Common_net = $Common->net;
            $Common_card = $Common->card;
            $Common_member = $Common->member;
        }
        
        $Saves = [];
        $set = Save::where('user_id', $auths->id)->first();
        if(isset($set)){
            $gets = Save::where('user_id', $auths->id)->get();
            foreach($gets as $get){
                $Saves[] = $get;
            }
        }else{
            $Saves = null;
        }

        // array_multisort
        $totals = [];
        if(isset($Saves)){
            foreach($Saves as $Save => $value){
                $totals[] = $value->Totals;
            }
            array_multisort($totals, SORT_ASC, $Saves);
        }

        if(isset($Saves) && !isset($search)){
            foreach($Saves as $Save){
                $Save_Carriers[] = $Save->carrier;
                $Save_Names[] = $Save->Plans_name;
                $Save_Prices[] = $Save->Plans_price;
                $Save_TellNames[] = $Save->Tells_name;
                $Save_TellPrices[] = $Save->Tells_price;
                $Save_Nets[] = $Save->Nets_price;
                $Save_Members[] = $Save->Member_price;
                $Save_Cards[] = $Save->Cards_price;
                $Save_Students[] = $Save->Students_price;
                $Save_Totals[] = $Save->Totals;
            }
        }elseif(isset($Saves) && isset($search)){
            $carriers = [];
            $searchTotals = [];
            $getSearchs = Save::where('carrier', $search)->get();
            foreach($getSearchs as $getSearch){
                $carriers[] = $getSearch;
            }

            foreach($carriers as $carrier => $value){
                $searchTotals[] = $value->Totals;
            }
            array_multisort($searchTotals, SORT_ASC, $carriers);

            foreach($carriers as $carrier){
                $Save_Carriers[] = $carrier->carrier;
                $Save_Names[] = $carrier->Plans_name;
                $Save_Prices[] = $carrier->Plans_price;
                $Save_TellNames[] = $carrier->Tells_name;
                $Save_TellPrices[] = $carrier->Tells_price;
                $Save_Nets[] = $carrier->Nets_price;
                $Save_Members[] = $carrier->Member_price;
                $Save_Cards[] = $carrier->Cards_price;
                $Save_Students[] = $carrier->Students_price;
                $Save_Totals[] = $carrier->Totals;
            }
            

        }elseif(!isset($Saves)){
            $Save_Carriers[] = '保存されていません';
            $Save_Names[] = '保存されていません';
            $Save_Prices[] = '保存されていません';
            $Save_TellNames[] = '保存されていません';
            $Save_TellPrices[] = '保存されていません';
            $Save_Nets[] = '保存されていません';
            $Save_Members[] = '保存されていません';
            $Save_Cards[] = '保存されていません';
            $Save_Students[] = '保存されていません';
            $Save_Totals[] = '保存されていません';
        }
        
        if(isset($Saves)){
            $count = count($Save_Names);
        }else{
            $count = 1;
        }


        return view('phone.mypage_low', compact('auths', 'Common_net', 'Common_card', 'Common_member','Save_Carriers', 'Save_Names', 'Save_Prices', 'Save_TellNames', 'Save_TellPrices', 'Save_Members', 'Save_Nets', 'Save_Cards', 'Save_Students', 'Save_Totals', 'count'));
    }
    public function page_high(Request $request) {
        $auths = Auth::user();
        $Common = Common::where('user_id', $auths->id)->first();
        $search = $request->input('search');

        $Save_Carriers = [];
        $Save_Names = [];
        $Save_Prices = [];
        $Save_TellNames = [];
        $Save_TellPrices = [];
        $Save_Nets = [];
        $Save_Members = [];
        $Save_Cards = [];
        $Save_Students = [];
        $Save_Totals = [];

        if($Common == null) {
            $Common_net = "保存されていません";
            $Common_card = "保存されていません";
            $Common_member = "保存されていません";
        }else {
            $Common_net = $Common->net;
            $Common_card = $Common->card;
            $Common_member = $Common->member;
        }

        $Saves = [];
        $set = Save::where('user_id', $auths->id)->first();
        if(isset($set)){
            $gets = Save::where('user_id', $auths->id)->get();
            foreach($gets as $get){
                $Saves[] = $get;
            }
        }else{
            $Saves = null;
        }

        // array_multisort
        $totals = [];
        if(isset($Saves)){
            foreach($Saves as $Save => $value){
                $totals[] = $value->Totals;
            }
            array_multisort($totals, SORT_DESC, $Saves);
        }

        if(isset($Saves) && !isset($search)){
            foreach($Saves as $Save){
                $Save_Carriers[] = $Save->carrier;
                $Save_Names[] = $Save->Plans_name;
                $Save_Prices[] = $Save->Plans_price;
                $Save_TellNames[] = $Save->Tells_name;
                $Save_TellPrices[] = $Save->Tells_price;
                $Save_Nets[] = $Save->Nets_price;
                $Save_Members[] = $Save->Member_price;
                $Save_Cards[] = $Save->Cards_price;
                $Save_Students[] = $Save->Students_price;
                $Save_Totals[] = $Save->Totals;
            }
        }elseif(isset($Saves) && isset($search)){
            $carriers = [];
            $searchTotals = [];
            $getSearchs = Save::where('carrier', $search)->get();
            foreach($getSearchs as $getSearch){
                $carriers[] = $getSearch;
            }

            foreach($carriers as $carrier => $value){
                $searchTotals[] = $value->Totals;
            }
            array_multisort($searchTotals, SORT_DESC, $carriers);            

            foreach($carriers as $carrier){
                $Save_Carriers[] = $carrier->carrier;
                $Save_Names[] = $carrier->Plans_name;
                $Save_Prices[] = $carrier->Plans_price;
                $Save_TellNames[] = $carrier->Tells_name;
                $Save_TellPrices[] = $carrier->Tells_price;
                $Save_Nets[] = $carrier->Nets_price;
                $Save_Members[] = $carrier->Member_price;
                $Save_Cards[] = $carrier->Cards_price;
                $Save_Students[] = $carrier->Students_price;
                $Save_Totals[] = $carrier->Totals;
            }
        }elseif(!isset($Saves)){
            $Save_Carriers[] = '保存されていません';
            $Save_Names[] = '保存されていません';
            $Save_Prices[] = '保存されていません';
            $Save_TellNames[] = '保存されていません';
            $Save_TellPrices[] = '保存されていません';
            $Save_Nets[] = '保存されていません';
            $Save_Members[] = '保存されていません';
            $Save_Cards[] = '保存されていません';
            $Save_Students[] = '保存されていません';
            $Save_Totals[] = '保存されていません';
        }
    
        
        if(isset($Saves)){
            $count = count($Save_Names);
        }else{
            $count = 1;
        }

        return view('phone.mypage_high', compact('auths', 'Common_net', 'Common_card', 'Common_member','Save_Carriers', 'Save_Names', 'Save_Prices', 'Save_TellNames', 'Save_TellPrices', 'Save_Members', 'Save_Nets', 'Save_Cards', 'Save_Students', 'Save_Totals', 'count'));
    }

    public function edit() {
        $auths = Auth::user();
        // $Common = Common::where('user_id', $auths->id)->first();
        $nets = ['ドコモ光/ドコモホームルーター', 'au光/eo光', 'ソフトバンク光/ソフトバンクAir', 'その他'];
        $cards = ['dカード', 'auPayカード', 'その他'];
        $members = ['1', '2', '3', '4'];
        return view('phone.mypage_edit', compact('nets', 'cards', 'members', 'auths'));
    }

    public function edit_store(Request $request) {
        $auths = Auth::user();
        if(isset($request->name)){
            $auths->name = $request->name;
            $auths->save();
        }
        if(isset($request->email)){
            $auths->email = $request->email;
            $auths->save();
        }
        if(isset($request->password)){
            $auths->password = $request->password;
            $auths->save();
        }

        $Common = Common::where('user_id', $auths->id)->first();
        if($Common->net !== $request->net || $Common->card !== $request->card || $Common->member !== $request->member){
            $Common->net = $request->net;
            $Common->card = $request->card;
            $Common->member = $request->member;
            $Common->save();

            // $sets = Save::where('user_id', $auths->id)->first();
            $sets = Save::where('user_id', $auths->id)->delete();
            // $sets->delete();
        }

            
            
// ここまで更新処理

        $Save_Carriers = [];
        $Save_Names = [];
        $Save_Prices = [];
        $Save_TellNames = [];
        $Save_TellPrices = [];
        $Save_Nets = [];
        $Save_Members = [];
        $Save_Students = [];
        $Save_Totals = [];

        if($Common == null) {
            $Common_net = "保存されていません";
            $Common_card = "保存されていません";
            $Common_member = "保存されていません";
        }else {
            $Common_net = $Common->net;
            $Common_card = $Common->card;
            $Common_member = $Common->member;
        }

        $set = Save::where('user_id', $auths->id)->first();
        if(isset($set)){
            $Saves = Save::where('user_id', $auths->id)->get();
        }

        if(isset($Saves)){
            foreach($Saves as $Save){
                $Save_Carriers[] = $Save->carrier;
                $Save_Names[] = $Save->Plans_name;
                $Save_Prices[] = $Save->Plans_price;
                $Save_TellNames[] = $Save->Tells_name;
                $Save_TellPrices[] = $Save->Tells_price;
                $Save_Nets[] = $Save->Nets_price;
                $Save_Members[] = $Save->Member_price;
                $Save_Cards[] = $Save->Cards_price;
                $Save_Students[] = $Save->Students_price;
                $Save_Totals[] = $Save->Totals;
            }
        }else{
            $Save_Carriers[] = '保存されていません';
            $Save_Names[] = 'プラン名';
            $Save_Prices[] = '保存されていません';
            $Save_TellNames[] = '通話オプション';
            $Save_TellPrices[] = '保存されていません';
            $Save_Nets[] = '保存されていません';
            $Save_Members[] = '保存されていません';
            $Save_Cards[] = '保存されていません';
            $Save_Students[] = '保存されていません';
            $Save_Totals[] = '保存されていません';
        }
        

        if(isset($Saves)){
            $count = count($Save_Names);
        }else{
            $count = 1;
        }

        return view('phone.mypage_low', compact('auths', 'Common_net', 'Common_card', 'Common_member','Save_Carriers', 'Save_Names', 'Save_Prices', 'Save_TellNames', 'Save_TellPrices', 'Save_Members', 'Save_Nets', 'Save_Cards', 'Save_Students', 'Save_Totals', 'count'));
    }
}