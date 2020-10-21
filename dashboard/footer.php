<!DOCTYPE html>
<html>
    <body>
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
          <!-- JQUERY SCRIPTS -->
          <script src="<?=$domain.'assets/js/jquery-1.10.2.js';?>"></script>
          <!-- BOOTSTRAP SCRIPTS -->
          <script src="<?=$domain.'assets/js/bootstrap.min.js';?>"></script>
          <!-- METISMENU SCRIPTS -->
          <script src="<?=$domain.'assets/js/jquery.metisMenu.js';?>"></script>
          <!-- DATA TABLE SCRIPTS -->
          <script src="<?=$domain.'assets/js/dataTables/jquery.dataTables.js';?>"></script>
          <script src="<?=$domain.'assets/js/dataTables/dataTables.bootstrap.js';?>"></script>
          <script>
            $(document).ready(function () {
              $('#dataTables-example').dataTable();
            });
          </script>
          <!-- CUSTOM SCRIPTS -->
          <script src="<?=$domain.'assets/js/custom.js';?>"></script>
    </body>
</html>