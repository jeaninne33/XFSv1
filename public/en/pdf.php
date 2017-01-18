<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$fecha=date_create($_POST['fechaActual']);
$dia=date_format($fecha,'d');
$mes=date_format($fecha,'F');
$año=date_format($fecha,'Y');
$codigoPostal=$_POST['codigoPostal'];
$oficina=$_POST['oficinaNro'];
$edificio=$_POST['edificio'];
$direccion=$_POST['direccion'];
$aeronave=$_POST['aeronave'];
$tipoA=$_POST['tipo'];
$fabricante=$_POST['fabricante'];
$IDAeronave=$_POST['idAeronave'];
$fechaDuracion=date_create($_POST['fechaDuracion']);
$diaD=date_format($fechaDuracion,'d');
$mesD=date_format($fechaDuracion,'F');
$añoD=date_format($fechaDuracion,'Y');
$porcentaje=$_POST['porcentaje'];
$dias=$_POST['dias'];
$nombre1=$_POST['nombre1'];
$nombre2=$_POST['nombre2']; 
$titulo1=$_POST['titulo1'];
$titulo2=$_POST['titulo2'];
$banco=$_POST['banco'];
$direccionBanco=$_POST['direccionBanco'];
$nombreEmpresa=$_POST['nombreEmpresa'];
$nroCuenta=$_POST['cuenta'];
$direccionEmpresa=$_POST['direccionEmpresa'];
$nbCliente=$_POST['cliente'];
$proveedor=$_POST['proveedor'];
$empresa=$_POST['empresa'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$fax=$_POST['fax'];
$content ='<html> 
<head>
<!-- Page Title -->
<title>XFlightSupport</title>
<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="author" content="XFS">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="icoXFS.ico" type="image/x-icon">
<!-- Theme Styles -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.min.css">

<style>

html{
    margin: 0 0 1cm 0;
}

 body{
            font-family: Myriad Pro, helvetica, sans-serif;
            font-size:11px;
            color: #000;            
            background: #fff;
            text-align:justify;            
            margin: 3cm 1cm 1cm 1cm;
            border: 4px solid #229FC3;
        }
      
      .footer { position: fixed; bottom: 0px; }
      .pagenum:before { content: counter(page); }


</style>
</head>
<img style="margin-top: 5px; margin-left:40px; height:80px;width:300px;  position:fixed;" src="images/pdf/header.png" >
<body> 
                                            <div class="panel panel-primary11">
                                                <div class="panel-body" >
                                                   <img style="margin-top:-27px; margin-left:-19px; height:20px;width:307px;  position:absolute;" src="images/pdf/ACUERDO-DE-SOPORTE-DE-OPERACIONES-DE-VUELO.png" >
                                                    <p>
                                                        Este Acuerdo establecido en los '.$dia.' días del mes de '.$mes.' el año '.$año.'
                                                        ENTRE:
                                                        <br />
                                                        XFLIGHT SUPPORT, una sociedad constituida bajo las leyes de los Estados Unidos de Norte America, que tiene su domicilio social 2647 Cooper Way, Wellington, FL 33414 (En adelante "el Proveedor").
                                                        Y
                                                        <br />
                                                        '.$empresa.', una sociedad constituida bajo las leyes de la República Bolivariana de Venezuela, que tiene su sede social en el Código Postal '.$codigoPostal.', Oficina Nr. '.$oficina.', Edificio '.$edificio.', Estado Nueva Esparta '.$direccion.' (En adelante "el Cliente").

                                                    </p>                                                  
                                                     <br/>
                                                    <img style="margin-top:-15px; margin-left:-18px;  height:20px;width:305px;  position:absolute;" src="images/pdf/LAS-PARTES-HAN-ACORDADO-LO-SIGUIENTE.png">
                                                    <br/>
                                                     <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:305px;  position:absolute;" src="images/pdf/SOPORTE-DE-VUELO-Y-O-PRODUCTOS-01.png">
                                                    <br/>
                                                    <br/>                                                     
                                                    <p>
                                                        Sujeto a los términos de este Acuerdo, el Proveedor tomará las medidas necesarias para proporcionar uno o más de los siguientes Servicios de Apoyo de vuelo y / o los productos conforme a lo solicitado por el cliente para la aeronave que se especifica en la Cláusula 2:
                                                        <br />
                                                        Un centro de coordinación de vuelo 24 horas para procesar las solicitudes de soporte de vuelos del cliente y hacer los arreglos necesarios para las operaciones;
                                                        La obtención de los permisos necesarios de desembarco;
                                                        <br />
                                                        La planificación del vuelo y la rueda de la tripulación;
                                                        <br />
                                                        Hacer los arreglos para la asistencia en tierra de pasajeros, tripulaciones, equipajes, catering y otros servicios solicitados por el cliente y aceptados por el Proveedor;
                                                        <br />
                                                        Disponer de lo necesario para el transporte y alojamiento en un hotel para la tripulación y los pasajeros;
                                                        <br />
                                                        Organizar el suministro de combustible y el tipo de pago;
                                                        <br />
                                                        La contabilización de todos los cargos y gastos, incluyendo derechos de aterrizaje, las tarifas de estacionamiento, compras de combustible y las ayudas a la navegación;
                                                        <br />
                                                        Cualquier otro servicio que se comprometa a proporcionar que no esté mencionado anteriormente, solicitado específicamente por el cliente, y el Proveedor.
                                                    </p>                                                     
                                                     <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:150px;  position:absolute;" src="images/pdf/AERONAVES.png">
                                                     <br/>
                                                     <br/>                                                     
                                                    <p>
                                                        El proveedor tendrá que proporcionar los Servicios de Apoyo de vuelo y / o los productos de las siguientes aeronaves. Para evitar la interrupción en el rendimiento de los servicios, 
                                                        el cliente deberá mantener al Proveedor actualizado con los cambios relacionados a las aeronaves que se enumeran en este acuerdo mediante previa presentación por escrito, especificando cuando entró en vigor el cambio.
                                                        El proveedor deberá reconocer y confirmar la notificación de la flota que están recibiendo antes de procesarla a petición del cliente.
                                                    </p>
                                                     <br/>
                                                     
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>AC Modelo</th>
                                                                <th>AC Tipo</th>
                                                                <th>Fabricante C/N</th>
                                                                <th>ID</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Phenom</td>
                                                                <td>ABC</td>
                                                                <td>A</td>
                                                                <td>xflightsuport</td>
                                                                <td>1213456</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:330px;  position:absolute;" src="images/pdf/LAS-EMPRESAS-FILIALES-DEL-CLIENTE-PROVEEDOR.png">
                                                     <br/>
                                                     <br/>                                                    
                                                    <p>
                                                       3.1 A los efectos del presente Acuerdo, las siguientes empresas serán tomadas como empresas filiales de:
                                                        </p>                                                        
                                                        <p>
                                                        <strong>Proveedor:</strong> '.$proveedor.'
                                                        </p>                                                       
                                                        <p>
                                                        <strong>Cliente:</strong> '.$nbCliente.'
                                                        </p>                                                     
                                                        - [Introducir, si procede]
                                                   
                                                    <br/>
                                                      <img style="margin-top:5px; margin-left:-18px;  height:20px;width:110px;  position:absolute;" src="images/pdf/DURACIION.png">
                                                     <br/>
                                                     <br/>                                                      
                                                    <p>
                                                        4.1 El presente Acuerdo entrará en vigor el '.$diaD.' de '.$mesD.' de '.$añoD.'.
                                                        <br />
                                                        4.2 Este acuerdo puede ser caducado en cualquier momento por cualquiera de las partes dando un anuncio previo de [00] días avisando la culminación a la otra parte o de otra forma que se disponga en las condiciones

                                                    </p>
                                                    <br/>
                                                      <img style="margin-top:-15px; margin-left:-18px;  height:20px;width:110px;  position:absolute;" src="images/pdf/PRECIOS.png">
                                                         <br/>                                                
                                                    <p>
                                                        5.1 Los precios de los servicios de soporte de vuelos y / o los productos (excepto el combustible) adquiridos en virtud del presente Acuerdo serán establecidos por el Proveedor según Lista de Precios (Anexo I) que constituirá parte integrante del presente Acuerdo y están sujetos a variación según lo previsto en los Términos y Condiciones generales.
                                                        <br />
                                                        5.2 A menos que se acuerde lo contrario por escrito, el precio del combustible se basará en el precio indicado en la cotización proveedor.
                                                    </p>   
                                                       
                                                    <br/>
                                                    <br/>        
                                                    <img style="margin-top:-30px; margin-left:-18px;  height:20px;width:180px;  position:absolute;" src="images/pdf/CONDICIONES-DE-PAGO.png">                                                    
                                                        <p>
                                                        6.1 Todas las facturas del proveedor deberán pagarse dentro de los quince (15) días naturales a partir de la fecha de entrega de la factura.
                                                        <br />
                                                        6.2 Todos los pagos se realizarán por el cliente en la moneda indicada en la factura por transferencia directa a la cuenta bancaria del proveedor indicada en la factura.
                                                        <br />
                                                        6.3 El cliente no tendrá derecho a retrasar o rechazar el pago de una factura si ha habido retraso por parte del proveedor en la entrega de la misma.
                                                        <br />
                                                        6.4 El Proveedor se reserva el derecho de solicitar un depósito y / o un pago total o parcial de antemano por cualquier servicio de apoyo de vuelo y / o productos, en caso de que la cantidad  solicitada por los servicios y / o productos del cliente fuera superior a la cantidad de crédito disponible.
                                                        <br />
                                                        6.5 Si el cliente no paga en su totalidad en la fecha de vencimiento cualquier monto pagadero al Proveedor, a continuación, el cliente pasa a ser responsable del pago de intereses de demora sobre el importe vencido calculado a partir de la fecha de vencimiento del pago hasta la fecha en la que el proveedor reciba el pago completo a razón de '.$porcentaje.' por ciento por mes.
                                                        <br />
                                                        6.6 En el caso de que cualquier impuesto este legalmente y válidamente evaluado por el proveedor con respecto al suministro de los servicios y/o productos al cliente por una autoridad tributaria competente, el cliente acepta pagar un monto igual al impuesto al proveedor dentro de '.$dias.' días de recibir una factura correcta por el proveedor.

                                                    </p>
                                                    <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:110px;  position:absolute;" src="images/pdf/GENERALES.png">
                                                     <br/>
                                                     <br/>
                                                    <p>
                                                        7.1 El presente Acuerdo, La Lista de precios (anexo I) y los Términos y Condiciones Generales constituyen la totalidad del contrato entre las partes en relación con su tema, queda sin efecto cualquier otro que existiera entre las partes. Queda entendido expresamente, que para lo no previsto en este contrato, ambas partes declaran someterse a las disposiciones que rijan las leyes pertinentes y sus reglamentos.
                                                        <br />
                                                        7.2 Al firmar este Acuerdo, se considerará que el Cliente está de acuerdo irrevocablemente y ha accedido a la Lista de precios de cada proveedor (anexo I) y los Términos y Condiciones Generales (copias de los cuales se han suministrado al cliente antes de la firma del presente Acuerdo, el Usuario reconoce y que se adjunta al presente documento) y ambos de los cuales deberá constituir parte integrante del presente Acuerdo.
                                                        <br />
                                                        7.3 Los términos capitalizados usados en este acuerdo tendrán los significados atribuidos a ellos en las condiciones y términos generales.

                                                    </p>
                                                    <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:200px;  position:absolute;" src="images/pdf/NOTA-DE-ENTREGA-DE-COMBUSTIBLE.png">
                                                     <br/>
                                                    <br/>
                                                    <p>
                                                        El proveedor no podrá proveer al cliente con un ticket de entrega de combustible debido a restricciones del proveedor local. Por lo tanto el cliente se verá obligado en informar a su piloto y/o tripulación que obtengan la copia o el original del ticket de entrega de combustible del proveedor local. El piloto y/o la tripulación serán los responsables de asegurarse de que el ticket de entrega de combustible muestre el número de registro de la aeronave y la información completa de entrega incluyendo la cantidad de combustible y deberá mantener el ticket de entrega para futuras referencias de ser necesario.
                                                    </p>
                                                    <br/>
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:200px;  position:absolute;" src="images/pdf/INSTRUCCIONES-DE-PAGO.png">
                                                     <br/>
                                                     <br/>
                                                    <p>
                                                        9.1 Todos los pagos realizados por el cliente serán en la moneda indicada en la factura por transferencia directa a la cuenta bancaria del proveedor indicada a continuación.
                                                        <br />
                                                        9.2 En caso que el Proveedor este obligado a transferir dinero al cliente, el proveedor deberá realizar una transferencia bancaria directa a la cuenta bancaria del cliente indicada a continuación.
                                                        <br />
                                                        9.3 Cualquier cambio de las instrucciones de pago o datos bancarios, serán notificados por el Proveedor en la forma del acuerdo adicional, y que entrarán en vigor, una vez debidamente firmado por ambas partes.
                                                     </p>      
                                                        <p><strong>PROVEEDOR</strong></p>
                                                    <p>                                      
                                                        Banco: JP Morgan Chase Back
                                                        <br />
                                                        Dirección: Forest Hill Blvd & 441
                                                        <br />
                                                        A NOMBRE DE:X FLIGHTSUPPORT LLC.
                                                        <br />
                                                        Número de Cuenta: 819181129
                                                        <br />
                                                        Dirección: 2647 Cooper Way, Wellington, FL 33414
                                                    </p>                                                           
                                                        <p><strong>CLIENTE</strong></p>
                                                    <p>    														
                                                        Banco: '.$banco.'
                                                        <br />
                                                        Dirección: '.$direccionBanco.'
                                                        <br />
                                                        A NOMBRE DE: '.$nombreEmpresa.'
                                                        <br />
                                                        Número de Cuenta: '.$nroCuenta.'
                                                        <br />
                                                        Dirección: '.$direccionEmpresa.'
                                                        <br />
                                                        <br />
                                                        Indicar datos de la cuenta
                                                     </p>     
                                                     <br/>
                                                     <br/>                                                 
                                                     <img style="margin-top:-7px; margin-left:-18px;  height:20px;width:200px;  position:absolute;" src="images/pdf/INFORMACION-DE-CONTACTO.png">
                                                     <br/>                                                    
                                                  
                                                    <div class="col-sm-6 col-md-12">
                                                        Datos de la empresa 
                                                        Tlf: '.$telefono.'
                                                        <br />
                                                        Email: '.$correo.'
                                                        <br />
                                                        FAX: '.$fax.'
                                                        <br />
                                                        En fe de lo cual, este Convenio ha sido debidamente suscrito por las partes en el día y año establecido anteriormente.
                                                        <br />  
                                                        <br />                                                     
                                                        <div class="row">
                                                            <div class="col-xs-6">   
                                                                <p>En nombre y representación de
                                                                    <br/>
                                                                    Empresa: '.$empresa.'
                                                                    <br />
                                                                    Nombre: '.$nombre1.'
                                                                    <br />
                                                                    Título: '.$titulo1.'
                                                                    <br />
                                                                    [Firma y sello]
                                                                </p>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <p>
                                                                    En nombre y representación de
                                                                    <br />
                                                                    Empresa: XFLIGHT SUPPORT
                                                                    <br />
                                                                    Nombre: '.$nombre2.'
                                                                    <br />
                                                                    Título: '.$titulo2.'
                                                                    <br />
                                                                    [Firma y sello]
                                                                </p>     
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                           
                                             </div>
                             
                     
    <div class="footer">Page: <span class="pagenum"></span></div>               
</body>
</html>';
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('contrato.pdf');