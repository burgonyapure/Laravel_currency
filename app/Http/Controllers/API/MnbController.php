<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mnb;
use SoapClient;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function test(){
        alert("test");
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
