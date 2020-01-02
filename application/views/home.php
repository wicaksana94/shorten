<!DOCTYPE html>
<html>
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
  	
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
      <script src="<?php echo base_url("assets/js/popper.min.js")?>"></script>
      <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>
      <script src="https://kit.fontawesome.com/48ef12f1ae.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js" integrity="sha256-9MzwK2kJKBmsJFdccXoIDDtsbWFh8bjYK/C7UjB1Ay0=" crossorigin="anonymous"></script>

  	<title>Short URL here</title>
  </head>
  <body>

<!-- Modal -->
<div class="modal fade" id="qrcodeModal" tabindex="-1" role="dialog" aria-labelledby="qrcodeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body d-flex justify-content-center">
        <div id="qrcode"></div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="copyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body d-flex justify-content-center">
        <h4 id="copied_data" class="m-0 text-dark"></h4>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

    <div class="content h-100 m-5 p-5">
      <header class="d-flex justify-content-between mx-5">
        <h3>Pendekk</h3>
        <a href="https://github.com/wicaksana94/shorten/" class="text-white"><i class="fab fa-github mr-1"></i>Github</a>
      </header>
      <div class="container text-center pt-5 mt-5">
        <div>
          <h1>Easy to shorten your URL</h1>
          <p class="lead">Pendekk is a free shorten url services you will like. <br> Redirection to any page in a short url! Just make your own short url right now.</p>
        </div>
        <div class="row justify-content-center">
          <div class="col-12">
          <form id="send_url_text">
            <input type="text" name="url_text" id="url_text" class="form_input text-muted" placeholder="Paste your URL here" required>
            <button type="submit" class="rounded_button"><i class="fas fa-arrow-right text-muted"></i></button>
          </form>
          </div>
        </div>      
      </div>
      <div id="loader" class="mt-5 d-none">
        <div class="d-flex justify-content-center">
          <img src="<?php echo base_url("assets/images/loader.svg")?>">
        </div>
      </div>
      <div class="card card-result mt-5 mx-auto w-50 text-dark d-none">
        <div class="card-body d-flex justify-content-between align-items-center">
          <span><label class="my-0 mr-1">Congratulations, your short url is</label><label id="result" class="m-0 short_url_result"></label></span>
          <div>
            <button id="copy_button" class="rounded_button" onclick="copyData()" data-toggle="modal" data-target="#copyModal" title="Copy URL"><i class="far fa-copy"></i></button>
            <button id="qrcoce_button" class="rounded_button" data-toggle="modal" data-target="#qrcodeModal" title="Show QR Code"><i class="fas fa-qrcode"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="p-5 bg-light text-dark text-center">
      <h3 class="">Why use Pendekk?</h3>
      <p class="m-0">Because Pendekk can shorten your long URL in seconds.</p>
    </div>
    <footer class="footer mt-auto py-3 bg-white text-center">
      <div class="container">
        <span class="text-muted">Made with <i class="fas fa-heart text-danger"></i> in <b id="year"></b></span>
      </div>
    </footer>
  </body>
</html>

<style>
  body {
    background-color: lightskyblue;
    background-image: url(https://images.unsplash.com/photo-1544264747-d8af8eb09999?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1058&q=80);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    color: white;
    height: 100vh; 
  }
  .form_input {
    width: 40em;
    padding: .375rem 1.5rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 2rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  .rounded_button {
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 2rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
  .short_url_result {
    font-size: large;
    font-weight: 700;
  }
</style>

<script>
$( document ).ready(function() {
    let fulldate = new Date();
    let year = fulldate.getFullYear();
    document.getElementById("year").innerHTML = year;
});

  $(function () {

    $('#send_url_text').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>Short/ShortenUrl',
        data: $('form').serialize(),
        beforeSend : function() {
          $('#url_text').prop('disabled', true);
          $('#loader').removeClass("d-none");
          $('.card-result').addClass("d-none");
          $('#qrcode').html('');
        },
        success: function (data_response) {
          $('#loader').addClass("d-none");
          $('#url_text').prop('disabled', false);
          $('.card-result').removeClass("d-none");
          $('#result').html(data_response);
          $('#copied_data').html('Short URL '+data_response+' was copy to clipboard.');
          $('#url_text').val('');
          $('#copy_button').attr("data-code", data_response);
          $('#qrcoce_button').attr("data-code", data_response);
          $('#qrcode').qrcode(data_response);
        }
      });

    });

  });

  function copyData(text) {
      var copy_text = document.createElement("textarea");
      // to avoid breaking orgain page when copying more words
      // cant copy when adding below this code
      // copy_text.style.display = 'none'
      document.body.appendChild(copy_text);
      //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea".
      copy_text.value = text;
      copy_text.select();
      document.execCommand("copy");
      document.body.removeChild(copy_text);
  }

  $(function() {
      $(document).on('click', '#copy_button', function() {
          let text = $(this).attr('data-code');
          copyData(text)
      });
  });
</script>