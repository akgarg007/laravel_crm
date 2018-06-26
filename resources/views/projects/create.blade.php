@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <label for="">Create a Company</label>
                <form action="{{ route('projects.store')}}" method="POST">
                {{ csrf_field() }}  
                

                <div class="form-group">
                  <input type="hidden" name = "company_id" value= "{{$company_id}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Project Name</label>
                  {!! Form::text('name','', ['class'=>'form-control','placeholder'=>'Enter Company Name']) !!}
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Project Description</label>
                  {!! Form::textarea('description','', ['class'=>'form-control','placeholder'=>'Enter Company Description']) !!}
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>            
        </div>
    </div>
</div>    

@endsection()