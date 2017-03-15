<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Xfligth Support</title>
    <link rel="stylesheet" href="assets/css/print_pdf.css">
  </head>

<body>
    <div class="header">
      <img style=" margin-top:-90px; margin-left:-5px;  height:67px;width:200px;  position:absolute;" src="assets/images/pdf/header.png" >
      <img style=" margin-top:-85px; margin-left:463px  height:67px;width:250px;  position:absolute;" src="assets/images/pdf/fecha invoice.png" >
    </div>
    <div class="panel panel-primary11">
      <div class="panel-body" >
         <img style="margin-top:-15px; margin-left:-4px; height:20px;width:150px;  position:absolute;" src="assets/images/pdf/invoice.png" >
      </div>
    </div>


<div class="contenido" >
  <div class="cintillo">
      <span class="texto-i">

      </span>
      <span class="texto-d">

      </span>
      <img style="position: relative; height:130px;width:100%;" src="assets/images/pdf/cintillo.png" >

  </div>

  <table class="display" cellspacing="0" width="527" border="0">
      <thead >
          <tr>
              <td><strong>Id Est.</strong></td>
              <td><strong>Fecha Fac.</strong></td>
              <td><strong>Matricula</strong></td>
              <td><strong>FBO</strong></td>
              <td><strong>Compañia</strong></td>
              <td><strong>Proveedor</strong></td>
              <td><strong>Cantidad Est.</strong></td>
              <td><strong>Precio BasF</strong></td>
              <td><strong>Costo BasF</strong></td>
              <td><strong>Cantidad Fact.</strong></td>
              <td><strong>Precio XFS</strong></td>
              <td><strong>Costo XFS</strong></td>
              <td><strong>Diferencia</strong></td>
          </tr>
      </thead>
      <tbody>

      </tbody>
      <tfoot>
        <tr>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td colspan="5" ></td>
          <td >SUBTOTAL: </td><td> $ {{-- $invoice[0]->subtotal --}}</td>
        </tr>

        <tr>
          <td colspan="5" ></td>
          <td >DESCUENTO: </td><td> $ {{-- $invoice[0]->total_descuento --}}</td>
        </tr>
        <tr style="background-color: #A9A9A9;">
          <td colspan="5" background-color></td>
          <td ><strong>TOTAL: </strong></td><td> <strong>$ {{-- $invoice[0]->total --}}</strong></td>
        </tr>
      </tfoot>
  </table>
      <div class="otro">
        </div>
      <div class="foot">
 <img style="height:100%;width:100%;" src="assets/images/pdf/invoice base.png" >
      </div>
</div>

    <div class="pie">
     <img style="margin-left:40px; height:20px;width:90%;  position:absolute;" src="assets/images/pdf/REDES.png" >
    </div>
  </body>
</html>
