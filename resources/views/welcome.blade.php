<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- <title>Starter Template</title> -->

  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Favicon -->
  <link rel="icon" href="">

  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.min.css" integrity="sha512-PlmS4kms+fh6ewjUlXryYw0t4gfyUBrab9UB0vqOojV26QKvUT9FqBJTRReoIZ7fO8p0W/U9WFSI4MAdI1Zm+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('plugins/css/invoice.css')}}">
<link href="{{asset('plugins/css/notiflix.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <a class="navbar-brand" href="#">Super Freighters</a>
  </nav>

  <div class="content">
    <div class="container details"><br><br>
  <div class="col-md-6" style="margin: auto;">

      @if(session()->has('success'))
         <div class="alert alert-success">
                {!! session()->get('success') !!}
        </div>   
    @endif

     @if(session()->has('errors'))
            @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
            <div class="alert alert-danger">
                {{ $errors }}
             </div>
            @endforeach
            @endif
     @endif

    <form action="{{url('preview')}}" method="post">
        @csrf()
        <div class="form-group">
          <label for="email">Name:</label>
          <input type="text" name="name" class="form-control" id="name" >
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" id="email" >
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="number" name="phone" class="form-control" id="phone" required>
          </div>

          <div class="form-group">
            <label for="item">Item Name:</label>
            <input type="text" name="item" class="form-control" id="item">
          </div>

          <div class="form-group">
            <label for="address">Shipping Address:</label>
            <input type="text" name="address" class="form-control" id="address" required>
          </div>

        <div class="form-group">
            <label for="country">Country of Origin:</label>
            <select name="country" class="form-control" id="country">
               <option value="">Select</option>
               @foreach($countries as $country)
                 <option value="{{$country->id}}">{{$country->name}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Transport_mode">Transport Mode:</label>
            <select name="transport_mode" class="form-control" id="mode" required>
              <option value="">Select</option>
               @foreach($modes as $mode)
                 <option value="{{$mode->id}}">By {{$mode->mode}}</option>
               @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="weight">Item Weight:</label>
            <input type="text" name="weight" class="form-control" id="weight">
            <input type="hidden" name="country_price">
            <input type="hidden" name="mode_price">
            <input type="hidden" name="weight_price">
            <input type="hidden" name="delivery">
            <input type="hidden" name="tax">
            <input type="hidden" name="total">
        </div>

        <button type="submit" class="btn btn-primary enter">Submit</button>
      </form>

</div>
    </div>
  </div><br><br>

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

                <td><p class="nam"></p></td>
            </tr>
            <tr class="item">
                <td>Client Phone Nos</td>

                <td><p class="num"></p></td>
            </tr>
            <tr class="item">
                <td>Client Email</td>

                <td><p class="ema"></p></td>
            </tr>

            <tr class="item">
                <td>Item Name</td>

                <td><p class="it"></p></td>
            </tr>
            <tr class="item">
                <td>Shipping Address</td>

                <td><p class="addr"></p></td>
            </tr>

            <tr class="heading">
                <td>Item Details</td>

                <td>Price</td>
            </tr>

            <tr class="item">
                <td>Country of origin - <span class="coun"></span></td>

                <td><p class="p_coun"></p></td>
            </tr>

            <tr class="item">
                <td>Mode of Transport - <span class="mod"></span></td>

                <td><p class="p_mod"></p></td>
            </tr>

            <tr class="item">
                <td>Weight - <span class="wei"></span>kg</td>

                <td><p class="p_wei"></p></td>
            </tr>

            <tr class="item last">
                <td>Custom Tax (10%)</td>

                <td><p class="tas"></p></td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: <p class="tot"></p></td>
            </tr>
        </table>

        <button type="button" class="btn btn-danger">Cancel</button>   <button type="button" class="btn btn-primary">Proceed to payment</button>

    </div>
    </div><br><br>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <!-- Tether -->
  <script src="{{asset('js/notiflix.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <!-- Bootstrap 4 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function(){
          $('.invoice').hide();
    })

</script>
</body>
</html>
