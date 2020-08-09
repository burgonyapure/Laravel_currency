<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

/*************************************************************************************************************
//																											//
//		Szerencsénkre az MNB webszervere Soap (Simple Object Access Protocol) szervert is futtat,			//
//		(lásd letöltések\soap-service-fogyasztasa-php.pdf)													//
//		így eléggé egyszerű lekérni tőlük az árfolyamokat a php segítségével. A soap class nincs 			//
//		alapértelmezetten engedélyezve, php.ini beállításaiban engedélyezni kell:							//
//		extension=php_soap.dll vagy extension=soap elől a kommentet kiszedni.								//
//		Linuxon php7-hez: apt-get install php7.x-soap xE{0,1,2,3,4}											//
//				php5-höz: apt-get install php-soap 															//
//		Az alábbi kód soap kliens segítségével csatlakozik, lekéri a megadott valutákat, és a				//
//		hozzájuk tartozó értékeket 7 napra visszamenőleg, feltölti az arfolyam adatbázis mnb				//
//		táblájába.																							//
//																											//
*************************************************************************************************************/

//sql adatbázis adatok
$servername = "192.168.0.1";//tesztelni: localhost | Éles: 192.168.0.1
$username = "arfolyam"; 	//tesztelni:root	   | Éles: arfolyam
$password = "nadixArf003"; 	//tesztelni:""		   | Éles: nadixArf003
$dbname = "arfolyam";
$datum = date("Ymd");
$conn = mysqli_connect($servername, $username, $password, $dbname);

//csatlakozási kísérlet sql-re
if (!$conn) {
    die("A csatlakozás nem sikerült(sql): " . mysqli_connect_error());
}
//soap beállítások
$client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
$soap_params = array(
 'soap_version' => 'SOAP_1_1',
 'trace' => 1,
);

$valutak="GBP,AUD,USD,EUR,CZK,DKK,HRK,CAD,CHF,SEK,PLN,RON,RSD";
$dig = date('Y-m-d');
$dtol = date('Y-m-d', strtotime('now - 7 days'));

$soapClient = new Soapclient("http://www.mnb.hu/arfolyamok.asmx?singleWsdl", $soap_params);
$result = $soapClient->GetExchangeRates(array('startDate' => $dtol, 'endDate' => $dig, 'currencyNames' => $valutak));

$dom_root = new DOMDocument();
$dom_root->loadXML($result->GetExchangeRatesResult);

$searchNode = $dom_root->getElementsByTagName("Day");
echo ' <form action="index.php">
         <button type="submit">Vissza</button>
      </form>';
foreach( $searchNode as $searchNode ) {
    $date = $searchNode->getAttribute('date');
    print $date . "\n";
    $rates = $searchNode->getElementsByTagName( "Rate" ); 
    foreach( $rates as $rate ) {
        print "\t{$rate->getAttribute('curr')} = {$rate->nodeValue}\n";
		
		echo '<br>';
		// mnb tábla primary kulcs ervenyes,valuta
		//insert into mnb (ervenyes,valuta,ar) values ($date,$rate->getAttribute('curr',$rate->nodeValue) ON DUPLICATE KEY UPDATE ar=values(ar)
		$query = "insert into mnb (ervenyes,valuta,ar) values ('".$date."','".$rate->getAttribute('curr')."','".str_replace(',','.',$rate->nodeValue)."') ON DUPLICATE KEY UPDATE ar=values(ar)";
		// teszt=> $query = "insert into mnb (ervenyes,valuta,ar) values ('2019-07-29','EUR','200')";
		mysqli_query($conn, $query);
	
    }
}
?>