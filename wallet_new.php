<?php
include 'final_header.php';
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$postData = array(
  "userMailId"=> $user_session

  );
// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


 if(isset($_GET['curr']))
  {
    $currencyname=base64_decode($_GET['curr']);

    switch ($currencyname) {
          case 'btc':
                  $response = file_get_contents($url_api.'/usertransaction/getTxsListBTC', false, $context);
          break;
          case 'bch':
                  $response = file_get_contents($url_api.'/usertransaction/getTxsListBCH', false, $context);
          break;
          case 'gds':
                $response = file_get_contents($url_api.'/usertransaction/getTxsListGDS', false, $context);
          break;
      }


  }

if ($response === false) {
    die('Error');
}


$responseData = json_decode($response, true);


if (isset($responseData['tx'])) {
    $transactionList_BTC = $responseData['tx'];
}



$responseUserDetail = file_get_contents($url_api.'/user/getAllDetailsOfUser', false, $context);

if ($responseUserDetail === false) {
    die('Error');
}


?>
<div class="app-body" style="margin-bottom: 10%;">
        

        <!-- Main content -->
        <main class="main">
         <div class="row balance-div">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper($currencyname); ?></a>
            </div>
            
        </div>

      
<style type="text/css">
  .tablestyle
  {
    border: 1px solid #343434;
  }
  
  
  .tab-content{
    border:none;
  }

</style>



  <div class="container-fluid">
   <div class="animated fadeIn">
    
     <div class="col-md-12"><!-- All Sent Received Transferred -->
   <h3 class="text-center font-custom">YOUR <?= strtoupper($currencyname); ?> TRANSACTIONS</h3>
   <div class="tablestyle">
  <ul class="nav nav-pills">
    <li class="active"><a href="#tab1" data-toggle="tab">All</a></li>
    <li><a href="#tab2" data-toggle="tab">Send</a></li>
    <li><a href="#tab3" data-toggle="tab">Received</a></li>
  </ul>
    <div id='content' class="tab-content">

      <div class="tab-pane  active" id="tab1">

        <table class="table table-bordered">
          <thead style=" background-color: #232323 !important;
          color: white !important;">
          <tr>
            <th>Date</th>
            <th>Address</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Confirmations</th>
            <th>TX</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $bold_txxs = "";
          if (count($transactionList_BTC)>0) {
              foreach (array_reverse($transactionList_BTC) as $transaction) {
                  if ($transaction['category']=="send") {
                      $tx_type = '<b style="color: #FF0000;">Sent</b>';
                  } elseif ($transaction['category']=="receive") {
                      $tx_type = '<b style="color: #01DF01;">Received</b>';
                  } else {
                      $tx_type = '<b style="color: #01DF01;">Admin</b>';
                      $transaction['address'] = 'Bccxchange ';
                      $transaction['confirmations'] = 'Confirmed ';
                      $blockchain_url='';
                      $transaction['txid']= '';
                  }
                  echo '<tr>
            <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
            <td>'.$transaction['address'].'</td>
            <td>'.$tx_type.'</td>
            <td>'.abs($transaction['amount']).'</td>
            <td>'.$transaction['confirmations'].'</td>
            <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
          </tr>';
              }
          } elseif ((count($transactionList_BTC)== 0)) {
              echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
          }
      ?>
    </tbody>


</table>

</div>
<div class="tab-pane" id="tab2">

  <table class="table">
    <thead style=" background-color: #232323 !important;
    color: white !important;">
    <tr>
      <th>Date</th>
      <th>Address</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Confirmations</th>
      <th>TX</th>
    </tr>
  </thead>
  <tbody>
   <tbody>
    <?php

    if (count($transactionList_BTC)>0) {
        foreach (array_reverse($transactionList_BTC) as $transaction) {
            if ($transaction['category']=="send") {
                $tx_type = '<b style="color: #FF0000;">Sent</b>';
                echo '<tr>
        <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
        <td>'.$transaction['address'].'</td>
        <td>'.$tx_type.'</td>
        <td>'.abs($transaction['amount']).'</td>
        <td>'.$transaction['confirmations'].'</td>
        <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
      </tr>';
            }
        }
    } elseif ((count($transactionList_BTC)== 0)) {
        echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
    }
?>
</tbody>

</tbody>

</table>

</div>
<div class="tab-pane" id="tab3">

  <table class="table">
    <thead style=" background-color: #232323 !important;
    color: white !important;">
    <tr>
      <th>Date</th>
      <th>Address</th>
      <th>Type</th>
      <th>Amount</th>
      <th>Confirmations</th>
      <th>TX</th>

    </tr>
  </thead>
  <tbody>
    <?php

    if (count($transactionList_BTC)>0) {
        foreach (array_reverse($transactionList_BTC) as $transaction) {
            if ($transaction['category']=="receive") {
                $tx_type = '<b style="color:  #01DF01;">Recieved</b>';
                echo '<tr>
        <td>'.date('n/j/Y h:i a', $transaction['time']).'</td>
        <td>'.$transaction['address'].'</td>
        <td>'.$tx_type.'</td>
        <td>'.abs($transaction['amount']).'</td>
        <td>'.$transaction['confirmations'].'</td>
        <td colspan=\"3\"><a href="' . $blockchain_url,  $transaction['txid'] . '" target="_blank">Info</a></td>
      </tr>';
            }
        }
    } elseif ((count($transactionList_BTC)== 0)) {
        echo "<tr><td colspan=\"3\">There is no Transaction exists</td><td></td><td></td><td></td></tr>";
    }
?>
</tbody>

</table>

</div>

</div>
</div>
</div>
</div>


<!--/.row-->
</div>



</main>

       


    </div>

</div>


</div>

<?php
include 'footer.php';
?>
