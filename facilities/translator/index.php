<?php
    session_start();

    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        header('Location: ./../');
    }
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link href="./../../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./../../css/translator.css" />
    <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img alt="Erasmus+ homepage" src="./../../img/logo.png" height="100px">
        <img alt="Erasmus+ homepage" src="./../../img/logo2.jpg" height="50px">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 500px;">
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="./../">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="./../chat/">Chat</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link active" href="./../translator/">Translator</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="./../periodic/">Periodic Table</a>
              </li>
              <!-- <li class="nav-item">
                  <a class="nav-link" href="./../dictionary/">Dictionary</a>
              </li> -->

              <li class="nav-item">
                  <a class="nav-link" href="./../../api/logout.php">Sign Out</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="https://sway.office.com/G1DYTIZ6YuE45dH4?ref=Link" target="_blank"
                      style>E-book of the outcomes</a>
              </li>
            </ul>
        </div>
      </div>
  </nav>

  <section class="translator">
    <div class="container">
      <div class="translator__header">
        <h2 class="translator__title">Translator</h2>
      </div>
      <div class="translator-main">
        <div class="row col-12 m-auto">
          <div class="col-12 col-md-6">
            <div class="translator-content">
              <select id="select--one" class="translator-content__list form-control">
                <option value="auto">auto</option>
                <option value="en">English</option>
                <option value="it">Italian</option>
                <option value="mk">Macedonian</option>
                <option value="pl">Polish</option>
                <option value="tr">Turkish</option>
              </select>
                <div class="translator-content__box">
                  <textarea
                    id="message"
                    class="translator-content__box-text form-control"
                  ></textarea>
                </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mt-3 mt-md-1">
            <div class="translator-content translator-content--margin-left">
              <select id="select--two" class="translator-content__list form-control">
                <option value="en" selected>English</option>
                <option value="it">Italian</option>
                <option value="mk">Macedonian</option>
                <option value="pl">Polish</option>
                <option value="tr">Turkish</option>
              </select>
                <div class="translator-content__box">
                  <textarea
                    id="translated-text"
                    class="translator-content__box-text form-control"
                  ></textarea>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
  <script src="./../../js/bootstrap.min.js"></script>

  <script>
      const select1 = document.getElementById("select--one");
      const select2 = document.getElementById("select--two");

      const textArea = document.getElementById("message");
      const textArea2 = document.getElementById("translated-text");

      let text = "";
      let tl = "auto";
      let hl = "en";

      select1.value = "auto";
      select1.addEventListener("click", () => {
          hl = select1.value;
          translate();
      });

      select2.addEventListener("click", () => {
          tl = select2.value;
          translate();
      });

      function translate(){
          textArea.value = textArea.value.replace(/\d+/g, "");
          hl = select1.value;
          tl = select2.value;
          const myRequest = fetch(
              `https://translate.googleapis.com/translate_a/single?client=gtx&sl=${hl}&tl=${tl}&hl=${hl}&dt=at&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&ie=UTF-8&oe=UTF-8&otf=1&ssel=0&tsel=0&tk=xxxx&q=${text}`
          );
          hl = select1.value;
          tl = select2.value;
          myRequest
          .then((response) => {
              return response.json();
          })
          .then((data) => {
              if (data[0] != null) {
              textArea2.value = data[0][0][0];
              } else {
              textArea2.value = "";
              }
          });
      }

      textArea.addEventListener("input", (event) => {
          text = event.target.value;
          translate();
      });
  </script>
</body>
</html>
