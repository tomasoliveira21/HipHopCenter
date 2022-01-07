<?php
$username=$_GET['username'];
$name=$_GET['name'];
$streetName=$_GET['streetName'];
$zipcode=$_GET['zipcode'];
$email=$_GET['email'];
date_default_timezone_set('Europe/Lisbon');
$date = date('m/d/Y h:i:s a', time());
?>
<!DOCTYPE html>
<html>
<!-- Criar front-end fatura -->
<head>
  <style>
	body {
    height: 100%;
    overflow: auto;
    background-color: #FEF9E3;
  }
.receipt-content .logo a:hover {
    text-decoration: none;
    color: #FEF9E3; 
  }
  
  .receipt-content .invoice-wrapper {
    background: #FEF9E3;
    padding: 40px 40px 60px;
    margin-top: 40px;
    border-radius: 4px; 
  }
  
  .receipt-content .invoice-wrapper .payment-details span {
    color: #FEF9E3;
    display: block; 
  }
  .receipt-content .invoice-wrapper .payment-details a {
    display: inline-block;
    margin-top: 5px; 
  }
  
  .receipt-content .invoice-wrapper .line-items .print a {
    display: inline-block;
    border: 1px solid #FEF9E3;
    padding: 13px 13px;
    border-radius: 5px;
    color: #708DC0;
    font-size: 13px;
    -webkit-transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
    -ms-transition: all 0.2s linear;
    -o-transition: all 0.2s linear;
    transition: all 0.2s linear; 
  }
  
  .receipt-content .invoice-wrapper .line-items .print a:hover {
    text-decoration: none;
    border-color: #333;
    color: #333; 
  }
  
  .receipt-content {
    background: #FEF9E3; 
  }
  @media (min-width: 1200px) {
    .receipt-content .container {width: 900px; } 
  }
  
  .receipt-content .logo {
    text-align: center;
    margin-top: 50px; 
  }
  
  .receipt-content .logo a {
    font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
    font-size: 36px;
    letter-spacing: .1px;
    color: #FEF9E3;
    font-weight: 300;
    -webkit-transition: all 0.2s linear;
    -moz-transition: all 0.2s linear;
    -ms-transition: all 0.2s linear;
    -o-transition: all 0.2s linear;
    transition: all 0.2s linear; 
  }
  
  .receipt-content .invoice-wrapper .intro {
    line-height: 25px;
    color: #444; 
  }
  
  .receipt-content .invoice-wrapper .payment-info {
    margin-top: 25px;
    padding-top: 15px; 
  }
  
  .receipt-content .invoice-wrapper .payment-info span {
    color: #A9B0BB; 
  }
  
  .receipt-content .invoice-wrapper .payment-info strong {
    display: block;
    color: #444;
    margin-top: 3px; 
  }
  
  @media (max-width: 767px) {
    .receipt-content .invoice-wrapper .payment-info .text-right {
    text-align: left;
    margin-top: 20px; } 
  }
  .receipt-content .invoice-wrapper .payment-details {
    border-top: 2px solid #EBECEE;
    margin-top: 30px;
    padding-top: 20px;
    line-height: 22px; 
  }
  
  
  @media (max-width: 767px) {
    .receipt-content .invoice-wrapper .payment-details .text-right {
    text-align: left;
    margin-top: 20px; } 
  }
  .receipt-content .invoice-wrapper .line-items {
    margin-top: 40px; 
  }
  .receipt-content .invoice-wrapper .line-items .headers {
    color: #A9B0BB;
    font-size: 13px;
    letter-spacing: .3px;
    border-bottom: 2px solid #EBECEE;
    padding-bottom: 4px; 
  }
  .receipt-content .invoice-wrapper .line-items .items {
    margin-top: 8px;
    border-bottom: 2px solid #EBECEE;
    padding-bottom: 8px; 
  }
  .receipt-content .invoice-wrapper .line-items .items .item {
    padding: 10px 0;
    color: #696969;
    font-size: 15px; 
  }
  @media (max-width: 767px) {
    .receipt-content .invoice-wrapper .line-items .items .item {
    font-size: 13px; } 
  }
  .receipt-content .invoice-wrapper .line-items .items .item .amount {
    letter-spacing: 0.1px;
    color: #84868A;
    font-size: 16px;
   }
  @media (max-width: 767px) {
    .receipt-content .invoice-wrapper .line-items .items .item .amount {
    font-size: 13px; } 
  }
  
  .receipt-content .invoice-wrapper .line-items .total {
    margin-top: 30px; 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .extra-notes {
    float: left;
    width: 40%;
    text-align: left;
    font-size: 13px;
    color: #7A7A7A;
    line-height: 20px; 
  }
  
  @media (max-width: 767px) {
    .receipt-content .invoice-wrapper .line-items .total .extra-notes {
    width: 100%;
    margin-bottom: 30px;
    float: none; } 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
    display: block;
    margin-bottom: 5px;
    color: #454545; 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .field {
    margin-bottom: 7px;
    font-size: 14px;
    color: #555; 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 500; 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
    color: #20A720;
    font-size: 16px; 
  }
  
  .receipt-content .invoice-wrapper .line-items .total .field span {
    display: inline-block;
    margin-left: 20px;
    min-width: 85px;
    color: #84868A;
    font-size: 15px; 
  }
  
  .receipt-content .invoice-wrapper .line-items .print {
    margin-top: 50px;
    text-align: right; 
  }
  
  
  
  .receipt-content .invoice-wrapper .line-items .print a i {
    margin-right: 3px;
    font-size: 14px; 
  }
  
  .receipt-content .footer {
    margin-top: 40px;
    margin-bottom: 110px;
    text-align: right;
    font-size: 12px;
    color: #969CAD; 
  }                      
  </style>
</head>

<body>
<div class="receipt-content">
    <div class="container bootstrap snippets bootdey">
		<div class="row">
			<div class="col-md-12">
				<div class="invoice-wrapper">
					<div class="intro">
						Hi <strong>{{ $username }}</strong>, 
						<br>
						This is the receipt for a payment of <strong>6.99€</strong> (EUR) for 2 year subscription of HipHopCenter
					</div>

					<div class="payment-info">
						<div class="row">
							<div class="col-sm-6">
								<span>Payment No.</span>
								<strong>434334343</strong>
							</div>
							<div class="col-sm-6 text-right">
								<span>Payment Date</span>
								<strong>{{ $date }}</strong>
							</div>
						</div>
					</div>

					<div class="payment-details">
						<div class="row">
							<div class="col-sm-6">
								<span>Client</span>
								<strong>
                                     {{ $name }}
								</strong>
                                <p>
                                Address:
                                </p>
								<p>
                                    {{ $streetName }} <br>
									{{ $zipcode }} <br>
									{{ $email }}  <br>
								</p>
							</div>
						</div>
					</div>

					<div class="line-items">
						<div class="headers clearfix">
							<div class="row">
								<div class="col-xs-4">Description:2 Year Subscription</div>
								<div class="col-xs-5 text-right">Amount:6.99€</div>
							</div>
						</div>
						<div class="items">
							<div class="row item">
								<div class="col-xs-4 desc">
									2 Year Subscription
								</div>
								<div class="col-xs-5 amount text-right">
									6.99€
								</div>
							</div>
						</div>
						<div class="total text-right">
							<p class="extra-notes">
								<strong>Extra Notes</strong>
								You will be notifited 1 week before your subscription expires.
                                Make sure to renew your subscription or your Premium Status will be Downgraded.

							</p>
							<div class="field grand-total">
								Total <span>$6.99</span>
							</div>
						</div>
					</div>
				</div>

				<div class="footer">
					     Copyright © 2022. hiphopcenter
				</div>
			</div>
		</div>
	</div>
</div>                 
</body>
</html>
