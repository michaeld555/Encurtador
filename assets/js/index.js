// Validando Link com Regex

function regex() {
  return /^[a-zA-Z0-9-_]+[:./\\]+([a-zA-Z0-9 -_./:=&"'?%+@#$!])+$/.test(
    regex.arguments[0]
  );
}

// Ajax para Retornar Link Encurtado

function gerar() {
  let link = $("#link").val();

  if (regex(link) == true) {
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
          '<button class="btn btn-outline-secondary" onclick="copiar()" type="button" id="button">Copiar</button>'
      );
      $("#newlink").prepend("Encurtar Novamente");
    });
  } else {
    $("#encurtar").notify("Link Invalido", "warn", {
      position: "right-middle",
    });
  }
}

// Copiar Link Encurtado para Clipboard

function copiar() {
  let texto = $("#linkgerado").val();
  navigator.clipboard.writeText(texto);
  $("#button").notify("Texto Copiado", "success", { position: "right-middle" });
}

// Função Retornar Inicio

function back() {
  $("#divlink, #link-gerado, #newlink").remove();
  $("h1").replaceWith(
    "<h1>Encurtador de URL</h1>" +
      '<div class="input-group mb-3 textfield" id="divlink">' +
      '<input type="text" class="form-control" id="link" placeholder="Insira seu link aqui" aria-label="Link" aria-describedby="button-addon2">' +
      '<button class="btn btn-outline-secondary" onclick="gerar()" type="button" id="encurtar">Encurtar</button>' +
      "</div>" +
      '<div class="input-group mb-3 textfield" id="link-gerado"></div>' +
      '<a onclick="back()" href="#" id="newlink"></a>'
  );
}
