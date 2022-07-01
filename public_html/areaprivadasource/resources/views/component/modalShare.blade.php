<section class="modal modal--share hide" data-modal="share" data-slug="{{$slug}}">
    <div class="modal__container">
        <span class="modal__close"></span>
        {{-- MODAL CONTENT --}}
        <div class="modal__content">
        <h3 class="w100 semiBold text text--m lGray taC ttU mb10">Compartir</h3>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('detalle-inmueble',['slug'=>$slug,'nuevo'=>\Request::is('listado-nuevos')?'nuevo':'usado'])}}&t={{$subtitle}}"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                target="_blank" class="btn btn--facebook btn--noMinW">Facebook</a>
            <a href="https://wa.me/?text=Revisa%20el%20siguiente%20enlace%20{{route('detalle-inmueble',['slug'=>$slug,'nuevo'=>\Request::is('listado-nuevos')?'nuevo':'usado'])}}" class="btn btn--whatsapp btn--noMinW" target="_blank" >Whatsapp</a>
        </div>
        {{-- END MODAL CONTENT --}}
    </div>
</section>