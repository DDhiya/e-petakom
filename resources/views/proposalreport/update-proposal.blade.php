<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

@extends('layouts.main-proposal&report')
@section('content')
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('proposal/' .$proposal->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$proposal->id}}" id="id" />
        <label>Author</label></br>
        <input type="text" name="Author" id="Author" value="{{$proposal->Author}}" class="form-control"></br>
        <label>MatricID</label></br>
        <input type="text" name="MatricID" id="MatricID" value="{{$proposal->MatricID}}" class="form-control"></br>
        <label>Title</label></br>
        <input type="text" name="Title" id="Title" value="{{$proposal->Title}}" class="form-control"></br>
        <label>File</label></br>
        <input type="text" name="File" id="File" value="{{$proposal->File}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop