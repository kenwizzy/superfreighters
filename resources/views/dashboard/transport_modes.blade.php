@extends('layouts.freight')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transport Modes</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    

           @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
           @endif
    
            <div class="row">
            <div class="col-sm-4">  
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
              <h3 class="card-title">Enter Transport Mode</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
    <form action="{{url('add_mode')}}" method="post">
        @csrf()
        <div class="form-group">
          <label for="country">Transport Mode:</label>
          <input type="text" name="mode" class="form-control" value="{{ old('mode')}}">
        </div>
        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <div class="form-group">
          <label for="delivery">Delivery Day:</label>
          <input type="number" name="delivery" class="form-control" value="{{ old('delivery') }}">
        </div>

        <button type="submit" class="btn btn-primary">Enter</button>
        </form>
            </div>
        </div>
            </div>
            
            <div class="col-sm-8">
            
                
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Transport Modes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                               
              <table id="example2" class="table table-bordered table-hover">
        @if($results->count() > 0)
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Mode</th>
                  <th>Amount</th>
                  <th>Delivery Days</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($results as $key => $data) 
                <tr>
                  <td>{{$key + 1}}</td>
                    <td><a href="{{url('edit_mode',$data['id'])}}">{{$data['mode']}}</a></td>
                  <td>{{$data['amount']}}</td>
                  <td>{{$data['delivery']}} {{$data['delivery'] <= 1 ?'Day':'Days'}}</td>
                  <td>{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans()}}</td>
                  <td>{{ \Carbon\Carbon::parse($data['updated_at'])->diffForHumans()}}</td>
                  <td>
                     <form id="delete-form-{{$data['id']}}" method="POST" action="{{url('delete_mode', $data['id'])}}" style="display: none;">
                          @csrf
                          @method('delete')
                     </form>
                     <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this record?')) {event.preventDefault();document.getElementById('delete-form-{{ $data->id }}').submit();
                         }else {
                          event.preventDefault();
                        }">
                     <span class="badge badge-danger">Delete</span>
                    </button>
                  </td>
                </tr>   
            @endforeach   
                      
                </tbody>
            @else

        <h4 style="color:red;">No Record Found</h4>

            @endif      
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            
            
            </div>
            
          
          <!-- /.card -->
            
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    

@endsection