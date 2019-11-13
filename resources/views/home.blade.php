@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Форма регистрации ученика</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (isset($zapr))
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">%</th>
                            <th scope="col">Класс</th>
                            <th scope="col">Фамилия имя</th>
                            <th scope="col">Логин</th>
                            <th scope="col">Пароль</th>
                        </tr>
                        </thead>
                        <tbody>



                   
                        @foreach ($zapr as $user)
                        <tr>
                            <th scope="row">{{$user->rezult}}</th>
                            <td>{{$user->klass}}</td>
                            <td>{{$user->fio}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->password_str}}</td>
                        </tr>


                             
                        @endforeach
                        </tbody>
                        </table>

                    <div class="card-body">
                    <form method="POST" action='#'>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Распечатать список') }}
                                </button>
                        </div>
                        </form>
                    </div>



                    @endif






                    <div class="card-body">
                    <form method="POST" action="{{ route('addsudent') }}">
                        @csrf


                        <div class="form-group row">
                        <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('Фамилия имя') }}</label>

                        <div class="col-md-6">
                                <input id="fio" type="text" class="form-control @error('fio') is-invalid @enderror" name="fio" value="{{ old('fio') }}" required autocomplete="Фамилия имя" >

                                @error('fio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 


                        <div class="form-group row">
                        <label for="klass" class="col-md-4 col-form-label text-md-right">{{ __('Выберите класс') }}</label>
                            <div class="col-md-6">
                                <select id="courses" name="klass" class="form-control">
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>

                                </select>
                            </div> 
                        </div> 
                       


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>






                    

                    Добро пожаловать
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
