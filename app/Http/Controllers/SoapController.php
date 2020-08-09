<?php
//felt cute, might delete later idk.

namespace App\Http\Controllers;
use Artisaninweb\SoapWrapper\SoapWrapper;
class SoapController extends Controller {
  protected $soapWrapper;

  /**
   * SoapController constructor.
   *
   * @param SoapWrapper $soapWrapper
   */
  public function __construct(SoapWrapper $soapWrapper)
  {
    $this->soapWrapper = $soapWrapper;
  }

  public function demo() 
  {
    $valutak="GBP,AUD,USD,EUR,CZK,DKK,HRK,CAD,CHF,SEK,PLN,RON,RSD";
    $dig = date('Y-m-d');
    $dtol = date('Y-m-d', strtotime('now - 7 days'));
    $settings = 
    $this->soapWrapper->add('Currency',function ($service) {
      $service
        ->wsdl('http://www.mnb.hu/arfolyamok.asmx?singleWsdl')
        ->trace(true);
    });

    $response = $this->soapWrapper->call('Currency.GetExchangeRates',
    array('startDate' => $dtol, 
          'endDate' => $dig, 
          'currencyNames' => $valutak
    ));
    
    var_dump($response);
  }
}