@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">Добро пожаловать
                <div class="card-header">{{Auth::user()->fio}}   
                    @if (!empty(Auth::user()->rezult))
                    {{Auth::user()->rezult}} выполнения задания
                    @endif
                
                </div>
                {{Auth::user()->rezult}} 
                {{Auth::user()->id}} 




                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   





                    @if (empty(Auth::user()->rezult))
                    <div class="card-body">
                    <form method="get" action="{{ route('execute') }}">
                        @csrf              
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                            @if (empty(Auth::user()->rezult))          
              
                                <button type="submit" class="btn btn-primary">
                                        {{ __('Выполнить задание') }}
                                </button>
                            @endif 
                            </div>
                            <div class="card-body" id='app'></div>



                        </div>
                    </form>
                    </div>
                    @endif


            </div>
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
