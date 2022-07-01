@extends('main')

{{-- CONTENT --}}
@section('content')

    {{-- BANNER --}}
    <section class="banner">
        <div class="banner__container">
            <picture class="banner__bg">
                <source media="(max-width: 767px)" srcset="{{asset('images/banner/Quienessomos-PQR.jpg')}}">
                <img src="{{asset('images/banner/Quienessomos-PQR.jpg')}}" alt="" class="banner__bg__img">
            </picture>
        </div>
    </section>
    {{-- END BANNER --}}

    <div class="container">
        <div class="container container--limit pt50">
            <div class="container dF pb10 bb2lPurple">
                <div class="container dF container--50 mbM10">
                    <h2 class="w100 fz25 fzM20 black semiBold dGray ttU taL taMC iconTitle">Título del inmueble a publicar</h2>
                </div>
                @if(isset($inmueble))
                    <div class="container dF container--50">
                        <h2 class="title title--s semiBold taMC dPurple mlA mrMA">Código del Inmueble: <span class="regular">{{$inmueble->titulo}}</span></h2>
                    </div>
                @endif
            </div>
            {{-- STEP BOX --}}
            <section class="stepBox mt40 mb40">
                {{-- STEP BOX NAV --}}
                <nav class="stepBox__nav">
                    {{-- STEP BOX NAV LIST --}}
                    <ul class="stepBox__nav__list">
                        <span class="stepBox__nav__indicator"></span>
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item active_bton" data-stepbox="tipo-inmueble">
                            Tipo de Inmueble
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item active_bton disabled" data-stepbox="ubicacion">
                            Ubicación
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item active_bton disabled" data-stepbox="caracteristicas">
                            Características
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item active_bton disabled" data-stepbox="{{isset($edit)?'areas-medidas-gratis':'areas-medidas'}}">
                            Áreas y Medidas
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item desactive_bton disabled {{-- @if(isset($credito)&& isset($edit)){{$credito->tipo_credito== 5 ?'hidden':''}}@endif --}}" data-stepbox="fotografias-videos">
                            Fotografías y Videos
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item active_bton disabled" data-stepbox="visibilidad">
                            Visibilidad
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                    </ul>
                    {{-- END STEP BOX NAV LIST --}}
                </nav>
                {{-- END STEP BOX NAV --}}
                {{-- STEP BOX CONTAINER --}}
                <form method="post" @if (isset($edit) && $edit == true) action="{{route('paso-paso-edicion-persona-natural')}}" @else action="{{route('paso-paso-publicacion-persona-natural')}}" @endif class="stepBox__container form form--publish" id="form--publish" enctype="multipart/form-data">
                     @csrf
                    {{-- STEP BOX CONTENT --}}
                    @if(isset($edit) && $edit == true)
                    <input type="hidden" name="edit" id="edit" value="1">
                    <input type="hidden" name="inmuebleId" id="inmuebleId" value={{$inmueble->id}}>
                    @endif
                        <article class="stepBox__content" data-stepbox="tipo-inmueble">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 1</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title">
                                    <h3 class="form__box__title mb10">Tipo de publicación:</h3>
                                    <h4 class="lGray semiBold text text--xs ttU">{{$credito->plan->Nombre}}</h4>
                                </article>
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU mt30">Tipo y valor inmueble</h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular">{!!$textos[1]->texto!!}</p>
                                </div>
                                @if(isset($credito))<input type="hidden" name="creditoID" id="creditoID" value= {{$credito->id}}>@endif
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                {{-- <article class="form__box form__box--title mt20">
                                    <label class="form__box__title dB mb10" for="publish-a1">Descripción:</label>
                                    <textarea type="text" class="form__textarea form__textarea--line" name="publish-a1" id="publish-a1"></textarea>
                                </article> --}}
                                {{-- END FORM FILTER BOX --}}
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title">
                                    <h3 class="form__box__title mb10">Tipo de inmueble:</h3>
                                    <?php $selectedvalue=isset($inmueble) ? $inmueble->tipo_inmueble:""  ;
                                    $disabled =isset($inmueble) ? 'disabled': '' ?>
                                    <select name="Ttinmueble" id="publish-a2" class="select" required Ttinmueble {{$disabled}}>
                                    <option value="" selected>Seleccionar</option>
                                        @forelse ($tipoInmueble as $key=> $tipo)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$tipo}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--adjust form__box--multiple mt20">
                                    <h3 class="form__box__title mb10">Publicar para:</h3>
                                    <?php $selectedvalue=isset($inmueble) ? $inmueble->uso:"" ?>
                                    @if(isset($inmueble))
                                        @forelse ($para as $key =>$item)
                                            <input type="radio" name="publicarPara" id="para_{{$key}}" class="form__radio" {{ $selectedvalue == $key ? 'checked="checked"' : '' }} {{$key==0 || $key==1 ?'checked data-pp=vender':''}}  {{$key==1 ||$key==2?'data-pp=arrendar':''}}  {{$key==3 ||$key==4?'data-pp=ambos':''}} value="{{$key}}" required>
                                            <label for="para_{{$key}}" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">{{$item}}</label>
                                        @empty
                                            <p>-</p>
                                        @endforelse
                                    @else
                                        @forelse ($para as $key =>$item)
                                            <input type="radio" name="publicarPara" id="para_{{$key}}" class="form__radio" {{$key==0 || $key==1?' data-pp=vender':''}}  {{$key==1 ||$key==2?'data-pp=arrendar':''}}  {{$key==3||$key==4?'data-pp=ambos':''}} value="{{$key}}" required>
                                            <label for="para_{{$key}}" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">{{$item}}</label>
                                        @empty
                                            <p>-</p>
                                        @endforelse
                                    @endif
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20 @if(isset($inmueble->uso)&&($inmueble->uso == 2)) hidden @else @endif" data-pp="vender ambos">
                                    <h3 class="form__box__title mb10">$ Valor venta:</h3>
                                    <input type="text" @if(isset($inmueble))value="{{$inmueble->valor_venta}}"@endif name="Tventa" id="publish-a4" class="form__input form__input--line maskM" placeholder="$ Valor venta COP" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20 hidden @if(isset($inmueble->uso)&&($inmueble->uso == 2 || $inmueble->uso == 3 || $inmueble->uso == 4))@else hidden @endif" data-pp="arrendar ambos">
                                    <h3 class="form__box__title mb10">$ Valor arriendo:</h3>
                                    <input type="text" @if(isset($inmueble))value="{{$inmueble->valor_arriendo}}"@endif name="Tarriendo" id="publish-a5" class="form__input form__input--line maskM" placeholder="$ Valor arriendo COP" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                @if(isset($inmueble))
                                <article class="form__box form__box--title form__box--adjust form__box--multiple mt20" data-pp="arrendar ambos vender">
                                    <h3 class="form__box__title mb10">Administración:</h3>
                                    @if($inmueble->check_administracion == 2)
                                        <input type="radio" name="TadministracionCheck" id="publish-a6a" class="form__radio" checked="checked" value="2" data-bb=si_administracion>
                                        <label for="publish-a6a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Si</label>
                                        <input type="radio" name="TadministracionCheck" id="publish-a6b" class="form__radio" value="1" data-bb=no_administracion>
                                        <label for="publish-a6b" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">No</label>
                                    @elseif($inmueble->check_administracion == 1)
                                        <input type="radio" name="TadministracionCheck" id="publish-a6a" class="form__radio" value="2" data-bb=si_administracion>
                                        <label for="publish-a6ac" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Si</label>
                                        <input type="radio" name="TadministracionCheck" id="publish-a6b" class="form__radio" checked="checked" value="1" data-bb=no_administracion>
                                        <label for="publish-a6b" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">No</label>
                                    @endif
                                </article>
                                @else
                                <article class="form__box form__box--title form__box--adjust form__box--multiple mt20" data-pp="arrendar ambos vender">
                                    <h3 class="form__box__title mb10">Administración:</h3>
                                    <input type="radio" name="TadministracionCheck" id="publish-a6a" class="form__radio" checked value="2" data-bb=si_administracion>
                                    <label for="publish-a6a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Si</label>
                                    <input type="radio" name="TadministracionCheck" id="publish-a6b" class="form__radio" value="1" data-bb=no_administracion>
                                    <label for="publish-a6b" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">No</label>
                                </article>
                                @endif
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                @if(isset($inmueble))
                                <article class="form__box form__box--title mt20" data-bb="si_administracion">
                                    <h3 class="form__box__title mb10">$ Valor administración:</h3>
                                    <input type="text"  @if(isset($inmueble))value="{{$inmueble->valor_administracion}}"@endif name="Tadministracion" id="publish-a7" class="form__input form__input--line maskM" placeholder="$ Valor administración COP" required>
                                </article>
                                @else
                                <article class="form__box form__box--title mt20" data-bb="si_administracion">
                                    <h3 class="form__box__title mb10">$ Valor administración:</h3>
                                    <input type="text" name="Tadministracion" id="publish-a7" class="form__input form__input--line maskM" placeholder="$ Valor administración COP" required>
                                </article>
                                @endif
                                {{-- END FORM FILTER BOX --}}
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        {{-- STEP BOX CONTENT --}}
                        <article class="stepBox__content" data-stepbox="ubicacion">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 2</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Ubicación</h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular">{!!$textos[2]->texto!!}</p>
                                </div>
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 w100">
                                    <label class="form__box__title dB mb10" for="publish-b1">Ciudad:</label>
                                    <?php $selectedvalue=isset($inmueble) ? $inmueble->ciudad:"" ;
                                    $disabled =isset($inmueble) ? 'disabled': '' ?>
                                    <select name="ciudad" id="ciudad2" class="select" required {{$disabled}}>
                                        <option value="" selected>Seleccionar</option>
                                        @forelse ($ciudad as $key => $item)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </article>
                                <input type="hidden" name="ciudadSelected2" id="ciudadSelected2">
                                {{-- END FORM FILTER BOX --}}
                                 {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <label class="form__box__title dB mb10" for="publish-b2">Localidad:</label>
                                    <?php $selectedvalue=isset($inmueble) ? $inmueble->localidad:"" ;
                                    $disabled =isset($inmueble) ? 'disabled': '' ?>
                                    <select name="localidad" id="localidad" class="select" required {{$disabled}}>
                                        <option value="" selected>Seleccionar</option>
                                        @forelse ($localidades as $key => $item)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </article>
                                <input type="hidden" name="localidad2" id="localidad2">
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-b2">Barrio:</label>
                                    <?php $selectedvalue=isset($inmueble) ? $inmueble->barrio:"";
                                    $disabled =isset($inmueble) ? 'disabled': '' ?>
                                    <select name="barrio" id="barrio" class="select" required {{$disabled}}>
                                        <option value="" selected>Seleccionar</option>
                                        @forelse ($barrio as $key => $item)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                </article>
                                <input type="hidden" name="barrio2" id="barrio2">
                                {{-- <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-b2">Localidad:</label>
                                     $selectedvalue=isset($inmueble) ? $inmueble->localidad:""
                                    <select name="localidad" id="barrio" class="select" required>
                                        <option value="" selected>Seleccionar</option>
                                        @forelse ($localidad as $key => $item)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </article> --}}
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20">
                                    <label class="form__box__title dB mb10" for="publish-b3">Dirección:</label>
                                    <input type="text" @if(isset($inmueble))value="{{$inmueble->direccion}}" @else placeholder="Direccion"@endif name="Udireccion" id="publish-b3" class="form__input form__input--line @if(isset($inmueble)) disabled @endif direccionChange" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20 @if(isset($inmueble))hidden @endif">
                                    <h3 class="form__box__title mb10">Arrastra el marcador en la dirección del inmueble.</h3>
                                    {{-- MAP --}}
                                    <div class="container map mt20">
                                        {{-- MAP CONTENT--}}
                                        <div id="map" class="w100 map__content"></div>
                                        {{-- END MAP CONTENT--}}
                                    </div>
                                    {{-- END MAP --}}
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20 @if(isset($inmueble))  @else hidden @endif" data-project="existing">
                                <h3 class="form__box__title mb10">Coordenadas:</h3>
                            </article>
                            {{-- FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <label class="form__box__title dB mb10" for="publish-b4">Longitud:</label>
                                    <input type="text" @if(isset($inmueble))value="{{$inmueble->longitude}}" disabled @endif name="Ulongitude" id="publish-b4" class="form__input form__input--line" placeholder="Longitud">
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-b5">Latitud:</label>
                                    <input type="text" @if(isset($inmueble))value="{{$inmueble->latitude}}" disabled @endif name="Ulatitude" id="publish-b5" class="form__input form__input--line" placeholder="Latitud">
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        {{-- STEP BOX CONTENT --}}
                        <article class="stepBox__content" data-stepbox="caracteristicas">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 3</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Características</h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular">{!!$textos[3] ->texto!!}</p>
                                </div>
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20">
                                    <label class="form__box__title dB mb10" for="publish-c1">Descripción:</label>
                                    <textarea class="form__textarea form__textarea--line" name="Cdescription" id="publish-c1" required>@if(isset($inmueble)){{$inmueble->descripcion}}@endif</textarea>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50">
                                    <label class="form__box__title dB mb10" for="publish-c2">Metros Cuadrados:</label>
                                    <input type="number"  @if(isset($inmueble))value="{{$inmueble->medida_apartamento}}"@endif name="Cmetros" id="publish-c2" class="form__input form__input--line" placeholder="Metros Cuadrados" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mlA">
                                    <label class="form__box__title dB mb10" for="publish-c3">Garajes:</label>
                                    <input type="number" @if(isset($inmueble))value="{{$inmueble->n_garages}}"@endif name="Cgarages" id="publish-c3" class="form__input form__input--line" placeholder="Garajes" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <label class="form__box__title dB mb10" for="publish-c4">Habitaciones:</label>
                                    <input type="number" @if(isset($inmueble))value="{{$inmueble->n_habitaciones}}"@endif name="Chabitaciones" id="publish-c4" class="form__input form__input--line" placeholder="Habitaciones" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-c5">Baños:</label>
                                    <input type="number" @if(isset($inmueble))value="{{$inmueble->n_banos}}"@endif name="Cbanos" id="publish-c5" class="form__input form__input--line" placeholder="Baños" required>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <label class="form__box__title dB mb10" for="publish-c11">Número de piso:</label>
                                    <input type="number" name="Cpiso" id="publish-c11" class="form__input form__input--line" placeholder="Número de piso" required @if(isset($inmueble))value="{{$inmueble->n_piso}}"@endif>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-c12">Estrato:</label>
                                    {{-- <input type="number" name="Cestrato" id="publish-c12" class="form__input form__input--line" placeholder="Estrato" required @if(isset($inmueble))value="{{$inmueble->estrato}}"@endif> --}}
                                    <select name="Cestrato" id="" class="select" required>
                                        <option value="" selected>Seleccionar</option>
                                        <option value="3" @if(isset($inmueble)) {{$inmueble->estrato ==3? 'selected':''}} @endif>3</option>
                                        <option value="4" @if(isset($inmueble)) {{$inmueble->estrato ==4? 'selected':''}} @endif>4</option>
                                        <option value="5" @if(isset($inmueble)) {{$inmueble->estrato ==5? 'selected':''}} @endif>5</option>
                                        <option value="6" @if(isset($inmueble)) {{$inmueble->estrato ==6? 'selected':''}} @endif>6</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <? $disabled =isset($inmueble) ? 'disabled': '' ?>
                                    <label class="form__box__title dB mb10" for="publish-c13">Antigüedad:</label>
                                    <select name="Cantiguedad" class="select" id="" {{$disabled}}>
                                        <option value="1" @if(isset($inmueble)) {{$inmueble->antiguedad ==1? 'selected':''}} @else selected @endif>Todas las opciones</option>
                                        <option value="2" @if(isset($inmueble)) {{$inmueble->antiguedad ==2? 'selected':''}} @endif >Remodelado</option>
                                        <option value="3" @if(isset($inmueble)) {{$inmueble->antiguedad ==3? 'selected':''}} @endif >Entre 0 y 5 años</option>
                                        <option value="4" @if(isset($inmueble)) {{$inmueble->antiguedad ==4? 'selected':''}} @endif >Entre 5 y 10 años</option>
                                        <option value="5" @if(isset($inmueble)) {{$inmueble->antiguedad ==5? 'selected':''}} @endif >Entre 10 y 20 años</option>
                                        <option value="6" @if(isset($inmueble)) {{$inmueble->antiguedad ==6? 'selected':''}} @endif >Entre 20 y 30 años</option>
                                    </select>
                                    {{-- <input type="number" name="Cantiguedad" id="publish-c13" class="form__input form__input--line" placeholder="Antigüedad" required @if(isset($inmueble))value="{{$inmueble->antiguedad}}"@endif> --}}
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-c14">Ubicación:</label>
                                    <select name="Cubicacion" id="publish-c14" class="select" required>
                                        @isset($inmueble)
                                        @else
                                            <option value="" selected>Seleccionar</option>
                                        @endisset
                                        <option value="2" @isset($inmueble) {{$inmueble->exterior_interior== 2?'selected':'' }} @endisset>interior</option>
                                        <option value="1" @isset($inmueble) {{$inmueble->exterior_interior== 1?'selected':'' }} @endisset>exterior</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--adjust form__box--multiple form__box--col mt20">
                                    <h3 class="form__box__title mb10">Adicionales:</h3>
                                    @if(isset($adicionales_usadas) && sizeof($adicionales_usadas) > 0)
                                        @forelse ($adicionales_usadas as $key_1 => $adicional)
                                            <input type="checkbox" name="Cadicionales[]" id="adicionalesI_{{$adicional->id}}" class="form__checkbox" value="{{$adicional->id}}" checked="checked">
                                            <label for="adicionalesI_{{$adicional->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$adicional->nombre}}</label>
                                        @empty
                                            <p>No hay adicionales</p>
                                        @endforelse
                                        @forelse ($adicionales as $key => $adicional)
                                            <input type="checkbox" name="Cadicionales[]" id="adicionalesI_{{$adicional->id}}" class="form__checkbox" value="{{$adicional->id}}" required>
                                            <label for="adicionalesI_{{$adicional->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$adicional->nombre}}</label>
                                        @empty
                                            <p>No hay adicionales</p>
                                        @endforelse
                                    @else

                                    @forelse ($adicionales as $key => $adicional)
                                            <input type="checkbox" name="Cadicionales[]" id="adicionalesI_{{$key}}" class="form__checkbox" value="{{$key}}" required>
                                            <label for="adicionalesI_{{$key}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$adicional}}</label>
                                        @empty
                                            <p>No hay adicionales</p>
                                        @endforelse
                                    @endif
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="{{isset($edit)?'areas-medidas-gratis':'areas-medidas'}}">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 4</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Áreas y Medidas</h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular">{!!$textos[4]->texto!!}</p>
                                </div>
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- PACK BOX --}}
                                @if(isset($item_usados))
                                @forelse ($item_usados as $key => $item_usado)
                                <div class="packBox">
                                    <span class="packBox__close"></span>
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 w100">
                                        <label class="form__box__title dB mb10" for="publish-d1">Item:</label>
                                        <select name="ARitem[]" id="publish-d1" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                            <?php $selectedvalue=isset($item_usado) ? $item_usado->item_id:"" ?>
                                           @forelse ($itemMedida as $key => $item)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                           @empty

                                           @endforelse
                                        </select>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    {{-- <article class="form__box form__box--title form__box--50 mlA hidden">
                                        <label class="form__box__title dB mb10" for="publish-d2">Tipo de medida:</label>
                                        <select name="ARtipomed[]" id="publish-d2" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                             $selectedvalue=isset($item_usado) ? $item_usado->tipo_medida:""
                                            @foreach ($TipoMedida as $key => $tipo)
                                            <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </article> --}}
                                    <input type="hidden" name="ARtipomed[]" value="2">
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 mt20">
                                        <label class="form__box__title dB mb10" for="publish-c4">Largo:</label>
                                        <input type="number" value="{{$item_usado->largo}}" name="ARlargo[]" id="publish-c4" class="form__input form__input--line" placeholder="largo" >
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 mt20 mlA">
                                        <label class="form__box__title dB mb10" for="publish-c4">Ancho:</label>
                                        <input type="number" value="{{$item_usado->ancho}}" name="ARancho[]" id="publish-c4" class="form__input form__input--line" placeholder="ancho" >
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                </div>
                                @empty
                                @endforelse
                                @else
                                <div class="packBox">
                                    <span class="packBox__close"></span>
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title w100">
                                        <label class="form__box__title dB mb10" for="publish-d1">Item:</label>
                                        <select name="ARitem[]" id="publish-d1" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                           @forelse ($itemMedida as $key => $item)
                                            <option value="{{$key}}">{{$item}}</option>
                                           @empty

                                           @endforelse
                                        </select>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    {{-- <article class="form__box form__box--title form__box--50 mlA hidden">
                                        <label class="form__box__title dB mb10" for="publish-d2">Tipo de medida:</label>
                                        <select name="ARtipomed[]" id="publish-d2" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                            @foreach ($TipoMedida as $key => $tipo)
                                                <option value="{{$key}}">{{$tipo}}</option>
                                            @endforeach
                                        </select>
                                    </article> --}}
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <input type="hidden" name="ARtipomed[]" value="2">
                                    <article class="form__box form__box--title form__box--50 mt20">
                                        <label class="form__box__title dB mb10" for="publish-c4">Largo:</label>
                                        <input type="number" name="ARlargo[]" id="publish-c4" class="form__input form__input--line" placeholder="largo" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 mt20 mlA">
                                        <label class="form__box__title dB mb10" for="publish-c4">Ancho:</label>
                                        <input type="number" name="ARancho[]" id="publish-c4" class="form__input form__input--line" placeholder="ancho" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                </div>
                                @endif
                                {{-- END PACK BOX --}}
                                <a href="#" class="btn btn--hoverLPurple ttU mt30 mlA packBox__cloneBtn">Nuevo</a>
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        {{-- STEP BOX CONTENT --}}
                        <article class="stepBox__content {{-- @if(isset($credito)&& isset($edit)){{$credito->tipo_credito== 5 ?'hidden':''}}@endif --}}" data-stepbox="fotografias-videos">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 5</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Fotografías y Videos </h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular ">
                                        @if ($credito->plan->id == 5)
                                            {!!$textos[8]->texto!!}
                                        @else
                                            {!!$textos[7]->texto!!}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- FORM GROUP --}}
                                <div class="w100 form__group form__group--dropzone  @if(isset($credito)){{$credito->tipo_credito==5?'':'hidden'}}@endif" id="Fdropzone">
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title mb20 @if(isset($credito) && isset($edit)){{$credito->tipo_credito ==5?'hidden':''}}@endif" data-project="new">
                                            <h3 class="form__box__title mb10">Imagen principal:</h3>
                                            <div class="form__pseudo">
                                                <input type="file" name="Fbanner" id="fProyecto-1d" class="form__iFile" onchange="loadFile(event)" placeholder="Video del inmueble" required>
                                                <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                                <span class="form__pseudo__message">@if(isset($inmueble->url_img)){{$inmueble->url_img}}@else Ningún archivo seleccionado @endif </span>
                                            </div>
                                    </article>
                                    {{-- PROFILE BOX USER IMG --}}
                                    <picture class="profileBox__userPic profileBox__userPic--sRadius mb20" style="margin-right: 28.5em;">
                                        <img src="{{isset($inmueble->url_img)?asset('uploads/'.$inmueble->url_img):''}}" alt="" class="profileBox__userPic__img" id="outputPhoto">
                                    </picture>
                                    {{-- END PROFILE BOX USER IMG --}}
                                    <article class="form__box form__box--title">
                                        {{-- DROPZONE --}}
                                        <div class="dropzone @if(isset($credito) && isset($edit)){{$credito->tipo_credito ==5?'hidden':''}}@endif">
                                            <input class="dropzone__input" name="file[]" type="file" id="publish-e1" multiple>
                                            {{-- DROPZONE INFO --}}
                                            <div class="dropzone__info">
                                                <a href="#" class="btn btn--hoverLPurple ttU pLink dropzone__btn">Cargar Imágenes</a>
                                                <p class="w100 text dGray taC mt10 textFotos">Formato: JPG, JPEG, PNG, máx 8MB</p>
                                            </div>
                                            {{-- END DROPZONE INFO --}}
                                        </div>
                                        {{-- END DROPZONE --}}

                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- OLD IMAGES --}}
                                    @isset($inmueble->galeria)
                                    <div class="oldI ">
                                        <h3 class="oldI__title mt20 mb20">Imágenes previamente guardadas</h3>
                                        {{-- OLD IMAGES --}}
                                        @forelse ($inmueble->galeria as $item)
                                            <article class="oldI__item">
                                                <span class="  @if(isset($credito) && isset($edit)){{$credito->tipo_credito ==5 ?'':'oldI__item__close'}}@endif closeOld"></span>
                                                <img src="{{asset('uploads/'.$item)}}" alt="" class="oldI__item__img imgOld">
                                            </article>
                                        @empty
                                        @endforelse
                                        {{-- END OLD IMAGES --}}
                                    </div>
                                    @endisset
                                    {{-- OLD IMAGES --}}
                                </div>
                                {{-- END FORM GROUP --}}
                                {{-- FORM GROUP --}}
                                <div class="form__group form__group--datepicker  @if(isset($credito)){{$credito->tipo_credito==5?'hidden':''}}@endif">
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title">
                                        {{-- DATEPICKER --}}
                                        <div class="datePicker datepicker-here" required>

                                        </div>
                                        {{-- <input type="text" class="datePicker datepicker-here"> --}}
                                        {{-- END DATEPICKER --}}
                                    </article>
                                    <label class="form__box__title dB mt20 mb10 hidden" id="label_citas" style="color: red;margin-left: 187px;">Recuerde seleccionar un día</label>
                                    <input type="hidden" name="Fdate" value="0">
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title hidden mt20 horario_sem">
                                        <label class="form__box__title dB mb10" for="publish-e1">Seleccionar Horario:</label>
                                        <select name="Fhorario_sem" id="publish-e1" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                                @forelse ($horario as $key=>$horario)
                                                    <option value="{{$key}}" @if(isset($citas_asignadas) && $citas_asignadas->horario == $key ) selected  @endif>{{$horario}}</option>
                                                @empty
                                                @endforelse
                                        </select>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    <article class="form__box form__box--title hidden mt20 horario_sab">
                                        <label class="form__box__title dB mb10" for="publish-e1">Seleccionar Horario:</label>
                                        <select name="Fhorario_sab" id="publish-e1" class="select" required>
                                            <option value="" selected>Seleccionar</option>
                                                @forelse ($horario_sab as $key=>$horario)
                                                    <option value="{{$key}}" @if(isset($citas_asignadas) && $citas_asignadas->horario == $key ) selected  @endif>{{$horario}}</option>
                                                @empty
                                                @endforelse
                                        </select>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title mt20">
                                        <label class="form__box__title dB mb10" for="publish-e2">Nombre Contacto:</label>
                                        <input type="text" @if(isset($citas_asignadas))value="{{$citas_asignadas->nombre}}" disabled @endif name="FnombreC" id="publish-e2" class="form__input form__input--line" placeholder="" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 mt20">
                                        <label class="form__box__title dB mb10" for="publish-e3">Teléfono de Contacto:</label>
                                        <input type="text" @if(isset($citas_asignadas))value="{{$citas_asignadas->telefono}}" disabled @endif name="Ftelefono" id="publish-e3" class="form__input form__input--line" placeholder="" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title form__box--50 mt20 mlA">
                                        <label class="form__box__title dB mb10" for="publish-e4">Correo Electrónico:</label>
                                        <input type="email" @if(isset($citas_asignadas))value="{{$citas_asignadas->correo}}" disabled @endif name="Fcorreo" id="publish-e4" class="form__input form__input--line correo_cita" placeholder="" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                    {{-- FORM FILTER BOX --}}
                                    <article class="form__box form__box--title mt20">
                                        <label class="form__box__title dB mb10" for="publish-e5">Dirección:</label>
                                        <input type="text" @if(isset($citas_asignadas->direccion))value="{{$citas_asignadas->direccion}}" disabled @endif name="Fdireccion" id="publish-e5" class="form__input form__input--line" required>
                                    </article>
                                    {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20">
                                    <label class="form__box__title dB mb10" for="publish-e6">Sugiérenos cómo llegar:</label>
                                    <input type="text" @if(isset($citas_asignadas->sugerencia))value="{{$citas_asignadas->sugerencia}}" disabled @endif @if(isset($citas_asignadas)) disabled @endif name="Fsugerencia" id="publish-e6" class="form__input form__input--line">
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                </div>
                                {{-- END FORM GROUP --}}
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        {{-- STEP BOX CONTENT --}}
                        <article class="stepBox__content" data-stepbox="visibilidad">
                            <h2 class="w100 title semiBold lPurple taL mb15">Paso 6</h2>
                            <div class="stepBox__content__box pr10 prM0 mb20">
                                <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Visibilidad de la oferta</h2>
                                <div class="lGray mt10 taJ">
                                    <p class="text lGray regular">{!!$textos[5] ->texto!!}</p>
                                </div>
                            </div>
                            <div class="stepBox__content__box pl10 plM0 mb20">
                                {{-- FORM FILTER BOX --}}
                                @isset($inmueble )
                                    @if ($inmueble->visibilidad == 1)
                                        <article class="form__box form__box--title form__box--50">
                                            <input type="radio" name="visibilidad" id="publish-a11a" class="form__radio form__radio--switch" data-switch="ap" checked value="1">
                                            <label for="publish-a11a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Área privada escoge por ti la segmentacion</label>
                                        </article>
                                    @endif
                                @else
                                <article class="form__box form__box--title form__box--50">
                                    <input type="radio" name="visibilidad" id="publish-a11a" class="form__radio form__radio--switch" data-switch="ap" value="1" @if(isset($credito) && ($credito->tipo_credito==5 || $credito->tipo_credito==4)) disabled @else checked @endif>
                                    <label for="publish-a11a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Área privada escoge por ti la segmentacion</label>
                                </article>
                                @endisset
                                {{-- FORM FILTER BOX --}}
                                @isset($inmueble)
                                    @if ($inmueble->visibilidad == 2)
                                        <article class="form__box form__box--title form__box--50">
                                            <input type="radio" name="visibilidad" id="publish-a12a" class="form__radio form__radio--switch" data-switch="cliente" value="2" checked>
                                            <label for="publish-a12a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Yo elijo la segmentacion</label>
                                        </article>
                                    @endif
                                @else
                                    <article class="form__box form__box--title form__box--50">
                                        <input type="radio" name="visibilidad" id="publish-a12a" class="form__radio form__radio--switch" data-switch="cliente" value="2" @if(isset($credito)){{$credito->tipo_credito==5?'':'disabled'}}{{$credito->tipo_credito==4?'':'disabled'}}@endif>
                                        <label for="publish-a12a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Yo elijo la segmentacion</label>
                                    </article>
                                @endisset
                                @isset($inmueble)
                                    @if ($inmueble->visibilidad == 0)
                                    <article class="form__box form__box--title form__box--50">
                                        <input type="radio" name="visibilidad" id="publish-a11a" class="form__radio form__radio--switch" data-switch="ap" disabled value="1" >
                                        <label for="publish-a11a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Área privada escoge por ti la segmentacion</label>
                                    </article>
                                    <article class="form__box form__box--title form__box--50">
                                        <input type="radio" name="visibilidad" id="publish-a12a" class="form__radio form__radio--switch" data-switch="cliente" value="2" disabled>
                                        <label for="publish-a12a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Yo elijo la segmentacion</label>
                                    </article>
                                    @endif
                                @endisset
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM SWITCH BOX --}}
                                <article class="form__box form__box--title form__box--adjust form__box--multiple form__box--col mt20 @if(isset($credito)&&($credito->tipo_credito==5||$credito->tipo_credito==4)) @else hidden @endif">
                                    <p class="text lPurple regular mt10 pl30 taJ pr20" style="/* font-size: 0.675rem; */">Para disfrutar de esta opción, adquiere uno de nuestros paquetes plata, oro o diamante y aumenta la visibilidad de tu inmueble.</p>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM SWITCH BOX --}}
                                @isset($inmueble)
                                    @if ($inmueble->visibilidad == 2)
                                        <div class="form__switchBox " data-switch="cliente">
                                            <p class="w100 text lGray regular taJ taMC mt30">Yo deseo hacer la segmentación de mi inmueble según mi criterio y así escoger el alcance de mi publicación.</p>
                                            {{-- FORM FILTER BOX --}}
                                            {{-- <article class="form__box form__box--title mt20">
                                                <h3 class="form__box__title mb10">Tipo de público:</h3>
                                                <select name="publish-a13" id="publish-a13" class="select" required>
                                                    <option value="" selected>Seleccionar</option>
                                                    <option value="1a">Casa</option>
                                                    <option value="1b">Apartamento</option>
                                                    <option value="1c">Loft</option>
                                                    <option value="1d">Conjunto</option>
                                                    <option value="1e">Proyecto</option>
                                                </select>
                                            </article> --}}
                                            {{-- END FORM FILTER BOX --}}
                                            {{-- FORM FILTER BOX --}}
                                            <article class="form__box form__box--middle form__box--title mt20">
                                                <h3 class="w100 form__box__title mb10">Ubicación Ciudad:</h3>
                                                <select id="localidad" class="select select--multiple disabled" name="Vlocalidad[]" multiple>
                                                    @foreach ($vciudades as $key=> $item)
                                                        <option value="{{ $key }}"  selected="selected">{{$item->ciudad}}</option>
                                                    @endforeach
                                                </select>
                                            </article>
                                            {{-- FORM FILTER BOX --}}
                                            <article class="form__box form__box--title form__box--adjust form__box--multiple form__box--col mt20">
                                                <h3 class="w100 form__box__title mb10">Intereses:</h3>
                                                @if(isset($vintereses) && sizeof($vintereses) > 0)
                                                @forelse ($vintereses as $interes)
                                                    <input type="checkbox" name="Vinteres[]" id="interes_{{$interes->id}}" class="form__checkbox disabled" value="{{$interes->id}}"  checked="checked">
                                                    <label for="interes_{{$interes->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$interes->interes}}</label>
                                                @empty
                                                @endforelse
                                                @forelse ($intereses as $interes)
                                                    <input type="checkbox" name="Vinteres[]" id="interes_{{$interes->id}}" class="form__checkbox disabled" value="{{$interes->id}}">
                                                    <label for="interes_{{$interes->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$interes->interes}}</label>
                                                @empty
                                                @endforelse
                                                @else
                                                @forelse ($intereses as $interes)
                                                    <input type="checkbox" name="Vinteres[]" id="interes_{{$interes->id}}" class="form__checkbox disabled" value="{{$interes->id}}">
                                                    <label for="interes_{{$interes->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$interes->interes}}</label>
                                                @empty
                                                @endforelse
                                                @endif
                                            </article>
                                            {{-- END FORM FILTER BOX --}}
                                            {{-- FORM FILTER BOX --}}
                                            <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20">
                                                <h3 class="w100 form__box__title mb10">Género:</h3>
                                                @if(isset($vsexo))
                                                    @if($vsexo == 1)
                                                        <input type="checkbox" name="Vgenero" id="publish-a16a" class="form__checkbox" value="1" checked="checked">
                                                        <label for="publish-a16a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Hombres</label>
                                                        <input type="checkbox" name="Vgenero" id="publish-a16b" class="form__checkbox" value="2" >
                                                        <label for="publish-a16b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mujeres</label>
                                                    @else
                                                        <input type="checkbox" name="Vgenero" id="publish-a16a" class="form__checkbox" value="1" >
                                                        <label for="publish-a16a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Hombres</label>
                                                        <input type="checkbox" name="Vgenero" id="publish-a16b" class="form__checkbox" value="2" checked="checked">
                                                        <label for="publish-a16b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mujeres</label>
                                                    @endif
                                                @else
                                                    <input type="checkbox" name="Vgenero" id="publish-a16a" class="form__checkbox" value="1">
                                                    <label for="publish-a16a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Hombres</label>
                                                    <input type="checkbox" name="Vgenero" id="publish-a16b" class="form__checkbox" value="2">
                                                    <label for="publish-a16b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mujeres</label>
                                                @endif
                                            </article>
                                            {{-- END FORM FILTER BOX --}}
                                            {{-- FORM FILTER BOX --}}
                                            <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20 mlM0">
                                                    <h3 class="w100 form__box__title mb10 ml0">Edad</h3>
                                            </article>
                                            <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20 mlM0">
                                                    <select id="publish-a13" class="select disabled" name="VedadD">
                                                        @switch($vedadD)
                                                        @case(2)
                                                            <option value="2" selected="selected">18</option>
                                                            @break
                                                        @case(3)
                                                            <option value="3" selected="selected">19</option>
                                                            @break
                                                        @case(4)
                                                            <option value="4" selected="selected">20</option>
                                                            @break
                                                        @case(5)
                                                            <option value="5" selected="selected">21</option>
                                                            @break
                                                        @case(6)
                                                            <option value="6" selected="selected">22</option>
                                                            @break
                                                        @case(7)
                                                            <option value="7" selected="selected">23</option>
                                                            @break
                                                        @case(8)
                                                            <option value="8" selected="selected">24</option>
                                                            @break
                                                        @case(9)
                                                            <option value="9" selected="selected">25</option>
                                                            @break
                                                        @case(10)
                                                            <option value="10" selected="selected">26</option>
                                                            @break
                                                        @case(11)
                                                            <option value="11" selected="selected">27</option>
                                                            @break
                                                        @case(12)
                                                            <option value="12" selected="selected">28</option>
                                                            @break
                                                        @case(13)
                                                            <option value="13" selected="selected">29</option>
                                                            @break
                                                        @case(14)
                                                            <option value="14" selected="selected">30</option>
                                                            @break
                                                        @case(15)
                                                            <option value="15" selected="selected">31</option>
                                                            @break
                                                        @case(16)
                                                            <option value="16" selected="selected">32</option>
                                                            @break
                                                        @case(17)
                                                            <option value="17" selected="selected">33</option>
                                                            @break
                                                        @case(18)
                                                            <option value="18" selected="selected">34</option>
                                                            @break
                                                        @case(19)
                                                            <option value="19" selected="selected">35</option>
                                                            @break
                                                        @case(20)
                                                            <option value="20" selected="selected">36</option>
                                                            @break
                                                        @case(21)
                                                            <option value="21" selected="selected">37</option>
                                                            @break
                                                        @case(22)
                                                            <option value="22" selected="selected">38</option>
                                                            @break
                                                        @case(23)
                                                            <option value="23" selected="selected">39</option>
                                                            @break
                                                        @case(24)
                                                            <option value="24" selected="selected">40</option>
                                                            @break
                                                        @case(25)
                                                            <option value="25" selected="selected">41</option>
                                                            @break
                                                        @case(26)
                                                            <option value="26" selected="selected">42</option>
                                                            @break
                                                        @case(27)
                                                            <option value="27" selected="selected">43</option>
                                                            @break
                                                        @case(28)
                                                            <option value="28" selected="selected">44</option>
                                                            @break
                                                        @case(29)
                                                            <option value="29" selected="selected">45</option>
                                                            @break
                                                        @case(30)
                                                            <option value="30" selected="selected">46</option>
                                                            @break
                                                        @case(31)
                                                            <option value="31" selected="selected">47</option>
                                                            @break
                                                        @case(32)
                                                            <option value="32" selected="selected">48</option>
                                                            @break
                                                        @case(33)
                                                            <option value="33" selected="selected">49</option>
                                                            @break
                                                        @case(34)
                                                            <option value="34" selected="selected">50</option>
                                                            @break
                                                        @case(35)
                                                            <option value="35" selected="selected">51</option>
                                                            @break
                                                        @case(36)
                                                            <option value="36" selected="selected">52</option>
                                                            @break
                                                        @case(37)
                                                            <option value="37" selected="selected">53</option>
                                                            @break
                                                        @case(38)
                                                            <option value="38" selected="selected">54</option>
                                                            @break
                                                        @case(39)
                                                            <option value="39" selected="selected">55</option>
                                                            @break
                                                        @case(40)
                                                            <option value="40" selected="selected">56</option>
                                                            @break
                                                        @case(41)
                                                            <option value="41" selected="selected">57</option>
                                                            @break
                                                        @case(42)
                                                            <option value="42" selected="selected">58</option>
                                                            @break
                                                        @case(43)
                                                            <option value="43" selected="selected">59</option>
                                                            @break
                                                        @case(44)
                                                            <option value="44" selected="selected">60</option>
                                                            @break
                                                        @case(45)
                                                            <option value="45" selected="selected">61</option>
                                                            @break
                                                        @case(46)
                                                            <option value="46" selected="selected">62</option>
                                                            @break
                                                        @case(47)
                                                            <option value="47" selected="selected">63</option>
                                                            @break
                                                        @case(48)
                                                            <option value="48" selected="selected">64</option>
                                                            @break
                                                        @case(49)
                                                            <option value="49" selected="selected">65</option>
                                                            @break
                                                        @case(50)
                                                            <option value="50" selected="selected">66</option>
                                                            @break
                                                        @case(51)
                                                            <option value="51" selected="selected">67</option>
                                                            @break
                                                        @case(52)
                                                            <option value="52" selected="selected">68</option>
                                                            @break
                                                        @case(53)
                                                            <option value="53" selected="selected">69</option>
                                                            @break
                                                        @case(54)
                                                            <option value="54" selected="selected">70</option>
                                                            @break
                                                        @case(55)
                                                            <option value="55" selected="selected">71</option>
                                                            @break
                                                        @case(56)
                                                            <option value="56" selected="selected">72</option>
                                                            @break
                                                        @case(57)
                                                            <option value="57" selected="selected">73</option>
                                                            @break
                                                        @case(58)
                                                            <option value="58" selected="selected">74</option>
                                                            @break
                                                        @case(59)
                                                            <option value="59" selected="selected">75</option>
                                                            @break
                                                        @case(60)
                                                            <option value="60" selected="selected">76</option>
                                                            @break
                                                        @case(61)
                                                            <option value="61" selected="selected">77</option>
                                                            @break
                                                        @case(62)
                                                            <option value="62" selected="selected">78</option>
                                                            @break
                                                        @case(63)
                                                            <option value="63" selected="selected">79</option>
                                                            @break
                                                        @case(64)
                                                            <option value="64" selected="selected">80</option>
                                                            @break
                                                        @endswitch
                                                    </select>
                                            </article>
                                            <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20 mlM0">
                                                    <select id="publish-a14" class="select disabled" name="VedadH">
                                                            @switch($vedadH)
                                                            @case(2)
                                                                <option value="2" selected="selected">18</option>
                                                                @break
                                                            @case(3)
                                                                <option value="3" selected="selected">19</option>
                                                                @break
                                                            @case(4)
                                                                <option value="4" selected="selected">20</option>
                                                                @break
                                                            @case(5)
                                                                <option value="5" selected="selected">21</option>
                                                                @break
                                                            @case(6)
                                                                <option value="6" selected="selected">22</option>
                                                                @break
                                                            @case(7)
                                                                <option value="7" selected="selected">23</option>
                                                                @break
                                                            @case(8)
                                                                <option value="8" selected="selected">24</option>
                                                                @break
                                                            @case(9)
                                                                <option value="9" selected="selected">25</option>
                                                                @break
                                                            @case(10)
                                                                <option value="10" selected="selected">26</option>
                                                                @break
                                                            @case(11)
                                                                <option value="11" selected="selected">27</option>
                                                                @break
                                                            @case(12)
                                                                <option value="12" selected="selected">28</option>
                                                                @break
                                                            @case(13)
                                                                <option value="13" selected="selected">29</option>
                                                                @break
                                                            @case(14)
                                                                <option value="14" selected="selected">30</option>
                                                                @break
                                                            @case(15)
                                                                <option value="15" selected="selected">31</option>
                                                                @break
                                                            @case(16)
                                                                <option value="16" selected="selected">32</option>
                                                                @break
                                                            @case(17)
                                                                <option value="17" selected="selected">33</option>
                                                                @break
                                                            @case(18)
                                                                <option value="18" selected="selected">34</option>
                                                                @break
                                                            @case(19)
                                                                <option value="19" selected="selected">35</option>
                                                                @break
                                                            @case(20)
                                                                <option value="20" selected="selected">36</option>
                                                                @break
                                                            @case(21)
                                                                <option value="21" selected="selected">37</option>
                                                                @break
                                                            @case(22)
                                                                <option value="22" selected="selected">38</option>
                                                                @break
                                                            @case(23)
                                                                <option value="23" selected="selected">39</option>
                                                                @break
                                                            @case(24)
                                                                <option value="24" selected="selected">40</option>
                                                                @break
                                                            @case(25)
                                                                <option value="25" selected="selected">41</option>
                                                                @break
                                                            @case(26)
                                                                <option value="26" selected="selected">42</option>
                                                                @break
                                                            @case(27)
                                                                <option value="27" selected="selected">43</option>
                                                                @break
                                                            @case(28)
                                                                <option value="28" selected="selected">44</option>
                                                                @break
                                                            @case(29)
                                                                <option value="29" selected="selected">45</option>
                                                                @break
                                                            @case(30)
                                                                <option value="30" selected="selected">46</option>
                                                                @break
                                                            @case(31)
                                                                <option value="31" selected="selected">47</option>
                                                                @break
                                                            @case(32)
                                                                <option value="32" selected="selected">48</option>
                                                                @break
                                                            @case(33)
                                                                <option value="33" selected="selected">49</option>
                                                                @break
                                                            @case(34)
                                                                <option value="34" selected="selected">50</option>
                                                                @break
                                                            @case(35)
                                                                <option value="35" selected="selected">51</option>
                                                                @break
                                                            @case(36)
                                                                <option value="36" selected="selected">52</option>
                                                                @break
                                                            @case(37)
                                                                <option value="37" selected="selected">53</option>
                                                                @break
                                                            @case(38)
                                                                <option value="38" selected="selected">54</option>
                                                                @break
                                                            @case(39)
                                                                <option value="39" selected="selected">55</option>
                                                                @break
                                                            @case(40)
                                                                <option value="40" selected="selected">56</option>
                                                                @break
                                                            @case(41)
                                                                <option value="41" selected="selected">57</option>
                                                                @break
                                                            @case(42)
                                                                <option value="42" selected="selected">58</option>
                                                                @break
                                                            @case(43)
                                                                <option value="43" selected="selected">59</option>
                                                                @break
                                                            @case(44)
                                                                <option value="44" selected="selected">60</option>
                                                                @break
                                                            @case(45)
                                                                <option value="45" selected="selected">61</option>
                                                                @break
                                                            @case(46)
                                                                <option value="46" selected="selected">62</option>
                                                                @break
                                                            @case(47)
                                                                <option value="47" selected="selected">63</option>
                                                                @break
                                                            @case(48)
                                                                <option value="48" selected="selected">64</option>
                                                                @break
                                                            @case(49)
                                                                <option value="49" selected="selected">65</option>
                                                                @break
                                                            @case(50)
                                                                <option value="50" selected="selected">66</option>
                                                                @break
                                                            @case(51)
                                                                <option value="51" selected="selected">67</option>
                                                                @break
                                                            @case(52)
                                                                <option value="52" selected="selected">68</option>
                                                                @break
                                                            @case(53)
                                                                <option value="53" selected="selected">69</option>
                                                                @break
                                                            @case(54)
                                                                <option value="54" selected="selected">70</option>
                                                                @break
                                                            @case(55)
                                                                <option value="55" selected="selected">71</option>
                                                                @break
                                                            @case(56)
                                                                <option value="56" selected="selected">72</option>
                                                                @break
                                                            @case(57)
                                                                <option value="57" selected="selected">73</option>
                                                                @break
                                                            @case(58)
                                                                <option value="58" selected="selected">74</option>
                                                                @break
                                                            @case(59)
                                                                <option value="59" selected="selected">75</option>
                                                                @break
                                                            @case(60)
                                                                <option value="60" selected="selected">76</option>
                                                                @break
                                                            @case(61)
                                                                <option value="61" selected="selected">77</option>
                                                                @break
                                                            @case(62)
                                                                <option value="62" selected="selected">78</option>
                                                                @break
                                                            @case(63)
                                                                <option value="63" selected="selected">79</option>
                                                                @break
                                                            @case(64)
                                                                <option value="64" selected="selected">80</option>
                                                                @break
                                                            @endswitch
                                                    </select>
                                            </article>
                                            {{-- END FORM FILTER BOX --}}
                                            <article class="form__box form__box--title form__box--adjust form__box--multiple form__box--col mt20">
                                                <h3 class="w100 form__box__title mb10">Cómo mas te gustaria que tu inmueble fuera visible:</h3>
                                                @isset($visibilidad->description)
                                                    <p class="w100 text lGray regular taJ taMC mt30">{{$visibilidad->description}}</p>
                                                @endisset
                                            </article>
                                            {{-- FORM FILTER BOX --}}
                                            {{-- <article class="form__box form__box--title form__box--adjust form__box--multiple mt20 pl10 prM10">
                                                <div id="form__range" class="form__range"></div>
                                                <p id="form__rangeValue" class="text mt10"></p>
                                            </article> --}}
                                            {{-- END FORM FILTER BOX --}}
                                        </div>
                                    @endif
                                @else
                                    <div class="form__switchBox" data-switch="cliente">
                                        <p class="w100 text lGray regular taJ taMC mt30">Yo deseo hacer la segmentación de mi inmueble según mi criterio y así escoger el alcance de mi publicación.</p>
                                        {{-- FORM FILTER BOX --}}
                                        {{-- <article class="form__box form__box--title mt20">
                                            <h3 class="form__box__title mb10">Tipo de público:</h3>
                                            <select name="publish-a13" id="publish-a13" class="select" required>
                                                <option value="" selected>Seleccionar</option>
                                                <option value="1a">Casa</option>
                                                <option value="1b">Apartamento</option>
                                                <option value="1c">Loft</option>
                                                <option value="1d">Conjunto</option>
                                                <option value="1e">Proyecto</option>
                                            </select>
                                        </article> --}}
                                        {{-- END FORM FILTER BOX --}}
                                        {{-- FORM FILTER BOX --}}
                                        <article class="form__box form__box--middle form__box--title mt20">
                                            <h3 class="w100 form__box__title mb10">Ubicación Ciudad:</h3>
                                            <?php $selectedvalue=isset($inmueble) ? $inmueble->ciudad:"" ?>
                                            <select id="ciudad" class="select select--multiple" name="Vciudad[]" multiple>
                                                <option value="" selected>Seleccionar</option>
                                                <option value="107">Bogotá</option>
                                                <option value="65">Armenia</option>
                                                <option value="88">Barranquilla</option>
                                                <option value="118">Bucaramanga</option>
                                                <option value="150">Cali</option>
                                                <option value="171">Cartagena</option>
                                                <option value="428">Ibagué</option>
                                                <option value="532">Manizales</option>
                                                <option value="547">Medellín</option>
                                                <option value="657">Pereira</option>
                                                <option value="877">Santa Marta</option>
                                                <option value="1013">Tunja</option>
                                                <option value="1070">Villavicencio</option>
                                                <option value="275">Cúcuta</option>
                                                <option value="596">Neiva</option>
                                            </select>
                                        </article>
                                        {{-- END FORM FILTER BOX --}}
                                        {{-- FORM FILTER BOX --}}
                                        <article class="form__box form__box--title form__box--adjust form__box--multiple form__box--col mt20">
                                            <h3 class="w100 form__box__title mb10">Intereses:</h3>
                                            @forelse ($intereses as $interes)
                                                <input type="checkbox" name="Vinteres[]" id="interes_{{$interes->id}}" class="form__checkbox" value="{{$interes->id}}">
                                                <label for="interes_{{$interes->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$interes->interes}}</label>
                                            @empty
                                            @endforelse
                                        </article>
                                        {{-- END FORM FILTER BOX --}}
                                        {{-- FORM FILTER BOX --}}
                                        <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20">
                                                <h3 class="w100 form__box__title mb10">Género:</h3>
                                                <input type="checkbox" name="Vgenero" id="publish-a16a" class="form__checkbox" value="1">
                                                <label for="publish-a16a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Hombres</label>
                                                <input type="checkbox" name="Vgenero" id="publish-a16b" class="form__checkbox" value="2">
                                            <label for="publish-a16b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mujeres</label>
                                        </article>
                                        {{-- END FORM FILTER BOX --}}
                                        {{-- FORM FILTER BOX --}}
                                        <article class="form__box form__box--title form__box--adjust form__box--multiple mt20 mlM0">
                                            <h3 class="w100 form__box__title mb10 ml0">Edad</h3>
                                        </article>
                                        <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20 mlM0">
                                            <h3 class="w100 form__box__title mb10 ml0">Desde:</h3>
                                            <select id="publish-a13" class="select" name="VedadD">
                                                <option value="" selected>Selecciona una edad</option>
                                                <option value="1"></option>
                                                <option value="2">18</option>
                                                <option value="3">19</option>
                                                <option value="4">20</option>
                                                <option value="5">21</option>
                                                <option value="6">22</option>
                                                <option value="7">23</option>
                                                <option value="8">24</option>
                                                <option value="9">25</option>
                                                <option value="10">26</option>
                                                <option value="11">27</option>
                                                <option value="12">28</option>
                                                <option value="13">29</option>
                                                <option value="14">30</option>
                                                <option value="15">31</option>
                                                <option value="16">32</option>
                                                <option value="17">33</option>
                                                <option value="18">34</option>
                                                <option value="19">35</option>
                                                <option value="20">36</option>
                                                <option value="21">37</option>
                                                <option value="22">38</option>
                                                <option value="23">39</option>
                                                <option value="24">40</option>
                                                <option value="25">41</option>
                                                <option value="26">42</option>
                                                <option value="27">43</option>
                                                <option value="28">44</option>
                                                <option value="29">45</option>
                                                <option value="30">46</option>
                                                <option value="31">47</option>
                                                <option value="32">48</option>
                                                <option value="33">49</option>
                                                <option value="34">50</option>
                                                <option value="35">51</option>
                                                <option value="36">52</option>
                                                <option value="37">53</option>
                                                <option value="38">54</option>
                                                <option value="39">55</option>
                                                <option value="40">56</option>
                                                <option value="41">57</option>
                                                <option value="42">58</option>
                                                <option value="43">59</option>
                                                <option value="44">60</option>
                                                <option value="45">61</option>
                                                <option value="46">62</option>
                                                <option value="47">63</option>
                                                <option value="48">64</option>
                                                <option value="49">65</option>
                                                <option value="50">66</option>
                                                <option value="51">67</option>
                                                <option value="52">68</option>
                                                <option value="53">69</option>
                                                <option value="54">70</option>
                                                <option value="55">71</option>
                                                <option value="56">72</option>
                                                <option value="57">73</option>
                                                <option value="58">74</option>
                                                <option value="59">75</option>
                                                <option value="60">76</option>
                                                <option value="61">77</option>
                                                <option value="62">78</option>
                                                <option value="63">79</option>
                                                <option value="64">80</option>
                                            </select>
                                        </article>
                                        <article class="form__box form__box--title form__box--middle form__box--adjust form__box--multiple mt20 mlM0">
                                            <h3 class="w100 form__box__title mb10 ml0">Hasta:</h3>
                                            <select id="publish-a13" class="select" name="VedadH">
                                                <option value="" selected>Selecciona una edad</option>
                                                <option value="1"></option>
                                                <option value="2">18</option>
                                                <option value="3">19</option>
                                                <option value="4">20</option>
                                                <option value="5">21</option>
                                                <option value="6">22</option>
                                                <option value="7">23</option>
                                                <option value="8">24</option>
                                                <option value="9">25</option>
                                                <option value="10">26</option>
                                                <option value="11">27</option>
                                                <option value="12">28</option>
                                                <option value="13">29</option>
                                                <option value="14">30</option>
                                                <option value="15">31</option>
                                                <option value="16">32</option>
                                                <option value="17">33</option>
                                                <option value="18">34</option>
                                                <option value="19">35</option>
                                                <option value="20">36</option>
                                                <option value="21">37</option>
                                                <option value="22">38</option>
                                                <option value="23">39</option>
                                                <option value="24">40</option>
                                                <option value="25">41</option>
                                                <option value="26">42</option>
                                                <option value="27">43</option>
                                                <option value="28">44</option>
                                                <option value="29">45</option>
                                                <option value="30">46</option>
                                                <option value="31">47</option>
                                                <option value="32">48</option>
                                                <option value="33">49</option>
                                                <option value="34">50</option>
                                                <option value="35">51</option>
                                                <option value="36">52</option>
                                                <option value="37">53</option>
                                                <option value="38">54</option>
                                                <option value="39">55</option>
                                                <option value="40">56</option>
                                                <option value="41">57</option>
                                                <option value="42">58</option>
                                                <option value="43">59</option>
                                                <option value="44">60</option>
                                                <option value="45">61</option>
                                                <option value="46">62</option>
                                                <option value="47">63</option>
                                                <option value="48">64</option>
                                                <option value="49">65</option>
                                                <option value="50">66</option>
                                                <option value="51">67</option>
                                                <option value="52">68</option>
                                                <option value="53">69</option>
                                                <option value="54">70</option>
                                                <option value="55">71</option>
                                                <option value="56">72</option>
                                                <option value="57">73</option>
                                                <option value="58">74</option>
                                                <option value="59">75</option>
                                                <option value="60">76</option>
                                                <option value="61">77</option>
                                                <option value="62">78</option>
                                                <option value="63">79</option>
                                                <option value="64">80</option>
                                            </select>
                                        </article>
                                        {{-- END FORM FILTER BOX --}}
                                        <article class="form__box form__box--title form__box--adjust form__box--multiple mt20 mlM0 w100">
                                            <h3 class="w100 form__box__title mb10 ml0 w100">Cómo mas te gustaria que tu inmueble fuera visible:</h3>
                                            <textarea name="Vdescription" id="" class="form__textarea form__textarea--line w100"></textarea>
                                        </article>
                                        {{-- END FORM FILTER BOX --}}
                                        {{-- FORM FILTER BOX --}}
                                        {{-- <article class="form__box form__box--title form__box--adjust form__box--multiple mt20 pl10 prM10">
                                            <div id="form__range" class="form__range"></div>
                                            <p id="form__rangeValue" class="text mt10"></p>
                                        </article> --}}
                                        {{-- END FORM FILTER BOX --}}
                                    </div>
                                @endisset
                                {{-- <div class="form__switchBox" data-switch="ap">
                                    <p class="w100 text lGray regular taJ taMC mt30">Nosotros haremos la segmentación de tu inmueble con nuestro criterio y las características de tu inmueble.</p>
                                </div> --}}
                                {{-- END FORM SWITCH BOX --}}
                                {{-- FORM SWITCH BOX --}}


                                {{-- END FORM SWITCH BOX --}}
                            </div>
                        </article>
                        {{-- STEP BOX CONTENT --}}
                        <a href="#" class="btn btn--gradient ttU mt10 mrA mlMA stepBox__prev">Volver</a>
                        <a href="#" class="btn btn--gradient ttU mt10 mlA mrMA stepBox__next">Siguiente</a>
                    </form>
                    {{-- END STEP BOX CONTAINER --}}
                </section>
                {{-- END STEP BOX --}}
            </div>
        </div>
        @isset($inmueble)
            <section class="modal modal--logIn hide " data-modal="empty" id="eliminarO">
                <div class="modal__container">
                    <span class="modal__close"></span>
                    {{-- MODAL CONTENT --}}
                    <div class="modal__content ">
                        <section class="modal__section pt10 pb20 max350">
                            {{-- <p>Debes iniciar sesión para porder añadir inmuebles a tus favoritos.</p> --}}
                            {{-- <h2 class="dIB bold text text--m dGray mb20">Debes iniciar sesión para poder añadir inmuebles a tus favoritos</h2> --}}
                            <h2 class="dIB bold text dGray mb10">Ten en cuenta .</h2>
                            <h2 class="dIB text dGray mb20">Si eliminas la imagen no se puede recuperar.</h2>
                            {{-- <h2 class="dIB bold text text--m dGray mb20">Debes iniciar sesión para poder añadir inmuebles a tus favoritos</h2> --}}
                            <input type="text" name="slug" value="{{$inmueble->slug}}" hidden>
                            <a href="#" class="btn btn--noLimit btn--hoverLPurple ttU mb10" id="eliminarOld">Eliminar</a>
                            <a href="#" class="btn btn--noLimit btn--hoverLPurple ttU" id="cancelO">Cancelar</a>
                        </section>
                    </div>
                    {{-- END MODAL CONTENT --}}
                </div>
            </section>

        @endisset
        @section("scripts")
        <script src="{{asset("/js/libraries/dropzone.js")}}"></script>
        <script src="{{asset("/js/libraries/datepicker.min.js")}}"></script>
        <script src="{{asset("/js/i18n/datepicker.es.js")}}"></script>
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyAQJp65GQ3zAebmsEqhvkvu4Kq717Fty40&sensor=false&amp;libraries=places"></script>
        <script src="{{asset("/js/libraries/locationpicker.jquery.min.js")}}"></script>

        <script>
            var loadFile = function(event) {
                var output = document.getElementById('outputPhoto');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <script>

            $("#map").locationpicker({
                enableAutocomplete: true,
                enableReverseGeocode: true,
                radius: 0,
                location: {
                    longitude: -74.1,
                    latitude: 4.65
                },
                inputBinding: {
                    latitudeInput: $("#publish-b5"),
                    longitudeInput: $("#publish-b4"),
                },
                // markerIcon: "/images/icons/location--y.svg",
                markerIcon: {
                    url: "/images/icons/location--y.svg",
                    scaledSize : new google.maps.Size(40, 60)
                },
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    var addressComponents = $(this).locationpicker('map').location.addressComponents;
                console.log(currentLocation);  //latlon
                updateControls(addressComponents); //Data
                }

            });

            // var marker = new google.maps.Marker({
            //     position: {lat: latitud, lng: longitud},
            //     map: c,
            //     icon: {
            //         url: '{{asset("images/icons/location--y2.svg")}}',
            //         scaledSize : new google.maps.Size(40, 60),
            //     }
            // });

            function updateControls(addressComponents) {
                console.log(addressComponents);
            }

            new google.maps.Size(42,68)

        </script>
        @if (isset($citas_asignadas->fecha))
        <script>
            $(document).ready(function(){
                var date = '{{$citas_asignadas->fecha}}'
                var dateArray  = date.replace('/',',')

                $(".datePicker").datepicker().data('datepicker').selectDate(new Date(dateArray))
            })
        </script>
        @endif
        @endsection
    @endsection
    {{-- END CONTENT --}}
