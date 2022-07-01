@extends('main')

{{-- CONTENT --}}
@section('content')
    {{-- BANNER --}}
    <section class="banner">
        <div class="banner__container">
            <picture class="banner__bg">
                <source media="(max-width: 767px)" srcset="images/banner/banner-4_m.jpg">
                <img src="images/banner/banner-4.jpg" alt="" class="banner__bg__img">
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
                <!-- <div class="container dF container--50">
                    <h2 class="title title--s semiBold taMC dPurple mlA mrMA">Código del Inmueble: <span class="regular">MC2256115</span></h2>
                </div> -->
            </div>
            {{-- STEP BOX --}}
            <section class="stepBox mt40 mb40">
                {{-- STEP BOX NAV --}}
                <nav class="stepBox__nav">
                    {{-- STEP BOX NAV LIST --}}
                    <ul class="stepBox__nav__list">
                        <span class="stepBox__nav__indicator"></span>
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item" data-stepbox="tipo-inmueble">
                            Tipo de Inmueble
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item disabled" data-stepbox="ubicacion">
                            Ubicación
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item disabled" data-stepbox="caracteristicas">
                            Características
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item disabled" data-stepbox="areas-medidas">
                            Áreas y Medidas
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item disabled" data-stepbox="fotografias-videos">
                            Fotografías y Videos
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                        {{-- STEP BOX NAV LIST ITEM --}}
                        <li class="stepBox__nav__item disabled" data-stepbox="visibilidad">
                            Visibilidad
                        </li>
                        {{-- END STEP BOX NAV LIST ITEM --}}
                    </ul>
                    {{-- END STEP BOX NAV LIST --}}
                </nav>
                {{-- END STEP BOX NAV --}}
                {{-- STEP BOX CONTAINER --}}
                <form method="post" action="#" class="stepBox__container form form--publish" id="form--publish" enctype="multipart/form-data">
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="tipo-inmueble">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 1</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title">
                                <h3 class="form__box__title mb10">Tipo de publicación:</h3>
                                <h4 class="lGray semiBold text text--xs ttU">Diamante</h4>
                            </article>
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU mt30">Tipo y valor inmueble</h2>
                            <p class="text lGray regular mt10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
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
                                <select name="publish-a2" id="publish-a2" class="select" required>
                                    <option value="" selected>Seleccionar</option>
                                    <option value="1a">Tipo 1</option>
                                    <option value="1b">Tipo 2</option>
                                    <option value="1c">Tipo 3</option>
                                    <option value="1d">Tipo 4</option>
                                    <option value="1e">Tipo 5</option>
                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--adjust mt20">
                                <h3 class="form__box__title mb10">Publicar para:</h3>
                                <input type="radio" name="publish-a3" id="publish-a3a" class="form__radio" checked>
                                <label for="publish-a3a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Vender</label>
                                <input type="radio" name="publish-a3" id="publish-a3b" class="form__radio">
                                <label for="publish-a3b" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Arrendar</label>
                                <input type="radio" name="publish-a3" id="publish-a3c" class="form__radio">
                                <label for="publish-a3c" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Arrendar y vender</label>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <h3 class="form__box__title mb10">$ Valor venta:</h3>
                                <input type="text" name="publish-a4" id="publish-a4" class="form__input form__input--line maskM" placeholder="$ Valor venta COP">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <h3 class="form__box__title mb10">$ Valor arriendo:</h3>
                                <input type="text" name="publish-a5" id="publish-a5" class="form__input form__input--line maskM" placeholder="$ Valor arriendo COP">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--adjust mt20">
                                <h3 class="form__box__title mb10">Administración:</h3>
                                <input type="radio" name="publish-a6" id="publish-a6a" class="form__radio" checked>
                                <label for="publish-a6a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">Si</label>
                                <input type="radio" name="publish-a6" id="publish-a6b" class="form__radio">
                                <label for="publish-a6b" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">No</label>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <h3 class="form__box__title mb10">$ Valor administración:</h3>
                                <input type="text" name="publish-a7" id="publish-a7" class="form__input form__input--line maskM" placeholder="$ Valor administración COP">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="ubicacion">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 2</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Ubicación</h2>
                            <p class="text lGray regular mt10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20">
                                <label class="form__box__title dB mb10" for="publish-b1">Ciudad:</label>
                                <select name="publish-b1" id="publish-b1" class="select" required>
                                    <option value="" selected>Seleccionar</option>
                                    <option value="1a">Bogotá</option>
                                    <option value="1b">Cali</option>
                                    <option value="1c">Barranquilla</option>
                                    <option value="1d">Bucaramanga</option>
                                    <option value="1e">Cartagena</option>
                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20 mlA">
                                <label class="form__box__title dB mb10" for="publish-b2">Barrio:</label>      <select name="publish-b2" id="publish-b2" class="select" required>
                                    <option value="" selected>Seleccionar</option>
                                    <option value="1a">Barrio 1</option>
                                    <option value="1b">Barrio 2</option>
                                    <option value="1c">Barrio 3</option>
                                    <option value="1d">Barrio 4</option>
                                    <option value="1e">Barrio 5</option>
                                </select>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <label class="form__box__title dB mb10" for="publish-b3">Dirección:</label>
                                <input type="text" name="publish-b3" id="publish-b3" class="form__input form__input--line" placeholder="Dirección">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20">
                                <label class="form__box__title dB mb10" for="publish-b4">Longitud:</label>
                                <input type="text" name="publish-b4" id="publish-b4" class="form__input form__input--line" placeholder="Longitud">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20 mlA">
                                <label class="form__box__title dB mb10" for="publish-b5">Latitud:</label>
                                <input type="text" name="publish-b5" id="publish-b5" class="form__input form__input--line" placeholder="Latitud">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <h3 class="form__box__title mb10">Confirma la ubicación correcta del puntero en el mapa.</h3>
                                {{-- MAP --}}
                                <div class="container map mt20">
                                    {{-- MAP CONTENT--}}
                                    <div id="map" class="w100 map__content"></div>
                                    {{-- END MAP CONTENT--}}
                                </div>
                                {{-- END MAP --}}
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
                            <p class="text lGray regular mt10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <label class="form__box__title dB mb10" for="publish-c1">Descripción:</label>
                                <textarea type="text" class="form__textarea form__textarea--line" name="publish-c1" id="publish-c1"></textarea>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50">
                                <label class="form__box__title dB mb10" for="publish-c2">Metros Cuadrados:</label>
                                <input type="number" name="publish-c2" id="publish-c2" class="form__input form__input--line" placeholder="Metros Cuadrados">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mlA">
                                <label class="form__box__title dB mb10" for="publish-c3">Garajes:</label>
                                <input type="number" name="publish-c3" id="publish-c3" class="form__input form__input--line" placeholder="Garajes">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20">
                                <label class="form__box__title dB mb10" for="publish-c4">Habitaciones:</label>
                                <input type="number" name="publish-c4" id="publish-c4" class="form__input form__input--line" placeholder="Habitaciones">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50 mt20 mlA">
                                <label class="form__box__title dB mb10" for="publish-c5">Baños:</label>
                                <input type="number" name="publish-c5" id="publish-c5" class="form__input form__input--line" placeholder="Baños">
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--adjust form__box--col mt20">
                                <h3 class="form__box__title mb10">Adicionales:</h3>
                                <input type="checkbox" name="publish-c6" id="publish-c6a" class="form__checkbox">
                                <label for="publish-c6a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Ascensor</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6b" class="form__checkbox">
                                <label for="publish-c6b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Cancha de Squash</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6l" class="form__checkbox">
                                <label for="publish-c6l" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Con acabados</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6c" class="form__checkbox">
                                <label for="publish-c6c" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Con acabados</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6d" class="form__checkbox">
                                <label for="publish-c6d" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Gimnasio</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6e" class="form__checkbox">
                                <label for="publish-c6e" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Lobby</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6f" class="form__checkbox">
                                <label for="publish-c6f" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Parqueadero Privado</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6g" class="form__checkbox">
                                <label for="publish-c6g" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Portería Privada</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6h" class="form__checkbox">
                                <label for="publish-c6h" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Terraza</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6i" class="form__checkbox">
                                <label for="publish-c6i" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Salón Comunal</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6j" class="form__checkbox">
                                <label for="publish-c6j" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Salón de Juegos</label>
                                <input type="checkbox" name="publish-c6" id="publish-c6k" class="form__checkbox">
                                <label for="publish-c6k" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Zona de Ropas</label>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="areas-medidas">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 4</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Áreas y Medidas</h2>
                            <p class="text lGray regular mt10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- PACK BOX --}}
                            <div class="packBox">
                                <span class="packBox__close"></span>
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50">
                                    <label class="form__box__title dB mb10" for="publish-d1">Item:</label>
                                    <select name="publish-d1" id="publish-d1" class="select" required>
                                        <option value="" selected>Seleccionar</option>
                                        <option value="1a">Área Total</option>
                                        <option value="1b">Baño</option>
                                        <option value="1c">Terraza</option>
                                        <option value="1d">Cocina</option>
                                        <option value="1e">Comedor</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mlA">
                                    <label class="form__box__title dB mb10" for="publish-d2">Tipo de medida:</label>
                                    <select name="publish-d2" id="publish-d2" class="select" required>
                                        <option value="" selected>Seleccionar</option>
                                        <option value="1a">Dm</option>
                                        <option value="1b">M²</option>
                                        <option value="1c">Cm</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20">
                                    <label class="form__box__title dB mb10" for="publish-c4">Largo:</label>
                                    <input type="number" name="publish-c4" id="publish-c4" class="form__input form__input--line" placeholder="largo">
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--50 mt20 mlA">
                                    <label class="form__box__title dB mb10" for="publish-c4">Ancho:</label>
                                    <input type="number" name="publish-c4" id="publish-c4" class="form__input form__input--line" placeholder="ancho">
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            </div>
                            {{-- END PACK BOX --}}
                            <a href="#" class="btn btn--hoverLPurple ttU mt30 mlA packBox__cloneBtn">Nuevo</a>
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="fotografias-videos">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 5</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Fotografías y Videos</h2>
                            <p class="text lGray regular mt10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title">
                                <label class="form__box__title dB mb10" for="publish-e1">Item:</label>
                                {{-- DROPZONE --}}
                                <div class="dropzone">
                                    <input class="dropzone__input" name="file" type="file" id="publish-e1" multiple>
                                    {{-- DROPZONE INFO --}}
                                    <div class="dropzone__info">
                                        <a href="#" class="btn btn--hoverLPurple ttU pLink dropzone__btn">Cargar Imágenes</a>
                                        <p class="w100 text dGray taC mt10">Formato: JPG, JPEG, PNG, máx 8MB</p>
                                    </div>
                                    {{-- END DROPZONE INFO --}}
                                </div>
                                {{-- END DROPZONE --}}
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <label class="form__box__title dB mb10" for="publish-e2">Video del inmueble:</label>
                                <input type="url" name="publish-e2" id="publish-e2" class="form__input form__input--line" placeholder="Video del inmueble">
                                <p class="w100 text text--xxs light gray mt5">Formatos: YouTube, Vimeo</p>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title mt20">
                                <label class="form__box__title dB mb10" for="publish-e3">Imagen del video:</label>
                                <div class="form__pseudo">
                                    <input type="file" name="publish-e3" id="publish-e3" class="form__iFile" placeholder="Video del inmueble">
                                    <a href="#" class="btn btn--hoverLPurple ttU mrA form__pseudo__btn">Cargar</a>
                                    <span class="form__pseudo__message">Ningún archivo seleccionado</span>
                                </div>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    {{-- STEP BOX CONTENT --}}
                    <article class="stepBox__content" data-stepbox="visibilidad">
                        <h2 class="w100 title semiBold lPurple taL mb15">Paso 6</h2>
                        <div class="stepBox__content__box pr10 prM0 mb20">
                            <h2 class="w100 fz35 fzM25 semiBold dGray ttU">Visibilidad de la oferta</h2>
                            <p class="text lGray regular mt10">Dinos hacia dónde deseas redireccionar tu publicación y si deseas agregar un filtro de búsqueda especifico por estas características. De lo contrario nosotros lo haremos por ti.</p>
                        </div>
                        <div class="stepBox__content__box pl10 plM0 mb20">
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50">
                                <input type="radio" name="publish-a11" id="publish-a11a" class="form__radio form__radio--switch" data-switch="false" checked>
                                <label for="publish-a11a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">AP muestra el inmueble automaticamente al público</label>
                            </article>
                            {{-- FORM FILTER BOX --}}
                            <article class="form__box form__box--title form__box--50">
                                <input type="radio" name="publish-a12" id="publish-a12a" class="form__radio form__radio--switch" data-switch="true">
                                <label for="publish-a12a" class="form__label form__label--radio form__label--inline ttU lGray semiBold text text--xs">YO elijo mostrar el inmueble a un publico determinado</label>
                            </article>
                            {{-- END FORM FILTER BOX --}}
                            {{-- FORM SWITCH BOX --}}
                            <div class="form__switchBox">
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20">
                                    <h3 class="form__box__title mb10">Tipo de público:</h3>
                                    <select name="publish-a13" id="publish-a13" class="select" required>
                                        <option value="" selected>Seleccionar</option>
                                        <option value="1a">Casa</option>
                                        <option value="1b">Apartamento</option>
                                        <option value="1c">Loft</option>
                                        <option value="1d">Conjunto</option>
                                        <option value="1e">Proyecto</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title mt20">
                                    <h3 class="form__box__title mb10">Tipo de público:</h3>
                                    <select name="publish-a14" id="publish-a14" class="select" required>
                                        <option value="" selected>Ubicación</option>
                                        <option value="1a">Bogotá</option>
                                        <option value="1b">Medellín</option>
                                        <option value="1c">Colombia</option>
                                        <option value="1d">Extranjero</option>
                                    </select>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--adjust mt20">
                                    <h3 class="form__box__title mb10">Intereses:</h3>
                                    <input type="checkbox" name="publish-a15" id="publish-a15a" class="form__checkbox">
                                    <label for="publish-a15a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mudanzas</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15b" class="form__checkbox">
                                    <label for="publish-a15b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Arquitectura</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15l" class="form__checkbox">
                                    <label for="publish-a15l" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Vivenda</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15c" class="form__checkbox">
                                    <label for="publish-a15c" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Reparaciones</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15e" class="form__checkbox">
                                    <label for="publish-a15e" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mudanzas</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15f" class="form__checkbox">
                                    <label for="publish-a15f" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Arquitectura</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15g" class="form__checkbox">
                                    <label for="publish-a15g" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Vivenda</label>
                                    <input type="checkbox" name="publish-a15" id="publish-a15h" class="form__checkbox">
                                    <label for="publish-a15h" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Reparaciones</label>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--adjust mt20">
                                    <h3 class="form__box__title mb10">Edad y Género:</h3>
                                    <input type="checkbox" name="publish-a16" id="publish-a16a" class="form__checkbox">
                                    <label for="publish-a16a" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Hombres</label>
                                    <input type="checkbox" name="publish-a16" id="publish-a16b" class="form__checkbox">
                                    <label for="publish-a16b" class="form__label form__label--checkbox form__label--inline ttU lGray semiBold text text--xs">Mujeres</label>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                                {{-- FORM FILTER BOX --}}
                                <article class="form__box form__box--title form__box--adjust mt20 pl10 prM10">
                                    <div id="form__range" class="form__range"></div>
                                    <p id="form__rangeValue" class="text mt10"></p>
                                </article>
                                {{-- END FORM FILTER BOX --}}
                            </div>
                            {{-- END FORM SWITCH BOX --}}
                        </div>
                    </article>
                    {{-- STEP BOX CONTENT --}}
                    <a href="#" class="btn btn--gradient ttU mt10 mrA mlMA stepBox__prev">Anterior</a>
                    <a href="#" class="btn btn--gradient ttU mt10 mlA mrMA stepBox__next">Siguiente</a>
                </form>
                {{-- END STEP BOX CONTAINER --}}
            </section>
            {{-- END STEP BOX --}}
        </div>
    </div>

    @section("scripts")

    <script src="{{asset("/js/libraries/dropzone.js")}}"></script>
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
                locationNameInput: $("#publish-b3")
            },
            markerIcon: "/images/icons/location--y.svg",
            onchanged: function (currentLocation, radius, isMarkerDropped) {
                var addressComponents = $(this).locationpicker('map').location.addressComponents;
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
