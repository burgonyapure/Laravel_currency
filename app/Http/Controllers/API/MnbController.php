<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mnb;
use SoapClient;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Mail\MnbMail;
use Illuminate\Support\Facades\Mail;

class MnbController extends Controller
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
        $total = 65;
        $perPage = 13;
        $records = Mnb::latest()->paginate($perPage);

        $records = new LengthAwarePaginator(
            $records->toArray()['data'], 
            $records->total() < $total ? $$records->total() : $total, 
            $perPage
        );


        return $records;
        //return Mnb::all();
    }
    public function getAll(){
        return Mnb::all();
    }
    public function mnbMail()
    {
        $arfolyam = Mnb::latest()->orderByRaw('valuta ASC')->take(13)->get();

        $def = array(
            array("DATUM",     "D",	80),
            array("NEME",     "C",  5),
            array("ELAD",      "N",   6, 2),
            array("DB",    "N", 3, 0),	
        );
        if (!dbase_create('dbf/MaiArf.dbf', $def)) {
            return "Error, was not able to create the database\n";
        }
        
        $db = dbase_open('dbf/MaiArf.dbf', 2);
        if ($db) {
            dbase_add_record($db,array(date("Ymd"),$arfolyam[6]->valuta,$arfolyam[6]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[0]->valuta,$arfolyam[0]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[3]->valuta,$arfolyam[3]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[4]->valuta,$arfolyam[4]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[5]->valuta,$arfolyam[5]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[7]->valuta,$arfolyam[7]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[1]->valuta,$arfolyam[1]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","0"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","3"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","0"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","2"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[2]->valuta,$arfolyam[2]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[11]->valuta,$arfolyam[11]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[12]->valuta,$arfolyam[12]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),"ATS","0","0"));
            dbase_add_record($db,array(date("Ymd"),"SKK","0","0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[8]->valuta,$arfolyam[8]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[9]->valuta,$arfolyam[9]->ar,"0"));
            dbase_add_record($db,array(date("Ymd"),$arfolyam[10]->valuta,$arfolyam[10]->ar,"0"));
        }
        dbase_close($db);

        //Mail settings
        $cimzettek = [
            'sysadmin@mradmin.hu',
            'mehetbalintnak@gmail.com'
        ];

        foreach ($cimzettek as $recipient) {
            Mail::to($recipient)->send(new MnbMail());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valutak="GBP,AUD,USD,EUR,CZK,DKK,HRK,CAD,CHF,SEK,PLN,RON,RSD";
        $dig = date('Y-m-d');
        $dtol = date('Y-m-d', strtotime('now - 7 days'));

        try {
            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                )
            );
            $context = stream_context_create($opts);
        
            $wsdlUrl = 'http://www.mnb.hu/arfolyamok.asmx?singleWsdl';
            $soapClientOptions = array(
                'stream_context' => $context,
                'soap_version' => 'SOAP_1_1',
                'trace' => 1,
                'cache_wsdl' => WSDL_CACHE_NONE
            );
        
            $client = new SoapClient($wsdlUrl, $soapClientOptions);
        
            $data = array(
              'startDate' => $dtol,
              'endDate' => $dig,
              'currencyNames' => $valutak
            );
        
            $result = $client->GetExchangeRates($data);
            
            $doc = new \DOMdocument();
            $doc->loadXML($result->GetExchangeRatesResult);
      
            $searchNode = $doc->getElementsByTagName("Day");
      
            foreach( $searchNode as $searchNode ) {
              $date = $searchNode->getAttribute('date');
              
              $rates = $searchNode->getElementsByTagName( "Rate" ); 
              
              foreach( $rates as $rate ){
                Mnb::updateOrCreate([
                    'ervenyes' => $date,
                    'valuta' => $rate->getAttribute('curr'),
                    'ar' => str_replace(',','.',$rate->nodeValue)
                ]);
              }   
            }
            Mail::to()->send(new MnbMail());

        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
