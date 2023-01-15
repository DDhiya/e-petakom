<?php

$logged_user = session()->get('logged_user');
$username = session()->get('username');
$roles = session()->get('role');

?>

@extends('layouts.main-proposalreport')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Proposal & Report</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/proposalreport') }}" class="btn btn-success btn-sm" title="Add New Proposal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New Proposal
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Author</th>
                                        <th>MatricID</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prop as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Author }}</td>
                                        <td>{{ $item->MatricID }}</td>
                                        <td>{{ $item->Title }}</td>
                                        <td>
                                            <a href="{{ url('/proposalreport/' . $item->id) }}" title="View Proposal"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/proposalreport/' . $item->id . '/edit') }}" title="Edit Proposal"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/proposalreport' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection