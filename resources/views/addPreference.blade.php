@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Academic Track Ranking</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/preference" method="POST">
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
                                <div class="col-md-12">
                                    <h4>Rank the Strands from 1-4 based on your preference. 1 being you first choice and
                                        so on.</h4>
                                    <hr/>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">STEM</span>
                                        <input id="stem" required name="stem" min="1" max="4" type="number"
                                               class="form-control">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon">HUMSS</span>
                                        <input id="humss" required name="humss" min="1" max="4" type="number"
                                               class="form-control">
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">ABM</span>
                                        <input id="abm" required name="abm" min="1" max="4" type="number"
                                               class="form-control">
                                    </div>
                                    <br/>

                                    <div class="input-group">
                                        <span class="input-group-addon">GAS</span>
                                        <input id="gas" required name="gas" min="1" max="4" type="number"
                                               class="form-control">
                                    </div>
                                    <br/>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary pull-right" id="submit" style="width: 100%">Save
                                        Preference
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        $("form").submit(function (e) {
            if (parseInt($("#stem").val()) + parseInt($("#gas").val()) + parseInt($("#humss").val()) + parseInt($("#abm").val()) != 10
            ) {
                alert("No duplicate values!");
                return false;
            }
        })
    </script>
@stop