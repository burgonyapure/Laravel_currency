<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kuldottek;

class KuldottekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth:api');
    }
    public function index()
    {
        return Kuldottek::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $valutak = ['USD','EUR','GBP','AUD','CZK','DKK','HRK','CAD','CHF','SEK','PLN','RON','RSD'];
        // $collection = Kuldottek::whereIn('valutanev', $valutak)
        //     ->orderBy('datum','desc')
        //     ->take(13)
        //     ->get();

        $van = Kuldottek::where('irodanev', $id)->first();
        $ret = Kuldottek::where('irodanev',$id)->orderBy('datum','desc')->take(13)->get();

        if(is_null($van)){
            $van = "empty";
            return $van;
        }
        else{
            return $ret;
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
