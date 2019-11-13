<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ExecuteController extends Controller
{
    //
    public function execute()
    {//Сформировать Вопросы 



        return view('execute');



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
}
