@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add Awards</h3>
                    </div>

                    <div class="panel-body">
                        <form action="/awards" method="POST">
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
                                        <input required name="title" class="form-control">
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <select name="subject_id" class="form-control" id="sel1">
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-md-12">
                                    <button class="btn btn-warning pull-right" style="width: 100%">Add Award</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Awards</div>
                    <div class="list-group">
                        @if(count($awards) == 0)
                            <p class="list-group-item">You don't have any awards yet.</p>
                        @else
                            @foreach($awards as $award)
                                <a href="/award/edit/{{$award->id}}" class="list-group-item">
                                    {{ $award->name }} <span class="pull-right">{{ $award->subject->subject_title }}</span>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
