<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <title>Purchase Successful</title>
</head>
<body>    
         <div class="container">
               <div class="panel panel-info">
                         <div class="panel-heading">Purchase Successful</div>
                         <div class="panel-body">
                              <p>Thank You for purchasing via Stripe.</p>
                              <p>Flash this email to the person in charge to get in!</p>
                              <br>
                              <div style="text-align: center"><img src="{{ URL::to('img/bbnuticket.png') }}"
                                   width="300px" height="300px"></div>
                              <br>
                              <br>
                              <br>
                              <br><p>Do not share your information with strangers!</p>
                         </div>
                       </div>
         </div>
</body>
</html>