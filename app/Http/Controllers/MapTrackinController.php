<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\BusMoved;



class MapTrackinController extends Controller
{
    public $lat,$lng,$bid;

        public function index(){
            return view('tracker.showClientSide');
        }
        public function bus2(){
            return view('tracker.bus2');
        }

        public function BusMoved(Request $request){

//            $request= $request['coords'];
//            $request= json_decode($request);
            $this->lng=$request['lng'];
            $this->lat=$request['lat'];
            $this->bid=$request['bid'];

            event(new BusMoved($this->lng,$this->lat,$this->bid));
//            return back();
        }

        public function moving(){
            return view('tracker.moving');
        }
}
