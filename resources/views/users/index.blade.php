<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
       @foreach($users as $user)
           <tr>
               <th scope="row">{{$user->id}}</th>
               <td><a href="/profile/{{$user->id}}">{{$user->name}}</a></td>
               <td>{{$user->email}}</td>
               <td>{{substr($user->role->name,5)}}</td>
               <td>{{$user->created_at}}</td>
               <td>{{$user->updated_at}}</td>
               <td>
                   <a class="btn btn-danger" href="#"><i class="fas fa-trash"></i></a>
                   <a class="btn btn-success" href="#"><i class="fas fa-eye"></i></a>
                   <a class="btn btn-primary" href="#"><i class="fas fa-user-edit"></i></a>
               </td>
           </tr>
       @endforeach
    </tbody>
</table>
