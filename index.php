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
$response = file_get_contents($url_api.'/usertransaction/getTxsListBTC', false, $context);
if ($response === false) {
    die('Error');
}
$responseData = json_decode($response, true);
if (isset($responseData['tx'])) {
    $transactionList_BTC = $responseData['tx'];
}
?>
<div class="row">
 <div class="col-md-12"><!-- All Sent Received Transferred -->
  <ul class="nav nav-pills">
    <li class="active"><a href="#tab1" data-toggle="tab">All</a></li>
    <li><a href="#tab2" data-toggle="tab">Send</a></li>
    <li><a href="#tab3" data-toggle="tab">Received</a></li>
  </ul>
    <div id='content' class="tab-content">

      <div class="tab-pane active" id="tab1">

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
          $bold_txxs = "";
          if (count($transactionList_BTC)>0) {
              foreach (array_reverse($transactionList_BTC) as $transaction) {
                  if ($transaction['category']=="send") {
                      $tx_type = '<b style="color: #FF0000;">Sent</b>';
                  } elseif ($transaction['category']=="receive") {
                      $tx_type = '<b style="color: #01DF01;">Received</b>';
                  } else {
                      $tx_type = '<b style="color: #01DF01;">Admin</b>';
                      $transaction['address'] = 'ZenithNEX ';
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
</div><!--/.panel-->
</div>


</div>

<?php
include 'footer.php';
?>
