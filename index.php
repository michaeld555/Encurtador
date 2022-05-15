<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Encurtador</title>
</head>
<body>
    <div class="main">
        <div class="encurtador">
        <form class="link" method="POST" action="">
                <h1>Encurtador de URL</h1>
                <div class="input-group mb-3 textfield" id="divlink">
                <input type="text" class="form-control" id="link" placeholder="Insira seu link aqui" aria-label="Link" aria-describedby="button-addon2">
                <button class="btn btn-success" onclick="gerar()" type="button" id="encurtar">Encurtar</button>
                </div>
                <div class="input-group mb-3 textfield" id="link-gerado"></div>
                <a onclick="back()" href="#" id="newlink"></a>
        </form>
        </div>
    </div>
    <script src="https://michaeljs.netlify.app/notify.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>