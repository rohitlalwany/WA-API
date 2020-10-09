<!DOCTYPE html>
<html lang="en">
<head>
  <title>WA-API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">WA API Integration</a>
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">

    <div class="col-sm-8 offset-sm-2">
      <h5>Send Transactional Messages through whatsapp</h5>
            <form action="index.php" method="POST">
            <div class="form-group">
                <label for="number">WA Number:</label>
                <input type="number" class="form-control" placeholder="Enter Number" name="number">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <input type="text" class="form-control" placeholder="Enter Message" name="message">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Send</button>
            </form>
    </div>
  </div>
</div>

<div class="text-center" style="margin-bottom:0;background-color:black; color:white;">
  <p>Design & Developed By - Hukkum IT Solutions</p>
</div>

</body>
</html>

<?php 

if (isset($_POST['submit'])){

    $phone = '91'.$_POST['number'];
    $message = $_POST['message'];
    $data = [
        'phone' => $phone, // Receivers phone
        'body' => $message, // Message
    ];
    $json = json_encode($data); // Encode data to JSON
    // URL for request POST /message
    $token = '';   //you can get token from chat-api website https://chat-api.com/en/?lang=EN
    $instanceId = ''; ////you can get instance ID from chat-api website https://chat-api.com/en/?lang=EN
    $url = 'https://api.chat-api.com/'.$instanceId.'/message?token='.$token;
    // Make a POST request
    $options = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
        ]
    ]);
    // Send a request
    $result = file_get_contents($url, false, $options);
    print_r($result);
}

?>