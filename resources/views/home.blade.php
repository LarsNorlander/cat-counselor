@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Results</div>

                    <div id="computation" class="panel-body">

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

@section('script')
<script>
    $(document).ready(function(){
        $.ajax({
            url: '/compute',
            success: function(data){
                $('#computation').html(data)
            }
        })
    })
</script>
@endsection
