<!DOCTYPE html>
<?php
    $error = $_GET['error'];
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script>$(window).load(function(){        
   $('#myModal').modal('show');
    }); </script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Failed to delete</h4>
      </div>
      <div class="modal-body">
        <p><?php echo $error ?></p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" href="/companyManagement.php">Close</a>
      </div>
    </div>
  </div>
</div>