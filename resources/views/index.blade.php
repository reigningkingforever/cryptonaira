<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{config('app.name')}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					SEND CRYPTO CURRENCY TO RECEIVE NAIRA 
				</span>
				<div class="w-100 "><p >1 Bitcoin  = 500 Naira | 1 Etherum  = 500 Naira | 1 Litecoin  = 500 Naira | 1 USDT  = 500 Naira</p></div>
				{{-- <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Tell us your name *</span>
					<input class="input100" type="text" name="name" placeholder="Enter your name">
				</div> --}}
				<div class="w-100 mb-5"></div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Select Currency *</span>
					<select class="input100" name="currency">
						@foreach ($currencies as $currency)
						<option value="{{$currency->symbol}}">{{$currency->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Amount you're sending *</span>
					<input class="input100" type="text" name="amount" placeholder="Amount">
					<span class="label-input100">You will receive <span id="converted">₦ 10,000</span></span>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Bank Account *</span>
					<select class="input100" name="bank">
						<option>First Bank</option>
						<option>United Bank of Africa</option>
						<option>Zenith Bank</option>
					</select>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Account Number *</span>
					<input class="input100" type="text" name="account" placeholder="10 digit account number">
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Your Account Name</span>
					<input class="input100" type="text" name="name" readonly>
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Email</span>
					<input class="input100" type="email" name="email" placeholder="Email Address">
				</div>
				{{-- <div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div> --}}

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							Generate Address
						</button>
					</div>
				</div>
			</form>
		</div>

		<span class="contact100-more">
				Call us on +001 345 6178
		</span>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('js/main.js')}}"></script>


</body>
</html>
