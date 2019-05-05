@extends('layouts.app')

@section('content')
     
     <table class="table hover">
     <thead>
          <th>
          Category Name
          </th>
          <th>
          Editing
          </th>
          <th>
          Deleting
          </th>
     </thead>
<tbody>
@if($tags->count()>0)
@foreach($tags as $tag)
<tr>
     <td>
          {{ $tag->tag }}
     </td>

      <td>
          <a href="{{ route('tag.edit',['id'=>$tag->id ]) }}" class="btn btn-xs btn-info">
               Edit
          </a>

     </td>
     <td>
          <a href="{{ route('tag.destroy',['id'=>$tag->id ]) }}" class="btn btn-xs btn-danger">
               Delete
          </a>

     </td>
</tr>
@endforeach
@else
<tr>
          <th colspan="5" class="text-center">No tag created</th>
     </tr>
@endif
</tbody>

</table>
  
@stop