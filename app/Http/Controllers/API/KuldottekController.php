<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kuldottek;
use App\Mail\NapiMail;
use Illuminate\Support\Facades\Mail;

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
        $now = date("Y-m-d H:i:s");
        foreach ($request->all() as $req ) {
            Kuldottek::create([
                'irodanev' => $req['irodanev'],
                'valutanev' => $req['valutanev'],
                'vetel' => $req['vetel'],
                'eladas' => $req['eladas'],
                'datum' => $now,
                'egysegtipus' => 'P'
            ]);
        }
        $toDbf = $request->all();
        $this->generateDbf($toDbf);
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
        $magic = "FIELD(valutanev , 'USD','EUR','GBP','AUD','CZK','DKK','HRK','CAD','CHF','SEK','PLN','RON','RSD') ";

        if ($id === "Kar"){
            $ret = Kuldottek::where('irodanev','Kárász 5/1')->orderBy('datum','desc')->take(13)->orderByRaw($magic)->get();
            $van = Kuldottek::where('irodanev', 'Kárász 5/1')->first();
        }
        else if ($id === "Tisza"){
            $ret = Kuldottek::where('irodanev','Tisza Lajos 1')->orderBy('datum','desc')->take(13)->orderByRaw($magic)->get();
            $van = Kuldottek::where('irodanev', 'Tisza Lajos 1')->first();
        }
        else if ($id === "Uni"){
            $ret = Kuldottek::where('irodanev','Unió 2')->orderBy('datum','desc')->take(13)->orderByRaw($magic)->get();
            $van = Kuldottek::where('irodanev', 'Unió 2')->first();
        }
        else {
            $ret = Kuldottek::where('irodanev',$id)->orderBy('datum','desc')->take(13)->orderByRaw($magic)->get();
            $van = Kuldottek::where('irodanev', $id)->first();
        }

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

    private function generateDbf($arr){        

        $cimek = [
            "Pesti utca" =>     'pestiu@mail.nadix.net',
            "Unió 2" =>         'unio2@mail.nadix.net',
            "Berettyóújfalu" => 'bere',
            "Szoboszló" =>      'szob2@mail.nadix.net',
            "Tisza Lajos 1" =>  'tiszal1@mail.nadix.net',
            "Kárász 5/1" =>     'kar51@mail.nadix.net',
            "Dunakeszi" =>      'dunake@mail.nadix.net',
            "Budapest" =>       'budapest@mail.nadix.net'
        ];
        //var_dump($arr);

        $valto = $arr[0]['irodanev'];
        $maitlto = '';

        for ($i=0; $i < count($cimek); $i++) { 
            if ($cimek[$valto]){
                $mailto = $cimek[$valto];
            }
        }
       
        $datum = date("Y.m.d");
        $def = array(
            array("ARFO",     "N",6,2),
            array("ELAD",     "N",6,2),
            array("DB",       "N", 3, 0),
            array("NEME",     "C", 5),
            array("DAUTM",    "D", 80),
            array("TOL",      "C",8),
            array("IG",       "C",8),
        );
        
        if (!dbase_create('dbf/NapiArf.dbf', $def)) {
            return "Error, was not able to create the database\n";
        }

        $db = dbase_open('dbf/NapiArf.dbf', 2);
        if ($db) {
            foreach ($arr as $record) {
                dbase_add_record($db,array($record['vetel'],$record['eladas'],1,$record['valutanev'],$datum,'',''));
            }
            
        }
        dbase_close($db);

        //Mail::to($mailto)->send(new NapiMail());
    }
}
