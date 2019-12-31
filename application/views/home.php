<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css")?>">
    <link href="<?php echo base_url("assets/open-iconic/font/css/open-iconic-bootstrap.css")?>" rel="stylesheet">
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("assets/js/popper.min.js")?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?>"></script>

	<title>Short URL here</title>
</head>
<body>
	<form id="send_url_text">
		<input type="text" name="url_text">
		<input type="submit">
	</form>
	<p id="result"></p>
</body>
</html>

<script>
  $(function () {

    $('#send_url_text').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>Short/ShortenUrl',
        data: $('form').serialize(),
        success: function (data_response) {
          $('#result').html('Congratulations, your short url is ' + data_response);
        }
      });

    });

  });
</script>