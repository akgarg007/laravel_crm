
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-header text-danger">Companies
                <a href="/companies/create" class="btn btn-danger btn-sm">Create New Company</a>
            </div>
            <div class="card-body">
                <!-- List group -->
                <ul class="list-group">
                  
                  @foreach ($companies as $company)
                  <li class="list-group-item"><a href="/companies/{{ $company->id }}">{{ $company->name }}</a></li>
                  @endforeach
                </ul>
        

            </div>
          </div>      
    </div>  
  </div>
</div>

@endsection()