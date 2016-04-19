<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Short URL Service</title>
  <meta name="description" content="Just another Short URL Service">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
  <style>
    .box-center {
      padding-top: 120px;
    }
  </style>
</head>
<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="container">
    <div class="col-xs-12 col-md-push-3 col-md-6">
      <div class="box-center">
        <form method="POST">
          <div class="input-group">
            <input type="url"
                   id="url"
                   class="form-control"
                   placeholder="Use valid url such as http://mul14.net"
                   autofocus
                   autocomplete="off"
                   required
                   >
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="submit"> Get Short URL </button>
            </span>
          </div>
        </form>
        <pre id="result" class="alert alert-warning" style="margin-top: 20px; display: none;"></pre>
      </div>
    <div>
  <div>
  <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
  <script>
    $(function () {

      $('form').on('submit', function (e) {
        e.preventDefault();

        $.post('/', { url: $('#url').val() }, function (res) {

          $('#result').text(res).show()

        })
      })

    })
  </script>
</body>
</html>
