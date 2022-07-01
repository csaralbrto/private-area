<a href="{{route('detalle-inmueble',['slug'=>$slug,'nuevo'=>$type])}}" class="card card--normal">
    <div class="card__top">
        @if($img)
        <img src="{{asset('uploads/'.$img)}}" alt="" class="card__img">
        @endif
        <div class="card__iconsBox">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.2 21.8" style="enable-background:new 0 0 25.2 21.8;" alt="Icono de Me gusta" xml:space="preserve" class="card__heart {{$cardState}} @auth favorite_user @else login @endauth  @auth @if(Auth::user()->favUser($slug)->count()>0) active @endif @endauth"  @auth @if(Auth::user()->favUser($slug)->count()>0) data-favorite="1"  @else data-favorite="0"  @endif @endauth  data-inmueble="{{$slug}}">
                <title>Me gusta</title>
                <g class="card__heart__bg">
                    <g>
                        <g>
                            <path class="st0" d="M25,8.3c-0.1,0.8-0.3,1.5-0.6,2.3c-0.5,1.2-1.3,2.3-2.2,3.2c-1.5,1.5-3,2.9-4.7,4.3
                                l-3.9,3.2c-0.6,0.6-1.6,0.6-2.2,0c-2-1.7-4-3.3-5.9-5c-1.5-1.2-2.8-2.6-4-4.2c-0.8-1.1-1.3-2.4-1.5-3.7c0,0,0-0.1,0-0.1V6.5V6.3
                                c0.2-1.9,1.2-3.6,2.6-4.7c2.4-1.9,5.7-2,8.1-0.2c0.6,0.4,1.1,0.9,1.5,1.5c0.1,0.2,0.2,0.2,0.3,0s0.3-0.3,0.4-0.4
                                c1.5-1.7,3.8-2.6,6.1-2.2c2.4,0.3,4.4,1.9,5.3,4.2c0.3,0.7,0.4,1.4,0.5,2.1V8.3z"/>
                        </g>
                    </g>
                </g>
                <g class="card__heart__stroke">
                    <g>
                        <g>
                            <path class="st0" d="M25,8.3c-0.1,0.8-0.3,1.5-0.6,2.3c-0.5,1.2-1.3,2.3-2.2,3.2c-1.5,1.5-3,2.9-4.7,4.3l-3.9,3.2
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="card__compare @auth addCompare @else login @endauth" data-slug="{{$slug}}" title="Comparar">
                <style type="text/css">
                    .st0{
                        opacity: 0;
                        transition: all .5s ease;
                    }
                    .st1{
                        display:inline;
                        fill:#FFFFFF;
                    }
                    .st2{
                        fill:#FFFFFF;
                    }
                </style>
                <title>Comparar</title>
                <g id="fill" class="st0">
                    <path class="st1" d="M221.7,336.7c0,52.7-42.7,95.5-95.5,95.5s-95.5-42.7-95.5-95.5C80.1,336.7,171.9,336.7,221.7,336.7z"/>
                    <path class="st1" d="M607.8,336.7c0,52.7-42.7,95.5-95.5,95.5s-95.5-42.7-95.5-95.5C466.2,336.7,558,336.7,607.8,336.7z"/>
                </g>
                <g id="balance">
                    <path class="st2" d="M634.4,307.6l-109.1-176c-3.2-4.7-8.3-7.1-13.3-7.1s-10.2,2.4-13.4,7.1l-109,176c-3.9,5.8-6.1,12.7-5.5,19.6
                        c5.5,65.7,60.6,117.3,127.9,117.3s122.4-51.6,127.9-117.3C640.5,320.4,638.3,313.4,634.4,307.6L634.4,307.6z M512,412.5
                        c-41.6,0-77.5-27.1-90.8-64h181.2C589,385.8,553.3,412.5,512,412.5z M421.7,316.5L512,170.8l91,145.7H421.7z M536,579.5H336V154.3
                        c27.6-7.1,48-32,48-61.7h152c4.4,0,8-3.6,8-8v-16c0-4.4-3.6-8-8-8H374.9c-0.1-0.3-4.4-11.1-19.1-21.1
                        c-10.2-6.9-22.5-10.9-35.8-10.9s-25.6,4-35.8,10.9c-14.7,10-19,20.8-19.1,21.1H104c-4.4,0-8,3.6-8,8v16c0,4.4,3.6,8,8,8h152
                        c0,29.8,20.4,54.6,48,61.7v425.2H104c-4.4,0-8,3.6-8,8v16c0,4.4,3.6,8,8,8h432c4.4,0,8-3.6,8-8v-16C544,583,540.4,579.5,536,579.5z
                        M288,92.5c0-17.7,14.3-32,32-32s32,14.3,32,32s-14.3,32-32,32S288,110.2,288,92.5z M255.9,327.3c0.6-6.9-1.6-13.9-5.5-19.6
                        l-109.1-176c-3.2-4.7-8.3-7.1-13.4-7.1s-10.2,2.4-13.3,7.1L5.6,307.6c-3.9,5.8-6.1,12.7-5.5,19.6C5.6,392.9,60.7,444.5,128,444.5
                        S250.4,392.9,255.9,327.3L255.9,327.3z M128,170.8l91,145.7H37.7L128,170.8z M37.2,348.5h181.2c-13.4,37.2-49.1,64-90.4,64
                        C86.4,412.5,50.4,385.4,37.2,348.5z"/>
                </g>
            </svg>
            {{-- <span class="card__share" title="Compartir">S</span> --}}
            <object>
                <a class="card__share" title="Compartir" data-slug="{{$slug}}">S</a>
            </object>
        </div>
        <div class="card__data">
            <span class="card__price">{{$price}}</span>
            @if(isset($title))
            <h2 class="text text--m semiBold white ttU card__name">{{$title}}</h2>
            @endif
            <h2 class="text text--xs semiBold white ttU card__name mt5">{{$name}}</h2>
        </div>
    </div>
    <div class="card__bottom">
        <div class="card__box">
            <span class="icon icon--meter-g"></span>
            <h3 class="text text--m fzXM15 medium blue2">{{$meters}} Mt2</h3>
        </div>
        <div class="card__box">
            <span class="icon icon--garage-g"></span>
            <h3 class="text text--m fzXM15 medium blue2">{{$garages}} garajes</h3>
        </div>
        <div class="card__box">
            <span class="icon icon--bed-g"></span>
            <h3 class="text text--m fzXM15 medium blue2">{{$bedrooms}} habitaciones</h3>
        </div>
        <div class="card__box">
            <span class="icon icon--bath-g"></span>
            <h3 class="text text--m fzXM15 medium blue2">{{$bathrooms}} baños</h3>
        </div>
    </div>
</a>
@component('component.modalShare',['slug'=>$slug,'subtitle'=>$subtitle])
@endcomponent
