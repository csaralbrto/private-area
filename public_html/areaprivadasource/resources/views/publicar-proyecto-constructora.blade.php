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
                    <h2 class="w100 fz25 fzM20 black semiBold dGray ttU taL taMC iconTitle">Título del Proyecto a publicar</h2>
                </div>
                @if(isset($inmueble))
                    <div class="container dF container--50">
                        <h2 class="title title--s semiBold taMC dPurple mlA mrMA">Código del Proyecto: <span class="regular">{{$proyectox[0]['slug']}}</span></h2>
                    </div>
                @endif
            </div>
            {{-- STEP BOX --}}
            <section class="stepBox stepBox--7 mt40 mb40">
                {{-- STEP BOX NAV --}}
                <nav class="stepBox__nav">
                    {{-- STEP BOX NAV LIST --}}
                    <ul class="stepBox__nav__list">
                        <span class="stepBox__nav__indicator"></span>
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item" data-stepbox="proyecto">
                            Proyecto
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                         {{-- STEP BOX NAV LIST ITEM --}}
                         <li class="stepBox__nav__item disabled" data-stepbox="ubicacion">
                            Ubicación
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                    </ul>
                    {{-- END STEP BOX NAV LIST --}}
                </nav>
                {{-- END STEP BOX NAV --}}
                {{-- STEP BOX CONTAINER --}}
                <form method="post" action="{{route('paso-paso-publicacion-proyecto')}}" class="stepBox__container form form--publish" id="form--publish" enctype="multipart/form-data">
                    @csrf
                    {{-- STEP BOX CONTENT --}}
                    <input type="hidden" name="proyecto_id" id="proyecto_id" value={{$proyectox[0]['id']}}>
                    <input type="hidden" name="projectEdit" id="projectEdit" value="1">
                    <article class="stepBox__content" data-stepbox="proyecto">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso proyecto</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Proyecto</h2>
                            <div class="lGray mt10 taJ">
                                <p class="text lGray regular">{!!$textos[6]->texto!!}</p>
                            </div>
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50  @if(isset($proyectox))hidden @endif">
                                <input type="radio" name="fproyecto" id="fproyecto--existente" class="form__radio" data-project="existing" value="new" {{ isset($proyectox) ? 'checked="checked"' : '' }} {{ isset($proyectox) ? 'checked="checked"' : '' }}>
                                <label for="fproyecto--existente" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs ml0">Proyecto Existente</label>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20 {{ (isset($inmueble) || isset($proyectox)) ? '': 'hidden' }}" data-project="existing">
                                <h3 class="form__box__title mb10">Escoger Proyecto:</h3>
                                <select name="Pexistente" id="Pexistente" class="select" required>
                                    <option value="" selected>Seleccionar</option>
                                    @forelse ($proyectox as $proyecto)
                                        <option value="{{$proyectox[0]['id']}}" selected="selected">{{$proyectox[0]['nombre']}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">Nombre del Proyecto:</h3>
                                <input type="text" name="Pname" id="fProyecto-1b" class="form__input form__input--line" @if(isset($proyectox))value="{{$proyectox[0]['nombre']}}"@endif placeholder="" required>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">Descripción del Proyecto:</h3>
                                <textarea type="text" class="form__textarea form__textarea--line" name="Pdescription" id="fProyecto-1c" required>@if(isset($proyectox)){{$proyectox[0]['descripcion']}}@endif</textarea>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">Imagen del Proyecto:</h3>
                                <div class="form__pseudo">
                                    <input type="file" name="PBanner" id="fProyecto-1d" class="form__iFile" placeholder="Video del inmueble">
                                    <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                    <span class="form__pseudo__message">@if(isset($proyectox)){{$proyectox[0]['imagen_banner']}}@else Ningún archivo seleccionado @endif </span>
                                </div>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20 @if(isset($proyectox))hidden @endif" data-project="existing">
                                <h3 class="form__box__title mb10">Arrastra el marcador en la dirección del inmueble.</h3>
                                {{-- MAP --}}
                                <div class="container map mt20">
                                    {{-- MAP CONTENT--}}
                                    <div id="mapProject" class="w100 map__content"></div>
                                    {{-- END MAP CONTENT--}}
                                </div>
                                {{-- END MAP --}}
                            </article>
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20 @if(isset($proyectox))  @else hidden @endif" data-project="existing">
                                    <h3 class="form__box__title mb10">Coordenadas:</h3>
                                </article>
                                {{-- FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20" data-project="existing">
                                <label class="form__box__title dB mb10" for="fProyecto-1e">Longitud:</label>
                                <input type="text" name="longitude" id="fProyecto-1e" class="form__input form__input--line" @if(isset($proyectox))value="{{$proyectox[0]['longitude']}}" disabled @endif placeholder="Longitud">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20 mlA" data-project="existing">
                                <label class="form__box__title dB mb10" for="fProyecto-1f">Latitud:</label>
                                <input type="text" name="latitude" id="fProyecto-1f" class="form__input form__input--line" @if(isset($proyectox))value="{{$proyectox[0]['latitude']}}" disabled @endif placeholder="Latitud">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">Imagen video 1:</h3>
                                <div class="form__pseudo">
                                    <input type="file" name="PImageV" id="fProyecto-1g" class="form__iFile" placeholder="Video del inmueble" >
                                    <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                    <span class="form__pseudo__message">@if(isset($proyectox)){{$proyectox[0]['imagen_multimedia']}}@else Ningún archivo seleccionado @endif </span>
                                </div>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">URL video Youtube 1:</h3>
                                <input type="url" name="PurlV" id="fProyecto-1h" class="form__input form__input--line"  @if(isset($proyectox))value="{{$proyectox[0]['multimedia']}}"@endif placeholder="">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">Imagen video 2:</h3>
                                <div class="form__pseudo">
                                    <input type="file" name="PImageV2" id="fProyecto-1i" class="form__iFile" placeholder="Video del inmueble">
                                    <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                    <span class="form__pseudo__message">@if(isset($proyectox)){{$proyectox[0]['imagen_multimedia2']}}@else Ningún archivo seleccionado @endif </span>
                                </div>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20" data-project="existing">
                                <h3 class="form__box__title mb10">URL video Youtube 2:</h3>
                                <input type="url" name="PurlV2" id="fProyecto-1j" class="form__input form__input--line"  @if(isset($proyectox))value="{{$proyectox[0]['multimedia2']}}"@endif  placeholder="">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--adjust form__box--multiple mt20 form__box--col" data-project="existing">
                                <h3 class="form__box__title mb10">Amenities:</h3>
                            @if(isset($proyectox))
                                @forelse ($adicionales_proyectox as $key => $adicional)
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
                                @forelse ($adicionales as $adicional)
                                    <input type="checkbox" name="Cadicionales[]" id="adicionales_{{$adicional->id}}" class="form__checkbox" value="{{$adicional->id}}">
                                    <label for="adicionales_{{$adicional->id}}" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">{{$adicional->nombre}}</label>
                                @empty
                                    <p>No hay adicionales</p>
                                @endforelse
                            @endif
                            </article>
                            <article class="form__box form__box--title hidden">
                                {{-- DROPZONE --}}
                                <div class="dropzone">
                                    <input class="dropzone__input" name="file" type="file" id="publish-e1" multiple>
                                    {{-- DROPZONE INFO --}}
                                    <div class="dropzone__info">
                                        <a href="#" class="btn btn--hoverLPurple ttU pLink dropzone__btn" id="publish-img">Cargar Imágenes</a>
                                        <p class="w100 text dGray taC mt10 textFotos">Formato: JPG, JPEG, PNG, máx 8MB</p>
                                    </div>
                                    {{-- END DROPZONE INFO --}}
                                </div>
                                {{-- END DROPZONE --}}
                            </article>
                            {{-- END FORM FILTER BOX --}}
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="ubicacion">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 1</h2>
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
                                <?php $selectedvalue=isset($proyectox[0]['ciudad']) ? $proyectox[0]['ciudad']:"" ?>
                                <select name="ciudad" id="ciudad2" class="select disabled" disabled>
                                    <option value="" selected>Seleccionar</option>
                                    @forelse ($ciudad as $key => $item)
                                        <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20">
                                <label class="form__box__title dB mb10" for="publish-b2">Localidad:</label>
                                <?php $selectedvalue=isset($proyectox[0]['localidad']) ? $proyectox[0]['localidad']:"" ?>
                                <select name="localidad" id="localidad" class="select disabled" disabled>
                                    <option value="" selected>Seleccionar</option>
                                    @forelse ($localidades as $key => $item)
                                        <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                    @empty

                                    @endforelse

                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20 mlA">
                                <label class="form__box__title dB mb10 " for="publish-b2">Barrio:</label>
                                <?php $selectedvalue=isset($proyectox[0]['barrio']) ? $proyectox[0]['barrio']:"" ?>
                                <select name="barrio" id="barrio" class="select" disabled>
                                    <option value="" selected>Seleccionar</option>
                                    @forelse ($barrio as $key => $item)
                                        <option value="{{$key}}" {{ $selectedvalue == $key ? 'selected="selected"' : '' }}>{{$item}}</option>
                                    @empty

                                    @endforelse

                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <label class="form__box__title dB mb10 disabled" for="publish-b3">Dirección:</label>
                                <input type="text" @if(isset($proyectox[0]['direccion']))value="{{$proyectox[0]['direccion']}}" @else placeholder="Direccion"@endif name="UDireccion" id="publish-p3" class="form__input form__input--line disabled">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            {{-- <article class="form__box form__box--title mt20">
                                <h3 class="form__box__title mb10">Arrastra el marcador en la dirección del inmueble.</h3> --}}
                                {{-- MAP --}}
                                {{-- <div class="container map mt20"> --}}
                                    {{-- MAP CONTENT--}}
                                    {{-- <div id="map" class="w100 map__content"></div> --}}
                                    {{-- END MAP CONTENT--}}
                                {{-- </div> --}}
                                {{-- END MAP --}}
                            {{-- </article> --}}
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            {{-- <article class="form__box form__box--title form__box--50 mt20">
                                <label class="form__box__title dB mb10" for="publish-b4">Longitud:</label>
                                <input type="text" @if(isset($inmueble))value="{{$inmueble->longitude}}"@endif name="Ulongitude" id="publish-b4" class="form__input form__input--line" placeholder="Longitud">
                            </article> --}}
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            {{-- <article class="form__box form__box--title form__box--50 mt20 mlA">
                                <label class="form__box__title dB mb10" for="publish-b5">Latitud:</label>
                                <input type="text" @if(isset($inmueble))value="{{$inmueble->latitude}}"@endif name="Ulatitude" id="publish-b5" class="form__input form__input--line" placeholder="Latitud">
                            </article> --}}
                            {{-- END FORM FILTER BOX --}}
                        </div>
                    </article>
                    <a href="#" class="btn btn--gradient ttU mt10 mrA mlMA stepBox__prev">Volver</a>
                    <a href="#" class="btn btn--gradient ttU mt10 mlA mrMA stepBox__next">Siguiente</a>
                </form>
                {{-- END STEP BOX CONTAINER --}}
            </section>
            {{-- END STEP BOX --}}
        </div>
    </div>
    @section("scripts")
    <script src="{{asset("/js/libraries/dropzone.js")}}"></script>
    <script src="{{asset("/js/libraries/datepicker.min.js")}}"></script>
    <script src="{{asset("/js/i18n/datepicker.es.js")}}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAQJp65GQ3zAebmsEqhvkvu4Kq717Fty40&sensor=false&amp;libraries=places"></script>
    <script src="{{asset("/js/libraries/locationpicker.jquery.min.js")}}"></script>

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
            // markerIcon: "/images/icons/location--y--mini.png",
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

        $("#mapProject").locationpicker({
            enableAutocomplete: true,
            enableReverseGeocode: true,
            radius: 0,
            location: {
                longitude: -74.1,
                latitude: 4.65
            },
            inputBinding: {
                latitudeInput: $("#fProyecto-1e"),
                longitudeInput: $("#fProyecto-1f"),
            },
            // markerIcon: "/images/icons/location--y.svg",
            markerIcon: {
                url: "/images/icons/location--y.svg",
                scaledSize : new google.maps.Size(40, 60)
            },
            onchanged: function (currentLocation, radius, isMarkerDropped) {
                var addressComponents = $(this).locationpicker('mapProject').location.addressComponents;
            console.log(currentLocation);  //latlon
            updateControls(addressComponents); //Data
            }
        });

        function updateControls(addressComponents) {
            console.log(addressComponents);
        }

    </script>
   @endsection
@endsection
{{-- END CONTENT --}}
