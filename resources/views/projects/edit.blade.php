@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
      <div class="col-md-9 pull-left">

      
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form">
                        <form method="post" action="{{ route('projects.update',[$project->id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">

                        <label for="">Project Name</label>
                        {!! Form::text('name',$project->name, ['class'=>'form-control']) !!}
                        <label for="">Project Description</label>
                        {!! Form::textarea('description',$project->description, ['class'=>'form-control']) !!}
                        
                        {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
                        </form>                         
                    </div>
                </div>
            </div>        
      </div>  

      <div class="col-md-3 pull-right">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Actions</span>
                {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div> 
                    <h6 class="my-0"><a href="/projects/{{ $project->id}}">View Project</a></h6>
                    {{-- <small class="text-muted">Brief description</small> --}}
                  </div>
                  {{-- <span class="text-muted">$12</span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0"><a href="/projects">Projects</a></h6>
                    {{-- <small class="text-muted">Brief description</small> --}}
                  </div>
                  {{-- <span class="text-muted">$8</span> --}}
                </li>


              </ul>

            </div>

      </div>  

  
        <!-- Site footer -->
        <footer class="footer">
          <p>© 2016 Project, Inc.</p>
        </footer>
  
      </div>
@endsection()