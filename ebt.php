<?php
ob_start();
include 'header.php';
page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
ob_end_flush();
?>

<div id="asks_orders"></div>


    <div class="row">

      <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="myTabContent">
 <div class="panel panel-default text-center ">

          <p><div id="container"></div></p>
         </div>
          <div class="tab-pane fade show active bg-default" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="text-center">
              <h3>Order Book</h3>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-sm-5 col-sm-offset-1">
                    <div class="panel panel-default">
                      <div class="panel-heading bidhead">BID <small class="pull-right" > BTC <span id ="bid_Total_btc_ebt"></span> | EBT <span id ="bid_Total_ebt"></span></small></div>
                      <div class="panel-body bidset">
                        <div class="table-responsive">
                          <table class="table table-striped order-table table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(EBT)</th>
                                <th>Bid(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="bid_btc_ebt">


                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="panel panel-default">
                      <div class="panel-heading askhead">ASK <small class="pull-right" > BTC <span id ="ask_Total_btc_ebt"></span> | EBT <span id ="ask_Total_ebt"></span></small></div>

                      <div class="panel-body askset">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>

                                <th>Vol(EBT)</th>
                                <th>Ask(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="ask_btc_ebt">

                            </tbody>

                          </table>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="col-md-3" style="margin-top: 14px;">

                <div class="panel panel-default">
                  <div class="panel-heading">Buy Ebittree Coin
                   <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance"></span>BTC</small>
                 </div>
                 <div class="panel-body ">
                  <fieldset>

                    <div class="input-group margin-top">
                      <span class="input-group-addon">Units</span>
                      <input type="number" step="0.00001" onkeyup="sum_EBT()" name="bidAmountEBT"
                      id="bidAmountEBT" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">EBT</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                      <input type="number" step="0.00001" onkeyup="sum_EBT()" name="bidRate"
                      id="bidRate" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Total</span>
                      <input type="number" step="0.00001" onkeyup="sumTotalEbt()" name="bidAmountBTC" id="bidAmountBTC"
                      class="form-control bidAmountBTC1"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="row">
                      <button onclick="buy_data();" class="btn btn-info btn-sm col-xs-3"
                      type="button" id="butval" style="width:100% ;background-color: #adc396" >Buy
                    </button>
                    <div id="error_message1" class="pull-right" style="color: red; margin-top: 20px;"></div>
                    <!-- <input class="btn btn-success col-xs-3 btn-sm" id="reset" type="button"  value="RESET"> -->
                  </div>

                </fieldset>
              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading">Sell Ebittree Coin
                <small class="pull-right" > Available Balance:<span id ="avalEBTBalance"></span>EBT <br> Freeze Balance: <span id="freezeEBTBalance"></span>EBT</small>
              </div>
              <div class="panel-body ">
                <fieldset>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Units</span>
                    <input type="number" step="0.00001" id="askAmountEBT" name="askAmountEBT"
                    onkeyup="sumsell()" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">EBT</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Ask &nbsp;</span>
                    <input type="number" step="0.00001" onkeyup="sumsell()" name="askRate"
                    id="askRate" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Total</span>
                    <input ttype="number" step="0.00001" onkeyup="sumTotalSell()" id="askAmountBTC" name="askAmountBTC"
                    class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="row">
                    <button onclick="sell_data();" class="btn btn-success btn-sm col-xs-3"
                    type="button" id="butval" style="width:100%; background-color: #e49f9e" >Sell
                  </button>
                  <div id="error_message" class="pull-right" style="color: red; margin-top: 20px;"></div>
                </div>
                <!-- <input class="btn btn-success btn-sm" type="reset" onclick="WebSocketTest()" value="RESET"> -->
              </fieldset>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="text-center"><h3>My Open Orders</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center"></div>
      <div class="panel-body openmaket">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED EBT</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL EBT</th>
                <th>UNITS TOTAL BTC</th>
                <th>ACTION</th>
              </tr>
            </thead>

            <tbody id="open_bid_ebt">

            </tbody>
            <tbody id="open_ask_ebt">

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=" text-center"><h3>Market</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center "></div>

      <div class="panel-body market">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL EBT</th>
                <th>UNITS TOTAL BTC</th>
              </tr>
            </thead>

            <tbody id="market_bid_ebt">

            </tbody>
            <tbody id="market_ask_ebt">

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
</div>


</div>

<?php
include 'footer.php';
?>

<script>

  function sum_EBT() {
        var a = document.getElementById('bidRate').value;
        var b = document.getElementById('bidAmountEBT').value;
        var result = (parseFloat(a) * parseFloat(b)).toFixed(6);
        if (!isNaN(result)) {
            document.getElementById('bidAmountBTC').value = result;

        }

    }
    function sumTotalEbt()
    {
       var a = document.getElementById('bidRate').value;
        var b = document.getElementById('bidAmountEBT').value;
       var res=document.getElementById('bidAmountBTC').value;
        if (res) {
          var equal=res/a;
            document.getElementById('bidAmountEBT').value = equal;
        }
    }
    function sumsell() {
        var a = document.getElementById('askRate').value;
        var b = document.getElementById('askAmountEBT').value;
        var result = (parseFloat(a) * parseFloat(b)).toFixed(6);
        if (!isNaN(result)) {
           document.getElementById('askAmountBTC').value = result;

        }

    }
    function sumTotalSell()
    {
      var a = document.getElementById('askRate').value;
        var b = document.getElementById('askAmountEBT').value;
        var res=document.getElementById('askAmountBTC').value;
        if (res) {
          var equal=res/b;
           document.getElementById('askRate').value = equal;

        }
    }

  function del(bidIdEBT,bidownerId) {

    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradeebtmarket/removeBidEBTMarket',
        data: {
          "bidIdEBT": bidIdEBT,
          "bidownerId": bidownerId
        },
        success: function(result){

        }
      });
    }
  }
  function del_ask(askIdEBT,askownerId) {
    if (confirm("Do You Want To Delete!")) {
      $.ajax({
        type: "POST",
        url: url_api + '/tradeebtmarket/removeAskEBTMarket',
        data: {
          "askIdEBT":askIdEBT,
          "askownerId":askownerId

        },
        success: function(result){

        }
      });
    }
  }


  /**********************buy data*********************************************************************************/
  function buy_data() {


    var bidRate = document.getElementById('bidRate').value;
    var bidAmountEBT = document.getElementById('bidAmountEBT').value;
    var bidAmountBTC = document.getElementById('bidAmountBTC').value;
    var bidownerId=user_details.id;
    var spendingPassword='12';

    var json_bid_ebt = {
      "bidAmountBTC":bidAmountBTC,
      "bidAmountEBT":bidAmountEBT,
      "bidRate":bidRate,
      "bidownerId":bidownerId,
      "spendingPassword":spendingPassword
    }

    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/addBidEBTMarket",
      data: JSON.stringify(json_bid_ebt),
      success: function(result){
        console.log(result);
        $('#error_message1').empty();
        if (result.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+result.message+"");
        }

      }
    });
  }

  function sell_data(){

    var askAmountEBT = document.getElementById('askAmountEBT').value;
    var askRate = document.getElementById('askRate').value;
    var askAmountBTC = document.getElementById('askAmountBTC').value;
    var bidownerId=user_details.id;
    console.log(bidownerId);
    var spendingPassword='12';

    var json_ask_ebt = {
      "askAmountBTC":askAmountBTC,
      "askAmountEBT":askAmountEBT,
      "askRate":askRate,
      "askownerId":bidownerId,
      "spendingPassword":spendingPassword
    }

    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/addAskEBTMarket",
      data: JSON.stringify(json_ask_ebt),
      success: function(result){
        console.log(result);
        $('#error_message').empty();
        if (result.statusCode!=200)
        {
          $('#error_message').append(" &nbsp;"+result.message+"");
        }

      }
    });

  }

