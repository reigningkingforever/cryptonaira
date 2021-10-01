<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{config('app.name')}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
			<form id="generateAddress" class="contact100-form validate-form" action="{{route('generateAddress')}}" method="POST">@csrf
				<span class="contact100-form-title">
					SEND CRYPTO CURRENCY TO RECEIVE NAIRA 
				</span>
				<div class="w-100 ">
					<h6 >
						@forelse($rates as $rate) 
						1 {{$rate->base_currency->name}}  = {{number_format($rate->amount,2)}} {{$rate->target_currency->name}} | 
						@empty 
							No Currency Exchange Rate available
						@endforelse 
						{{-- 1 Bitcoin  = 500 Naira | 1 Etherum  = 500 Naira | 1 Litecoin  = 500 Naira | 1 USDT  = 500 Naira --}}
					</h6>
				</div>
				{{-- <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Tell us your name *</span>
					<input class="input100" type="text" name="name" placeholder="Enter your name">
				</div> --}}
				<div class="w-100 mb-5"></div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Currency is required">
					<span class="label-input100">Select Currency *</span>
					<select class="input100" name="currency" id="currency" required>
						@foreach ($currencies->where('symbol','!=','NGN') as $currency)
						<option @if($currency->symbol == 'BTC') selected @endif value="{{$currency->symbol}}" data-rate="{{$currency->nairaRate->amount}}">{{$currency->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Amount is required">
					<span class="label-input100">Amount you're sending *</span>
					<input class="input100" type="number" value="0" id="amount" name="amount" placeholder="Amount" required>
					<span class="label-input100">You will receive ₦<span id="target_amount">0</span></span>
					<input type="hidden" name="target_amount" class="target_amount">
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Bank is required">
					<span class="label-input100">Select Bank *</span>
					<select class="input100" name="bank_code" id="bank" required>
						@foreach ($banks as $bank)
						<option value="{{$bank->code}}">{{$bank->name}}</option>
						@endforeach
					</select>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Account number is required">
					<span class="label-input100">Account Number *</span>
					<input class="input100" type="text" name="account_number" id="account_number" placeholder="10 digit account number" required>
					<span id="acccount_name_error" class="label-input100 text-danger" style="display:none;">Something is not right here!</span>
				</div>
				
				<div class="wrap-input100">
					<span class="label-input100">Your Account Name</span>
					<input class="input100" type="text" name="account_name" id="account_name" readonly>
				</div>

				<div class="wrap-input100">
					<span class="label-input100">Email</span>
					<input class="input100" type="email" name="email" placeholder="Email Address" required>
				</div>
				<div class="wrap-input100" id="addressSection" style="display: none;">
					<h4 class="label-input100 text-center">Send Funds to this Address or Scan QR Code to complete transaction</h4>
					<div class="row no-gutters">
						<div class="col-11">
							<input class="input100" type="text" id="address" name="address">
						</div>
						<div class="col-md-1">
							<button class="btn btn-outline-secondary copy" type="button" onclick="copyLinkfn();">Copy</button>
						</div>
					</div>
					
				</div>

				<div class="container-contact100-form-btn" id="buttonSection">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type="submit" class="contact100-form-btn">
							Generate Address <i class="fa" style="font-size: 26px;"></i>
						</button>
					</div>
				</div>
			</form>
		</div>

		<span class="contact100-more">
				Call us on +234 805 330 8425
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
<script>
	// alert($('#bank').val());
	var currency = $('#currency').find("option:selected").val();
	let currency_rate = parseFloat($('#currency').find("option:selected").attr('data-rate'))
	let amount = $('#amount').val();
	let target_amount;
	$('#currency').on('change',function(){
		 currency= $(this).val();
		 currency_rate = parseFloat($(this).find("option:selected").attr('data-rate'));
		 target_amount = currency_rate * parseFloat($(this).val());
		 $('#target_amount').text(target_amount.toFixed(2));
	})
	$('#amount').on('input',function(){
		 amount = parseFloat($(this).val());
		 target_amount = currency_rate * amount;
		 $('#target_amount').text(target_amount.toFixed(2));
		 $('.target_amount').val(target_amount.toFixed(2));
	})
	$('#bank').on('change',function(){
		if($('#account_number').val() != '' && $('#account_number').val().length == 10)
		getAccountName($(this).val(),$('#account_number').val());
	})
	$('#account_number').on('input',function(){
		if($('#bank').val() != '' && $(this).val().length == 10)
		getAccountName($('#bank').val(),$(this).val());
	})
	function getAccountName(bank_code,account_number){
		$.ajax({
			type:'POST',
            dataType: 'json',
            url: "{{route('getAccountName')}}",
            data:{
                '_token' : $('meta[name="csrf-token"]').attr('content'),
                'bank_code': bank_code,
                'account_number': account_number,
            },
            success:function(data) {
                if(data.length != 0){
                    console.log(data);
                    $('#acccount_name_error').hide();
                    $('#account_name').val(data.name);
                }
                else $('#acccount_name_error').show();
            },
            error: function (data, textStatus, errorThrown) {
				$('#acccount_name_error').show();
            console.log(data);
            },
		})
	}
	$("#generateAddress").submit(function(e) {

		//prevent Default functionality
		e.preventDefault();
		$.ajax({
			type:'POST',
			// dataType: 'html',
            url: "{{route('generateAddress')}}",
            data: $('form#generateAddress').serialize(),
			beforeSend:function(){
				$('.fa').addClass('fa-refresh fa-spin mx-3');
			},
			complete:function(){
				$('.fa-refresh').removeClass('fa-refresh fa-spin mx-3');
			},
            success:function(data) {
                $('#buttonSection').hide();
                $('#addressSection').show();
				$('#address').val(data.address);
            },
            error: function (data, textStatus, errorThrown) {
				$('#address_error').show();
            	console.log('something wrong');
            },
		})
	});
	function copyLinkfn() {
		var copyText = document.getElementById("address");
		copyText.select();
		document.execCommand("copy");
	};


</script>

</body>
</html>
