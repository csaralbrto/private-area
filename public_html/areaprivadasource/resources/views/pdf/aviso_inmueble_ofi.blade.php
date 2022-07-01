<!doctype html>
<html lang="es">
<head>
        <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

      {{-- FONTS --}}
      <script src="https://kit.fontawesome.com/21696dc75e.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
</head>
<style>
    body{
        padding: 0;
        margin: 0;
        font-family: 'M PLUS Rounded 1c', sans-serif;
        text-align: center;
    }
    @font-face {
            font-family: 'arialRMTB';
            src: url("../fonts/ArialRoundedMTBold.eot?#iefix") format("embedded-opentype"),
                url("../fonts/ArialRoundedMTBold.otf") format("opentype"),
                url("../fonts/ArialRoundedMTBold.woff") format("woff"),
                url("../fonts/ArialRoundedMTBold.ttf") format("truetype"),
                url("../fonts/ArialRoundedMTBold.svg#ArialRoundedMTBold") format("svg");
            font-weight: normal;
            font-style: normal; 
        }
        @font-face {
            font-family: 'candaraB';
            src: url("../fonts/Candara-Bold.eot?#iefix") format("embedded-opentype"),
                url("../fonts/Candara-Bold.otf") format("opentype"),
                url("../fonts/Candara-Bold.woff") format("woff"),
                url("../fonts/Candara-Bold.ttf") format("truetype"),
                url("../fonts/Candara-Bold.svg#Candara-Bold") format("svg");
            font-weight: normal;
            font-style: normal; 
        }
    .general-box{
        width: 100%;
        height: 100vh;
        text-align: center;
    }
    h1{
        font-family: 'candaraB', arial, sans-serif;
        font-size: 10em;
        margin: 0;
        line-height: 140px;
        color: #DC178D;
        text-align: center;
    }
    h3{
        font-family: 'arialRMTB', arial, sans-serif;
        font-size: 7.4em;
        line-height: 3px;
        margin-top: 70px;
        border-bottom: 13px black solid;
        text-align: center;
        padding-bottom: 10px;
        padding-top: 10px;
        width: 700px;
        margin-left: 20%;
    }
    p{
        font-family: 'arialRMTB', arial, sans-serif;
        font-size: 4em;
        text-align: center;
        line-height: 40px;
        padding-top: 20px;
        margin-top: -130px;
    }
    span{
        font-family: 'arialRMTB', arial, sans-serif;
        color: #DC178D;
        text-shadow: -1px 1px 0 #000, 1px 1px 0 #000, 1px -1px 0 #000;
        stroke: #000;
        stroke-width: 0.1px;
    }
    
</style>
  <body>
    @if($publica == 'SE VENDE')
        {{-- <h1 style="font-family: 'candaraB', arial, sans-serif;"><br>{{$publica}}</h1> --}}
        <img src="{{asset('images/bg/se_vende.png')}}" style="width:57%;">
        {{-- <hr style="background-color: transparent;color: transparent;border-color: transparent;margin-bottom: 2em;"> --}}
        <h3 style="font-family: 'arlrdbd', arial, sans-serif;"><b>{{$telefono}}</b></h3>    
    @else
        {{-- <h1 style="font-family: 'candaraB', arial, sans-serif;">{{$publica}}</h1> --}}
        <img src="{{asset('images/bg/se_arrienda.png')}}" style="width:87%;">
            <h3 style="font-family: 'arlrdbd', sans-serif;">{{$telefono}}</h3>
        {{-- <hr style="background-color: transparent;color: transparent;border-color: transparent;"> --}}
    @endif
      <p style="font-family: 'arlrdbd', sans-serif;">Recorrido virtual con el <br> Cód. Inmueble:<span style="font-family: 'arlrdbd', sans-serif;"><b>{{$codigo}}</b></span><br>
      <b>en <span style="font-family: 'arlrdbd', sans-serif;">www.areaprivada.co</span></b></p>
</body>

</html>