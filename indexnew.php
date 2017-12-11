<html>
<head>
    <style type="text/css">.ng-animate.item:not(.left):not(.right){-webkit-transition:0s ease-in-out left;transition:0s ease-in-out left}</style><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}</style>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>BITWire - Wallet for Bitcoin and Bitcoin Cash</title>
        <meta name="description" content="Send, receive and securely store your Bitcoin and Bitcoin Cash. BITWIRE.com wallet is available on web, iOS and Android">

        <link rel="icon" href="wallet/v4-6-1/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="wallet/v4-6-1/favicon.ico" type="image/x-icon">

        <link  href="wallet/v4-6-1/css/app.css" rel="stylesheet">
        <style>
            .owrcoin{
                padding: 15px 5px;
                border-radius: 50%;
                border: 1px solid #006552;
            }
            .margin-top-50{
                margin-top: 50px;
            }
@media (min-width:768px) {
    .bitwiremob {
         margin-top: 0px;
    }
}
 
@media (max-width:480px) {
    .bitwiremob {
         margin-top: 217px;
    }
}
 
 @media (max-width:320px) {
    .bitwiremob {
         margin-top: 217px;
    }
}
   @media (max-width:768px) {
    .bitwiremob {
         margin-top: 217px;
    }
}
             
        </style>

       
    </head>

    <body ng-class="getBodyClasses()" class="network-btc state-app state-app_setup state-app_setup_register">
        <!-- uiView:  -->
        <div class="bodyViewContainer ng-scope" ui-view="">
            <!-- uiView:  -->
            <div class="base-view ng-scope" ui-view="">
                <div class="ng-scope">
    <header class="top-header ng-isolate-scope" mode="'loggedout'">
    <div class="container">
        <div class="logo pull-left">
            <a ng-href="#" target="_self" href="#">
                <img src="wallet/v4-6-1/img/bitwire-final.png"></a>
        </div>

        <div class="pull-right">
            <!-- ngIf: mode == 'loggedout' --><ul class="nav navbar-nav ng-scope" ng-if="mode == 'loggedout'">
                <li ng-class="{'active':$state.is('app.setup.register')}" class="active">
                    <a class="ng-binding" href="signupnew.php">Create Wallet</a>
                </li>
                <li ng-class="{'active':$state.is('app.setup.login')}">
                    <a  class="ng-binding" href="loginnew.php">Sign In</a>
                </li>
            </ul><!-- end ngIf: mode == 'loggedout' -->

            <!-- ngIf: mode == 'loggedin' -->

            <!-- ngIf: mode == 'explorer' -->
        </div>
    </div>
