<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Problem;
use App\Answer;

class AddVoprController extends Controller
{
    //
    public function show()
    {
      
        return view('addvopr');
    }

    public function addvopr(Request $request){

        $arr_reqvest=$request->all(); 
        $ch=0;
        if(isset($arr_reqvest['ch1']) ){$ch++;}
        if(isset($arr_reqvest['ch2']) ){$ch++;}
        if(isset($arr_reqvest['ch3']) ){$ch++;}
        if(isset($arr_reqvest['ch4']) ){$ch++;}
        if($ch>1 ){$ch=2;}
        if(isset($arr_reqvest['pism']) ){$ch=3;}

       // echo($ch);
        
        $sost=Problem::create([
            'tema' => 'inform',
            'klass' => '9',
            'question' => $arr_reqvest['name'],
            'answer'=>$arr_reqvest['pism'],
            'drawing'=>$arr_reqvest['ris'],
            'view'=>$ch,

        ]); 

        for( $i = 1; $i<5; $i++ ) {
            $right=0;
            $cchh='ch'.$i;
            $ans='ot'.$i;
            if(isset($arr_reqvest[$cchh]) ){$right=1;}
            $answer=$arr_reqvest[$ans];
            if(isset($answer) ){
                Answer::create([
                    'problem_id' => $sost->id,
                    'ansewr' => $answer,
                    'right' => $right,
                    ]);
            }
        }

        echo($sost->id);




      
            dump($request->all());

            if($arr_reqvest['name'] || $arr_reqvest['ris']){

                    echo($arr_reqvest['ris']);
            }

    }

}
