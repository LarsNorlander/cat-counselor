<?php

namespace App\Http\Controllers;

use App\Award;
use App\Grade;
use App\Ncae;
use App\Preference;
use App\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DataSetController extends Controller
{
    //
    public function grades($level){
        $grade = Grade::where('owner_id', Auth::User()->id)
        ->where('year', $level)->get()->first();

        if (count($grade) == 0){
            return view('addGrade', compact('level', $level));
        }
//
//        return view('editGrade')
//            ->with('level', $level)
//            ->with('grade', $grade);

        return view('editGrade', ['level'=>$level, 'grade'=>$grade]);
    }

    public function setGrades(Request $request, $level){
        $data = $request->all();
        unset($data['_token']);
        $grade = new Grade($data);
        $grade->year = $level;
        $grade->owner_id = Auth::User()->id;
        $grade->save();

        return redirect('/home');
    }

    public function editGrades(Request $request, Grade $grade){
        $data = $request->all();
        unset($data['_token']);
        $grade->fill($data);
        $grade->save();

        return redirect('/home');
    }

    public function ncae(){
        $ncae = Ncae::where('owner_id', Auth::User()->id)->get()->first();

        if (count($ncae) == 0){
            return view('addNcae');
        }

        return view('editNcae')->with('ncae', $ncae);
    }

    public function setNcae(Request $request){
        $data = $request->all();
        unset($data['_token']);
        $ncae = new Ncae($data);
        $ncae->owner_id = Auth::User()->id;
        $ncae->save();

        return redirect('/home');
    }

    public function editNcae(Request $request, Ncae $ncae){
        $data = $request->all();
        unset($data['_token']);
        $ncae->fill($data);
        $ncae->save();

        return redirect('/home');
    }

    public function preference(){
        $preference = Preference::where('owner_id', Auth::User()->id)->get()->first();

        if (count($preference) == 0){
            return view('addPreference');
        }

        $preferenceArray = array();

        foreach(json_decode($preference->preference, true) as $key => $value){
            $preferenceArray[$value] = $key + 1;
        }

        $preferenceArray['id'] = $preference->id;

        return view('editPreferences')->with('preference',$preferenceArray);
    }

    public function setPreference(Request $request){
        $data = new \SplFixedArray(4);
        $requestData = $request->all();
        unset($requestData['_token']);
        foreach($requestData as $key => $value){
            $data[$value - 1] = $key;
        }
        $preferenceArrayString = array($data[0], $data[1], $data[2], $data[3]);

        $preference = new Preference();
        $preference->preference = json_encode($preferenceArrayString);
        $preference->owner_id = Auth::User()->id;
        $preference->save();

        return redirect("/home");
    }

    public function editPreference(Request $request, Preference $preference){
        $data = new \SplFixedArray(4);
        $requestData = $request->all();
        unset($requestData['_token']);
        foreach($requestData as $key => $value){
            $data[$value - 1] = $key;
        }
        $preferenceArrayString = array($data[0], $data[1], $data[2], $data[3]);

        $preference->preference = json_encode($preferenceArrayString);
        $preference->save();

        return redirect("/home");
    }

    public function awards(){
        $awards = Award::where('owner_id', Auth::User()->id)->with('subject')->orderBy('subject_id')->get();
        $subjects = Subject::all();

        return view('awards')->with('awards', $awards)->with('subjects', $subjects);
    }

    public function oneAward(Award $award){
        $subjects = Subject::all();

        return view('editAward')->with('award', $award)->with('subjects', $subjects);
    }

    public function addAward(Request $request){
        $award = New Award();
        $award->name = $request->title;
        $award->subject_id = $request->subject_id;
        $award->owner_id = Auth::User()->id;
        $award->save();
        return back();
    }

    public function editAward(Request $request, Award $award){
        $award->name = $request->title;
        $award->subject_id = $request->subject_id;
        $award->save();
        return redirect('/awards');
    }

    public function deleteAward(Award $award){
        $award->delete();
        return redirect('/awards');
    }
}
