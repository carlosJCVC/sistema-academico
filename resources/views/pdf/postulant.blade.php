<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

     <title>Postulante</title>

     <style type="text/css">
        * { margin: 0; padding: 0; }
        body { font: 16px Helvetica, Sans-Serif; line-height: 24px; background: url(images/noise.jpg); }
        .clear { clear: both; }
        #page-wrap { width: 800px; margin: 40px auto 60px; }
        #pic { float: right; margin: -30px 0 0 0; }
        h1 { margin: 0 0 16px 0; padding: 0 0 16px 0; font-size: 42px; font-weight: bold; letter-spacing: -2px; border-bottom: 1px solid #999; }
        h2 { font-size: 20px; margin: 0 0 6px 0; position: relative; }
        h2 span { position: absolute; bottom: 0; right: 0; font-style: italic; font-family: Georgia, Serif; font-size: 16px; color: #999; font-weight: normal; }
        p { margin: 0 0 16px 0; }
        a { color: #999; text-decoration: none; border-bottom: 1px dotted #999; }
        a:hover { border-bottom-style: solid; color: black; }
        ul { margin: 0 0 32px 17px; }
        #objective { width: 500px; float: left; }
        #objective p { font-family: Georgia, Serif; font-style: italic; color: #666; }
        dt { font-style: italic; font-weight: bold; font-size: 18px; text-align: right; padding: 0 26px 0 0; width: 150px; float: left; height: 100px; border-right: 1px solid #999;  }
        dd { width: 600px; float: right; }
        dd.clear { float: none; margin: 0; height: 15px; }
     </style>
</head>

<body>

    <div id="page-wrap">
    
        <div id="contact-info" class="vcard">
        
            <!-- Microformats! -->
        
            <h1 class="fn">{{$name}} {{$lastname}}</h1>
        
            <p>
                Teléfono/Celular: <span class="tel">{{$phone}}</span><br />
                C.I.: <span class="tel">{{$ci}}</span><br />
                Dirección: <span class="tel">{{$address}}</span><br />
                Email: <a class="email" href="mailto:test@test.com">{{$email}}</a>
            </p>
        </div>
        
        <div class="clear"></div>
        
        <dl>
            <dd class="clear"></dd>
            
            <dt>Cod. SIS</dt>
            <dd>
                <h2>{{$cod_sis}}</h2>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Item</dt>
            <dd>
                <h2>{{$item_name}}</h2>
            </dd>

            <dd class="clear"></dd>

            <dt>Código Item</dt>
            <dd>
                <h2>{{$item_code}}</h2>
            </dd>

            <dd class="clear"></dd>

            <dt>Género</dt>
            <dd>
                <h2>{{$gender}}</h2>
            </dd>
            
            <dd class="clear"></dd>
            
            <dt>Nombre de auxiliatura</dt>
            <dd>{{$auxiliar_name}}</dd>
            
            <dd class="clear"></dd>
            
            <dt>Nro. de documentos</dt>
            <dd>{{$nro_docs}}</dd>
            
            <dd class="clear"></dd>

            <dt>Nro de certificados</dt>
            <dd>{{$nro_certificates}}</dd>

            <dd class="clear"></dd>
        </dl>
        
        <div class="clear"></div>
    
    </div>

</body>

</html>