@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>National Career Assessment Exam Results</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/ncae/edit/{{ $ncae->id }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <style>
                                    .input-group-addon {
                                        width: 185px;
                                    }

                                    .input-group {
                                        width: 100%;
                                    }
                                </style>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Scientific Ability</span>
                                        <input required value="{{ $ncae->scientific_ability }}" name="scientific_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon">Reading Comprehension</span>
                                        <input required value="{{ $ncae->reading_comprehension }}" name="reading_comprehension" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Verbal Ability</span>
                                        <input required value="{{ $ncae->verbal_ability }}" name="verbal_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Mathematical Ability</span>
                                        <input required value="{{ $ncae->mathematical_ability }}" name="mathematical_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Logical Reasoning Ability</span>
                                        <input required value="{{ $ncae->logical_reasoning_ability }}" name="logical_reasoning_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Clerical Ability</span>
                                        <input required value="{{ $ncae->clerical_ability }}" name="clerical_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">Non Verbal Ability</span>
                                        <input required value="{{ $ncae->non_verbal_ability }}" name="non_verbal_ability" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">Visual Manipulative Skill</span>
                                        <input required value="{{ $ncae->visual_manipulative_skill }}" name="visual_manipulative_skill" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">HUMSS</span>
                                        <input required value="{{ $ncae->humss }}" name="humss" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">STEM</span>
                                        <input required value="{{ $ncae->stem }}" name="stem" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">ABM</span>
                                        <input required value="{{ $ncae->abm }}" name="abm" min="0" type="number" step="0.01"
                                               class="form-control">
                                    </div>
                                    <br/>
                                    <button class="btn btn-warning pull-right" style="width: 100%">Save NCAE Results</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop