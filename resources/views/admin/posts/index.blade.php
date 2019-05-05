@extends('layouts.app')

@section('content')
     
     <table class="table hover">
     <thead>
          <th>
          Image 
          </th>
          <th>
          Title
          </th>
          <th>
          Status
          </th>
          <th></th>
          <th>
          Action
          </th>
          <th>
          Edit
          </th>
          <th>
          Thrash
          </th>
     </thead>
<tbody>
@if($posts->count()>0)
@foreach($posts as $post)  
<tr>
     <td><img src="{{ $post->featured }}" alt="{{ $post->title}}" width="80px" height="60px"></td>
     <td>{{ $post->title }}</td>
     <td>
     @if($post->status == 0)
        <span class="label label-primary">Pending</span>
        @elseif($post->status == 1)
        <span class="label label-success">Approved</span>
        @elseif($post->status == 2)
        <span class="label label-danger">Rejected</span>
        @else
        <span class="label label-info">Postponed</span>
       @endif
       <td>
       <td><a href="{{action('PostsController@editStatus', $post->id)}}" class="btn btn-xs btn-warning">Moderate</a></td>
     <td><a href="{{route('post.edit',['id'=> $post->id])}}" class="btn btn-xs btn-info">Edit</a></td>
     <td><a href="{{route('post.delete',['id'=> $post->id])}}" class="btn btn-xs btn-danger">Thrash</a></td>   
</tr>
@endforeach
@else
     <tr>
          <th colspan="5" class="text-center">No post</th>
     </tr>
@endif
</tbody>

</table>
  
@stop