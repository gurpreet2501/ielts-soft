<?php $role=user_role()?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
 <link href="<?=base_url('assets/css/print.css')?>" rel="stylesheet">
<?php 
if(isset($css_files)){
    foreach($css_files as $file): ?>
    	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; 
 }
?>
 <script src="<?=base_url('js/jquery-1.10.2.js');?>"></script>
 <script src="<?=base_url('js/bootstrap.min.js');?>"></script>

<?php if(isset($js_files)){ foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; 
}?>

<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}
.form-control {
  height: 36px !important;
}
</style>
</head>
<body>
	 <div id="wrapper">
    
        <div id="page-wrapper">

            <div class="container-fluid">
