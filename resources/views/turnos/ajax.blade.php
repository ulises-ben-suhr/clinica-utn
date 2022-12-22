@extends('layout.template-base')


@section('titulo')
    Mis Turnos
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/calender.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::asset('css/pacientes.css') }}">
@endsection

@section('contenido')

@include('layout.template-title-section', [
    'titulo' => 'Mis Turnos',
    'links' => []
])


<form id="form" action="" class="container mt-5">
    @csrf
    <fieldset class="row">
        <div class="col-auto mx-auto mx-sm-0 d-flex mb-3 gap-2 ps-0">
            <button id="backMonth" type="button" class="btn btn-dark rounded-circle"><</button>
            <button id="nextMonth" type="button" class="btn btn-dark  rounded-circle">></button>
            <p id="month" class="text-center my-auto text-dark text-secondary fw-bold fs-4"></p>
        </div>
    </fieldset>
    <input type="hidden" name="monthCalender" id="monthCalender" value="">
    <input type="hidden" name="yearCalender" id="yearCalender" value="">
</form>

<div class="modal-helper">
</div>

<div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary modal-close" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

<table class="table table-fit container px-sm-0 mb-5">

    <thead class="bg-dark text-white">
        <tr class="">
            <th class="px-md-4 border-right rounded-left">
                Lu
            </th>
            <th class="px-md-4 border-right">
                Ma
            </th >
            <th class="px-md-4 border-right">
                Mi
            </th>
            <th class="px-md-4 border-right">
                Ju
            </th>
            <th class="px-md-4 border-right">
                Vi
            </th>
            <th class="px-md-4 border-right">
                Sa
            </th>
            <th class="px-md-4 border-left rounded-right">
                Do
            </th>
        </tr>
    </thead>

    <tbody id="days" class="bg-light">

    </tbody>

    <div class="testAjax"></div>

</table>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="module" src="./js/calendario/dateSelect.js"></script>

<script type="module">

        import { setTurns } from './js/calendario/dateSelect.js';
        peticionAjax();

        $("#nextMonth").on("click", () => peticionAjax());
        $("#backMonth").on("click", () => peticionAjax());

        function peticionAjax(){
            setTimeout(() => {
                $.ajax({
                    url: '{{ route("turno.data") }}',
                    method: 'POST',
                    data:$('#form').serialize(),
                    success: function(res){
                            setTurns(JSON.parse(res));
                        }
                    })
            }, 100);
        }

</script>

@endsection






    {{-- <form id="form1" >
        @csrf
        <input type="text" name="id" value="1">
        <select name="month" id="month">
            <option value="12">Diciembre</option>
            <option value="11">Noviembre</option>
            <option value="06">Junio</option>
            <option value="08">Agosto</option>
        </select>
        <button>SUBMIT</button>
    </form>

    <div id="testAjax">

    </div>

    <script>
        $(document).ready(function(){
            $('#form1').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('turno.data') }}',
                    method: 'POST',
                    data:$('#form').serialize(),
                    success: function(res){
                        let div = document.getElementById('testAjax');
                        div.innerHTML = res;
                    }
                })
            });

})
    </script> --}}