</script>
<script>
var arrayObject = [];
var bidorderTime =[];
var arrayObjectask = [];
var askorderTime =[];
$.getJSON(url_api + '/tradeebtmarket/getBidsEBTSuccess', function (data) {
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
    }*/
    var  temp =data.bidsEBT;
      console.log("  console.log(temp);",temp);
    var date = 1317888000000;
    if(temp){
      for (var i = 0; i < temp.length; i++) {

        arrayObject.push([Number(temp[i].createTimeUTC)*1000,temp[i].bidRate]);
        bidorderTime.push(temp[i].updatedAt);
      }
    }
    $.getJSON(url_api + '/tradeebtmarket/getAsksEBTSuccess', function (dataask) {
       //console.log(data);
         /* var bid_orders = $.parseJSON(data);
        for(var i = 0; i < data.length ; i++){
               console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
        }*/
        var  tempask =dataask.asksEBT;
        console.log("  console.log(tempask);",tempask);
        if(tempask){
          for (var i = 0; i < tempask.length; i++) {

            arrayObjectask.push([Number(tempask[i].createTimeUTC)*1000,tempask[i].askRate]);

          }
        }
        Highcharts.chart('container', {
           chart: {
               zoomType: 'x'
           },
           title: {
               text: 'Ebitree Classic Coin & Bitcoin Market'
           },
           subtitle: {
               text: document.ontouchstart === undefined ?
                       'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
           },
           xAxis: {
               type: 'datetime'
           },
           yAxis: {
               title: {
                   text: 'Exchange rate'
               }
           },
           legend: {
               enabled: false
           },
           plotOptions: {
               area: {
                   fillColor: {
                       linearGradient: {
                           x1: 0,
                           y1: 0,
                           x2: 0,
                           y2: 1
                       },
                       stops: [
                           [0, Highcharts.getOptions().colors[0]],
                           [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                       ]
                   },
                   marker: {
                       radius: 2
                   },
                   lineWidth: 1,
                   states: {
                       hover: {
                           lineWidth: 1
                       }
                   },
                   threshold: null
               }
           },

           series: [
             {
               type: 'area',
               name: 'Buy',
               data: arrayObject
             },
             {
               type: 'area',
               name: 'Sell',
               data: arrayObjectask
           }],
           responsive: {
              rules: [{
                  condition: {
                      maxWidth: 500
                  }
              }]
            }
       });
  });
  });
</script>
