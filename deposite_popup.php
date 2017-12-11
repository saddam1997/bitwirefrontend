<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.amount{
  margin-left: 31px;
  height: 30px;
  width: 30%;
}
</style>
<!-- send  id011-->
<div id="id011" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id011').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer Bitcoin for Trading
        </div><br>
        <form method="post">
            <div class="form-group">
              <label for="usr">BTC AMOUNT:</label>
              <input name="btcdepositammount" class="form-controll amount"  value="" placeholder="BTC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
            </div>
            <div class="form-group">
              <label for="pwd">Spending Password: </label>
              <input type="password" class="form-controll" name="btcdeposit"  value="" placeholder="Spending Password">
            </div>
            <div class="form-group">

              <button name="btnbtcdeposit" class="btn btn-success">Deposit</button>
              <div id="error_message"></div>
            </div>
        </form>
        <br> <br> <br>
    </div>
</div>
<!-- close -->
<!-- send id012-->
<div id="id012" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id012').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer Bitcoin Cash for Trading
        </div><br>
         <form method="post">
         <div class="form-group">
          <label for="usr">BCH Amount:</label>
          <input name="bccdepositammount" class="form-controll amount"  value="" placeholder="BCC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
        <input type="password" class="form-controll" name="bccdeposit"  value="" placeholder="Spending Password">
      </div>
      <div class="form-group">

        <button name="btnbccdeposit" class="btn btn-success">Deposit</button>
        <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>

<div id="id013" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id013').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Transfer GDS for Tradingt
        </div><br>
         <form  method="post">
         <div class="form-group">
          <label for="usr">Goods Amount:</label>
          <input name="gdsdepositammount" class="form-controll amount"  value="" placeholder="GDS Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
       <input type="password" class="form-controll" name="gdsdeposit"  value="" placeholder="Spending Password">
      </div>
      <div class="form-group">

        <button name="btngdsdeposit" class="btn btn-success">Deposit</button>
        <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>

<!-- start 14 -->
<div id="id014" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id014').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> Transfer EBT for Trading
        </div><br>
         <form  method="post">
          <div class="form-group">
                <label for="usr">EBT AMOUNT:</label>
                <input name="ebtdepositammount" class="form-controll amount"  value="" placeholder="EBT Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
             <input type="password" class="form-controll" name="ebtdeposit"  value="" placeholder="Spending Password">
            </div>
            <div class="form-group">

       <button name="btnebtdeposit" class="btn btn-success">Deposit</button>
       <div id="error_message"></div>
      </div>
    </form> <br> <br> <br>
    </div>

</div>
<!-- deposite -->
<!-- 15-->
<div id="id015" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id015').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw BTC to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BTC AMOUNT:</label>
                <input  name="btcwithdrawammount"  class="form-controll amount" value="" placeholder="BTC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll" name="btcwithdraw"  value="" placeholder="Spending Password">
            </div><br>
            <small>&nbsp;&nbsp;Note: A fee of 0.001 BTC will be charged for every withdrawl.</small>

            <div class="form-group">
        <button name="btnbtcwithdraw" class="btn btn-danger">Withdraw</button>
        <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>
</div>
<!-- 16 -->
<div id="id016" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id016').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw BCH to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BCH AMOUNT:</label>
               <input  name="bccwithdrawammount" class="form-controll amount" value="" placeholder="BCC Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll" name="bccwithdraw"  value="" placeholder="Spending Password">
            </div>
            <small>Note: A fee of 0.001 BCH will be charged for every withdrawl.</small>
            <div class="form-group">

        <button name="btnbccwithdraw" class="btn btn-danger">Withdraw</button>
        <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 17 -->
<div id="id017" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id017').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw GDS to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">GDS Amount:</label>
                <input  name="gdswithdrawammount" class="form-controll amount" value="" placeholder="GDS Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll" name="gdswithdraw"  value="" placeholder="Spending Password">
            </div>
            <small>&nbsp;&nbsp;Note: A fee of 0.001 GDS will be charged for every withdrawl.</small>
            <div class="form-group">

       <button name="btngdswithdraw" class="btn btn-danger">Withdraw</button>
       <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 18 -->
<div id="id018" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id018').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Withdraw EBT to Wallet
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">EBT Amount</label>
                <input  name="ebtwithdrawammount" class="form-controll amount" value="" placeholder="EBT Amount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="password" class="form-controll" name="ebtwithdraw"  value="" placeholder="Spending Password">
            </div>
            <small>&nbsp;&nbsp;Note: A fee of 0.001 EBT will be charged for every withdrawl.</small>
            <div class="form-group">
       <button name="btnebtwithdraw" class="btn btn-danger">Withdraw</button>
       <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
