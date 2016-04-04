@extends('layouts.admin')
@section('adminPanel')
    <table class="table table-bordered" >
        <thead>
        <th>User ID</th>
        <th>User</th>
        <th>Alter</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row" class="#">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td><a href="{{ url('admin/users/alter/' . $user->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                @if(!$user->role == 1)
                    <td><a href="{{ url('admin/users/delete/'.$user->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
                @endif
            </tr>
        @endforeach
        <?php echo $users->links(); ?>
        </tbody>
    </table>
@endsection