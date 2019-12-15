@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Добавление вопросов') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addvopr') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Вопрос') }}</label>

                            <div class="col-md-10">
                                <input id="vopr" type="text" class="form-control " name="name" value="{{ old('name') }}"  autofocus>
                                
   
   
  

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Ответ1') }} </label>
                
                            <div class="col-md-10">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ch1" value="1">
                                <input id="ot1" type="text" class="form-control " name="ot1" value=""  >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Ответ2') }}</label>

                            <div class="col-md-10">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ch2" value="1">
                                <input id="ot2" type="text" class="form-control " name="ot2" value="" >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Ответ3') }}</label>

                            <div class="col-md-10">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ch3" value="1">
                                <input id="ot3" type="text" class="form-control " name="ot3" value=""  >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Ответ4') }}</label>

                            <div class="col-md-10">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="ch4" value="1">
                                <input id="ot4" type="text" class="form-control " name="ot4" value="" >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Рисунок') }}</label>

                            <div class="col-md-10">
                            
                                <input id="ris" type="text" class="form-control " name="ris" value=""  >


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Писменный ответ') }}</label>

                            <div class="col-md-10">
                            
                                <input id="pism" type="text" class="form-control " name="pism" value=""  >


                            </div>
                        </div>


                     


















                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавление вопроса') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
