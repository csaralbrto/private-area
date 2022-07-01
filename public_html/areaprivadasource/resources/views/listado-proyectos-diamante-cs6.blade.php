@extends('main')

{{-- CONTENT --}}
@section('content')
    {{-- BANNER --}}
    <section class="banner">
        <div class="banner__container">
            <picture class="banner__bg">
                <source media="(max-width: 767px)" srcset="images/bg/bg-comprar-nuevo_m.jpg">
                <img src="images/bg/bg-comprar-nuevo.jpg" alt="" class="banner__bg__img">
            </picture>
        </div>
    </section>
    {{-- END BANNER --}}

    {{-- FORM FILTER --}}
    @php
        $publicar_para = ['0'=>'Compra nuevo','1'=>'Compra usado','2'=>'Arriendo', '3'=>'Compra y Arriendo nuevo','4'=>'Compra y Arriendo usado'];
    @endphp
    @component('component.filterForm',['tipo_inmueble'=>$tipos_inmueble,'ciudades'=>$ciudades, 'publicar_para'=>$publicar_para,'url_list'=>'listado-nuevos'])
    @slot('url')filterGeneral @endslot
    @endcomponent
    {{-- END FORM FORM --}}

    @php
        $inmuebles = isset($inmuebles) ? $inmuebles : $inmueblesDiamante; 
    @endphp
    {{-- LISTING --}}
    <section class="listing">
        {{-- LISTING TOP --}}
        <div class="listing__top">
            <div class="listing__top__container">
                <h2 class="text text--m dGray semiBold ttU">Inmuebles en venta</h2>
                <span class="miniFilter mlA">
                    <!-- <a href="#" class="btn btn--gradient btn--radius btn--shadow ttU showMiniFilter">Rango de precios</a>
                    <div class="miniFilter__item miniFilter__item--toShow">
                        <div class="miniFilter__item__box">
                            <select name="example" id="" class="select">
                                <option value="" selected>Desde</option>
                                <option value="60.000.000">60.000.000</option>
                                <option value="1.000.000.000">1.000.000.000</option>
                                <option value="2.000.000.000">2.000.000.000</option>
                                <option value="800.000.000.000">800.000.000.000</option>
                            </select>
                        </div>
                        <div class="miniFilter__item__box">
                            <select name="example2" id="" class="select">
                                <option value="" selected>Hasta</option>
                                <option value="60.000.000">60.000.000</option>
                                <option value="1.000.000.000">1.000.000.000</option>
                                <option value="2.000.000.000">2.000.000.000</option>
                                <option value="800.000.000.000">800.000.000.000</option>
                            </select>
                        </div>
                    </div> -->
                </span>
                <a href="#" class="btn btn--gradient btn--radius btn--shadow ttU ml10" data-filter="listing">filtros avanzados</a>
                {{-- @component('component.mapaForm',['inmueblesDiamante'=>$inmuebles,'inmueblesOro_plata'=>[],'inmueblesBronce'=>[],'inmueblesGratis'=>[]]) --}}
                @component('component.mapaForm',['inmueblesDiamante'=>$inmuebles,'inmueblesOro_plata'=>$inmueblesOro_plata,'inmueblesBronce'=>$inmueblesBronce,'inmueblesGratis'=>$inmueblesGratis])
                    @slot('url')mapa-nuevo @endslot
                @endcomponent
                {{-- <a href="{{route('mapa-nuevo')}}" class="btn btn--gradient btn--iconR btn--radius btn--shadow btn--iMap ttU ml10">ver mapa</a> --}}
            </div>
        </div>
        {{-- END LISTING TOP --}}
        {{-- LISTING BOTTOM --}}
        <div class="listing__bottom">
            <span class="listing__curtain"></span>
            <div class="container container--limit listing__container">
                {{-- LISTING FILTERS --}}
                <div class="listing__filters">
                    
                    @component('component.filterListing',['ciudades'=>$ciudades,'barrios'=>$barrios,'rango'=>$rango, 'rangoArriendo'=>$rangoArriendo,'adicionales'=>$adicionales,'areas'=>$areas,'url_list'=>'listado-nuevos'])
                    @endcomponent
                </div>
                {{-- END LISTING FILTERS --}}
                {{-- LISTING CONTENT --}}
                <div class="listing__content">
                    <p class="w100 text text--m lPurple semiBold taMC ttU mb30">Inmuebles: {{count($inmuebles)}}</p>
                    <div class="listing__items">
                        {{-- CARD --}}
                        
                        @forelse ($inmuebles as $inmueble)
                            @component('component.card')
                                @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                                @slot('price') {{$inmueble->valor_venta>0?'$ '.number_format($inmueble->valor_venta) :'$ '.number_format($inmueble->valor_arriendo)}} @endslot
                                @slot('slug') {{ $inmueble->slug}}  @endslot
                                @slot('subtitle'){{$inmueble->sub_titulo}}@endslot
                                @slot('name')
                                    @if ($inmueble->uso == 1 || $inmueble->uso == 0)
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
                                @slot('img') {{ $inmueble->url_img}}  @endslot
                                @auth
                                @slot('cardState'){{Auth::user()->favUser($inmueble->id)->count()>0? 'active':''}} @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @else 
                                    @slot('cardState') @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @endauth
                                @slot('meters') {{ $inmueble->medida_apartamento}}  @endslot
                                @slot('garages') {{ $inmueble->n_garages}}  @endslot
                                @slot('bedrooms') {{ $inmueble->n_habitaciones}} @endslot
                                @slot('bathrooms') {{ $inmueble->n_banos}}  @endslot
                            @endcomponent
                        @empty
                            
                        @endforelse
                        {{-- END CARD --}}
                    </div>
                    <div class="listing__items mt30 mtM10">
                        {{-- CARD --}}
                        @forelse ($inmueblesOro_plata as $inmueble)
                            @component('component.mediumCard')
                                @slot('price') ${{ number_format($inmueble->valor_venta)}} @endslot
                                @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                                @slot("slug") {{ $inmueble->slug  }} @endslot
                                 @slot('subtitle'){{$inmueble->sub_titulo}}@endslot
                                @slot('name')
                                    @if ($inmueble->uso == 1 || $inmueble->uso == 0)
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
                                @slot('img') {{ $inmueble->url_img  }} @endslot
                                 @auth
                                     @slot('cardState'){{Auth::user()->favUser($inmueble->id)->count()>0? 'active':''}} @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @else 
                                    @slot('cardState') @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @endauth
                                @slot('meters') {{ $inmueble->medida_apartamento  }} @endslot
                                @slot('garages') {{ $inmueble->n_garages  }}  @endslot
                                @slot('bedrooms')  {{ $inmueble->n_habitaciones  }} @endslot
                                @slot('bathrooms')  {{ $inmueble->n_banos }}  @endslot
                            @endcomponent
                        @empty
                            {{-- <p>No encontramos ningún resultado</p> --}}
                        @endforelse
                        {{-- END CARD --}}
                    </div>
                    <div class="listing__items mt30 mtM10">
                        {{-- CARD --}}
                        @forelse ($inmueblesBronce as $inmueble)
                            @component('component.smallCard')
                                @slot('price') ${{ number_format($inmueble->valor_venta)}} @endslot
                                @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                                @slot("slug") {{ $inmueble->slug  }} @endslot
                                 @slot('subtitle'){{$inmueble->sub_titulo}}@endslot
                                @slot('name')
                                    @if ($inmueble->uso == 1 || $inmueble->uso == 0)
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
                                @slot('img') {{ $inmueble->url_img  }} @endslot
                                 @auth
                                     @slot('cardState'){{Auth::user()->favUser($inmueble->id)->count()>0? 'active':''}} @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @else 
                                    @slot('cardState') @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @endauth
                                @slot('meters') {{ $inmueble->medida_apartamento  }} @endslot
                                @slot('garages') {{ $inmueble->n_garages  }}  @endslot
                                @slot('bedrooms')  {{ $inmueble->n_habitaciones  }} @endslot
                                @slot('bathrooms')  {{ $inmueble->n_banos }}  @endslot
                                @slot('compare')
                            @endslot
                            @endcomponent
                        @empty
                            {{-- <p>No encontramos ningún resultado</p> --}}
                        @endforelse
                        {{-- END CARD --}}
                      
                    </div>
                    <div class="listing__items mt30 mtM10">
                        {{-- CARD --}}
                        @forelse ($inmueblesGratis as $inmueble)
                            @component('component.xsmallCard')
                                @slot('price') ${{ number_format($inmueble->valor_venta)}} @endslot
                                @slot('type'){{$inmueble->uso==0 || $inmueble->uso==3 ?'nuevo':'usado'}}@endslot
                                @slot("slug") {{ $inmueble->slug  }} @endslot
                                 @slot('subtitle'){{$inmueble->sub_titulo}}@endslot
                                @slot('name')
                                    @if ($inmueble->uso == 1 || $inmueble->uso == 0)
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
                                @slot('img') {{ $inmueble->url_img  }} @endslot
                                 @auth
                                     @slot('cardState'){{Auth::user()->favUser($inmueble->id)->count()>0? 'active':''}} @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @else 
                                    @slot('cardState') @endslot {{-- Este es el estado del corazon cuando esta en mi lista de favoritos --}}
                                @endauth
                            @endcomponent 
                        @empty
                            
                        @endforelse
                    </div>
                    {{-- PAGINATION --}}
                    @component('component.pagination',['paginator'=>$inmuebles])
                        @slot('additionalClasses')

                        @endslot
                        @slot('current')
                        1
                        @endslot
                        @slot('total')
                        10
                        @endslot
                    @endcomponent
                    {{-- END PAGINATION --}}
                </div>
                {{-- END LISTING CONTENT --}}
            </div>
        </div>
        {{-- END LISTING BOTTOM --}}
    </section>
    {{-- END LISTING --}}
@endsection
{{-- END CONTENT --}}
