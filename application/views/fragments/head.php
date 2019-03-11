<?php 
  if (!isset($_SESSION['user_details'])) {
    redirect('user');
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $page_title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>public/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>public/css/custom.css" rel="stylesheet">


</head>

<body id="page-top">