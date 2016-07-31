@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Grade {{ $level }} Final Average Grades</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/grade/edit/{{ $grade->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <style>
                                    .input-group-addon {
                                        width: 120px;
                                    }

                                    .input-group {
                                        width: 100%;
                                    }
                                </style>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">English</span>
                                        <input required name="english" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->english }}">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon">Science</span>
                                        <input required name="science" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->science }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Math</span>
                                        <input required name="math" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->math }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Filipino</span>
                                        <input required name="filipino" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->filipino }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Social Studies</span>
                                        <input required name="social_studies" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->social_studies }}">
                                    </div>
                                    <br/>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">TLE</span>
                                        <input required name="tle" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->tle }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">MAPEH</span>
                                        <input required name="mapeh" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->mapeh }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Values</span>
                                        <input required name="values" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->values }}">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Computer</span>
                                        <input required name="computer" min="0" type="number" step="0.01"
                                               class="form-control" value="{{ $grade->computer }}">
                                    </div>
                                    <br/>
                                    <button class="btn btn-warning pull-right" style="width: 100%">Save Grades</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop