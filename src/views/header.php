<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?= $data['title'] . ' - ' . Conf::SITE_TITLE ?></title>
  <meta name="description" content="Events">
  <meta name="author" content="ew">

  <!-- Mobile Specific Metas
  ************************* -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONTs -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  ************************* -->
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('normalize') ?>">
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('skeleton') ?>">
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('rome.min') ?>">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link type="text/css" rel="stylesheet" href="<?= URL::STYLES('custom') ?>">


  <!-- Favicon
  ************************* -->
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">

  <!--  JS	-->
  <script src="<?= URL::JS('rome.min') ?>"></script>
  <!-- Remember to include jQuery :) -->
  <script src="<?= URL::JS('jquery-3.7.1.min') ?>"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <!-- selectize plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Cookie consent -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?always=1&privacyPage=https%3A%2F%2Fevt.voshd.de%2Fpage%2Fprivacy"></script>
</head>

<body>

  <!-- Logo / Nav -->
  <header class="site-header">
    <div class="site-identity">
      <a href="<?= Conf::DIR ?>"><img class="logo" src="<?= URL::IMG("logo.svg"); ?>" alt="<?= i18n::tr('title.site') ?>" /></a>
      <h1><?= i18n::tr('title.site') ?></h1>
    </div>
  </header>
