@extends('layout.template-base')





@section('titulo')
    Cambiar contraseña
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/pacientes.css') }}">
@endsection

@section('title-form')
        FORMULARIO DE CAMBIO DE CONTRASEÑA
@endsection




@section('contenido')

    @include('layout.template-title-section', [
        'titulo' => 'Cambio de contraseña',
        'links' => []
    ])

        <section class="container my-5">
            <form class="row border shadow d-flex justify-content-evenly flex-wrap form"
                method='POST' action="{{route('login.update', Auth::user()->id)}}">

            @csrf

            @method('PUT')

            <div class="fs-5 px-xl-5 py-2 shadow-form-title border-bottom border-primary border-3">
                @yield('title-form')
            </div>


            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="oldPassword" class="fs-5 d-block mb-1">CONTRASEÑA ACTUAL</label>
                <input type="password" name="oldPassword" id="oldPassword"
                    placeholder="Ingrese su contraseña actual"
                    class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('oldPassword')) border-danger @endif">


                    @foreach ($errors->get('oldPassword') as $message)
                         <p class="text-danger my-2 rounded-lg fs-6">
                            * {{ $message }} </p>
                    @endforeach

            </fieldset>

            <div class="col-auto col-md-6"></div>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="password" class="fs-5 d-block mb-1">NUEVA CONTRASEÑA</label>
                <input type="password" name="password" id="password"
                    placeholder="Ingrese su nueva contraseña"
                    class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('password')) border-danger @endif">


                    @foreach ($errors->get('password') as $message)
                        <p class="text-danger my-2 rounded-lg fs-6">
                            * {{ $message }} </p>
                    @endforeach
            </fieldset>



            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="password_confirmation" class="fs-5 d-block mb-1">REPITA LA CONTRASEÑA</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Repita la contraseña"
                    class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('password')) border-danger @endif">


                    @foreach ($errors->get('password_confirmation') as $message)
                        <p class="text-danger my-2 rounded-lg fs-6">
                            * {{ $message }} </p>
                    @endforeach
            </fieldset>





            </div>

            <div class="container  ms-xl-5 px-xl-4 my-5">
                <a href="{{route('home.view')}}" class="col-12 px-5 px-md-0 col-md-2 btn btn-danger fw-bold fs-5">Cancelar</a>
                <button class="col-12 px-5 px-md-0 col-md-2 ms-md-5 my-4 my-md-0 btn btn-primary fw-bold fs-5">Cambiar</button>
            </div>


            </form>
        </section>


@endsection
