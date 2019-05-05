@extends('layouts.app')

@section('content')
 <!-- display any errors returned from validation check -->
@include('admin.includes.errors')

<div class="panel panel-default">

    <div class="panel-heading">
        Update Tag : {{$tag->tag}}
    </div>

    <div class="panel-body">
        <form action="{{ route('tag.update',['id'=>$tag->id]) }}" method="post"> 
            {{csrf_field()}} <!--  token is used to verify that the authenticated user is the one actually making the requests to the application. -->
            <div class="form-group">
                <label for="title">Tag</label>
                <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
            </div> 

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Tag 
                    </button>
                </div>
            
            </div>

            
        </form>
    
    </div>
    
</div>


@stop