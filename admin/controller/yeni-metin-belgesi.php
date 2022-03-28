<!DOCTYPE HTML>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= admin_public_url("/datepicker/jquery.datetimepicker.min.css") ?>" rel="stylesheet">
    
  </head>
  <body>
    <div id="datetimepicker" class="input-append date">
      <input type="text" id="picker"></input>
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>
    
   
    </div>
    
     <script type="text/javascript"
     src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="<?= admin_public_url("/datepicker/jquery.datetimepicker.full.min.js") ?>"></script>
    
    <script>
         $('#picker').datetimepicker({
             timepicker: true,
             datepicker: true,
             format: 'Y-m-d H:i:00',
             
         })
    </script>
    
  </body>
<html>