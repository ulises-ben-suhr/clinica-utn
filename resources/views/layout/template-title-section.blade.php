<section class="container">

    <div class="row py-4 section-title my-5">
        <h2 class="col-auto my-auto text-uppercase fs-3 fw-bold">
            {{$titulo}}
        </h2>

        <p class="col-12 col-md-auto my-1 my-sm-auto ms-sm-auto ">
            @foreach ($links as $key => $value)
                @if ($key != (sizeof($links) - 1))
                    <a href="{{route($value->ruta)}}"
                        class="text-decoration-none text-secondary">
                        {{$value->titulo}}</a> /
                @else
                    <a href="" class="text-decoration-none text-primary">{{$value->titulo}}</a>
                @endif
            @endforeach
        </p>
    </div>


</section>


