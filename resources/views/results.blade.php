<style>
    .badge {
        background-color: #ffa200;
    }

    .pull-right {
        padding-right: 10px;
    }
</style>

<h3>Ranking</h3>
<hr/>
<div class="row">
    <div class="col-md-6">
        <h4>Your Results<span class="pull-right">Score</span></h4>
        <ul class="list-group">
            @foreach($results['ranking'] as $key => $value)
                <li class="list-group-item">
                    {{strtoupper($key)}}
                    <span class="badge">{{ $value['score'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-6">
        <h4>Your Preference<span class="pull-right">Rank</span></h4>
        <ul class="list-group">
            @foreach($results['preference'] as $key)
                <li class="list-group-item">
                    {{strtoupper($key)}}
                    <span class="badge">{{ array_search($key, $results['preference']) + 1 }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<h3>Student Strengths</h3>
<hr/>
<div class="row">
    <div class="col-md-4">
        <h4>Grades</h4>
        <ul class="list-group">
            @foreach($results['strengths']['grades'] as $sGrade)
                <li class="list-group-item">{{ $sGrade }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-4">
        <h4>NCAE</h4>
        <ul class="list-group">
            @if(array_key_exists('ncae', $results['strengths']))
                @foreach($results['strengths']['ncae'] as $sGrade)
                    <li class="list-group-item">{{ $sGrade }}</li>
                @endforeach
            @else
                <li class="list-group-item">NCAE not encoded.</li>
            @endif
        </ul>
    </div>
    <div class="col-md-4">
        <h4>Awards</h4>
        <ul class="list-group">
            @if(array_key_exists('awards', $results['strengths']))
                @foreach($results['strengths']['awards'] as $sGrade)
                    <li class="list-group-item">{{ $sGrade }}</li>
                @endforeach
            @else
                <li class="list-group-item">No awards encoded.</li>
            @endif
        </ul>
    </div>
</div>

<h3>Individual Strand Statistics</h3>
<hr/>

<div class="row">
    @foreach($results['ranking'] as $key => $value)
        <div class="col-md-3">
            <h4>{{ strtoupper($key) }}</h4>
            <hr/>
            <ul class="list-group">
                <li data-toggle="collapse" data-target="#{{ $key."_gradesIntersect" }}" class="list-group-item">Grades
                    Match
                    <span class="badge">{{count($results['ranking'][$key]['gradesIntersect'])}}</span></li>
            </ul>

            <ul id="{{ $key."_gradesIntersect" }}" class="list-group collapse">
                @if(count($results['ranking'][$key]['gradesIntersect']) != 0)
                    @foreach($results['ranking'][$key]['gradesIntersect'] as $item)
                        <li class="list-group-item">{{ $item }}</li>
                    @endforeach
                @else
                    <li class="list-group-item">None</li>
                @endif
            </ul>

            <ul class="list-group">
                <li data-toggle="collapse" data-target="#{{ $key."_gradesDifference" }}" class="list-group-item">Grades
                    Miss
                    <span class="badge">{{count($results['ranking'][$key]['gradesDifference'])}}</span></li>
            </ul>

            <ul id="{{ $key."_gradesDifference" }}" class="list-group collapse">
                @if(count($results['ranking'][$key]['gradesDifference']) != 0)
                    @foreach($results['ranking'][$key]['gradesDifference'] as $item)
                        <li class="list-group-item">{{ $item }}</li>
                    @endforeach
                @else
                    <li class="list-group-item">None</li>
                @endif
            </ul>
            @unless((count($results['ranking'][$key]['ncaeIntersect']) == count($results['ranking'][$key]['ncaeDifference']))
            && count($results['ranking'][$key]['ncaeDifference']) == 0)
                <br/>
                <hr/>
                <br/>

                <ul class="list-group">
                    <li data-toggle="collapse" data-target="#{{ $key."_ncaeIntersect" }}" class="list-group-item">NCAE
                        Match
                        <span class="badge">{{count($results['ranking'][$key]['ncaeIntersect'])}}</span></li>
                </ul>
                <ul id="{{ $key."_ncaeIntersect" }}" class="list-group collapse">
                    @if(count($results['ranking'][$key]['ncaeIntersect']) != 0)
                        @foreach($results['ranking'][$key]['ncaeIntersect'] as $item)
                            <li class="list-group-item">{{ $item }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">None</li>
                    @endif
                </ul>
                <ul class="list-group">
                    <li data-toggle="collapse" data-target="#{{ $key."_ncaeDifference" }}" class="list-group-item">NCAE
                        Miss
                        <span class="badge">{{count($results['ranking'][$key]['ncaeDifference'])}}</span></li>
                </ul>
                <ul id="{{ $key."_ncaeDifference" }}" class="list-group collapse">
                    @if(count($results['ranking'][$key]['ncaeDifference']) != 0)
                        @foreach($results['ranking'][$key]['ncaeDifference'] as $item)
                            <li class="list-group-item">{{ $item }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">None</li>
                    @endif
                </ul>
            @endunless
            @unless(
            (count($results['ranking'][$key]['awardsIntersect']) ==
            count($results['ranking'][$key]['awardsDifference'])) && count($results['ranking'][$key]['awardsIntersect']) == 0)
                <br/>
                <hr/>
                <br/>
                <ul class="list-group">
                    <li data-toggle="collapse" data-target="#{{ $key."_awardsIntersect" }}" class="list-group-item">
                        Awards
                        Match
                        <span class="badge">{{count($results['ranking'][$key]['awardsIntersect'])}}</span></li>
                </ul>
                <ul id="{{ $key."_awardsIntersect" }}" class="list-group collapse">
                    @if(count($results['ranking'][$key]['awardsIntersect']) != 0)
                        @foreach($results['ranking'][$key]['awardsIntersect'] as $item)
                            <li class="list-group-item">{{ $item }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">None</li>
                    @endif
                </ul>
                <ul class="list-group">
                    <li data-toggle="collapse" data-target="#{{ $key."_awardsDifference" }}" class="list-group-item">
                        Awards
                        Miss
                        <span class="badge">{{count($results['ranking'][$key]['awardsDifference'])}}</span></li>
                </ul>
                <ul id="{{ $key."_awardsDifference" }}" class="list-group collapse">
                    @if(count($results['ranking'][$key]['awardsDifference']) != 0)
                        @foreach($results['ranking'][$key]['awardsDifference'] as $item)
                            <li class="list-group-item">{{ $item }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item">None</li>
                    @endif
                </ul>
            @endunless
        </div>
    @endforeach
</div>

