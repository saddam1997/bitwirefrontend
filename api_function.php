<?php 
include 'common.php';
class allfunction
{
	function getbalance($data)
	{


	$response = file_get_contents($url_api.'/'.$data.'W/getBal'.$data.'W', false, $context);
   
    


    if ($response === false) {
        die('Error');
    }
    
    
    $responseData1 = json_decode($response, true);
    
    if (isset($responseData1['user'])) {
        $btc_balance = $responseData1['user']['BTCMainbalance'];
    }
    if (isset($responseData2['user'])) {
        $bcc_balance = $responseData2['user']['BCHMainbalance'];
    }
    if (isset($responseData3['user'])) {
        $gds_balance = $responseData3['user']['GDSMainbalance'];
    }
	}
}
 



?>