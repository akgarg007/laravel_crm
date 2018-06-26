@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
      <div class="col-md-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{ $company->name }}</h1>
            <p class="lead">{{ $company->description }}</p>
              {{-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> --}}
            </div>
            <a class="btn btn-primary pull-right btn-sm" href="/projects/create/{{ $company->id }}">Create New Project</a>
            <!-- Example row of columns -->
            <div class="row">
              @foreach ($company->projects as $project) 
              <div class="col-lg-4"> 
              <h2>{{ $project->name }}</h2>
                <p>{{ $project->description }}</p>
              <small>Days to built: {{$project->days}}</small>
              <p><a class="btn btn-primary" href="/projects/{{ $project->id}}" role="button">View details »</a></p>
              </div>
              @endforeach
            </div>        
      </div>  

      <div class="col-md-3 pull-right">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Actions</span>
                {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/companies/{{ $company->id}}/edit">Edit Company</a></h6>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/companies">My Companies</a></h6>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/companies/create">Create New Company</a></h6>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/projects/create/{{ $company->id }}">Add Project</a></h6>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button>Delete Company</button>
                        </form>                      
                  </div>
                  {{-- <span class="text-muted">$8</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0"><a href="">Add New User</a></h6>
                  </div>
                </li>

              </ul>

            </div>

      </div>  

  
        <!-- Site footer -->
        <footer class="footer">
          <p>© 2016 Company, Inc.</p>
        </footer>
  
      </div>
@endsection()