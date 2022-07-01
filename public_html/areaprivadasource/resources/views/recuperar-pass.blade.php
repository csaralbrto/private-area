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
                <span class="modal__close banner__back"></span>
                <h2 class="w100 title fzM20 semiBold dGray ttU taC mt10 mbM5">Recuperar contraseña</h2>
                {{-- BANNER BOX --}}
                <form class="banner__box max350 mlA mrA" method="POST" id="recoveryPass" action="{{ route('password.email') }}">
                    @csrf
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <input type="email" class="form__input form__input--line" placeholder="Correo Electrónico:" name="email" required>
                    </article>
                    {{-- END FORM BOX --}}
                    {{-- FORM BOX --}}
                    <article class="form__box mt20">
                        <button class="w100 btn btn--hoverLPurple">Enviar</button>
                    </article>
                    {{-- END FORM BOX --}}
                </form>
                {{-- BANNER BOX --}}
            </div>
        </div>
    </section>
    {{-- END BANNER --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
@if (session('status'))
<section class="alert">
    @component('component.alert')
        @slot('success') 1 @endslot
        @slot('title') Verifica tu correo  @endslot
        @slot('desc') Hemos enviado un correo para que puedas cambiar tu contraseña   @endslot
    @endcomponent
    {{ session('status') }}
</section>
@endif
@endsection
{{-- END CONTENT --}}
