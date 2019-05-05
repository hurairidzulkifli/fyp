@extends('layouts.app')

@section('content')
     
     <table class="table hover">
     <thead>
          <th>
          Image 
          </th>
          <th>
          Name
          </th>
          <th>
          User Type
          </th>
          <th>
          Delete
          </th>
     </thead>
<tbody>
     @if($users->count()>0)
     @foreach($users as $user)  
<tr>
     <td>
          <img src="" alt="Avatar" width="60px" height="60px" style="border-radius:50%;">
     </td>
     <td>
          {{$user->name}}
     </td>
     <td>
          @if($user->admin)
          Admin

          @else
              User
          @endif
     </td>
     <td>
         @if(Auth::id()!=$user->id)
         <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-xs btn-success">Delete</a>
         @endif
     </td>
</tr>
     @endforeach
     @else
<tr>
          <th colspan="5" class="text-center">No users</th>
     </tr>
@endif
</tbody>

</table>
  
@stop