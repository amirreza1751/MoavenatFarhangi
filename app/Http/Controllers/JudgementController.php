<?php

namespace App\Http\Controllers;

use App\project;
use App\standard;
use App\subScore;
use App\subScoreL2;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JudgementController extends Controller
{
    public function set_grade($id){
        $project = project::find($id);
        if($project->type == "ترویجی") {
            return view('tarvijiSetGrade', compact('project'));
        }
        else
            return "not matched.";
    }
    public function index_grades($id){
//        $referees = User::with( 'role', 'standard')->whereHas('standard', function ($q) use ($id){
//            $q->where('standards.project_id', $id);
//        })->get();
//        $referees = DB::raw('select * from users join roles on users.role_id = roles.id join standards on users.id = standards.user_id where standards.project_id = ?', $id);
//        $referees = User::with('role', 'standard')->where('project_id', $id)->get();
//        $referees = User::with( ['standard' => function ($q){
//            $q->where('standards.project_id', 1);
//        }])->get();
        $referees['pashm'] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.name', 'محمد پشم فروش')
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();

        $referees['fazeli'] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.name', 'محمد فاضلی')
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();

        $referees['mirzayi'] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.name', 'سارا میرزایی')
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();

        $referees['kamari'] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.name', 'علیرضا کمری')
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();

        $referees['jafari'] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->where('users.name', 'پریسا شریعت جعفری')
            ->join('standards', 'users.id', '=', 'standards.user_id')->where('standards.project_id', '=', $id)->select('users.name as username', 'roles.name as rolename', 'standards.*')->get();


//return $referees['pashm']->count();


        return view('finalGrades', compact('referees'));
//        $counter = 0;
//        $i= $counter;
////        while($i<$referees->count()){
//            $myArray['first']['name' . $i] = $referees[$i]->username;
//            $myArray['first']['post' . $i] = $referees[$i]->rolename;
//            $myArray['first']['st_name' . $i] = $referees[$i]->st_name;
//            $myArray['first']['st_grade' . $i] = $referees[$i]->final_score;
//
//        $myArray['first']['name' . $i++] = $referees[$i++]->username;
//        $myArray['first']['post' . $i++] = $referees[$i++]->rolename;
//        $myArray['first']['st_name' . $i++] = $referees[$i++]->st_name;
//        $myArray['first']['st_grade' . $i++] = $referees[$i++]->final_score;
////        }
//            return $myArray;
//        foreach ($referees as $referee){
//            echo $referee->username;
//        }
//        for ($i = 0; $i <= $referees->count(); $i++){
//            $result['pashm'] = $referees[0];
//        }
//        if (!isset($referees[22]))
//        return $referees[1]->username;
//        $result[0] =

        return $referees;
    }

    public function insert_grade(Request $request, $id){
        $user_id = Auth::user()->id;
        $result = standard::where('project_id', $id)->where('user_id', $user_id)->first();

        if ($result != null){
//            return redirect('/projects');
            return redirect('/projects?status=duplicate');
        }

        $standard = standard::create([
                'st_name' => 'کار تیمی',
                'st_coefficient' => $request['teami1']['st_coefficient'],
                'final_score' => $request['teami1']['final_score'],
                'project_id' => $id,
                'user_id' => $user_id
            ]);

         subScore::create([
                'subject' => 'معیار اول',
                'coefficient' => $request['meyarAval2']['coefficient'],
                'sub_score' => $request['meyarAval2']['sub_score'],
                'standard_id' => $standard->id,
            ]);
        $sub_score = subScore::create([
            'subject' => 'معیار دوم',
            'coefficient' => $request['meyarDovom2']['coefficient'],
            'sub_score' => $request['meyarDovom2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScoreL2::create([
            'subject_l2' => 'قبل از برگزاری',
            'coefficient_l2' => $request['ghablAzBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['ghablAzBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'حین از برگزاری',
            'coefficient_l2' => $request['heyneBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['heyneBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'بعد از برگزاری',
            'coefficient_l2' => $request['baadeBargozari3']['coefficient_l2'],
            'sub_score_l2' => $request['baadeBargozari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);
        subScoreL2::create([
            'subject_l2' => 'مشخص بودن کادر اجرایی',
            'coefficient_l2' => $request['kadr3']['coefficient_l2'],
            'sub_score_l2' => $request['kadr3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

         standard::create([
            'st_name' => 'سطح برگزاری',
            'st_coefficient' => $request['level1']['st_coefficient'],
            'final_score' => $request['level1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        $standard = standard::create([
            'st_name' => 'تبلیغات',
            'st_coefficient' => $request['tablighat1']['st_coefficient'],
            'final_score' => $request['tablighat1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'فضای مجازی',
            'coefficient' => $request['faza2']['coefficient'],
            'sub_score' => $request['faza2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'پوستر و بنر و استند',
            'coefficient' => $request['poster2']['coefficient'],
            'sub_score' => $request['poster2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'فایل اصلی',
            'coefficient' => $request['file2']['coefficient'],
            'sub_score' => $request['file2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'خوابگاه و محیط‌های دانشگاهی',
            'coefficient' => $request['khabgah2']['coefficient'],
            'sub_score' => $request['khabgah2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'آیدی کارت',
            'coefficient' => $request['id2']['coefficient'],
            'sub_score' => $request['id2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'بروشور',
            'coefficient' => $request['broshur2']['coefficient'],
            'sub_score' => $request['broshur2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'دعوتنامه اساتید',
            'coefficient' => $request['davatname2']['coefficient'],
            'sub_score' => $request['davatname2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        standard::create([
            'st_name' => 'جذب مخاطب',
            'st_coefficient' => $request['jazb1']['st_coefficient'],
            'final_score' => $request['jazb1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        standard::create([
            'st_name' => 'مدت زمان برگزاری',
            'st_coefficient' => $request['modat1']['st_coefficient'],
            'final_score' => $request['modat1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        $standard = standard::create([
            'st_name' => 'نوآوری و ابتکار',
            'st_coefficient' => $request['noavari1']['st_coefficient'],
            'final_score' => $request['noavari1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);
        subScore::create([
            'subject' => 'در عنوان',
            'coefficient' => $request['darOnvan2']['coefficient'],
            'sub_score' => $request['darOnvan2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'در محتوا',
            'coefficient' => $request['darMohtava2']['coefficient'],
            'sub_score' => $request['darMohtava2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $standard = standard::create([
            'st_name' => 'حامیان مالی و رفاهی',
            'st_coefficient' => $request['hami1']['st_coefficient'],
            'final_score' => $request['hami1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'همکاری استادان و مسئو‌لین',
            'coefficient' => $request['hamkari2']['coefficient'],
            'sub_score' => $request['hamkari2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'ارتباط با صنعت و جامعه',
            'coefficient' => $request['ertebat2']['coefficient'],
            'sub_score' => $request['ertebat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $sub_score = subScore::create([
            'subject' => 'جذب حامی',
            'coefficient' => $request['jazbHami2']['coefficient'],
            'sub_score' => $request['jazbHami2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScoreL2::create([
            'subject_l2' => 'تعداد حامیان',
            'coefficient_l2' => $request['tedadHamian3']['coefficient_l2'],
            'sub_score_l2' => $request['tedadHamian3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'نوع کمک',
            'coefficient_l2' => $request['noeKomak3']['coefficient_l2'],
            'sub_score_l2' => $request['noeKomak3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        $standard = standard::create([
            'st_name' => 'مدعوین ویژه‌ی خارج از دانشگاه',
            'st_coefficient' => $request['madovin1']['st_coefficient'],
            'final_score' => $request['madovin1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'درون دانشگاهی',
            'coefficient' => $request['darunUni2']['coefficient'],
            'sub_score' => $request['darunUni2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $sub_score = subScore::create([
            'subject' => 'برون دانشگاهی',
            'coefficient' => $request['borunUni2']['coefficient'],
            'sub_score' => $request['borunUni2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScoreL2::create([
            'subject_l2' => 'شهری',
            'coefficient_l2' => $request['shahri3']['coefficient_l2'],
            'sub_score_l2' => $request['shahri3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'استانی',
            'coefficient_l2' => $request['ostani3']['coefficient_l2'],
            'sub_score_l2' => $request['ostani3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        subScoreL2::create([
            'subject_l2' => 'کشوری',
            'coefficient_l2' => $request['keshvari3']['coefficient_l2'],
            'sub_score_l2' => $request['keshvari3']['sub_score_l2'],
            'sub_score_id' => $sub_score->id
        ]);

        $standard = standard::create([
            'st_name' => 'برنامه های جانبی',
            'st_coefficient' => $request['barnameJanebi1']['st_coefficient'],
            'final_score' => $request['barnameJanebi1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'غرفه',
            'coefficient' => $request['ghorfe2']['coefficient'],
            'sub_score' => $request['ghorfe2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'نمایشگاه',
            'coefficient' => $request['namayeshgah2']['coefficient'],
            'sub_score' => $request['namayeshgah2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        subScore::create([
            'subject' => 'غیره',
            'coefficient' => $request['gheyre2']['coefficient'],
            'sub_score' => $request['gheyre2']['sub_score'],
            'standard_id' => $standard->id,
        ]);

        $standard = standard::create([
            'st_name' => 'گواهی',
            'st_coefficient' => $request['govahi1']['st_coefficient'],
            'final_score' => $request['govahi1']['final_score'],
            'project_id' => $id,
            'user_id' => $user_id
        ]);

        subScore::create([
            'subject' => 'گواهی معاونت',
            'coefficient' => $request['govahiMoavenat2']['coefficient'],
            'sub_score' => $request['govahiMoavenat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی گروه',
            'coefficient' => $request['govahiGoruh2']['coefficient'],
            'sub_score' => $request['govahiGoruh2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی پژوهشی',
            'coefficient' => $request['govahiPajuheshi2']['coefficient'],
            'sub_score' => $request['govahiPajuheshi2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'گواهی شرکت‌ها',
            'coefficient' => $request['govahiSherkat2']['coefficient'],
            'sub_score' => $request['govahiSherkat2']['sub_score'],
            'standard_id' => $standard->id,
        ]);
        subScore::create([
            'subject' => 'غیره',
            'coefficient' => $request['govahiGheyre2']['coefficient'],
            'sub_score' => $request['govahiGheyre2']['sub_score'],
            'standard_id' => $standard->id,
        ]);


        return redirect('/projects?status=done');




    }

}
