<?php
//felt cute, might delete later idk.

namespace App\Http\Controllers;
use SoapClient;
class SoapController extends Controller {
  protected $soapWrapper;

  /**
   * SoapController constructor.
   *
   * @param SoapWrapper $soapWrapper
   */
  
  public function demo() 
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
      //print_r($result);
      $doc = new \DOMdocument();
      $doc->loadXML($result->GetExchangeRatesResult);
      //print_r($result->GetExchangeRatesResult);

      $searchNode = $doc->getElementsByTagName("Day");

      foreach( $searchNode as $searchNode ) {
        $date = $searchNode->getAttribute('date');
        //print $date . "\n";
        $rates = $searchNode->getElementsByTagName( "Rate" ); 

        foreach( $rates as $rate ) {
        
            print "\t{$rate->getAttribute('curr')} = {$rate->nodeValue}\n";
            print $date;
        echo '<br>';
        }
      }
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
  }
}