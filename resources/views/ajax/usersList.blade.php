@foreach ($users as $user)
 <tr>
     <td>{{$user->id}}</td>
     <td>{{$user->name}}</td>
     <td>{{$user->email}}</td>
     <td>{{$user->endereco}}</td>
     <td>
     <a href="#" class="btn btn-xs btn-primary" id="view" data="{{$user->id}}">Ver</a>
     <a href="#" class="btn btn-xs btn-warning" id="edit" data="{{$user->id}}">Editar</a>
     <a href="#" class="btn btn-xs btn-danger" id="delete" data="{{$user->id}}">Deletar</a>
     </td>
 </tr>
 @endforeach
