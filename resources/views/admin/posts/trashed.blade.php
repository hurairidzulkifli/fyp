@extends('layouts.app')

@section('content')
     
     <table class="table hover">
     <thead>
          <th>
          Title
          </th>
          <th>
          Image
          </th>
          <th>
          Restore
          </th>
          <th>
          Destroy
          </th>
     </thead>
<tbody>
@if($posts->count() > 0)
@foreach($posts as $post)  
<tr>
     <td>{{ $post->title }}</td>
     <td><img src="{{ $post->featured }}" alt="{{ $post->title}}" width="60px" height="60px"></td>
     <td><a href="{{route('post.restore',['id'=> $post->id])}}" class="btn btn-xs btn-success">Restore</a></td>
     <td><a href="{{route('post.kill',['id'=> $post->id])}}" class="btn btn-xs btn-danger">Delete</a></td>
</tr>
@endforeach
@else
     <tr>
          <th colspan="5" class="text-center">No trashed post</th>
     </tr>
@endif
</tbody>

</table>
  
@stop