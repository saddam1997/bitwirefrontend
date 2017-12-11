<?php
ob_start();
include 'final_header.php';
/*-----------Add Session-----------*/
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];

if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);

  switch ($currencyname) {
      case 'btc':
          $user_current_balance_BTC = $_SESSION['BTCbalance'];
          break;
      case 'bch':
        $user_current_balance_BTC = $_SESSION['BCHbalance'];
          break;
      case 'gds':
          $user_current_balance_BTC = $_SESSION['GDSbalance'];
          break;
  }

 }


    if (isset($_POST['btnsendbtc'])) {
        $reciever_address = $_POST['btcaddress'];
        $coin_amount = $_POST['txtChar'];
        $spendingpassword = $_POST['spendingpassword'];


        if(isset($_GET['curr']))
        {

          switch ($currencyname) {
              case 'btc':
                      $postData = array(
                                  "userMailId"=> $user_session,
                                  "amount"=> $coin_amount,
                                  "spendingPassword"=>$spendingpassword,
                                  "recieverBTCCoinAddress"=> $reciever_address,
                                  "commentForReciever"=> "Comment for Reciever",
                                  "commentForSender"=> "Comment for sender"
                              );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                      ));
                      $response = file_get_contents($url_api.'/usertransaction/sendBTC', false, $context);


              break;
              case 'bch':

                      $postData = array(
                                  "userMailId"=> $user_session,
                                  "amount"=> $coin_amount,
                                  "spendingPassword"=>$spendingpassword,
                                  "recieverBCHCoinAddress"=> $reciever_address,
                                  "commentForReciever"=> "Comment for Reciever",
                                  "commentForSender"=> "Comment for sender"
                                );

                      // Create the context for the request
                      $context = stream_context_create(array(
                                  'http' => array(
                                  'method' => 'POST',
                                  'header' => "Content-Type: application/json\r\n",
                                  'content' => json_encode($postData)
                                  )
                        ));
                      $response = file_get_contents($url_api.'/usertransaction/sendBCH', false, $context);

              break;
              case 'gds':

                    $postData = array(
                                "userMailId"=> $user_session,
                                "amount"=> $coin_amount,
                                "spendingPassword"=>$spendingpassword,
                                "recieverGDSCoinAddress"=> $reciever_address,
                                "commentForReciever"=> "Comment for Reciever",
                                "commentForSender"=> "Comment for sender"
                              );

                    // Create the context for the request
                    $context = stream_context_create(array(
                                'http' => array(
                                'method' => 'POST',
                                'header' => "Content-Type: application/json\r\n",
                                'content' => json_encode($postData)
                                )
                              ));
                    $response = file_get_contents($url_api.'/usertransaction/sendGDS', false, $context);

                break;
          }
          }
          if ($response === false) {
            die('Error');
        }


        $responseData = json_decode($response, true);
        $message = "Successfully";
        if (isset($responseData['user'])) {
            header("location:successsend.php?s=".$message);
        } else {
            $error = $responseData['message'];
        }
    }
ob_end_flush();
?>

<div class="">
    <div class="">
        <div class="row balance-div" style="border-left:none;">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper($currencyname); ?></a>
            </div>
            
        </div>
        <div class="row justify-content-center"  >
            <div class="col-sm-6 col-md-6">
                <form action="" method="post" class="form-horizontal">
                    <div class="card  bg-success">
                        <div class="card-header">
                            <div class="row text-center">
                            <div class="col-md-8 text-center">
                                    <h2  class="font-custom">Send  <?= strtoupper($currencyname); ?></h2>
                                    </div>
                                <div class="col-md-4 pull-right">
                                    <span class=" pull-right"><span class="font-weight-bold"><?php echo $user_current_balance_BTC; ?>  <?= strtoupper($currencyname); ?></span><br>My  <?= strtoupper($currencyname); ?> balance</span>
                                </div>
                            </div>
                        </div>
                        <p style="color:red;text-align:center"> <?php if (isset($error)) {
    echo $error;
}?> </p>
                        <div class="card-body bg-white text-center text-success">
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Receiver Address</label>
                                    <div class="col-sm-6">
                                        <input id="btcaddress"  name ="btcaddress" class="form-control" placeholder="Paste your <?= strtoupper($currencyname); ?> Address" autocomplete="off" type="text" value="">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-large">Amount( <?= strtoupper($currencyname); ?> + network Fee of 0.001)</label>
                                    <div class="col-sm-6">

                                        <input id = "btcval" class="form-control form-control-sm" placeholder="0" autocomplete="off" onkeypress="return isNumberKey(event)" name="txtChar" type="number" step="0.00000001">

                                    </div>

                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-5 form-control-label" for="input-small">Spending Password</label>
                                    <div class="col-sm-6">

                                        <input id="spendingpassword" name="spendingpassword" class="form-control form-control-sm" autocomplete="off" type="password" value="">

                                    </div>

                                </div>

                        </div>
                        <input type="submit" class="btn btn-info btn-lg" id="btnsendbtc" name="btnsendbtc" value="Send"/>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?php
    include 'footer.php';
?>
