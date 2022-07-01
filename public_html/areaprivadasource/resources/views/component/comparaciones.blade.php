<article class="profileBox__content max900 hidden" data-profile="comparaciones" id="comparacionesContent">
    {{-- COMPARE BOX --}}
    <p class="w100 text lGray taC mt20 mb30" style="font-size: 1.5rem;">
            Haz clic sobre este icono <span class="profileBox__iScales"></span> para comparar 2 o más inmuebles, así conocerás los detalles de los
            inmuebles escogidos y los podrás comparar
        {{-- <span class="example"></span> --}}
        {{-- ️️⚖️ --}}
    </p>
    <div class="compareBox">
        <section class="compareBox__left">
            <div class="compareBox__header">
            </div>
            <div class="compareBox__body">
                <div class="compareBox__tHead">
                    <span class="compareBox__tCell">Ciudad</span>
                    <span class="compareBox__tCell">Barrio</span>
                    <span class="compareBox__tCell">Inmueble</span>
                    <span class="compareBox__tCell">Estado</span>
                    <span class="compareBox__tCell">Para</span>
                    <span class="compareBox__tCell">Precio</span>
                    <span class="compareBox__tCell">Administraciòn</span>
                    <span class="compareBox__tCell">Habitaciones</span>
                    {{-- <span class="compareBox__tCell">Área Construida</span> --}}
                    <span class="compareBox__tCell">Baños</span>
                    <span class="compareBox__tCell">Parqueaderos</span>
                    <span class="compareBox__tCell">Metros Caudrados</span>
                    <span class="compareBox__tCell">Estrato</span>
                    <span class="compareBox__tCell">Antiguedad</span>
                    <span class="compareBox__tCell">Piso</span>
                    <span class="compareBox__tCell">Celaduria 24/7</span>
                    <span class="compareBox__tCell">Parqueadero visitantes</span>
                    <span class="compareBox__tCell">Ascensor</span>
                </div>
            </div>
        </section>
        <section class="compareBox__right" id="comparacionesData">
            {{-- recirremos las comparacions guardadas --}}
            @foreach ($comparaciones as $comparacion)
                @component('component.comparaciones-item',['inmueble'=>$comparacion->inmueble,'flag'=>true]) @endcomponent
            @endforeach
            {{-- si el numero de comparaciones es menor a 3 entonces muestra el item de + inmuebles --}}
            @if ($comparaciones->count()<3)
                @component('component.comparaciones-item',['flag'=>false])
                @endcomponent
            @endif
        </section>
    </div>
    {{-- END COMPARE BOX --}}
</article>
