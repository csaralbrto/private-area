@extends('main')

{{-- CONTENT --}}
@section('content')
    {{-- BANNER --}}
    <section class="banner banner--complete banner--rightFixed">
        {{-- BANNER BG --}}
        <picture class="banner__bg">
            <source media="(max-width: 767px)" srcset="{{asset('uploads/'.$proyecto->imagen_banner)}}">
            <img src="{{asset('uploads/'.$proyecto->imagen_banner)}}" alt="" class="banner__bg__img">
        </picture>
        {{-- END BANNER BG --}}
        {{-- BANNER CONTAINER --}}
        <div class="banner__container">
            {{-- BANNER LEFT --}}
            <div class="banner__left">
                @if(isset($proyecto_relacionados) && sizeof($proyecto_relacionados))
                    @if($proyecto->logo)
                        <a href="#cardsHomeSection" class="banner__logo">
                            <img src="{{asset('uploads/'.$proyecto->logo)}}" alt="" class="banner__logo__img">
                        </a>
                    @endif
                @else
                    @if($proyecto->logo)
                        <a href="#" class="banner__logo">
                            <img src="{{asset('uploads/'.$proyecto->logo)}}" alt="" class="banner__logo__img">
                        </a>
                    @endif
                @endif
                <a href="#" class="w100 fz35 fzM30 white semiBold ttU mt20 mtM15 lh1">{{$proyecto->nombre}}</a>
                <form class="w100 form form--heart">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.2 21.8" style="enable-background:new 0 0 25.2 21.8;" xml:space="preserve" class="heart mt10 @auth favorite_user  @else login @endauth">
                        <g id="relleno" class="heart__bg">
                            <title>Me gusta</title>
                            <g>
                                <g>
                                    <path id="like_icon_1_" class="st0" d="M25,8.3c-0.1,0.8-0.3,1.5-0.6,2.3c-0.5,1.2-1.3,2.3-2.2,3.2c-1.5,1.5-3,2.9-4.7,4.3
                                        l-3.9,3.2c-0.6,0.6-1.6,0.6-2.2,0c-2-1.7-4-3.3-5.9-5c-1.5-1.2-2.8-2.6-4-4.2c-0.8-1.1-1.3-2.4-1.5-3.7c0,0,0-0.1,0-0.1V6.5V6.3
                                        c0.2-1.9,1.2-3.6,2.6-4.7c2.4-1.9,5.7-2,8.1-0.2c0.6,0.4,1.1,0.9,1.5,1.5c0.1,0.2,0.2,0.2,0.3,0s0.3-0.3,0.4-0.4
                                        c1.5-1.7,3.8-2.6,6.1-2.2c2.4,0.3,4.4,1.9,5.3,4.2c0.3,0.7,0.4,1.4,0.5,2.1V8.3z"/>
                                </g>
                            </g>
                        </g>
                        <g id="borde" class="card__heart__stroke ">
                            <g>
                                <g>
                                    <path id="like_icon" class="st0" d="M25,8.3c-0.1,0.8-0.3,1.5-0.6,2.3c-0.5,1.2-1.3,2.3-2.2,3.2c-1.5,1.5-3,2.9-4.7,4.3l-3.9,3.2
                                        c-0.6,0.6-1.6,0.6-2.2,0c-2-1.7-4-3.3-5.9-5c-1.5-1.2-2.8-2.6-4-4.2c-0.8-1.1-1.3-2.4-1.5-3.7c0,0,0-0.1,0-0.1V6.5V6.3
                                        c0.2-1.9,1.2-3.6,2.6-4.7c2.4-1.9,5.7-2,8.1-0.2c0.6,0.4,1.1,0.9,1.5,1.5c0.1,0.2,0.2,0.2,0.3,0s0.3-0.3,0.4-0.4
                                        c1.5-1.7,3.8-2.6,6.1-2.2c2.4,0.3,4.4,1.9,5.3,4.2c0.3,0.7,0.4,1.4,0.5,2.1V8.3z M23.5,8.1c0-2.4-0.6-4-1.9-5.2
                                        c-1.7-1.5-4.1-1.8-6.1-0.7c-0.9,0.5-1.6,1.3-2.2,2.2C13.1,4.9,12.5,5,12,4.7c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.4-0.5-0.7-0.7-1
                                        C9.1,1.2,5.8,1,3.7,2.9C3.6,2.9,3.5,3,3.4,3.1C1.9,4.5,1.3,6.6,1.7,8.6c0.2,1.2,0.8,2.3,1.6,3.2c1.2,1.4,2.5,2.8,4,3.9
                                        c1.7,1.4,3.4,2.8,5.1,4.3c0.2,0.2,0.3,0.1,0.5,0c1.9-1.6,3.8-3.1,5.6-4.7c1.3-1.1,2.5-2.3,3.5-3.6C22.9,10.6,23.4,9.4,23.5,8.1
                                        L23.5,8.1z"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                    {{-- <span class="share ml5"></span> --}}
                    <object>
                        <a href="#" class="card__share" title="Compartir" data-slug="{{$proyecto->slug}}">S</a>
                    </object>
                </form>
                {{-- <a href="https://wa.me/573102534890" class="btn btn--radius semiBold btn--shadow btn--lime mt20" target="_blank">Whatsapp +57 3102534890</a> --}}
                <p class="w100 white title lh1 semiBold ttU mt20 mtM10">{{$proyecto->valor_venta>0?'Desde: $ '.number_format($proyecto->valor_venta):''}} </p>
                <p class="w100 white title lh1 semiBold ttU mt20 mtM10">{{$proyecto->valor_venta_hasta>0?'Hasta: $ '.number_format($proyecto->valor_venta_hasta):''}} </p>
                <p class="w100 white title lh1 semiBold ttU mt20 mtM10">{{$proyecto->direccion ? $proyecto->direccion:''}} </p>
            </div>
            {{-- END BANNER LEFT --}}
            {{-- BANNER RIGHT --}}
            <div class="banner__right">
                {{-- FORM BANNER --}}
                @component('component.contactar-proyecto')
                    @slot('data'){{$proyecto->slug}} @endslot
                    @slot('nombre') {{$proyecto->name}}  @endslot
                    @slot('email') {{$proyecto->email}}  @endslot
                    @slot('phone')  {{$proyecto->cel_phone}}@endslot
                    @slot('phone2')  {{$proyecto->cel_phone}}@endslot
                @endcomponent
                {{-- END FORM BANNER --}}
            </div>
            {{-- END BANNER RIGHT --}}
        </div>
        {{-- END BANNER CONTAINER --}}
    </section>
    {{-- END BANNER --}}

    {{-- CONTAINER --}}
    <div class="container container--limit container--unequal pt40">
        <div class="container__left">
            <h2 class="w100 title title--xl semiBold dGray ttU mt10">{{$proyecto->nombre}}</h2>
            <div class="text lGray regular mt20 textReset">
                <p class="textReset">{!!$proyecto->descripcion!!}</p>
            </div>
            {{-- CAROUSEL --}}
            @if (count($proyecto->inmuebles)>0)
                <section class="owl-carousel carousel carousel--broken mt35">
                {{-- CAROUSEL ITEM --}}
                    @forelse ($proyecto->inmuebles as $inmuebles)
                        @component("component.carouselItemBroken")
                            @slot("nameImg") {{$inmuebles->url_img}} @endslot
                            @slot("price") ${{number_format($inmuebles->valor_venta)}}  @endslot
                            @slot("type") {{$inmuebles->sub_titulo}} @endslot
                            @slot("area") {{$inmuebles->medida_apartamento}} @endslot
                            @slot("bedrooms") {{$inmuebles->n_habitaciones}}  @endslot
                            @slot("bathrooms") {{$inmuebles->n_banos}}  @endslot
                            @slot("garages") {{$inmuebles->n_garages}} @endslot
                            @slot("slug") {{$inmuebles->slug}}  @endslot
                            {{-- @forelse ($tinmueble as $tinm)
                                @if($tinm->id == $inmuebles->tipo_inmueble)
                                    @slot("tinmueble") {{$tinm->tipo}}  @endslot
                                @endif
                            @empty
                            @endforelse --}}
                        @endcomponent
                    @empty
                    @endforelse
                    {{-- END CAROUSEL ITEM --}}
                </section>
            @endif
            {{-- END CAROUSEL --}}
            <div class="container videoBox mt40">
                <h2 class="w100 text text--m xlPurple bold ttU">Ver recorrido virtual</h2>
                <picture class="videoBox__picture mt20 mtM10" data-modal="video" data-src="{{$proyecto->multimedia}}">
                    <img src="{{asset("uploads/".$proyecto->imagen_multimedia)}}" alt="" class="videoBox__picture__img">
                </picture>
                <picture class="videoBox__picture mt20 mtM10" data-modal="video" data-src="{{$proyecto->multimedia2}}">
                    <img src="{{asset("uploads/".$proyecto->imagen_multimedia2)}}" alt="" class="videoBox__picture__img">
                </picture>
            </div>
            {{-- BOX ICONS --}}
            <section class="boxIcons boxIcons--black boxIcons--4 mt20">
                    <h2 class="w100 text text--m taL xlPurple bold ttU">CARACTERÍSTICAS COPROPIEDAD:</h2>
                    @forelse ($proyecto->asignar_adicionales as $adicional)
                    <article class="boxIcons__item">
                        <span class="boxIcons__item__left">
                            <img src="{{asset('uploads/'.$adicional->logo)}}" alt="" class="boxIcons__item__icon">
                        </span>
                        <span class="boxIcons__item__right">
                            <p class="boxIcons__item__text">{{ $adicional->nombre}}</p>
                        </span>
                    </article>
                @empty
                    <p>Sin asignar</p>
                @endforelse
            </section>
            {{-- END BOX ICONS --}}
            {{-- MAP --}}
            <div class="dF mt20">
                <a id="street" class="taMR btn btn--radius semiBold btn--lPurple btn--hoverLPurple ttU mlA">Street View</a>
            </div>
            <div class="container map mt40 pb50">
                <div class="map__left">
                    <h3 class="w100 title title--m semiBold dGray taC ttU lh1">Conoce</h3>
                    <h3 class="w100 title title--m regular dGray taC ttU  lh1 fsI">Nuestra</h3>
                    <h3 class="w100 title title--m semiBold dGray taC ttU lh1">Ubicación</h3>
                    <img src="{{asset('images/icons/location--y.png')}}" alt="" class="map__img mt25 mtM20 mbM20 showAlert">
                </div>
                <div class="map__right">
                    {{-- MAP CONTENT--}}
                    <div id="map" class="map__content"></div>
                    {{-- END MAP CONTENT--}}
                </div>
            </div>
            {{-- END MAP --}}
        </div>
        <div class="container__right">
        </div>
    </div>
    {{-- END CONTAINER --}}
    {{-- CARD --}}
        <div class="listing__items hidden">
            @forelse ($proyecto->inmuebles as $inmueble)
                @component('component.prominentCard')
                    {{-- @slot('price'){{$inmueble->valor_venta}} @endslot --}}
                    @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                    @slot('slug'){{$inmueble->slug}} @endslot
                    @slot('price'){{number_format($inmueble->valor_venta)}}@endslot
                    @slot('name')
                        @if ($inmueble->uso == 1)
                            Venta
                        @elseif($inmueble->uso == 2)
                            Arriendo
                        @elseif($inmueble->uso == 3)
                            Venta y arriendo nuevo
                        @elseif($inmueble->uso == 4)
                            Venta y arriendo usado
                        @endif
                        Cod: {{$inmueble->titulo}}
                    @endslot
                    @slot('subtitle'){{$inmueble->sub_titulo}} @endslot
                    @slot('img'){{$inmueble->url_img}} @endslot
                    @auth
                        @slot('cardState'){{Auth::user()->favUser($inmueble->id)->count()>0? 'active':''}} @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                    @else
                        @slot('cardState') @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                    @endauth
                    @slot('slug'){{$inmueble->slug}} @endslot
                    @slot('prominentState'){{$inmueble->proyecto->count()>0?'active':''}} @endslot
                    @slot('meters'){{$inmueble->medida_apartamento}} @endslot
                    @slot('garages'){{$inmueble->n_garages}} @endslot
                    @slot('bedrooms') {{$inmueble->n_habitaciones}}  @endslot
                    @slot('bathrooms') {{$inmueble->n_banos}}  @endslot
                @endcomponent
                @empty
            <h3 class="fz25 fzM20 black regular lGray taC mt5">Sin resultados</h3>
            @endforelse
        </div>
    {{-- CONTAINER --}}
     <div class="container container--xxlGray2 pt60 fixedStop">{{-- DESCOMENTAR ESTE --}}
    {{-- <div class="container pt60 pb25 fixedStop"> COMENTAR ESTE --}}
        <div class="container container--limit"> {{-- QUITAR HIDDEN --}}

            <div class="container container--cardsHome" id="cardsHomeSection">
                <h2 class="w100 text text--m ttU lPurple bold mb35 mbM20">Te puede interesar</h2>
                {{-- CARD ITEM --}}
                @forelse ($proyecto_relacionados as $relacionado)
                    @component('component.P_destacadoHome2')
                        @slot('slug')
                            {{$relacionado->slug}}
                        @endslot
                        @slot('link') {{route('/detalle-proyecto',['slug'=>$relacionado->slug])}} @endslot
                        @slot('imgBg') # @endslot
                        @slot('imgLogo') {{asset('uploads/'.$relacionado->logo)}} @endslot
                        @slot('name') {{$relacionado->nombre}}  @endslot
                        @slot('email') {{$relacionado->email}}  @endslot
                        @slot('phone') {{$relacionado->phone}} @endslot
                        @slot('phone2') {{$relacionado->cel_phone}} @endslot
                    @endcomponent
                    @empty
                @endforelse
                {{-- END CARD --}}
            </div>
        </div>
    </div>
    {{-- Alertas --}}
    <div class="alert">
        @if (Session::has('success'))
            @component("component.alert")
                @slot("success")1 @endslot
                @slot("flag") @endslot
                @slot("title") Mensaje enviado @endslot
                @slot("desc") En los próximos dias nos contactaremos contigo @endslot
            @endcomponent
        @endif
        @if (Session::has('error'))
            @component("component.alert")
                @slot("error")1 @endslot
                @slot("flag") @endslot
                @slot("title") Lo semtimos @endslot
                @slot("desc") Intentalo mas tarde @endslot
            @endcomponent
        @endif
    </div>
    {{-- modal street view --}}
    <section class="w100 modal hide modal--empty" data-modal="empty">
        <div class="w100 modal__container">
            <span class="modal__close"></span>
            {{-- MODAL CONTENT --}}
            <div class="modal__content  w100">
                <div class="modal__mini">
                    <div id="pano" style="width: 100%; height: 400px;" class="mt10"></div>
                </div>
                <div class="modal__mini">
                    <h2 class="w100 title taL semiBold dGray ttU mt20" id="pano-title">Nombre del Proyecto</h2>
                    <h2 class="w100 title taL semiBold dGray ttU mt20" id="pano-title">Precio Desde</h2>
                    <h2 class="w100 text text--m taL semiBold lPurple ttU mt20" id="pano-price"></h2>
                    <h2 class="w100 title taL semiBold dGray ttU mt20" id="pano-title">Precio Hasta</h2>
                    <h2 class="w100 text text--m taL semiBold lPurple ttU mt20" id="pano-price-hasta"></h2>
                    {{-- <a href="" id="slug_url" class="w100 btn btn--lPurple btn--hoverLPurple ttU mt10" data-login="2">Ver más</a> --}}
                </div>
            {{-- END MODAL CONTENT --}}
            </div>

        </div>
    </section>
    @component('component.modalShareP',['slug'=>$proyecto->slug,'subtitle'=>$proyecto->sub_titulo])

    @endcomponent
    {{-- END CONTAINER --}}
    @section("scripts")
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQJp65GQ3zAebmsEqhvkvu4Kq717Fty40&callback=initMap"
    async defer></script>
    <script>
        var map;
        var panorama;
        var latitud = parseFloat('{{$proyecto->latitude}}') ;
        var longitud = parseFloat('{{$proyecto->longitude}}') ;
        function initMap() {
            var fenway = {lat:latitud, lng:longitud};
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: latitud, lng: longitud},
                zoom: 17,
                streetViewControl: false,
            });

            var marker = new google.maps.Marker({
                position: {lat: latitud, lng: longitud},
                map: map,
                icon: {
                    url: '{{asset("images/icons/location--y2.svg")}}',
                    scaledSize : new google.maps.Size(40, 60),
                }
            });
            var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('pano'), {
              position: fenway,
              pov: {
                heading: 34,
                pitch: 10
              }
            });
            map.setStreetView(panorama);

            google.maps.event.addListener(marker, 'click', function() {
                $('[data-modal="empty"]').removeClass('hide');
                $("#pano-title").text('{{$proyecto->nombre}}');
                $("#pano-price").text('${{$proyecto->valor_venta >0?$proyecto->valor_venta:''}}');
                $("#pano-price-hasta").text('${{$proyecto->valor_venta_hasta > 0?$proyecto->valor_venta_hasta:''}}');
            });

            /* Active modal */
            $(document).on('click', '#street', function(event) {
                $('[data-modal="empty"]').removeClass('hide');
                $("#pano-title").text('{{$proyecto->nombre}}');
                $("#pano-price").text('${{$proyecto->valor_venta > 0?$proyecto->valor_venta:''}}');
                $("#pano-price-hasta").text('${{$proyecto->valor_venta_hasta > 0?$proyecto->valor_venta_hasta:''}}');
            });
            console.log(latitud,longitud);
        }
    </script>
    @endsection
@endsection
{{-- END CONTENT --}}
