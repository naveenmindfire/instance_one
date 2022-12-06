@extends('layouts.user')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table" style="border: 1px solid #ebd2d2">
    <thead>
        <tr class="table-warning">
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td class="text-center">
                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('user.destroy', $user->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" style="color:black" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection