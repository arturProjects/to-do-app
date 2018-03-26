@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edycja taska: <b> {{ $task->alphanumeric }}</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class="col-md-12"> 
                       
                       <form method="post" action="{{ url('/task/update') }}">
                       {{ csrf_field() }}
                       <input type="hidden" name="id" value="{{ $task->id }}">
                       <table class="table table-striped table-hover">
                           <tr><td class="col-md-2">Username</td><td class="col-md-10"><b>{{ $task->user->name }}</b></td></tr>
                                <tr><td class="col-md-2">Alphanumeric</td><td class="col-md-10"><input name="alphanumeric" type="text" value="{{ $task->alphanumeric }}" size="100"></td></tr>
                                        <tr><td>Description</td>
                                            <td>
                                                <textarea name="description" cols="100" rows="3">{{ $task->description }}</textarea>
                                            </td></tr>
                                <tr><td>Status</td>
                                    <td><select name="status">
                                            <option value="0">w trakcie</option>
                                            <option value="1">zrealizowane</option>
                                        </select> 
                                    </td>
                                </tr>
                                
                          </table>
                          <div class="row">
                              <div class="col-md-3">
                                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
                              </div>
                          </div>
                       </form>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
