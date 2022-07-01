@extends('main')

{{-- CONTENT --}}
@section('content')
    {{-- BANNER --}}
    <section class="banner banner--register">
        <div class="banner__container">
            <picture class="banner__bg">
                <source media="(max-width: 767px)" srcset="images/banner/banner-2_m.jpg">
                <img src="images/banner/banner-2.jpg" alt="" class="banner__bg__img">
            </picture>
            <div  class="banner__content">
                <h2 class="w100 title fzM20 semiBold dGray ttU taC mt10 mbM5">Contáctanos</h2>
                {{-- BANNER BOX --}}
                <form action="{{route('contactenos_inmueble_publicar')}}" method="POST" class="banner__box max350 mlA mrA" id="contactanos">
                    @csrf
                    {{-- FORM BOX --}}
                    <article class="form__box mt30">
                        <label class="form__box__pLabel text text--xs semibold dGray" for="fbx1">Nombre:</label>
                        <input type="text" class="form__input form__input--line" id="fbx1" required name="name">
                    </article>
                    {{-- END FORM BOX --}}
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <label class="form__box__pLabel text text--xs semibold dGray" for="fbx2">Correo:</label>
                        <input type="email" class="form__input form__input--line" id="fbx2" required name="email">
                    </article>
                    {{-- END FORM BOX --}}
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <label class="form__box__pLabel text text--xs semibold dGray" for="fbx3">Teléfono Fijo/Celular:</label>
                        <input type="text" class="form__input form__input--line" id="fbx3" required name="phone">
                    </article>
                    {{-- END FORM BOX --}}
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <label class="form__box__pLabel text text--xs semibold dGray" for="fbx4">Mensaje:</label>
                        <textarea class="form__textarea form__input--line" id="fbx4" required="" name="message"></textarea>
                    </article>
                    {{-- END FORM BOX --}}
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <button class="nav__item__link btn btn--hoverLPurple">Enviar</button>
                    </article>
                    {{-- END FORM BOX --}}
                </form>
                {{-- BANNER BOX --}}
            </div>
        </div>
    </section>
    {{-- END BANNER --}}
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.btn-refresh').click(function () {
            $.ajax({
                type:'get',
                url:'reset_token_captcha',
                success:function(response){
                    $('#img-captcha').empty();
                    $('#img-captcha').append('<img src="'+response.captcha+'" alt="">');
                },
            });
        });
    })
</script>
@endsection
{{-- END CONTENT --}}
