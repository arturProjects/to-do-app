@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Lista tasków wszystkich użytkowników</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class="col-md-12"> 
                        <div class="row">
                            <div class="col-md-7">
                            {{ $tasks->links() }}
                            </div>
                            <div class="col-md-2 pull-right">
                                <a href="{{ url('/task/create')}}"><button class="btn btn-primary btn-sm">Dodaj nowy task</button></a>
                            </div>
                        </div> 
                        <div class="row"></div>
                       <table class="table table-striped table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Alphanumeric</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($tasks as $task)
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
                                    <td>
                                        @if($task->user->id == Auth::id())
                                        <a href="{{ url('/task/show/'.$task->id) }}"><button class="btn btn-primary btn-sm">Pokaż</button></a>
                                        @else
                                        <a href="#">-----</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                       </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
