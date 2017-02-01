@extends('layout')
@section('content')
  <section id="content">
      <div class="container">
          <div class="row">
              <div id="main" class="col-sm-8 col-md-9">
                  <div class="travelo-box booking-section">
                      <form method="post" action="pdf.php" class="booking-form">
                          <div class="person-information">
                              <h2>CONTRATO</h2>
                              <h3>Acuerdo de soporte de operaciones de vuelo</h3>
                                <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Fecha</label>
                                      <div class="datepicker-wrap blue">
                                          <input type="text" name="fechaActual" class="input-text full-width" placeholder="dd/mm/yyyy" value="<?php echo date("m/d/Y");?>" />
                                      </div>
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Empresa</label>
                                          <input type="text" name="empresa" class="input-text full-width" placeholder="Nombre de la Empresa" />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Código Postal</label>
                                      <input type="text" name="codigoPostal" class="input-text full-width" value="" placeholder="0000" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Oficina Nro</label>
                                      <input type="text" name="oficinaNro" class="input-text full-width" value="" placeholder="0" />
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Edificio</label>
                                      <input type="text" name="edificio" class="input-text full-width" value="" placeholder="Nombre Edificio" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Dirección</label>
                                      <input type="text" name="direccion" class="input-text full-width" value="" placeholder="Dirección" />
                                  </div>
                              </div>
                          </div>
                          <hr />
                          <div class="group-details">
                              <h2>Aeronave</h2>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Nombre</label>
                                      <input type="text" name="aeronave" class="input-text full-width" value="" placeholder="Nombre Aeronave" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>AC Modelo</label>
                                      <input type="text" name="modelo" class="input-text full-width" value="" placeholder="Modelo Aeronave" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>AC Tipo</label>
                                      <input type="text" name="tipo" class="input-text full-width" value="" placeholder="Tipo Aeronave" />
                                  </div>
                                    <div class="col-sm-6 col-md-5">
                                      <label>Fabricante C/N</label>
                                      <input type="text" name="fabricante" class="input-text full-width" value="" placeholder="Fabricante" />
                                  </div>
                                    <div class="col-sm-6 col-md-5">
                                      <label>ID</label>
                                      <input type="text" name="idAeronave" class="input-text full-width" value="" placeholder="ID Aeronave" />
                                  </div>
                                   <div class="col-sm-6 col-md-5">
                                      <button style="margin-top:2em;" name="addTable" type="submit" class="sky-blue1 btn-medium">Agregar</button>
                                  </div>
                                   <div class="col-sm-6 col-md-12">
                                       <table data-toggle="table">
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
                                  </div>

                              </div>
                          </div>
                          <hr>
                            <div class="booking-type">
                              <h2>Las Empresas Filiales del Cliente/Proveedor</h2>
                              <div class="form-group row">
                                 <div class="col-sm-6 col-md-5">
                                      <label>Proveedor</label>
                                      <input type="text" name="proveedor" class="input-text full-width" value="X FLIGHTSUPPORT LLC." placeholder="" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Cliente</label>
                                      <input type="text" name="cliente" class="input-text full-width" placeholder="Nombre del CLiente" />
                                  </div>
                              </div>

                          </div>
                          <hr>
                          <div class="booking-type">
                              <h2>Duración</h2>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Fecha de Duración</label>
                                      <div class=" datepicker-wrap blue">
                                          <input type="text" name="fechaDuracion" class="input-text full-width" placeholder="dd/mm/yyyy" />
                                      </div>
                                  </div>
                              </div>

                          </div>
                          <hr>
                          <div class="booking-hotel">
                              <h2>Condiciones de</h2>
                              <div class="form-group row">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Porcentaje %</label>
                                      <input type="text" name="porcentaje" class="input-text full-width" value="02(dos)" placeholder="%" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Días</label>
                                      <input type="text" name="dias" class="input-text full-width" value="15" placeholder="Días" />
                                  </div>
                              </div>
                          </div>
                          <div class="booking-flight">
                              <h2>Instrucciónes de pago</h2>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Banco</label>
                                      <input type="text" name="banco" class="input-text full-width" value="" placeholder="Nombre del Banco" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Dirección</label>
                                      <input type="text" name="direccionBanco" class="input-text full-width" placeholder="Dirección del Banco" />
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>A nombre de</label>
                                      <input type="text" name="nombreEmpresa" class="input-text full-width" value="" placeholder="" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Numero de cuenta</label>
                                      <input type="text" name="cuenta" class="input-text full-width"  placeholder="Numero de cuenta" />
                                  </div>
                              </div>
                               <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Dirección de la empresa</label>
                                      <input type="text" name="direccionEmpresa" class="input-text full-width"  placeholder="Dirección de la empresa" />
                                  </div>
                              </div>
                          </div>
                          <hr>
                            <div class="booking-flight">
                              <h2>Datos de la Empresa</h2>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Telefono</label>
                                      <input type="text" name="telefono" required  class="input-text full-width" value="" placeholder="" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Correo</label>
                                      <input type="text" name="correo" class="input-text full-width" placeholder="email@xflightsupport.com" />
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Fax</label>
                                      <input type="text" name="fax" class="input-text full-width" value="" placeholder="" />
                                  </div>
                              </div>
                          </div>
                          <hr>
                          <div class="booking-flight">
                              <h2>Información de Contacto</h2>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Nombre</label>
                                      <input type="text" name="nombre1" required  class="input-text full-width" value="" placeholder="Nombre de Contacto" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Nombre</label>
                                      <input type="text" name="nombre2" readonly class="input-text full-width" value="Julio Sosa" placeholder="Nombre" />
                                  </div>
                              </div>
                              <div class="row form-group">
                                  <div class="col-sm-6 col-md-5">
                                      <label>Titulo</label>
                                      <input type="text" name="titulo1" class="input-text full-width" value="" placeholder="Titulo" />
                                  </div>
                                  <div class="col-sm-6 col-md-5">
                                      <label>Titulo</label>
                                      <input type="text" name="titulo2" readonly class="input-text full-width" value="Presidente" placeholder="Titulo" />
                                  </div>
                              </div>


                          </div>

                          <hr />

                          <div class="form-group row">
                              <div class="col-sm-6 col-md-5">
                                  <button type="submit" class="full-width btn-large sky-blue1">Generar PDF</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>

          </div>
      </div>
  </section>        
@endsection
