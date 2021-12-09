<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="author" content="">
        <meta name="keywords" content="<?= !empty($product['keywords'])?$product['keywords']:'' ?>">
        <meta name="description" content="<?= !empty($product['tag_description'])?$product['tag_description']:'' ?>">
        <title><?= !empty($product['title'])?$product['title']:$title.' | JK Handicrafts'; ?></title>
        <meta rel="canonical" href="<?= !empty($product['canonical'])?$product['canonical']:(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="<?= file_url('assets/fonts/Linearicons/Font/demo-files/demo.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/select2/dist/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/owl-carousel/assets/owl.carousel.min.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/slick/slick.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/plugins/lightGallery/dist/css/lightgallery.min.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/css/style.css'); ?>">
        <link rel="stylesheet" href="<?= file_url('assets/css/custom.css'); ?>">
        <script src="<?= file_url('assets/plugins/jquery.min.js'); ?>"></script>
    </head>
    <body>
