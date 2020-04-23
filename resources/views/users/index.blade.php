<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
       @foreach($users as $user)
           <tr>
               <th scope="row">{{$user->id}}</th>
               <td>{{$user->name}}</td>
               <td>{{$user->email}}</td>
               <td>{{substr($user->role->name,5)}}</td>
               <td>{{$user->created_at}}</td>
               <td>{{$user->updated_at}}</td>
           </tr>
       @endforeach
    </tbody>
</table>
