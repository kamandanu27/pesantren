<?php  
$data_admin = $this->public_model->get_admin($this->session->userdata('id_admin'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?= base_url() ?>public/template_master/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url() ?>public/template_master/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="<?= base_url() ?>public/template_master/css/font-awesome.css" rel="stylesheet">
<link href="<?= base_url() ?>public/template_master/css/style.css" rel="stylesheet">
<link href="<?= base_url() ?>public/template_master/css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>