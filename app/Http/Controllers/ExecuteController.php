<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use App\Problem;
use App\Answer;
use App\Rezult;
use DB;

class ExecuteController extends Controller
{
    //
    public function execute()
    {//Сформировать Вопросы 


        echo(Auth::user()->id."<br>");
        echo(Auth::user()->klass."<br>");
        echo(Auth::user()->theme."<br>");


        //добавить условие по классу

        $problem=Problem::where('klass',Auth::user()->klass)
            ->where('tema',Auth::user()->theme)            
            ->get();

        foreach($problem as $problem_id){
            $arr_probl[]=$problem_id->id;
        }

            shuffle($arr_probl);
            
            $i=1;
           //проверка на присутствие записи
           $ups=Rezult::where('user_id',Auth::user()->id)->select('id')->get();
           foreach($ups as $ups_id){} // преобразовываем в массив           
           if(!isset($ups_id)){//Добавляем ученика в базу 
                foreach($arr_probl as $arr_zap){
                Rezult::create([
                        'user_id'=>Auth::user()->id,
                        'date'=>date("y.m.d"),
                        'nom_quest'=>$i,
                        'problem_id'=>$arr_zap,
                    ]);
                    $i++;
                }
           }

           $n_quest=2;
           $rezult=Rezult::where('user_id',Auth::user()->id)// получили id вопроса
                            ->where('nom_quest',$n_quest )          
                            ->value('problem_id');
           //запрашиваем вопросы
           echo($rezult);

           $problem = DB::table('problems')
           ->where('problems.id',$rezult ) 
            ->leftJoin('answers', 'problems.id', '=', 'answers.problem_id')
            ->get();



//dd($problem);









            


/*
$model->create([
    'product_id' => array[$i],
    'value' => $value
]);
        $problem=DB::table('problems')
            ->where('klass',Auth::user()->klass)
            ->where('tema',Auth::user()->theme)
            ->leftJoin('answers', 'problems.id', '=', 'answers.problem_id')
            ->select('problems.id')
            ->get();
*/
        

       


        


        // 1089
            //$question=Question::where('n_ts','1089')->get();
            //dd($question);


                    //return view('execute');



    }










    public function generatePDF()
    {
        $data = [
            'title' => 'Привет сообщение',
            'coment'=>'Тексовое сообщение'
        ];
        $pdf = PDF::loadView('myPDF', $data);
        //return $pdf->download('itsolutionstuff.pdf');
        return $pdf->stream('itsolutionstuff.pdf');
    }
    public function vue()
    {
       
        return view('vue');
    }
}
