@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <label for="">Create a Company</label>
                <form action="{{ route('companies.store')}}" method="POST">
                {{ csrf_field() }}  
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  {!! Form::text('name','', ['class'=>'form-control','placeholder'=>'Enter Company Name']) !!}
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Company Description</label>
                  {!! Form::textarea('description','', ['class'=>'form-control','placeholder'=>'Enter Company Description']) !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>            
        </div>
    </div>
</div>    

@endsection()