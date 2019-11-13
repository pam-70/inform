@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">Выполняет задание
                <div class="card-header">{{Auth::user()->fio}}   
                    @if (!empty(Auth::user()->rezult))
                    {{Auth::user()->rezult}} выполнения задания
                    @endif
                
                </div>
                
                {{Auth::user()->id}} 




                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> 








            </div>
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
