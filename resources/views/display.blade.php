<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link rel="icon" href="">

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('plugins/css/invoice.css')}}">
</head>
<body>

  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Super Freighters</a>

    <div class="collapse" id="navbarSupportedContent">
    </div>
  </nav>
  <div class="content">
    <div class="container details"><br><br>

</div>
    </div>
  </div><br>

  <div class="invoice">
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

                <td>{{$res['name']}}</td>
            </tr>
            <tr class="item">
                <td>Client Phone Nos</td>

                <td>{{$res['phone']}}</td>
            </tr>
            <tr class="item">
                <td>Client Email</td>

                <td>{{$res['email']}}</td>
            </tr>

            <tr class="item">
                <td>Item Name</td>

                <td>{{$res['item']}}</td>
            </tr>
            <tr class="item">
                <td>Shipping Address</td>

                <td>{{$res['address']}}</td>
            </tr>
            <tr class="item">
                <td>Shipping Date</td>

                <td>{{ Carbon\Carbon::now()->addDay(1)->isoFormat('MMMM Do YYYY') }}</td>
            </tr>
            <tr class="item">
                <td>Delivery Date</td>

                <td>{{$res['delivery'].' days'}} ({{ Carbon\Carbon::now()->addDays($res['delivery']+1)->isoFormat('MMMM Do YYYY') }})</td>
            </tr>

            <tr class="heading">
                <td>Item Details</td>
                <td>Price</td>
            </tr>

            <tr class="item">
                <td>Country of origin - <span>{{$res['country']}}</span></td>

                <td>&#8358;{{number_format($res['country_price'],2)}}</td>
            </tr>

            <tr class="item">
                <td>Mode of Transport - <span>{{$res['transport_mode']}}</span></td>

                <td>&#8358;{{number_format($res['mode_price'],2)}}</td>
            </tr>

            <tr class="item">
                <td>Weight - <span>{{$res['weight']}}</span>kg</td>

                <td>&#8358;{{number_format($res['weight_price'],2)}}</td>
            </tr>

            <tr class="item last">
                <td>Custom Tax (10%)</td>

                <td>&#8358;{{number_format($res['tax'],2)}}</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: &#8358;{{number_format($res['total'],2)}}</td>
            </tr>
        </table>
        @php
        $data = json_encode($array = [
            'delivery' => $res['delivery'],
            'weight_price' => $res['weight_price'],
            'country_price' => $res['country_price'],
            'mode_price' => $res['mode_price'],
            'weight' => $res['weight'],
            'total' => $res['total'],
            'tax' => $res['tax'],
            'country' => $res['country'],
            'transport_mode' => $res['transport_mode'],
            'item' => $res['item'],
            'phone' => $res['phone'],
            'name' => $res["name"], 
            'address'=> $res["address"]
            ]);
        @endphp

<form method="POST" action="{{ url('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    @csrf()
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <input type="hidden" name="email" value="{{$res['email']}}">
            <input type="hidden" name="amount" value="{{$res['total'] * 100}}">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{$data}}"/>
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
            <button type="button" class="btn btn-danger">Cancel</button>   <button type="submit" class="btn btn-primary">Proceed to payment</button>
        </div>
    </div>
</form>
    </div>
    </div><br><br>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <!-- Tether -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

  <!-- Bootstrap 4 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
        $(".btn-danger").on('click', function(){
            window.location = "{{url('/')}}";
        })
    })
</script>
</body>
</html>
