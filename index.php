<?php
// Check requirements
if (!ini_get('allow_url_fopen')) {
    die('you need to set allow_url_fopen to true to run this script!');
}
if (!extension_loaded('gd') || !function_exists('gd_info')) {
    echo "you need to have the gd-extension installed and enabled to run this script!";
}

$show_image = isset($_GET['data']);
if ($show_image) {
    $raw_data = base64_decode($_GET['data']);
    $data = array();
    foreach (explode('&', $raw_data) as $data_item) {
        $exploded = explode('=', $data_item);
        $data[$exploded[0]] = $exploded[1];
    }
}
?>
<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
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
            background: url('http://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png') no-repeat bottom right;
            background-size: 10%;
        }

        .preview {
            width: 30%;
            margin: 0 auto;
        }

    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <?php if ($show_image) : ?>
        <meta property="og:title"
              content="<?=
              strlen($data['data-title']) ? urldecode(
                  $data['data-title']
              ) : "Image @ Cuidas' Imageproxy"; ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
        <meta property="og:description"
              content="<?=
              strlen($data['data-descr']) ? urldecode(
                  $data['data-descr']
              ) : "Someone shared an image @ Cuidas' Imageproxy"; ?>"/>
        <meta property="og:image" content="<?= urldecode($data['data-url']); ?>"/>
    <?php else : ?>
        <meta property="og:title" content="Cuidas' Imageproxy"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"/>
        <meta property="og:image" content="http://upload.wikimedia.org/wikipedia/commons/1/13/Facebook_like_thumb.png"/>
        <meta property="og:description" content="Sharing images made easy!"/>
    <?php endif; ?>
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
            <a class="navbar-brand" href="#">Cuidas' Imageproxy</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="./index.php">Start over</a></li>
                <li><a href="https://github.com/cuidas/cuimpro" target="_blank">cuimpro on github</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="starter-template">
        <div class="error-msg"></div>
        <?php if ($show_image) : ?>
            <h1><?= strlen($data['data-title']) ? urldecode($data['data-title']) : "Image @ Cuidas' Imageproxy"; ?></h1>
            <a data-footer="<?=
            strlen($data['data-descr']) ? urldecode(
                $data['data-descr']
            ) : "Someone shared an image @ Cuidas' Imageproxy"; ?>"
               data-title="<?=
               strlen($data['data-title']) ? urldecode(
                   $data['data-title']
               ) : "Image @ Cuidas' Imageproxy"; ?>" data-toggle="lightbox"
               href="<?= urldecode($data['data-url']); ?>">
                <img class="preview img-responsive" src="<?= urldecode($data['data-url']); ?>">
            </a>
            <p class="lead">
                <?=
                strlen($data['data-descr']) ? urldecode(
                    $data['data-descr']
                ) : "Someone shared an image @ Cuidas' Imageproxy"; ?>
            </p>
        <?php else : ?>
            <h1>Cuidas' Imageproxy</h1>
            <form class="form-horizontal span8" id="data-form">
                <div class="form-group url">
                    <label class="control-label" for="data-url">
                        URL
                    </label>
                    <input type="text" class="form-control" id="data-url" name="data-url"/>
                </div>
                <div class="form-group title">
                    <label class="control-label" for="data-title">
                        Title
                    </label>
                    <input type="text" class="form-control" id="data-title" name="data-title"/>
                </div>
                <div class="form-group descr">
                    <label class="control-label" for="data-descr">
                        Description
                    </label>
                    <textarea class="form-control" id="data-descr" name="data-descr"></textarea>
                </div>
                <input type="submit" value="Submit" id="submit-button"/>
            </form>
            <p class="lead">Simple and clean image sharing on social networks. Enter the image-url, a title, a
                description and share!</p>
        <?php endif; ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/ekko-lightbox/3.0.2b/ekko-lightbox.min.js"></script>
<script src="index.js"></script>
</body>
</html>