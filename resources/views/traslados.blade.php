@extends('layout')
@section('content')
  <div id="slideshow">
      <div class="fullwidthbanner-container">
          <div id="main">
              <div class="image-container block">
                  <img src="images/XfligthSupport_traslados_private_jet_charter.png" alt="xflightsupport transportación terrestre je private">
              </div>
          </div>
      </div>
   </div>
      <section id="content">
          <div class="container">
              <div id="main">
                  <div class="image-style style1 large-block">

                      <h1 class="title">TRANSPORTACIÓN TERRESTRE </h1>
                      <p>

                          Ofrecemos servicios de transporte en todas y cada una de las localidades alrededor
                          del mundo, contando con vehículos de primera calidad en perfecto estado con las condiciones
                          más óptimas para sus traslados, todos los conductores asignados poseen un amplio conocimiento
                          de la localidad o la zona para brindar las mejores rutas de acceso posibles evitando cualquier
                          demora para llegar a su destino.

                      </p>

                      <div class="clearfix"></div>
                  </div>


              </div> <!-- end main -->
          </div>
      </section>
      <script type="text/javascript">
          tjq("#slideshow .flexslider").flexslider({
              animation: "fade",
              controlNav: false,
              animationLoop: true,
              directionNav: false,
              slideshow: true,
              slideshowSpeed: 5000
          });
      </script>  
@endsection
﻿
