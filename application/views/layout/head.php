<!DOCTYPE html>
<html lang="en">
<!-- HAYO MAU NGAPAIN NGINTIP-NGINTIP ?? ^^, -->
<!-- BELAJAR YANG RAJIN YA !! -->
<!-- #MayTheCodeBuiltinYou -->
<!-- _  _______________  _____
    / \/ / ^ /_  _/ /| |// =_/
  ©/_/\_/_/_/ /_//_/ |__/___/
 -->
<!-- <> with ❤ by .Native -->
<!-- ga usah bilang-bilang abis liat ini ^^, -->
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo base_url("assets//img/logo/karamel.png")?>"/>
	<title><?php echo $title ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/mykaramel.min.css')?>" rel="stylesheet">

    <?php
      if(isset($nav_active) && $nav_active == "beranda"){
        echo "<link href='".base_url('assets/css/mykaramelx.css')."' rel='stylesheet'>";
      }
      if (((isset($siswa) && $siswa == false) || (isset($news) && $news == false)) && $nav_active != 'beranda') {
        echo "<script src='".base_url('assets/js/typed.js')."'></script>\n\t";
        echo "<script src='".base_url('assets/js/demos.js')."'></script>\n\t";
        echo "<script src='".base_url('assets/js/defaults.js')."'></script>\n";
      }
    ?>
    <link href="<?php echo base_url('assets/css/karamel.css')."?v=".date("Ymd") ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datatables.min.css')?>" rel="stylesheet">

    <!-- Datatable Script -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/choosen.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/datatables.min.js')?>"></script>

    <script>
        $(function() {
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
        });
    </script>

    <style>
        #loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 48px;
            height: 48px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            display: none;
            position: relative;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .checkbox-rounded [type="checkbox"][class*='filled-in']+label:after {
            border-radius: 50%;
        }
    </style>
</head>

<body class="hidden-sn mdb-skin grey lighten-3">