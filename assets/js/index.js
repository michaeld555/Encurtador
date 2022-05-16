// Validando Link com Regex

function regex() {
  return /^[a-zA-Z0-9-_]+[:./\\]+([a-zA-Z0-9 -_./:=&"'?%+@#$!])+$/.test(
    regex.arguments[0]
  );
}

// Ajax para Retornar Link Encurtado

$(document).ready(function() {

  var botaoSalvar = $( "#encurtar" );

    botaoSalvar.click(function() {

    let link = $("#link").val();
    
    if (regex(link) == true) {

    botaoSalvar.html('Aguarde...');
    botaoSalvar.prop('disabled', true);

    $.ajax({
      url: "controller/link.php",
      method: "POST",
      data: { link: link },
      dataType: "json",
    }).done(function (result) {
      $("h1").text("URL Encurtada");
      $("#divlink").toggle(1);
      $("#link-gerado").prepend(
        '<input type="text" class="form-control" id="linkgerado" value="' +
          result +
          '" aria-label="Link-gerado" aria-describedby="button-addon2">' +
          '<button class="btn btn-success" onclick="copiar()" type="button" id="button">Copiar</button>'
      );
      $("#newlink").prepend("Encurtar Novamente");
    });
  } else {
    $("#encurtar").notify("Link Invalido", "warn", {
      position: "right-middle",
    });
  }

      });
  });

// Copiar Link Encurtado para Clipboard

function copiar() {
  let texto = $("#linkgerado").val();
  navigator.clipboard.writeText(texto);
  $("#button").notify("Texto Copiado", "success", { position: "right-middle" });
}

// Função Retornar Inicio

function back() {
  window.location.reload();
}
