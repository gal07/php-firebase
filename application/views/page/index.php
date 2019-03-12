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

<h2 class="text-center">Send Email</h2>

<div class="container">

<form action="" method="post" id="form">

<!-- Choose User -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01"> <i class="fa fa-user"></i> </label>
  </div>
  <select required class="custom-select" name="user" id="user">
    <option value="">Pilih</option>
    <option value="1">Robert</option>
    <option value="2">Davies</option>
    <option value="3">Caniago</option>
  </select>
</div>

<!-- Email -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"> <i class="fa fa-mail-bulk"></i> </span>
  </div>
  <input required name="email" id="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
</div>

<!-- Subject -->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"> <i class="fa fa-subscript"></i> </span>
  </div>
  <input required name="subject" id="subject" type="text" class="form-control" placeholder="Subject" aria-label="Subject" aria-describedby="basic-addon1">
</div>

<!-- Body -->
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text"><i class="fa fa-pencil-ruler"></i></span>
  </div>
  <textarea required placeholder="Body" name="body" id="body" class="form-control" aria-label="With textarea"></textarea>
</div>

<br>

<button type="submit" class="btn btn-primary"> Send <i class="fa fa-envelope"></i> </button>

<!-- Loading button -->
<button style="display:none" id="sending_load" class="btn btn-primary" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Sending...
</button>

</form>
<br>

<h2 class="text-center">History Send</h2>

    <!-- Show Result -->
    <div class="list-group">

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
  

  /* Show All Data */
  var leadsRef = database.ref('historySender');
    leadsRef.on('value', function(snapshot) {

        var ty;
        $(".list-group").empty();
        console.log(snapshot.val());
        snapshot.forEach(function(childSnapshot) {

            console.log(childSnapshot.val());
        
            ty =  $(".list-group").append(
                
        "<a href='#' class='list-group-item list-group-item-action'>"+
            "<div class='d-flex w-100 justify-content-between'>"+
            "<h5 class='mb-1'>"+childSnapshot.val().subject+"</h5>"+
            "<small>"+childSnapshot.val().time+"</small>"+
            "</div>"+
            "<p class='mb-1'>"+childSnapshot.val().body+"</p>"+
            "<button class='btn btn-danger delete' id='"+childSnapshot.key+"'> <i class='fa fa-trash'></i> </button>"+
            "<button class='btn btn-primary view' id='"+childSnapshot.key+"'> <i class='fa fa-eye'></i> </button>"+
        "</a><br>"
                
            );

        });

        /* Delete */
        $(".delete").click(function () { 
           
            var key = $(this).attr("id");
            var deletes = {};
                deletes['/historySender/' + key] = null;

            /* Delete */
            return firebase.database().ref().update(deletes);
        });


        /* View Detail */
        $(".view").click(function () {           
            var key = $(this).attr("id");
            window.open('<?= base_url('/view?p=') ?>'+key,'_blank');
       });

    });


    /* Submit Form */ 
  $("#form").submit(function (e) { 
    var select = $('#user');
    var user = $('#user').val();
    var name = select[0].selectedOptions[0].innerText;
    var email = $("#email").val();
    var subject = $("#subject").val();
    var body = $("#body").val();
    var d = new Date();
    var Time = d.getFullYear()+' - '+d.getMonth()+' - '+d.getDate();

    e.preventDefault();
    
    $.ajax({

        async:true,
        cache:false,
        data:$(this).serialize(),
        type:"post",
        url:"<?= base_url('send') ?>",
        dataType:"json",
        beforeSend: function () { 
            $("#sending_load").css("display","block");
         },
        success : function (resp) {

        },
        error : function (error) { 
            if(error.status == 200){
                writeUserData(user,name,email,subject,body,Time);
                $("#sending_load").css("display","none");
                $("#form")[0].reset();
            }
         }

    });

  });




   /* Insert Data */
  function writeUserData (users,names,emails,subjects,bodys,times)
  {   
      firebase.database().ref( 'historySender/' ).push(
          {
              sender:names,
              to:emails,
              time:times,
              subject:subjects,
              body:bodys,
          }
      );
  }

  



});

</script>
</body>
</html>