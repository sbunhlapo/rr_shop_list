<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo SITENAME; ?></title>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style>
    body {
      padding: 0px;
      margin: 0px;
      display: grid;
      grid-template-rows: auto auto auto;
    }

   
    
    .jumbotron{
      border-radius: 20px;
      background-color: #20827c;
    }

  .btn-success {
    color: #fff;
    background-color: #20827c;;
    border-color: #20827c;
  }

  .btn-success:hover, .btn-outline-success:hover {
    color: #fff;
    background-color: #151B26;
    border-color: #151B26;
  }

  .btn-outline-success{
    color: #20827c;
    border-color: #20827c;
  }


  
  footer {    
    position: fixed;
    background : #d1ccc0;
    bottom : 0;
    left : 0;
    right : 0;
    height : 50px;
}
  </style>


</head>
<body>
<?php require_once __DIR__ . '/navbar.php'; ?>
    <div class="container">