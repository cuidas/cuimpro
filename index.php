<?
$show_image = isset($_GET['data']);
if (!ini_get('allow_url_fopen')) {
    phpinfo();
    die();
}
$raw_data = base64_decode($_GET['data']);
$data = array();
foreach (explode('&', $raw_data) as $data_item) {
    $exploded = explode('=', $data_item);
    $data[$exploded[0]] = $exploded[1];
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuidas' Imageproxy</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">


    <style type="text/css">
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <meta property="og:title" content="The Rock"/>
    <meta property="og:type" content="video.movie"/>
    <meta property="og:url" content="http://www.imdb.com/title/tt0117500/"/>
    <meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg"/>
    <meta property="og:description"
          content="Sean Connery found fame and fortune as the
               suave, sophisticated British agent, James Bond."/>
    <meta property="og:image" content="http://example.com/ogp.jpg"/>
    <meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg"/>
    <meta property="og:image:type" content="image/jpeg"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="300"/>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./index.php">Start</a></li>
                <li><a href="https://github.com/cuidas/cuimpro">cuimpro on github</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="starter-template">
        <? if ($show_image) : ?>
            <h1><?= $data['data-title']; ?></h1>
            <img src="image.php?url=<?= $data['data-url']; ?>"/>
            <p class="lead"><?= $data['data-descr']; ?></p>
        <? else : ?>
            <h1>Hello, world!</h1>
            <form id="data-form">
                <label for="data-url">URL<input type="text" id="data-url" name="data-url"/><br/>
                    <label for="data-url">Title<input type="text" id="data-title" name="data-title"/><br/>
                        <label for="data-url">Description<input type="text" id="data-descr" name="data-descr"/><br/>
                            <input type="submit" value="Submit" id="submit-button"/><br/>
            </form>
            <p class="lead"></p>
        <? endif; ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="index.js"></script>
</body>
</html>