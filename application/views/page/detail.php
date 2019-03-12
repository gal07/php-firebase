<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Firebase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f9fcf8;">
 
<a class="navbar-brand" href="#">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSk16EYKyJEEpqBA_pqeGh_YLghozraVqLBVweWL9-139AvgP9r" width="30" height="30" class="d-inline-block align-top" alt="">
    Firebase & Mailer
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="about" data-toggle="modal" data-target="#exampleModalCenter">About <span class="sr-only">(current)</span></a>
      </li>
  </div>
</nav>

<br>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tentang Web Ini</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5>Bahan Bahan nya :</h5>
      <p> <a href="https://firebase.com" target="_blank" class="btn btn-sm btn-warning"> Firebase </a> </p>
      <p> <a href="https://w3schools.com/php" target="_blank" class="btn btn-sm btn-primary"> PHP </a> </p>
      <p> <a href="https://getbootstrap.com/docs/4.3/" target="_blank" class="btn btn-sm btn-info"> Boostrap </a> </p>

      <hr>
      <h5>Note !</h5>
      <p>Jangan di tunda kalo mau belajar.</p>
      - <cite title="Source Title"> galihkur29@gmail.com </cite>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Udah Ya</button>
      </div>
    </div>
  </div>
</div>

<!-- Content -->
<div class="container">

<h4 class="text-center">Detail Message</h4>

<div class="card">
  <div class="card-header">
    Quote
  </div>
  <div class="card-body">
  <cite id="sender" title="Source Title"></cite>
    <blockquote class="blockquote mb-0">
      <p id="body"></p>
      <footer class="blockquote-footer">To <cite id="to" title="Source Title"></cite></footer>
    </blockquote>
  </div>
</div>


<div id="load" class="text-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>

<br>

<button id="close" class="btn btn-danger btn-sm">Close</button>

</div>

    

<!-- Firebase App is always required and must be first -->
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-app.js"></script>

<!-- Add additional services that you want to use -->
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.7.1/firebase-functions.js"></script>

<!-- Boostrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
 
$("#close").on("click",function() {
    window.close();
});
  

 // Initialize Firebase
 var config = {
   apiKey: "AIzaSyC7Hi9Ft_K0MmOdbP6tsg5YksP4F6nORHE",
   authDomain: "fir-crud-7f287.firebaseapp.com",
   databaseURL: "https://fir-crud-7f287.firebaseio.com",
   projectId: "fir-crud-7f287",
   storageBucket: "fir-crud-7f287.appspot.com",
   messagingSenderId: "148921659125"
 };

 firebase.initializeApp(config);

 // Get a reference to the database service
 var database = firebase.database();
 
 var Spesific = database.ref('historySender/'+'<?= $key ?>');
   
 Spesific.on('value',function (snapshot) { 

   
       console.log(snapshot.val());
        $(".card-header").text(snapshot.val().subject);
        $("#body").text(snapshot.val().body);
        $("#to").text(snapshot.val().to);
        $("#sender").text("From "+snapshot.val().sender);
        $("#load").remove();

 });

});
</script>
</body>
</html>