</header>

    <!-- uiView:  --><div ui-view="" class="ng-scope"><landing-page class="ng-scope ng-isolate-scope"><div class="appWrapper landing-page">
    <div class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="login-block-description text-center">
                        <h1 class="ng-binding">One Platform for all world currencies</h1>
                        <p class="ng-binding">Send, receive, and store your funds securely with bitwire wallet.</p>
                        
                    </div>
                </div>

                <div class="col-md-5">
                    <ng-transclude>
    <div class="formContainer ng-scope">
        <form class="form page-blur ng-pristine ng-valid-email ng-invalid ng-invalid-required" name="registerForm" ng-class="{'page-blur-active': isLoading}" novalidate="">
            <!-- ngIf: errMsg -->

            <!--<pre>registerForm.email = {{ registerForm.email | json }}</pre>-->

            <div class="form-group form-group-lg" ng-class="{'has-error': registerForm.email.$dirty &amp;&amp; registerForm.email.$touched &amp;&amp; registerForm.email.$invalid}">
                <label class="control-label ng-binding">
                    Email
                </label>

                <input class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" type="email" placeholder="Email" name="email" ng-model="form.email" required="">

                <!-- ngIf: registerForm.email.$dirty && registerForm.email.$touched && registerForm.email.$invalid -->
            </div>

            <div class="form-group form-group-lg" ng-class="{'has-error': registerForm.password.$dirty &amp;&amp; registerForm.password.$touched &amp;&amp; registerForm.password.$invalid}">
                <label class="control-label ng-binding">Password</label>

                <div class="password-input">
                    <input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" type="password" placeholder="Password" name="password" ng-model="form.password" required="">
                    <div class="password-check text-right">
                        <!-- ngIf: form.passwordCheck && form.passwordCheck.score < 2 -->
                        <!-- ngIf: form.passwordCheck && form.passwordCheck.score == 2 -->
                        <!-- ngIf: form.passwordCheck && form.passwordCheck.score >= 3 -->
                    </div>
                </div>
                <!-- ngIf: form.passwordCheck -->

                <!-- ngIf: registerForm.password.$dirty && registerForm.password.$touched && registerForm.password.$invalid -->
            </div>

            <div class="form-group form-group-lg">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" ng-model="form.termsOfService" class="ng-pristine ng-untouched ng-valid">
                        <p translate="SETUP_TERMS_OF_SERVICE_TEXT" class="ng-scope">I agree to the <a target="_blank" href="#">terms of service</a></p>
                    </label>
                </div>
            </div>

            <div class="form-group form-group-lg form-group-buttons text-center">
                <button class="btn btn-primary form-control ng-binding" ng-click="onSubmitFormRegister(registerForm)">Create new wallet</button>
            </div>

            <!-- Loader overlay -->
            <div class="page-loader" ng-class="{'active': isLoading}">
                <loading-spinner class="ng-isolate-scope"><div class="loading-spinner loading-spinner-"><div class="loading loading-0"></div><div class="loading loading-1"></div><div class="loading loading-2"></div></div></loading-spinner>
            </div>
        </form>
    </div>

    <div class="smallButtons text-center ng-scope">
        <a class="sentence-case ng-binding" ui-sref="app.setup.login" href="loginnew.php"></a><br>
    </div>
</ng-transclude>
                </div>
            </div>
        </div>
    </div>

    <div class="login-block login-block-highlighted">
        <div class="container">
            <div class="row">
               
                <div class="col-sm-12 text-center col-xs-12">
                    <div class="block-content">
                        <h2 class="ng-binding">Stay In Control</h2>
                        <p class="ng-binding">Bitwire empowers you to send and receive payments without trust or permission from any third-party.</p>
                        <p class="ng-binding">Bitwire never has access to all cryptocurrencies equivalent to fiat, and giving you the security, privacy and power to own your wealth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-block-parallax">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="block-content text-center">
                        <p class="ng-binding">Your Crypto. Your Control.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="block-content text-center">
                                <h2 class="ng-binding">Benefits for Your Digital Life</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row iit-15">
                        <div class="col-sm-4 col-xs-12 text-center text-center">
                            <img class="login-icon" ng-src="wallet/v4-6-1/img/1.png" src="wallet/v4-6-1/img/1.png">
                            <p class="ng-binding">Send and receive wires easily and securely</p>
                        </div>
                        <div class="col-sm-4 col-xs-12 text-center text-center">
                            <img class="login-icon" ng-src="wallet/v4-6-1/img/2.png" src="wallet/v4-6-1/img/2.png">
                            <p class="ng-binding">Maintain full control over your wires private keys</p>
                        </div>
                        <div class="col-sm-4 col-xs-12 text-center text-center">
                            <img class="login-icon" ng-src="wallet/v4-6-1/img/3.png" src="wallet/v4-6-1/img/3.png">
                            <p class="ng-binding">Pay friends without QR codes or long addresses</p>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="block-content text-center">
                                <h2 class="ng-binding">The future of fiat currencies in digital way.</h2>
                                <em>The unique fiat-crypto currencies equivalent to their fiat.</em>
                            </div>
                        </div>
                    </div>
          

                    <div class="container">
                        <div class="row margin-top-50">

                         <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">INRW</span></div>
                         <div class="col-md-3 col-xs-3  text-center"><span class="owrcoin ">USDW</span></div>
                         <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">EURW</span></div>
                         <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">GBPW</span></div>
                     
                         </div>
                      <div class="row margin-top-50">
                        <div class="col-md-3 col-xs-3  text-center"><span class="owrcoin ">BRLW</span></div>
                      <div class="col-md-3 col-xs-3 text-center "><span class="owrcoin ">PLNW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">CADW</span></div>
                      <div class="col-md-3 col-xs-3  text-center"><span class="owrcoin ">TRYW</span></div>
                      </div>
                   <div class="row margin-top-50">
                     <div class="col-md-3 col-xs-3  text-center"><span class="owrcoin ">RUBW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">MXNW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">CZKW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">ILSW</span></div>
                     
                    </div>
                   <div class="row margin-top-50">
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">NZDW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">JPYW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">SEKW</span></div>
                      <div class="col-md-3 col-xs-3 text-center"><span class="owrcoin ">AUDW</span></div>
                     </div>
                    </div>  
                </div>
        </div>
    </div>

    <div class="login-block login-block-highlighted">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center bitwiremob">
                    <h2 class="ng-binding">Create your bitwire Wallet</h2>
                    <p>
                        <a ui-sref="app.setup.register" class="btn btn-primary btn-lg ng-binding" href="#/setup/register">Create a new wallet</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</landing-page>
