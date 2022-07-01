<form action="{{route('FiltroAvanzado')}}" class="form form--listing" method="get">
    @csrf
    {{-- FORM LISTING BOX --}}
    {{-- @php
    $url_request = Request::route()->getName();
    if($url_request == 'FiltroAvanzado'){
        $url_explode = explode("&",url()->full());
        $request_url = $url_explode[10];
        $url = explode("=",$request_url);
        $url_request = $url[1];
    }elseif($url_request == 'filterGeneral'){
        $url_explode = explode("&",url()->full());
        $request_url = $url_explode[2];
        $url = explode("=",$request_url);
        $type = $url[1];
        if($type == 0){
            $url_request = 'listado-nuevos';
        }elseif( $type == 1){
            $url_request = 'listado';
        }elseif( $type == 2){
            $url_request = 'listado_arriendo';
        }
    }
    @endphp --}}
    <input type="hidden" id="url_request" name="url_request" value={{$url_list}}>
    <article class="form__box noBorder">
        <a href="#" class="btn btn--square btn--lPurple mlA" data-close="listing">
            X
        </a>
    </article>
    {{-- END FORM LISTING BOX --}}
    {{-- FORM LISTING BOX --}}
    <article class="form__box">
        <input type="text" class="form__input" placeholder="Buscar palabra" name="word">
        <a href="#" class="btn btn--square btn--lPurple">
            <span class="icon icon--arrow icon--arrowR"></span>
        </a>
    </article>
    {{-- END FORM LISTING BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
        <h3 class="form__box__title">Ciudad</h3>
        <select id="ciudad2" class="select" name="ciudad">
            <option value="" selected>Ciudad</option>
            @foreach ($ciudades as $key=>$ciudad)
                <option value="{{$key}}">{{$ciudad}}</option>
            @endforeach
        </select>
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
            <h3 class="form__box__title">Localidad</h3>
            <select id="localidad" class="select" name="localidad">
            </select>
        </article>
        {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
        <h3 class="form__box__title">Barrio</h3>
        <select id="barrio" class="select" name="barrio">
            {{-- <option value="" selected>seleccionar</option>
            @foreach ($barrios as $key=>$barrio)
                <option value="{{$key}}">{{$barrio}}</option>
            @endforeach --}}
        </select>
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title form__box--middleBk">
        <h3 class="form__box__title">Rango de precios:</h3>
        <select id="listing1d" class="select" name="rango">
            @if($url_list == 'listado_arriendo')
            @foreach ($rangoArriendo as $key => $rangos)
                <option value="{{$key}}" {{$key==0?'selected':''}}>{{$rangos}}</option>
            @endforeach
            @else
            @foreach ($rango as $key => $rangos)
                <option value="{{$key}}" {{$key==0?'selected':''}}>{{$rangos}}</option>
            @endforeach
            @endif
        </select>
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    {{-- <article class="form__box form__box--title form__box--middle form__box--middleBk">
        <h3 class="form__box__title">Precio Hasta</h3>
        <select name="listing1e" id="listing1e" class="select">
            <option value="" selected>Hasta</option>
            <option value="60.000.000">60.000.000</option>
            <option value="1.000.000.000">1.000.000.000</option>
            <option value="2.000.000.000">2.000.000.000</option>
            <option value="800.000.000.000">800.000.000.000</option>
        </select>
    </article> --}}
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
        <h3 class="form__box__title">Área (M2)</h3>
        <select  id="listing2" class="select" name="area">
            <option value="" selected>Área</option>
            @foreach ($areas as $key=> $area)
                <option value="{{$key}}">{{$area}}</option>
            @endforeach
        </select>
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title form__box--middle">
        <h3 class="form__box__title">Habitaciones</h3>
        <input type="number" class="form__input" min="0" name="habitaciones">
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title form__box--middle">
        <h3 class="form__box__title">Baños</h3>
        <input type="number" class="form__input" min="0" name="bano">
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
        <h3 class="form__box__title">Garajes</h3>
        <input type="number" class="form__input" min="0" name="garage">
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box form__box--title">
        <h3 class="form__box__title">Antigüedad en años</h3>
        {{-- <input type="number" class="form__input" min="0" name="age"> --}}
        <select name="age" class="select" id="">
            <option value="">Seleccionar </option>
            <option value="1">Todas las opciones</option>
            <option value="2">Remodelado</option>
            <option value="3">Entre 0 y 5 años</option>
            <option value="4">Entre 5 y 10 años</option>
            <option value="5">Entre 10 y 20 años</option>
            <option value="6">Entre 20 y 30 años</option>
        </select>
    </article>
    {{-- END FORM FILTER BOX --}}
    {{-- FORM FILTER GROUP --}}
    <article class="form__box form__box--title mt60">
        <h3 class="form__group__title">Preferencias</h3>
        <select  id="listing3" class="select select--multiple" name="adicionales[]" multiple>
            <option value="" selected>Área</option>
            @foreach ($adicionales as $adicional)
                <option value="{{$adicional->id}}">{{$adicional->nombre}}</option>
            @endforeach
        </select>
        {{-- @foreach ($adicionales as $adicional)
            <article class="form__box noBorder mb5 mt0">
                <input type="checkbox" name="adicionales[]" id="adicional_{{$adicional->id}}" class="form__checkbox" value="{{$adicional->id}}">
                <label for="adicional_{{$adicional->id}}" class="form__label form__label--checkbox ttU lGray semiBold text text--xs">{{$adicional->nombre}}</label>
            </article>
        @endforeach --}}
    </article>
    {{-- END FORM FILTER GROUP --}}
    {{-- FORM FILTER BOX --}}
    <article class="form__box noBorder mt30">
        <button class="nav__item__link btn btn--header btn--radius">Aplicar Filtros</button>
    </article>
    {{-- END FORM FILTER BOX --}}
</form>