@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Edit Award</h3>
                    </div>

                    <div class="panel-body">
                        <form action="/award/edit/{{$award->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <style>
                                    .input-group {
                                        width: 100%;
                                    }
                                </style>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">Title</span>
                                        <input value="{{$award->name}}" required name="title" class="form-control">
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <select name="subject_id" class="form-control" id="sel1">
                                            @foreach($subjects as $subject)
                                                <option @if($award->subject_id == $subject->id) selected @endif
                                                value="{{ $subject->id }}">{{ $subject->subject_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-md-6">
                                    <button class="btn btn-warning pull-right" style="width: 100%">Save Changes</button>
                                </div>
                                <div class="col-md-6">
                                    <a data-toggle="modal" data-target="#confirmDelete" class="btn btn-danger pull-right" style="width: 100%">Delete Award</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal--}}

    <div id="confirmDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this award? You can't undo this action.</p>
                </div>
                <div class="modal-footer">
                    <form action="/award/delete/{{$award->id}}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Confirm</button>
                        <a class="btn btn-default" data-dismiss="modal">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
