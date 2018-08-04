<?php $cacheVer = rand(1,10000); ?>     


       

     
        <!-- /#page-wrapper -->



   

    <!-- /#wrapper -->



    <!-- jQuery -->





 <script src="<?=base_url('env.js?v='.$cacheVer);?>"></script> 

 <script src="<?=base_url('assets/js/env-support.js?v='.$cacheVer);?>"></script> 

<script

        src="https://code.jquery.com/jquery-3.2.0.min.js"

        integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="

        crossorigin="anonymous"></script>



 

 <script src="<?=base_url('assets/js/mousetrap.min.js?v='.$cacheVer);?>"></script>

 <script src="<?=base_url('assets/js/ctrl-q-click.js?v='.$cacheVer);?>"></script>



 <script src="<?=base_url('assets/js/bootstrap.min.js?v='.$cacheVer);?>"></script>

 <script type="text/javascript" src="<?=base_url('assets/js/chosen.jquery.js?v='.$cacheVer)?>"></script>

 <script type="text/javascript" src="<?=base_url('assets/js/select2.js?v='.$cacheVer)?>"></script>



 <script type="text/javascript" src="<?=base_url('assets/js/jquery-validate.js?v='.$cacheVer)?>"></script>



 <script src="<?=base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js')?>"></script>



    <!-- Slimscroll Plugin Js -->

    <script src="<?=base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')?>"></script>



    <!-- Waves Effect Plugin Js -->

    <script src="<?=base_url('assets/plugins/node-waves/waves.js')?>"></script>



    <!-- Jquery CountTo Plugin Js -->

    <script src="<?=base_url('assets/plugins/jquery-countto/jquery.countTo.js')?>"></script>



    <!-- Morris Plugin Js -->

    <script src="<?=base_url('assets/plugins/raphael/raphael.min.js')?>"></script>

    <script src="<?=base_url('assets/plugins/morrisjs/morris.js')?>"></script>



    <!-- ChartJs -->

    <script src="<?=base_url('assets/plugins/chartjs/Chart.bundle.js')?>"></script>



    <!-- Flot Charts Plugin Js -->

    <script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.js')?>"></script>

    <script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.resize.js')?>"></script>

    <script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.pie.js')?>"></script>

    <script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.categories.js')?>"></script>

    <script src="<?=base_url('assets/plugins/flot-charts/jquery.flot.time.js')?>"></script>



    <!-- Sparkline Chart Plugin Js -->

    <script src="<?=base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js')?>"></script>



<!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

     <script src="<?=base_url('assets/special-js/admin.js')?>"></script>

     <script src="<?=base_url('assets/special-js/pages/index.js')?>"></script>

    <!-- Demo Js -->

     <script src="<?=base_url('assets/special-js/demo.js')?>"></script>





 <script type="text/javascript">

  function getBaseUrl(){

    return <?=json_encode(site_url())?>;

  }

 </script>

 <?php  if(isset($js_files)): ?>

  <?php  foreach($js_files as $js_file): 

      if(strstr($js_file,'jquery-1.11.1.min.js')){

        continue;

      }

  ?>

    <script type="text/javascript" src="<?=at($js_file).'?v='.$cacheVer?>"></script>

  <?php endforeach; ?>

<?php endif;?>





<script type="text/javascript">

jQuery(function(){

  

  $('form.validate').each(function(){

    $(this).validate();

  })

  

  // $('.account_selector').select2('open');

  $('.selectpicker').selectpicker({
    style: 'btn-info',
  size: 4
});

  $(".chosen-select").chosen();

  var d = new Date(90,0,1);

  $("._datepicker" ).datepicker({ 

      defaultDate:d,

          yearRange: '1930:2018',

   });

})

</script>

<!-- Hiding the domestic usertype column when export customer is added  -->

<script>

function goBack() {

    window.history.back();

}

</script>



<div style='height:20px;'></div>  

</body>

</html>



