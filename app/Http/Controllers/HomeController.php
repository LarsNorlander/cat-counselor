<?php

namespace App\Http\Controllers;

use App\Award;
use App\Grade;
use App\Http\Requests;
use App\Ncae;
use App\Preference;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function compute() {
        $grades = Grade::where('owner_id' , Auth::User()->id)
                       ->get()
        ;
        $ncae = Ncae::where('owner_id' , Auth::User()->id)
                    ->get()
                    ->keyBy('name')
                    ->first()
        ;
        $awards = Award::where('owner_id' , Auth::User()->id)
                       ->with('subject')
                       ->get()
        ;
        $preference = Preference::where('owner_id' , Auth::User()->id)
                                ->get()
                                ->first()
        ;

        if (count($grades) == 0 or count($preference) == 0) {
            return view('lackData');
        }

        $averageGrade = json_decode("{
      \"Math\": 0,
      \"Science\":0,
      \"English\": 0,
      \"Social Studies\":0,
      \"Filipino\": 0,
      \"TLE\":0,
      \"MAPEH\": 0,
      \"Values Education\": 0,
      \"Computer\":0
   }" , true);

        $ncaeMap = json_decode("{
      \"Scientific Ability\": 0,
      \"Reading Comprehension\": 0,
      \"Verbal Ability\": 0,
      \"Mathematical Ability\": 0,
      \"Logical Reasoning Ability\": 0,
      \"Clerical Ability\": 0,
      \"Non Verbal Ability\": 0,
      \"Visual Manipulative Skill\": 0,
      \"HUMSS\": 0,
      \"STEM\": 0,
      \"ABM\": 0
   }" , true);

        $awardMap = json_decode("{
      \"Math\": 0,
      \"Science\":0,
      \"English\": 0,
      \"Social Studies\":0,
      \"Filipino\": 0,
      \"TLE\":0,
      \"MAPEH\": 0,
      \"Values Education\": 0,
      \"Computer\":0
   }" , true);

        $preferenceArray = json_decode($preference->preference , true);

        foreach ($grades as $grade) {
            $averageGrade[ 'Math' ] += $grade->math;
            $averageGrade[ 'Science' ] += $grade->science;
            $averageGrade[ 'English' ] += $grade->english;
            $averageGrade[ 'Social Studies' ] += $grade->social_studies;
            $averageGrade[ 'Filipino' ] += $grade->filipino;
            $averageGrade[ 'TLE' ] += $grade->tle;
            $averageGrade[ 'MAPEH' ] += $grade->mapeh;
            $averageGrade[ 'Values Education' ] += $grade->values;
            $averageGrade[ 'Computer' ] += $grade->computer;
        }

        foreach ($averageGrade as $key => $value) {
            $averageGrade[ $key ] = $value / count($grades);
        }

        foreach ($ncaeMap as $key => $item) {
            $ncaeMap[ $key ] = $ncae[ str_replace(' ' , '_' , strtolower($key)) ];
        }

        foreach ($awards as $award) {
            $awardMap[ $award->subject->subject_title ] += 1;
        }

        foreach ($ncaeMap as $key => $value) {
            if ($value == 0) {
                unset( $ncaeMap[ $key ] );
            }
        }

        foreach ($awardMap as $key => $value) {
            if ($value == 0) {
                unset( $awardMap[ $key ] );
            }
        }

        $requestBodyRaw = [ "grades" => $averageGrade , "preference" => $preferenceArray ];

        if (count($ncaeMap) != 0) {
            $requestBodyRaw[ "ncae" ] = $ncaeMap;
        }

        if (count($awardMap) != 0) {
            $requestBodyRaw[ "awards" ] = $awardMap;
        }

        $options = [
            'http' =>
                [
                    'ignore_errors' => true ,
                    'method'        => 'POST' ,
                    'header'        => "Content-Type: application/json\r\n" ,
                    'content'       => json_encode($requestBodyRaw)
                ] ,
        ];
        $context = stream_context_create($options);
        $response = json_decode(file_get_contents('https://catranker.herokuapp.com/' , false , $context) , true);

        if ($response[ 'preference' ][0] == current(array_keys($response[ 'ranking' ]))) {
            $message = "Huzzah! Your first choice is the best track for you! You could go check the Individual Strand Statistics section
        below to see what you might be able to improve. Remember, there's always room for improvement!";
        } else {
            $message = "Your first choice and best strand don't match. Check out the Individual Strand Statistics section below
            to see what you could improve and what you missed. You could also see why another strand might fit you better since
            the evaluation is based on your skill set.";
        }

        return view('results')
            ->with('results' , $response)
            ->with('message' , $message)
            ;
    }
}
