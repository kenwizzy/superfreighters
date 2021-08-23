@extends('layouts.freight')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Weight of Items</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div>
    
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
              <h3 class="card-title">Enter Weight</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
    <form action="{{url('add_weight')}}" method="post">
        @csrf()
        <div class="form-group">
          <label for="mode">Transport Mode:</label>
          <select name="transport_mode_id" class="form-control">
          <option value="">Select Option</option>
          @foreach($transport_mode as $output)
             <option value="{{$output->id}}">{{$output->mode}}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="text" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>

        <button type="submit" class="btn btn-primary">Enter</button>
        </form>
            </div>
        </div>
            </div>
            
            <div class="col-sm-8">
            
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Weights</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                               
              <table id="example2" class="table table-bordered table-hover">
        @if($results->count() > 0)
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Mode</th>
                  <th>Amount/kg</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($results as $key => $data) 
                <tr>
                  <td>{{$key + 1}}</td>
                    <td><a href="{{url('edit_weight',$data['id'])}}">{{$data['transport_mode']['mode']}}</a></td>
                  <td>&#8358;{{number_format($data['amount'],2)}}</td>
                  <td>{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans()}}</td>
                  <td>{{ \Carbon\Carbon::parse($data['updated_at'])->diffForHumans()}}</td>
                  <td>
                     <form id="delete-form-{{$data['id']}}" method="POST" action="{{url('delete_weight', $data['id'])}}" style="display: none;">
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

          </div>
            </div>
        </div>
      </div>
       
@endsection