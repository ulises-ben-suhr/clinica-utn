@extends('layout.template-base')



{{--
    Cuando existe un paciente la ruta puede ser SHOW o EDIT
    Cuando no existe el paciente habra que comprobar si estamos en la ruta CREATE
--}}
@if (isset($paciente) || isset($create))

    @section('titulo')
        Paciente
    @endsection

    @section('styles')
        <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/pacientes.css') }}">
    @endsection

    @if (isset($show))

        @section('title-form') FORMULARIO DE INFORMACIÓN DE USUARIO @endsection
        @section('botones')
        <div class="container  ms-xl-5 px-xl-4 my-5">
            <button class="col-12 px-5 px-md-0 col-md-2 btn btn-primary fw-bold fs-5">Editar</button>
        </div>
        @endsection

    @elseif (isset($edit))
        @section('title-form') FORMULARIO DE MODIFICACIÓN DE DATOS @endsection
        @section('botones')
            <div class="container  ms-xl-5 px-xl-4 my-5">
                <a href="{{ route('pacientes.show',$paciente->id) }}" class="col-12 px-5 px-md-0 col-md-2 btn btn-danger fw-bold fs-5">Cancelar</a>
                <button class="col-12 px-5 px-md-0 col-md-2 ms-md-5 my-4 my-md-0 btn btn-primary fw-bold fs-5">Guardar</button>
            </div>
        @endsection

    @elseif (isset($create))

        @section('title-form') FORMULARIO DE CREACIÓN DE PACIENTE @endsection
        @section('botones')
            <div class="container  ms-xl-5 px-xl-4 my-5">
                <a href="{{ route('pacientes.index') }}" class="col-12 px-5 px-md-0 col-md-2 btn btn-danger fw-bold fs-5">Cancelar</a>
                <button class="col-12 px-5 px-md-0 col-md-2 ms-md-5 my-4 my-md-0 btn btn-primary fw-bold fs-5">Crear</button>
            </div>
        @endsection

    @endif



    @section('contenido')
        @include('layout.template-title-section', [
            'titulo' => $titulo,
            'links' => [
                (object) array(
                    'titulo' => 'Inicio',
                    'ruta' => 'home.view'
                ),
                (object) array(
                    'titulo' => 'Pacientes',
                    'ruta' => 'pacientes.index'
                ),
                (object) array(
                    'titulo' => $seccion,
                    'ruta' => '#'
                ),
            ]
        ])

        <section class="container">
            <form class="row shadow border d-flex justify-content-evenly flex-wrap form" @if (isset($show)) method='GET' action="{{route('pacientes.edit', $paciente->id)}}"
            @elseif (isset($edit)) method="POST" action="{{route('pacientes.update', $paciente->id)}}"
            @elseif (isset($create)) method="POST" action="{{route('pacientes.store')}}" @endif>

            @if (isset($edit))
                @method('PUT')
            @endif

            @if(isset($create) || isset($edit))
                @csrf
            @endif

            <div class="fs-5 px-xl-5 py-2 shadow-form-title border-bottom border-primary border-3">
                @yield('title-form')
            </div>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="nombre" class="fs-5 mb-1">NOMBRE COMPLETO</label>
                <div class="input__form d-flex @if($errors->has('nombre')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_user.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre completo"
                        class="outline-0 border-0 ht-48 w-100 fs-5 ps-2"
                            @if (isset($show) || isset($edit))
                                value="{{$paciente->nombre}}"
                            @else
                                value="{{ old('nombre')}}"
                            @endif
                            @if(isset($show))
                                disabled
                            @endif
                        >
                </div>
                @foreach ($errors->get('nombre') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="apellido" class="fs-5 d-block mb-1">APELLIDO</label>
                <input type="text" name="apellido" id="apellido"
                    placeholder="Ingrese su apellido"
                    class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('apellido')) border-danger @endif"
                    @if (isset($show) || isset($edit))
                        value="{{$paciente->apellido}}"
                    @else
                        value="{{ old('apellido')}}"
                    @endif
                    @if(isset($show))
                        disabled
                    @endif>

                    @foreach ($errors->get('apellido') as $message)
                        <p class="text-danger my-2 rounded-lg fs-6">
                            * {{ $message }}
                        </p>
                    @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="email" class="fs-5 mb-1">EMAIL</label>
                <div class="input__form d-flex @if($errors->has('email')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_email.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="email" name="email" id="email" placeholder="Por ejemplo, tucorreo@gmail.com" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2"
                        @if (isset($show) || isset($edit))
                            value="{{$paciente->email}}"
                        @else
                            value="{{ old('email')}}"
                        @endif
                        @if(isset($show))
                            disabled
                        @endif
                    >
                </div>
                @foreach ($errors->get('email') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="genero" class="fs-5 d-block mb-1">GENERO</label>
                <select type="text" name="genero" id="genero" placeholder="Ingrese su nombre"
                class="input__form fs-5 ps-2 w-100 outline-0 input__form @if($errors->has('genero')) border-danger @endif"
                @if(isset($show)) disabled @endif>
                    <option value="">Eliga una opción...</option>
                    <option @if(isset($paciente) && $paciente->genero == 'Masculino') selected @endif value="Masculino">Masculino</option>
                    <option @if(isset($paciente) && $paciente->genero == 'Femenino') selected @endif value="Femenino">Femenino</option>
                    <option @if(isset($paciente) && $paciente->genero == 'Otro') selected @endif value="Otro">Otro</option>
                </select>
                @foreach ($errors->get('genero') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="dni" class="fs-5 mb-1">DNI</label>
                <div class="input__form d-flex @if($errors->has('dni')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_dni.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input name="dni" id="dni" type="text" placeholder="Tú DNI" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2"
                        @if (isset($show) || isset($edit))
                            value="{{$paciente->dni}}"
                        @else
                            value="{{ old('dni')}}"
                        @endif
                        @if(isset($show))
                            disabled
                        @endif
                    >
                </div>
                @foreach ($errors->get('dni') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="f_nacimiento" class="fs-5 d-block mb-1">NACIMIENTO</label>
                <input type="date" name="f_nacimiento" id="f_nacimiento" placeholder="Ingrese su nombre"
                class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('f_nacimiento')) border-danger @endif"
                @if (isset($show) || isset($edit))
                    value="{{$paciente->f_nacimiento}}"
                @else
                    value="{{ old('f_nacimiento')}}"
                @endif
                @if(isset($show))
                    disabled
                @endif
                >
                @foreach ($errors->get('f_nacimiento') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="telefono" class="fs-5 mb-1">NÚMERO DE CELULAR</label>
                <div class="input__form d-flex @if($errors->has('telefono')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_phone.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" name="telefono" id="telefono" placeholder="11 XXXX-XXXX" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2"
                        @if (isset($show) || isset($edit))
                            value="{{$paciente->telefono1}}"
                        @else
                            value="{{ old('telefono')}}"
                        @endif
                        @if(isset($show))
                            disabled
                        @endif
                >
                </div>
                @foreach ($errors->get('telefono') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="calle" class="fs-5 mb-1">NOMBRE DE CALLE</label>
                <div class="input__form d-flex @if($errors->has('calle')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_map.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <input type="text" name="calle" id="calle" placeholder="Por ejemplo, 25 de mayo" class="outline-0 border-0 ht-48 w-100 fs-5 ps-2"
                        @if (isset($show) || isset($edit))
                            value="{{$paciente->calle}}"
                        @else
                            value="{{ old('calle')}}"
                        @endif
                        @if(isset($show))
                            disabled
                        @endif>
                </div>
                @foreach ($errors->get('calle') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="n_calle" class="fs-5 d-block mb-1">NÚMERO</label>
                <input type="text" name="n_calle" id="n_calle" placeholder="N° Domicilio"
                class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('n_calle')) border-danger @endif"
                @if (isset($show) || isset($edit))
                    value="{{$paciente->n_calle}}"
                @else
                    value="{{ old('n_calle')}}"
                @endif
                @if(isset($show))
                    disabled
                @endif
                >

                @foreach ($errors->get('n_calle') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="localidad" class="fs-5 d-block mb-1">LOCALIDAD</label>
                <input type="text" name="localidad" id="localidad" placeholder="Lanús, Lomas..."
                class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('localidad')) border-danger @endif"
                @if (isset($show) || isset($edit))
                    value="{{$paciente->localidad}}"
                @else
                    value="{{ old('localidad')}}"
                @endif
                @if(isset($show)) disabled @endif >

                @foreach ($errors->get('localidad') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-6 mt-4 px-xl-5">
                <label for="obrasocial" class="fs-5 mb-1">OBRA SOCIAL</label>
                <div class="input__form d-flex @if($errors->has('obrasocial')) border-danger @endif">
                    <div class="input-icon d-flex justify-content-center align-items-center">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/form_paciente/form_obrasocial.svg') }}"
                        alt="icono de correo electronico" class="">
                    </div>
                    <select type="text" name="obrasocial" id="obrasocial" placeholder="Eliga su obra social" class="border-0 fs-5 ps-2 w-100 outline-0"
                    @if(isset($show)) disabled @endif>
                        <option value="">Eliga una obra social...</option>
                        @foreach ($obrasSociales as $obraSocial)
                            <option @if(isset($paciente) && $paciente->os_nombre == $obraSocial->nombre) selected @endif
                                value="{{$obraSocial->id}}">{{$obraSocial->nombre}}</option>
                        @endforeach
                    </select>

                </div>

                @foreach ($errors->get('obrasocial') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="categoria_os" class="fs-5 d-block mb-1">PLAN</label>
                <input type="text" name="categoria_os" id="categoria_os" placeholder="Tú plan"
                class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('categoria_os')) border-danger @endif"
                    @if (isset($show) || isset($edit))
                        value="{{$paciente->categoria_os}}"
                    @else
                        value="{{ old('categoria_os')}}"
                    @endif

                    @if(isset($show)) disabled @endif
                    >
                    @foreach ($errors->get('categoria_os') as $message)
                        <p class="text-danger my-2 rounded-lg fs-6">
                            * {{ $message }}
                        </p>
                    @endforeach

            </fieldset>

            <fieldset class="col-md-3 mt-4 px-xl-5">
                <label for="numero_afiliado" class="fs-5 d-block mb-1">N° DE SOCIO</label>
                <input type="text" name="numero_afiliado" id="numero_afiliado" placeholder="Tú N° de Socio"
                class="input__form fs-5 ps-2 outline-0 w-100 @if($errors->has('numero_afiliado')) border-danger @endif"
                    @if (isset($show) || isset($edit))
                        value="{{$paciente->numero_afiliado}}"
                    @else
                        value="{{ old('numero_afiliado')}}"
                    @endif
                    @if(isset($show))
                        disabled
                    @endif
                >
                @foreach ($errors->get('numero_afiliado') as $message)
                    <p class="text-danger my-2 rounded-lg fs-6">
                        * {{ $message }}
                    </p>
                @endforeach
            </fieldset>


            @yield('botones')


        </form>
        </section>


    @endsection

    @section('scripts')

    @endsection


{{-- EN CASO DE SER ADMINISTRADOR/SECRETARIO Y NO ENCONTRAR EL RECURSO --}}

@else

    @section('contenido')
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-1 fw-bold">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Pagina no encontrada.</p>
                <p class="lead">
                    No se encontró el recurso solicitado
                </p>
                <a href="{{route('home.view')}}" class="btn btn-primary">Volver a inicio</a>
            </div>
        </div>
    @endsection
@endif
