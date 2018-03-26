@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Task przypisany do {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                     
                    <div class="col-md-12"> 
                        
                       <table class="table table-striped table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Alphanumeric</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                
                                <tr>
                                    <td>{{ $task->user->name }}</td>
                                    <td>{{ $task->alphanumeric }}</td>
                                    <td>@if($task->status == 0)
                                        <button class="btn btn-danger btn-sm"> W trakcie </button>
                                        @else
                                        <button class="btn btn-success btn-sm">Wykonane</button>
                                        @endif
                                    </td> 
                                    <td>{{ $task->created_at }}</td>
                                    <td><a href="{{ url('/task/edit/'.$task->id) }}"><button class="btn btn-primary btn-sm">Edytuj</button></a> 
                                        <a href="{{ url('/task/destroy/'.$task->id) }}"><button class="btn btn-danger btn-sm">Usuń</button></a>
                                    </td>
                                </tr>
                                
                       </table>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