</div>

 
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-3" style="padding-left: 0;">
                <div class="copyright">
                    <div class="bitwire" style="font-size: 20px; color: white;"><b>BITWIRE.COM</b></div><!-- <div class="copyright-logo"></div> -->
                    <div class="copyright-text">&copy; BITWIRE.COM 2017. All Rights Reserved.</div>
                                    </div>
            </div>
            <div class="col-xs-9 links" style="padding-right: 0;">
                <div class="links-column">
                    <div class="links-category">Products</div>
                    <ul class="links-list">
                        <li class="links-list-item"><a target="_blank" href="#">Antminer</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">bitwire.com Pool</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Hashnest</a></li>
                    </ul>
                </div>
                <div class="links-column">
                    <div class="links-category">Company</div>
                    <ul class="links-list">
                        <li class="links-list-item"><a target="_blank" href="#">About us</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Join us</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Contact us</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="links-column">
                    <div class="links-category">Media</div>
                    <ul class="links-list">
                        <li class="links-list-item"><a target="_blank" href="#">Official Weibo</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Community</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Twitter</a></li>
                        <li class="links-list-item"><a target="_blank" href="#">Facebook</a></li>
                    </ul>
                </div>
                <div class="links-column">
                    <div class="links-category">Developers</div>
                    <ul class="links-list">
                        <li class="links-list-item"><a href="api-doc.php">API</a></li>
                    </ul>
                    <ul class="links-list">
                        <li class="links-list-item">
                            <a target="_blank" href="https://bmfeedback.bitmain.com/feedback/app_feedback/?app=BTC.COM&amp;imei=1236456456&amp;lan=en">
                                Feedback</a></li>
                    </ul>
                </div>
                <div class="platform-swtich">
                    <i class="glyphicon glyphicon-phone"></i>
                    <a href="javascript:" onclick="setPlatformCookie()">Mobile Site</a>
                </div>
                <img src="../s.btc.com/explorer/assets/images/app/pc/qr-code%402x_f9a2627.png" style="position: absolute; right: -10px; top: 30px; height:128px">
                </div>
        </div>
    </div>
</footer>
</div>
</div>
</div>

        <script src="wallet/v4-6-1/js/libs.js"></script>

        <script src="wallet/v4-6-1/js/asmcrypto.js"></script>
       

        <script src="wallet/v4-6-1/js/sdk.js"></script>

        <script src="wallet/v4-6-1/js/config.js"></script>

        <script src="wallet/v4-6-1/js/translations.js"></script>

        
       
    

<div id="shadowMeasureIt"></div><div id="divCoordMeasureIt"></div><div id="divRectangleMeasureIt"><div id="divRectangleBGMeasureIt"></div></div></body></html>
