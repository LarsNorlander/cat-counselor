@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <img src="/img/cat.svg">
                        </div>
                        <div class="col-md-6" style="border-left: 3px solid #ffa200; text-align: justify">
                            <p>Huzza! I'm IntelliCat! I'll do my best to help you out and choose which academic
                            track is best for you! Go ahead and register if you haven't or log in. Once that's done, click on dashboard
                            to see where you could input your data and see the results. Hope ya like it!</p>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
