function addRows(){

	//ar nbAeronave= $("#nbAeronave").val()
	var nbAeronave = document.getElementById("nbAeronave").value;
    var modelo= document.getElementById("modelo").value;
    var tipo= document.getElementById("tipo").value;
    var fabricante= document.getElementById("fabricante").value;
    var idAeronave= document.getElementById("idAeronave").value;
    var mjs = "";
    var ok = true;

    if (nbAeronave == "") {
        mjs += "Nombre de la Aeronave, "
        ok = false;
    }
    if (modelo == "") {
        mjs += "AC Modelo, "
        ok = false;
    }
    if (tipo == "") {
        mjs += "AC Tipo, "
        ok = false;
    }
    if (fabricante == "") {
        mjs += "Fabrica C/N, "
        ok = false;
    }
	if (idAeronave == "") {
        mjs += "ID, "
        ok = false;
    }
    if (ok == false)
    {
        alert("Campos: " + mjs + " - Se encuentran vacios!!!");
    }
    else if (ok == true) {
        var i = document.getElementById("tbAeronave").length + 1;
        var e = "cur" + i;

        var texto1 = "<tr id=" + e + "><td>" + nbAeronave + "</td><td>" + modelo + "</td><td>"
        + tipo + "</td><td>" + fabricante + "</td><td>" +idAeronave + "</td><td>"
        + "<button class='btn btn-danger btn-xs' type='button' id='btnmenos' value='-' onclick='menos(" + e + ")'><i class='glyphicon glyphicon-remove'></i></button>" + "</td></tr>";

        $("#tbAeronave > tbody").append(texto1);

        i = i + 1;

        $("#nbAeronave").val("");
        $("#modelo").val("");
        $("#tipo").val("");
        $("#fabricante").val("");
        $("#idAeronave").val("");
    }
}

function aggFilas(){
	var table = document.getElementById("tbAeronave");
    var table2= document.getElementById("tbAeronave2");
    var datos = document.getElementById("datos");
	var nbAeronave = document.getElementById("nbAeronave").value;
    var modelo= document.getElementById("modelo").value;
    var tipo= document.getElementById("tipo").value;
    var fabricante= document.getElementById("fabricante").value;
    var idAeronave= document.getElementById("idAeronave").value;

    if (nbAeronave==""||modelo=="" || tipo==""||fabricante==""||idAeronave=="") {

    swal(
      'Campos Vacios',
      'Algunos campos se encuentran vacios, todos los campos son requeridos.!',
      'warning'
    )
  }
  else{
    var lastRow = table.rows.length;
    var row = table.insertRow(lastRow);
    var nombreAeronave = row.insertCell(0);
    var modeloAeronave = row.insertCell(1);
    var tipoAeronave = row.insertCell(2);
    var fabricanteAeronave= row.insertCell(3);
    var ID= row.insertCell(4);
    var boton= row.insertCell(5);

    nombreAeronave.innerHTML = nbAeronave;
    modeloAeronave.innerHTML = modelo;
    tipoAeronave.innerHTML=tipo;
    fabricanteAeronave.innerHTML=fabricante;
    ID.innerHTML=idAeronave;
    boton.innerHTML='<a style="text-align:center;" class="remove ml10" onclick="deleteRow(this)" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></a>';

    datos.value= datos.value+(nbAeronave+'-'+modelo+'-'+tipo+'-'+fabricante+'-'+idAeronave+'|');
    tjq('#nbAeronave').val("");
    tjq('#modelo').val("");
    tjq('#tipo').val("");
    tjq('#fabricante').val("");
    tjq('#idAeronave').val("");

  }

   return false;
}

function deleteRow(r) {

    var list;
    var Nombre, ACModelo, ACTipo,Fabricante, ID;
    var index;
    var i = r.parentNode.parentNode.rowIndex;
    var datos = document.getElementById("datos");
    tjq('#datos').val("");
    document.getElementById("tbAeronave").deleteRow(i);

     tjq("#tbAeronave tbody tr").each(function (index) {

                tjq(this).children("td").each(function (index2) {

                    switch (index2) {
                        case 0:
                            Nombre = tjq(this).text();
                            break;
                        case 1: ACModelo = tjq(this).text();
                            break;
                        case 2: ACTipo = tjq(this).text();
                            break;
                        case 3: Fabricante = tjq(this).text();
                            break;
                        case 4: ID = tjq(this).text();
                            break;
                    }

                });

                 list=Nombre+'-'+ACModelo+'-'+ACTipo+'-'+Fabricante+'-'+ID+'|';
                 if (list!='undefined-undefined-undefined-undefined-undefined|') {
                   datos.value=datos.value+(list);
                 }
     });
}

function resetForm(){
    document.getElementById("formContrato").reset();
}
