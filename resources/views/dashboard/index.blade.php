@extends('layouts.freight')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countries}}</h3>

                <p>Countr{{$countries <=1 ?'y':'ies'}} Available</p>
              </div>
              <div class="icon">
                <i class="ion ion-video"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$t_mode}}<sup style="font-size: 20px"></sup></h3>

                <p>Transport Mode{{$t_mode<=1?'':'s'}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$results->count()}}</h3>

                <p>Order{{$results->count() <=1 ?'':'s'}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>Admin User{{$users<=1?'':'s'}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->



        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Orders</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                               
              <table id="example2" class="table-responsive table table-bordered table-hover">
        @if($results->count() > 0)
                <thead>
                <tr>
                  <th>S/n</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Transport Mode</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Item</th>
                  <th>Weight /KG</th>
                  <th>Tax</th>
                  <th>Total Amount</th>
                  <th>Date Ordered</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($results as $key => $data) 
                <tr>
                  <td>{{$key+1 ?? 'Unavailable'}} </td>
                  <td>{{$data['name'] ?? 'Unavailable'}}</td>
                  <td>{{$data['email'] ?? 'Unavailable'}}</td>
                  <td>{{$data['phone_number'] ?? 'Unavailable'}}</td>
                  <td>{{$data['address'] ?? 'Unavailable'}}</td>
                  <td>{{$data['transport_mode'] ?? 'Unavailable'}}</td>
                  <td>{{$data['country'] ?? 'Unavailable'}}</td>
                  <td class="text-success">{{$data['status'] ?? 'Unavailable'}}</td>
                  <td>{{$data['item'] ?? 'Unavailable'}}</td>
                  <td>{{$data['weight'] ?? 'Unavailable'}}</td>
                  <td>{{$data['tax'] ?? 'Unavailable'}}</td>
                  <td>&#8358;{{number_format($data['total_amount'],2) ?? 'Unavailable'}}</td>
                  <td>{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans() ?? 'Unavailable'}}</td>
                </tr>   
            @endforeach   
                      
                </tbody>
            @else

        <h4 style="color:red;">No Record Found</h4>

            @endif      
                </tbody>
              </table>
            </div>

          </div>
            </div>
        </div>
      </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@endsection
