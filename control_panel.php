<?php
      session_start();
    if(isset($_SESSION['login_controler']) == FALSE){
        header("location: Controler_login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Control Panel</title>
  <style>
    body {
      color: rgb(39, 160, 200);
    }

    .arrows {
      font-size: 30px;
      color: rgb(8, 3, 3);
    }

    td.button {
      background-color: rgb(73, 198, 248);
      border-radius: 25%;
      box-shadow: 5px 5px #888888;
    }

    #startBtn {
      border: none;
      color: #4CAF50;
      padding: 15px 32px;
      text-align: center;
      font-size: 23px !important;
      text-decoration: none;
      display: inline-block;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 10px;
    }

    td.button:active {
      transform: translate(5px, 5px);
      box-shadow: none;
    }

    .noselect {
      -webkit-touch-callout: none;
      /* iOS Safari */
      -webkit-user-select: none;
      /* Safari */
      -khtml-user-select: none;
      /* Konqueror HTML */
      -moz-user-select: none;
      /* Firefox */
      -ms-user-select: none;
      /* Internet Explorer/Edge */
      user-select: none;
      /* Non-prefixed version, currently
                                      supported by Chrome and Opera */
    }

    .slidecontainer {
      width: 100%;
    }

    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }

    .slider:hover {
      opacity: 1;
    }

    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: red;
      cursor: pointer;
    }

    .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;

      cursor: pointer;
    }

    .container {
      width: 960px;
      border: 1px solid #888888;
      border-radius: 10px;
      margin: auto;
      overflow: hidden;
      max-height: 800px;
    }

    .displaypanel {
      border-right: 1px solid #888888;
      float: left;
      width: 50%;
    }
    .voicePanel {
      float: right;
      width: 49%;
    }
    .result{
      height: 300px;
      overflow: auto;
      text-align: center;
    }
    .logout_content{
      text-align: center;
      margin-top: 20px
    }
    .logout_content a{
      text-decoration: none;
      padding: 10px 15px;
      background-color: rgb(199, 30, 30);
      border-radius: 8px;
      color: #fff;
    }
    .logout_content a:hover{
      background-color: rgb(168, 21, 21);
    }
  </style>
  <link rel="stylesheet" href="https://kit.fontawesome.com/173a949cb2.css" crossorigin="anonymous">
</head>

<body class="noselect" align="center" style="background-color:white">
  <div class="container">
    <div class="displaypanel">
      <table id="mainTable" style="width:400px;margin:auto;table-layout:fixed" CELLSPACING=10>
        <tr>
          <p>SANZI's CONTROLL PANEL</p>
          <iframe src="http://192.168.0.122:81/stream" title="online transform" height="240" , width="320"></iframe>
        </tr>
        <tr>
          <td></td>
          <td class="button" onclick="window.location.href='http://192.168.0.113/car?sanzi=8';"><span
              class="arrows">&#8679;</span></td>
          <td></td>
        </tr>
        <tr>
          <td class="button" onclick="window.location.href='http://192.168.0.113/car?sanzi=3';"><span class="arrows">&#8678;</span></td>
          <td class="button" onclick="window.location.href='http://192.168.0.113/car?sanzi=5';"></td>
          <td class="button" onclick="window.location.href='http://192.168.0.113/car?sanzi=7';"><span class="arrows">&#8680;</span></td>
        </tr>
        <tr>
          <td></td>
          <td class="button" onclick="window.location.href='http://192.168.0.113/car?sanzi=2';"><span
              class="arrows">&#8681;</span></td>
          <td></td>
        </tr>
      </table>
    </div>
    <div class="voicePanel">
      <button id="startBtn"><i class="fas fa-microphone"></i></button>
      <div id="result" class="result">

        <p id="processing"></p>
      </div>

      <script src="assets/js/script1.js"></script>
    </div>
  </div>
  <div class="logout_button">
    <div class="logout_content">
      <a href="assets/php/logout.php">Logout</a>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/173a949cb2.js" crossorigin="anonymous"></script>
  <script>
    var webSocketCarInputUrl = "ws:\/\/" + window.location.hostname + "/CarInput";
    var websocketCarInput;
    function initWebSocket() {
      initCameraWebSocket();
      initCarInputWebSocket();
    }

    function sendButtonInput(key, value) {
      var data = key + "," + value;
      websocketCarInput.send(data);
    }

    window.onload = initWebSocket;
    document.getElementById("mainTable").addEventListener("touchend", function (event) {
      event.preventDefault()
    });      
  </script>
</body>

</html>
