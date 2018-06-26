@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row">
      <div class="col-md-9 pull-left">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>{{ $project->name }}</h1>
            <p class="lead">{{ $project->description }}</p>
              {{-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> --}}
            </div>
            <a class="btn btn-primary pull-right btn-sm" href="/projects/create">Create New Project</a>
            <!-- Example row of columns -->

                <form action="{{ route('comments.store')}}" method="POST">
                {{ csrf_field() }}  

                <input type="hidden" name='commentable_type' value='project'>
                <input type="hidden" name='commentable_id' value='{{ $project->id }}'>

                <div class="form-group">
                  <label for="exampleInputPassword1">Comment Here</label>
                  {!! Form::textarea('body','', ['rows'=>'5','class'=>'form-control','placeholder'=>'Enter Comment']) !!}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Url (Proof of work done)</label>
                  {!! Form::textarea('url','', ['rows'=>'3','class'=>'form-control','placeholder'=>'Enter Url/screenshots']) !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>              
            
      <br>
      <h3>Previous Comments</h3>
    
      @foreach($comments as $comment)
      <div class="list-group">
        <div href="#" class="list-group-item ">
          <form method="POST" action="{{ route('comments.destroy',$comment->id)}}" class="float-right">
            {{ method_field('Delete')}}
            {{ csrf_field() }}
            <button >Delete</button>  
          </form>  
          <h4 class="list-group-item-heading">{{ $comment->url }}</h4>
          <p class="list-group-item-text">{{ $comment->body }}</p>
        </div>
      </div>
     
      <br/>      
      @endforeach
      
      </div>  

      <div class="col-md-3 pull-right">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Actions</span>
                {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
              </h4>
              <ul class="list-group mb-3">
                @if($project->user_id == Auth::user()->id)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/projects/{{ $project->id}}/edit">Edit project</a></h6>
                </li>
                @endif

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/companies/{{ $project->company_id }}">My projects</a></h6>
                </li>

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0"><a href="/projects/create">Create New project</a></h6>
                </li>

                @if($project->user_id == Auth::user()->id)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div>
                    <h6 class="my-0">
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            {{-- <input type="hidden" name='company_id' value="{{ $company->id }}"> --}}
                            <button>Delete project</button>
                        </form>                      
                  </div>
                  <span class="text-muted">$8</span>
                </li>
                @endif

              </ul>

            </div>

      </div>  

  
        <!-- Site footer -->
        <footer class="footer">
          <p>© 2018 project, Inc.</p>
        </footer>
  
      </div>
@endsection()