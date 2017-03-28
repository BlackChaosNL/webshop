@extends('layouts.admin')
@section('adminPanel')
    <table class="table table-bordered" >
        <thead>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Category Parent</th>
        <th>Alter</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row" class="#">{{ $category->id }}</th>
                <td>{{ $category->cat_name }}</td>
                <td>{{ $category->cat_parent }}</td>
                <td><a href="{{ url('admin/categories/alter/' . $category->id) }}"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td><a href="{{ url('admin/categories/delete/'. $category->id) }}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        @endforeach
        {{ $categories->links() }}
        <a href="{{ url('admin/categories/add') }}" class="btn btn-raised" >Add</a>
        </tbody>
    </table>
@endsection