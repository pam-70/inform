<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;

class AddstudentController extends Controller
{// не закончил валидацию


    public function addstudent(Request $request)
    {
        // проверка валидации
        $validaterequest = $request->validate([
            'fio' => 'string|max:155',
            'klass' => 'required',
        ]);

    



    //dd($request);
    //проверка валидации данных затем записать их потом отбразить 
//--------------------------------------
//генерация логина и пароля
function rand9(){
    $Log="";
    $passw=""; 
    $input = array("0", "1", "2", "3", "4","5", "6", "7", "8", "9");

    for ($x=1; $x<10; $x++){
        $rand_keys = array_rand($input, 2);
        $Log=$Log.$input[$rand_keys[0]]; 
    if($x==3){$Log=$Log."*";}
    if($x==6){$Log=$Log."*";} 
    }
    //echo $Log." логин". "\n";
    for ($x=0; $x<4; $x++){
    $rand_keys = array_rand($input, 2);
    $passw=$passw.$input[$rand_keys[0]]; 

    }
    //echo $passw." пароль";
    $rnd['log'] = $Log;
    $rnd['passw'] = $passw;
    return $rnd; 
    }

   
        // $passs=Hash::make('password', ['rounds' => 12]);
        //$passs=Hash::make(12345678);
        $rn=rand9();// создаем логин и пароль
  // echo(Auth::user()->theme);


//генерация окончена
     User::create([
        'name' => $rn['log'],
        'klass' => $request->klass,
        'password' => Hash::make($rn['passw']),
        'fio'=>$request->fio,
        'rukov_id'=>Auth::user()->id,
        'schoola'=>Auth::user()->schoola,
        'email' =>$rn['log'] ,
        'theme'=>Auth::user()->theme,
        'status'=>'student',
        'password_str'=>$rn['passw'],
    ]);












    //$date = DateTime::createFromFormat('d.m.Y \| H:i', '07.09.2019 | 00:00');

    //echo $date->format('d.m.Y'); // 07.09.2018 
     //   $date = "2013-06-17";
     //   echo(date("Y-m-d"));
     //   echo("<br>");
     //   echo(strtotime($date));
     //   echo("<br>");


   // $d1 = strtotime($date); // переводит из строки в дату    

       // $r1=Auth::user()->created_at;

        $r1= strtotime("2020-06-17 19:00:00");
        //$r2=now()->toDateTimeString();
        $r2=now()->toDateTimeString();
      //  if($r2>$r1){echo('max');}else{Echo('min');}


       // echo(Auth::id());
       $zapros=User::where('rukov_id',Auth::user()->id)
        ->orderBy('klass')
       ->get();
        dd($zapros);
        return view('home');
        
      
    }
    public function hom()
    {
        if(Auth::user()->status=='rokov'){
            $zapros=User::where('rukov_id',Auth::user()->id)
            ->orderBy('fio')
            ->get();
        
            return view('home')->with(['zapr' => $zapros]);
        }
        if(Auth::user()->status=='student'){
        
            return view('student');
        }



    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
