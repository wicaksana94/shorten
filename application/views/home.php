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
  <style type="text/css">
    .content {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      flex-direction: column;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      background-color: #f5f5f5;
      background-color: lightskyblue;
      background-image: url(https://images.unsplash.com/photo-1544264747-d8af8eb09999?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1058&q=80);
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      color: white;
      height: 100vh; 
    }
    .form-send-url {
      width: 100%;
      max-width: 50em;
      padding: 15px;
      margin: 0 auto;
    }
    .form-send-url .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-send-url .form-control:focus {
      z-index: 2;
    }
    .form-send-url input[type="text"] {
      margin-bottom: 1em;
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
    @media only screen and (max-width: 375px) {
      p.lead { 
        font-size: 1em; 
      }
    }
  </style>
  <body class="text-center" cz-shortcut-listen="true">
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
    <div class="content">
      <header class="d-flex justify-content-between m-5 w-75">
        <h3>Pendekk</h3>
        <a href="https://github.com/wicaksana94/shorten/" class="text-white"><i class="fab fa-github mr-1" aria-hidden="true"></i>Github</a>
      </header>
      <h3>Easy to shorten your URL</h3>
      <p class="lead mx-2">Pendekk is a free shorten url services you'll like. <br> Redirection to any page in a short url! Just make your own short url right now.</p>
      <form class="form-send-url" id="send_url_text">
        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus=""> -->
        <input type="text" name="url_text" id="url_text" class="form-control text-muted" placeholder="Paste your URL here" required="" autofocus="">
        <button type="submit" class="rounded_button btn btn-outline-primary">Shorten URL</button>
      </form>
      <div id="loader" class="mt-5 d-none">
        <div class="d-flex justify-content-center">
          <img src="<?php echo base_url("assets/images/loader.svg")?>">
        </div>
      </div>
      <div class="card card-result my-5 mx-3 text-dark d-none">
        <div class="card-body d-flex justify-content-between align-items-center">
          <span><label class="my-0 mr-1 pre-result">Congratulations, your short url is</label><label id="result" class="mr-3 mb-0 short_url_result"></label></span>
          <div>
            <button id="copy_button" class="rounded_button my-1" onclick="copyData()" data-toggle="modal" data-target="#copyModal" title="Copy URL"><i class="far fa-copy"></i></button>
            <button id="qrcoce_button" class="rounded_button my-1" data-toggle="modal" data-target="#qrcodeModal" title="Show QR Code"><i class="fas fa-qrcode"></i></button>
          </div>
        </div>
      </div>
      <div class="row bg-light mt-auto p-5 w-100">
        <div class="col text-dark">
          <h3 class="featurette-heading text-dark">Why use Pendekk?</h3>
          <p class="m-0">Because Pendekk can shorten your long URL in seconds.</p>
        </div>
      </div>
    </div>
    <footer class="footer mt-auto py-3 bg-white text-center">
      <div class="container">
        <span class="text-muted">Made with <i class="fas fa-heart text-danger"></i> in <b id="year"></b></span>
      </div>
    </footer>
  </body>
</html>

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
        url: '<?php echo base_url();?>index.php/Short/ShortenUrl',
        data: $('form').serialize(),
        beforeSend : function() {
          $('#url_text').prop('disabled', true);
          $('#loader').removeClass("d-none");
          $('.card-result').addClass("d-none");
          $('#qrcode').html('');
        },
        success: function (data_response) {
          let text = JSON.parse(data_response);
          if (text.status_code == 500) {
            $('#loader').addClass("d-none");
            $('.pre-result').addClass("d-none");
            $('#copy_button').addClass("d-none");
            $('#qrcoce_button').addClass("d-none");
          } else {
            $('#loader').addClass("d-none");
            $('.pre-result').removeClass("d-none");
            $('#copy_button').removeClass("d-none");
            $('#qrcoce_button').removeClass("d-none");
            $('#copy_button').attr("data-code", text.message);
            $('#qrcoce_button').attr("data-code", text.message);
            $('#qrcode').qrcode(text.message);
          }
          $('#url_text').prop('disabled', false);
          $('.card-result').removeClass("d-none");
          $('#result').html(text.message);
          $('#copied_data').html('Short URL '+text.message+' was copy to clipboard.');
          $('#url_text').val('');
        }
      });

    });

  });

  function copyData(text) {
      let copy_text = document.createElement("textarea");
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