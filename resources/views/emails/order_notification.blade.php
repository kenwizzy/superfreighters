<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <link rel="icon" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
  <style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}


  
  </style>

  <div>
 <p>Thanks once again for your patronage. </p>


    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h3><span style="color:red;">SUPER</span>FREIGHTERS</h3>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Shipping Details</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Client Name</td>

                <td>{{$order->name}}</td>
            </tr>
            <tr class="item">
                <td>Client Phone Nos</td>

                <td>{{$order->phone_number}}</td>
            </tr>
            <tr class="item">
                <td>Client Email</td>

                <td>{{$order->email}}</td>
            </tr>

            <tr class="item">
                <td>Item Name</td>

                <td>{{$order->item}}</td>
            </tr>
            <tr class="item">
                <td>Shipping Address</td>

                <td>{{$order->address}}</td>
            </tr>

            <tr class="item">
                <td>Shipping Date</td>

                <td>{{$order->shipping_day}}</td>
            </tr>
            <tr class="item">
                <td>Delivery Date</td>

                <td>{{$order->delivery.' days'}} ({{ Carbon\Carbon::now()->addDays($order->delivery+1)->isoFormat('MMMM Do YYYY') }})</td>
            </tr>

            <tr class="heading">
                <td>Item Details</td>
                <td>Price</td>
            </tr>

            <tr class="item">
                <td>Country of origin - <span>{{$order->country}}</span></td>

                <td>&#8358;{{number_format($order->country_price, 2)}}</td>
            </tr>

            <tr class="item">
                <td>Mode of Transport - <span>{{$order->transport_mode}}</span></td>

                <td>&#8358;{{number_format($order->mode_price,2)}}</td>
            </tr>

            <tr class="item">
                <td>Weight - <span>{{$order->weight}}</span>kg</td>

                <td>&#8358;{{number_format($order->weight_price,2)}}</td>
            </tr>

            <tr class="item last">
                <td>Custom Tax (10%)</td>

                <td>&#8358;{{number_format($order->tax,2)}}</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: &#8358;{{number_format($order->total_amount,2)}}</td>
            </tr>
        </table>
    </div>
    </div><br><br>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
</script>

</body>
</html>
