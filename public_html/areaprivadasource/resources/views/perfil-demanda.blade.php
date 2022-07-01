@extends('main')

{{-- CONTENT --}}
@section('content')
    {{-- BANNER --}}
    <section class="banner">
        <div class="banner__container">
            <picture class="banner__bg">
                <source media="(max-width: 767px)" srcset="images/banner/Quienessomos-PQR.jpg">
                <img src="images/banner/Quienessomos-PQR.jpg" alt="" class="banner__bg__img">
            </picture>
        </div>
    </section>
    {{-- END BANNER --}}

    {{-- PROFILE BOX --}}
    <section class="profileBox">
        {{-- PROFILE BOX TOP --}}
        <div class="profileBox__top">
            <div class="container container--limit profileBox__container">
                <div class="profileBox__left">
                    <img src="images/icons/folder--p.svg" class="profileBox__icon" class="profileBox__icons">
                    <h2 class="text text--xm dGray semiBold ttU profileBox__marker">Mis datos</h2>
                </div>
                <div class="profileBox__right">
                    {{-- PROFILE BOX NAV --}}
                    <nav class="profileBox__nav">
                        {{-- PROFILE BOX NAV ITEM--}}
                        <a href="#" class="profileBox__nav__item active" data-profile="misDatos" data-profile-icon="folder--p">Mis datos</a>
                        {{-- END PROFILE BOX NAV ITEM--}}
                        {{-- PROFILE BOX NAV ITEM--}}
                        <a href="#" class="profileBox__nav__item" data-profile="lista" data-profile-icon="heart--p"> <span class="icon icon--heart mr5"></span> Favoritos</a>
                        {{-- END PROFILE BOX NAV ITEM--}}
                        {{-- PROFILE BOX NAV ITEM--}}
                        <a href="#" class="profileBox__nav__item" data-profile="comparaciones" data-profile-icon="compare--p">Comparaciones</a>
                        {{-- END PROFILE BOX NAV ITEM--}}
                        {{-- PROFILE BOX NAV ITEM--}}
                        <a href="/salir" class="profileBox__nav__item">
                            <!-- Cerrar Sesión -->
                            <span class="icon icon--logOut icon--20" title="Salir"></span>
                        </a>
                        {{-- END PROFILE BOX NAV ITEM--}}
                    </nav>
                    {{-- END PROFILE BOX NAV --}}
                </div>
            </div>
        </div>
        {{-- END PROFILE BOX TOP --}}
        {{-- PROFILE BOX BOTTOM --}}
        <div class="profileBox__bottom">
            <div class="container container--limit profileBox__container">
                {{-- PROFILE BOX CONTENT --}}
                <form action="{{route('perfil-demanda-update')}}" method="post" class="profileBox__content" data-profile="misDatos" id="FormUpdate_user" enctype="multipart/form-data">
                    <div class="profileBox__left" >
                        {{-- PROFILE BOX USER IMG --}}
                        <picture class="profileBox__userPic ">
                            <img src="{{Auth::user()->logo?asset('uploads/'.Auth::user()->logo):''}}" alt="" class="profileBox__userPic__img" id="output">
                        </picture>
                        {{-- END PROFILE BOX USER IMG --}}
                    </div>
                    <div class="profileBox__right">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--title mt20 ">
                            <label class="form__box__title dB mb10" for="perfilD6">Foto de perfil:</label>
                            <div class="form__pseudo form__pseudo--invert">
                                <input type="file" name="logo" id="perfilD6" class="form__iFile" onchange="loadFile(event)" placeholder="Foto de perfil">
                                <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                <span class="form__pseudo__message">Ningún archivo seleccionado</span>
                            </div>
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box mt30">
                            <label class="form__box__pLabel text text--xs semibold dGray" for="perfilD1">* Nombres y Apellidos</label>
                            <input type="text" class="form__input form__input--line letras" id="perfilD1" name="name" value="{{Auth::user()->name}}">
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box mt20">
                            <label class="form__box__pLabel text text--xs semibold dGray numeros" for="perfilD2">* Tipo de documento</label>
                            <select  id="filterx1" class="select dGray" name="typedoc">
                                @if (Auth::user()->tipo_documento)
                                @else
                                    <option value="" selected>Seleccionar</option>
                                @endif
                                @forelse ($td as $item)
                                    @if (Auth::user()->tipo_documento ==  $item->id )
                                        <option value="{{Auth::user()->tipo_documento}}" selected>{{$item->tipo}}</option>
                                    @endif
                                    <option value="{{$item->id}}">{{$item->tipo}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box mt20">
                            <label class="form__box__pLabel text text--xs semibold dGray numeros" for="perfilD2">* Número de Identificación</label>
                            <input type="number" class="form__input form__input--line" id="perfilD2" name="document" value="{{Auth::user()->document}}">
                            @error('document')<label id="email-error" class="error" for="email"> {{ $message }} </label>@enderror
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--50 mt20">
                            <label class="form__box__pLabel text text--xs semibold dGray numeros" for="perfilD3">Teléfono fijo</label>
                            <input type="text" class="form__input form__input--line" id="perfilD3" name="phone" value="{{Auth::user()->phone}}" placeholder="Ingrese su número">
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--50 mt20 mlA">
                            <label class="form__box__pLabel text text--xs semibold dGray numeros" for="perfilD4">* Teléfono movil</label>
                            <input type="text" class="form__input form__input--line" id="perfilD4" name="cel_phone" value="{{Auth::user()->cel_phone}}" placeholder="Ingrese su número">
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box mt20">
                            <label class="form__box__pLabel text text--xs semibold dGray" for="perfilD5">* Usuario / Correo Electrónico</label>
                            <input type="text" class="form__input form__input--line" id="perfilD5" placeholder="usuario@correoelectronico.com" name="email" value="{{Auth::user()->email}}">
                            <a href="" class="regular text text--xxs taL dIB tdU cColor pt10 showChangePass">Cambiar contraseña</a>
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--toShow form__box--50 mt20">
                            <label class="form__box__pLabel text text--xs semibold dGray" for="pass1">Nueva Contraseña</label>
                            <input type="password" class="form__input form__input--line" id="pass1" name="password">
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--toShow form__box--50 mt20 mlA">
                            <label class="form__box__pLabel text text--xs semibold dGray" for="passs2">Repite Nueva Contraseña</label>
                            <input type="password"  class="form__input form__input--line" id="passs2" name="confirm_password">
                        </article>
                        {{-- END FORM BOX --}}
                        {{-- FORM BOX --}}
                        <article class="form__box form__box--flex mt20">
                            <button type="submit"  class="btn btn--gradient btn--shadow ttU mlA" id="save_userData">Guardar cambios</button>
                            {{-- <a href="#" class="btn btn--gradient btn--shadow ttU mlA">Guardar cambios</a> --}}
                        </article>
                        {{-- END FORM BOX --}}
                    </div>
                </form>
                {{-- END PROFILE BOX CONTENT --}}
                {{-- PROFILE BOX CONTENT --}}
                <article class="profileBox__content pt0 hidden" data-profile="lista">
                    {{-- FORM FILTER --}}
                    @php
                        $publicar_para = ['0'=>'Arriendo','1'=>'Compra nuevo','2'=>'Compra usado', '3'=>'Compra y Arriendo nuevo','4'=>'Compra y Arriendo usado'];
                    @endphp
                    @component('component.filterForm',['tipo_inmueble'=>$tipos_inmueble,'ciudades'=>$ciudades, 'publicar_para'=>$publicar_para])
                        @slot('url')filterGeneral @endslot
                    @endcomponent
                    {{-- END FORM FORM --}}    
                    {{-- <div class="container dF jcFE profileBox__selects">
                        <select name="example" id="s3" class="select wA">
                            <option value="" selected>Ordenar por:</option>
                            <option value="bogota">Bogotá</option>
                            <option value="cali">Cali</option>
                            <option value="barranquilla">Barranquilla</option>
                            <option value="bucaramanga">Bucaramanga</option>
                        </select>
                        <select name="example" id="s4" class="select wA ml10">
                            <option value="" selected>Mostrar:</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div> --}}
                    {{-- CONTAINER CARDS --}}
                    <div class="container container--cards pt40">
                        {{-- CARD --}}
                        @php
                            $publicar_para = ['0'=>'Venta','1'=>'Venta', '3'=>'Venta o Arriendo nuevo','2'=>'Arriendo', '4'=>'Venta o Arriendo usado'];
                        @endphp
                        @forelse ($inmuebles_favoritos as $inmueble)
                            @component('component.smallCard')
                                @slot('compare')@endslot
                                @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                                @slot('uso')
                                {{$publicar_para[$inmueble->uso]}}
                                @endslot
                                @slot('slug') {{$inmueble->slug}}@endslot
                                @slot('price') {{number_format($inmueble->valor_venta)}}@endslot
                                @slot('subtitle') {{$inmueble->titulo}} @endslot
                                @slot('name'){{$inmueble->titulo}} @endslot
                                @slot('img'){{$inmueble->url_img}} @endslot
                                @slot('delete')  @endslot
                                @slot('meters')  {{$inmueble->medida_apartamento}}   @endslot
                                @slot('garages')  {{$inmueble->n_garages}}     @endslot
                                @slot('bedrooms')  {{$inmueble->n_habitaciones}}    @endslot
                                @slot('bathrooms'){{$inmueble->n_banos}}     @endslot
                                @slot('contact')        @endslot
                            @endcomponent
                        @empty
                            No tienes favoritos
                        @endforelse
                        {{-- END CARD --}}
                    </div>
                    {{-- END CONTAINER CARDS --}}
                    @if(isset($inmuebles_favoritos) && sizeof($inmuebles_favoritos) && sizeof($inmuebles_favoritos) > 9)
                    <p class="text text--m semiBold lPurple mt20">Mostrando 10 resultados por página</p>
                    @endif
                    {{-- PAGINATION --}}
                    @component('component.pagination',['paginator'=>$inmuebles_favoritos])
                        @slot('additionalClasses')
                        mb30
                        @endslot
                        @slot('current')
                        1
                        @endslot
                        @slot('total')
                        10
                        @endslot
                    @endcomponent
                    {{-- END PAGINATION --}}
                </article>
                {{-- END PROFILE BOX CONTENT --}}
                {{-- PROFILE BOX CONTENT --}}
                <div id="comparacionesData" class="oA">
                    @component('component.comparaciones',['comparaciones'=>$comparaciones])
                        
                    @endcomponent
                </div>
                {{-- END PROFILE BOX CONTENT --}}
            </div>
        </div>
        {{-- END PROFILE BOX BOTTOM --}}
    </section>
    {{-- END PROFILE BOX --}}
    {{-- Alerts --}}
    <section class="alert" id="alerts">
    </section>
    <script>
      var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
@endsection
{{-- END CONTENT --}}