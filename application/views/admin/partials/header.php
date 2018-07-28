<?php $cacheVer = $this->config->item('cache_version'); ?> 
<!DOCTYPE html>
<html>
<head>
  <title><?= isset($title) ? $title . ' - ' : ''; ?>Admin</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-date-picker.css?v='.$cacheVer)?>">
 <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/chosen.css?v='.$cacheVer)?>">
  <link href="<?=base_url('assets/css/bootstrap.min.css?v='.$cacheVer)?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/select2.css?v='.$cacheVer)?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/vex-theme-os.css?v='.$cacheVer)?>" rel="stylesheet">
 <link href="<?=base_url('assets/css/print.css?v='.$cacheVer)?>" rel="stylesheet">
<?php 
if(isset($css_files)){
    foreach($css_files as $file): ?>
    	<link type="text/css" rel="stylesheet" href="<?=$file.'?v='.$cacheVer?>" />
    <?php endforeach; 
 }
?>
   <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	<!-- Bootstrap Core Css -->
    <!-- Waves Effect Css -->
    <link href="<?=base_url('assets/css/materialize.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->      
    <link href="<?=base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />    <!-- Morris Chart Css-->      
    <link href="<?=base_url('assets/plugins/morrisjs/morris.css')?>" rel="stylesheet" />    <!-- Custom Css -->    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url('assets/css/all-themes.css')?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
</head>
<body class="theme-red">
	 <div class="container-fluid">
     
        <!-- Navigation -->
       <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?=site_url('/customerDashboard/index')?>">ADMIN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- #END# Tasks -->
                    <li class="pull-right"> 
                        <a href="<?=site_url('auth/logout')?>">Logout</a>					
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div> <!-- container-fluid -->
 <?php $this->load->view('common/messages'); ?>                                 
