@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You don't have enough data. Add at least one set of grades and your preferences. Click
                        the item below that you want to input data to.
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Data Sets</div>
                    <div class="list-group">
                        <a href="/grade/7" class="list-group-item">Grade 7 Final Grades
                        </a>
                        <a href="/grade/8" class="list-group-item">Grade 8 Final Grades

                        </a>
                        <a href="/grade/9" class="list-group-item">Grade 9 Final Grades
                        </a>
                        <a href="/grade/10" class="list-group-item">Grade 10 Final Grades
                        </a>
                        <a href="/ncae" class="list-group-item">National Career Assessment Exam Results
                        </a>
                        <a href="/awards" class="list-group-item">Awards
                        </a>
                        <a href="/preference" class="list-group-item">Preference
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
