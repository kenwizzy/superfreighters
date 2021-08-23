@extends('layouts.freight')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Countries</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    

           @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
           @endif
    
            <div class="row">
            <div class="col-sm-6">  
            @if(session()->has('errors'))
            @if(count($errors) > 0)
            @foreach($errors->all() as $errors)
            <div class="alert alert-danger">
                {{ $errors }}
             </div>
            @endforeach
            @endif
     @endif
            <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Update Countries</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
    <form action="{{url('update_country', $country['id'])}}" method="post">
         @method('PATCH')
        @csrf()
        <div class="form-group">
          <label for="country">Country Name:</label>
          <input type="text" name="name" value="{{$country['name']}}" class="form-control" value="{{ old('email')}}">
          {{--  --}}
        </div>

        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="text" name="amount" value="{{$country['amount']}}" class="form-control" value="{{ old('amount') }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
        </div>
            </div>
      </div>
@endsection