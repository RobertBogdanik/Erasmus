<?php
    session_start();

    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != true){
        header('Location: ./../');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./../../css/style.css">
    <link href="./../../css/bootstrap.min.css" rel="stylesheet">
    <title>Erasmus</title>
    <script>
        let imagePath = ''

        function changeImage(path) {
            imagePath = path
            document.getElementById('image').src = path
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <img alt="Erasmus+ homepage" src="./../../img/logo2.jpg" height="50px">
            <img alt="Erasmus+ homepage" src="./../../img/logo.png" height="100px">

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
                        <a class="nav-link active" aria-current="page" href="./../chat/">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./../translator/">Translator</a>
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

    <div class="row col-11 m-auto chat">
        <div class="messages">

        </div>
        <div class="col-12 mt-2 sendMessageForm">
            <div class="newMessage">
                <img src="./../../img/downArrow.png" alt="go down">
            </div>
            <div class="input-group mb-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#sendImage">
                    <img src="./../../img/add-image.png" alt="add image" width="20px">
                </button>
                <input type="text" class="form-control" placeholder="Type your message" aria-label="Type your message"
                    aria-describedby="button-addon2" id="newSimpleMessage">
                <button class="btn btn-outline-secondary" type="button" id="sendSimpleMessage">Send</button>
            </div>
            <a href="https://icons8.com/" class="link-light" target="_blank">Icons from Icons8</a>
        </div>
    </div>
    <div class="modal fade" id="sendImage" tabindex="-1" aria-labelledby="sendImageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="sendImageLabel">Send message with image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./../../api/uplaodimage.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Image:</label>
                            <input type="file" name="image" class="form-control" id="imageForm">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="sendImageMessage">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="imagePreview" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="imagePreviewLabel">Image Preview</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="image" src="./../../img/logo.png" alt="image">
                </div>
            </div>
        </div>
    </div>

    <script>
        const chatMessages = document.querySelector('.messages');
        const scrollDown = document.querySelector('.newMessage');
        const sendSimpleMessage = document.querySelector('#sendSimpleMessage');

        const messages = [];
        let lastUpdate = null;
        let loadPreviousMessages = false;

        // create function to display new message
        function showMessage(message, messageType, messageTime, messageUser, userThumbnail, image, atEnd) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message');
            messageDiv.classList.add(messageType);
            let html = `
                <div class="message_userName">
                    ${messageUser} ${messageTime}
                </div>`
            if (messageType == 'message_left') {
                html += `
                <div class="message_body">
                    <div class="message__thumbnail">
                        <img src="./../../img/${userThumbnail}" alt="user">
                    </div>
                    <div class="message__text">
                        ${image!=='' && image!==null ? `<img src="./../../img/${image}" alt="image" onClick="changeImage('./../../img/${image}')" data-bs-toggle="modal" data-bs-target="#imagePreview"></br>` : ''}
                        ${message}
                    </div>
                </div>`
            } else {
                html += `
                <div class="message_body">
                    <div class="message__text">
                        ${image!=='' && image!==null ? `<img src="./../../img/${image}" alt="image" onClick="changeImage('./../../img/${image}')" data-bs-toggle="modal" data-bs-target="#imagePreview"></br>` : ''}
                        ${message}
                    </div>
                    <div class="message__thumbnail">
                        <img src="./../../img/${userThumbnail}" alt="user">
                    </div>
                </div>`
            }
            messageDiv.innerHTML = html;

            if (atEnd) {
                chatMessages.appendChild(messageDiv);
            } else {
                chatMessages.insertBefore(messageDiv, chatMessages.firstChild);
            }
        }

        function tryToogleScrollDown() {
            if (chatMessages.offsetHeight + chatMessages.scrollTop >= chatMessages.scrollHeight - 20) {
                if (scrollDown.style.display != 'none') {
                    scrollDown.style.opacity = 0;
                    scrollDown.style.transition = 'opacity 0.5s ease-in-out';
                    setTimeout(() => {
                        scrollDown.style.display = 'none';
                    }, 500);
                }

            } else {
                if (scrollDown.style.display == 'none') {
                    scrollDown.style.display = 'block';
                    scrollDown.style.opacity = 1;
                }
            }
        }
        // show and hide scrool to down button
        chatMessages.addEventListener('scroll', () => {
            tryToogleScrollDown();
        });

        // load befoore messages
        function loadOldMessages() {
            if (loadPreviousMessages) {
                fetch('./../../api/messages.php?type=before&value=' + messages[0].id)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(mess => {
                            messages.unshift(mess);
                            showMessage(
                                mess.message, 
                                (mess.role == 1 ? 'message_right' : 'message_left'),
                                mess.sentDate.substr(11), mess.name, 
                                (mess.thumbnail != null ? mess.thumbnail : 'user.png'), 
                                mess.image, 
                                false
                            );
                        });
                        loadPreviousMessages = false;
                    });
            }
        }
        chatMessages.addEventListener('scroll', () => {
            if (chatMessages.scrollTop < 60) {
                if (!loadPreviousMessages) {
                    loadPreviousMessages = true;
                    loadOldMessages();
                }
            }
        });

        // scroll to down button after click
        scrollDown.addEventListener('click', () => {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });

        // send message
        sendSimpleMessage.addEventListener('click', () => {
            const message = document.querySelector('#newSimpleMessage');
            const messageValue = message.value;
            message.value = '';
            if (messageValue != '') {
                fetch(`./../../api/messages.php?type=add&message=${messageValue}&image=111.png`)
                    .then(() => getMessages())
                    .then(() => chatMessages.scrollTop = chatMessages.scrollHeight)

            }
        });

        // get messages from server
        async function getMessages() {
            await fetch(`./../../api/messages.php?type=${lastUpdate==null ? 'all' : 'since&value='+lastUpdate}`)
                .then(response => response.json())
                .then(json => {
                    const atStart = (messages.length == 0);
                    json = json.reverse();
                    json.forEach(mess => {
                        if (atStart) { messages.push(mess); } 
                        else { messages.unshift(mess); }
                        showMessage(
                            mess.message, 
                            (mess.role == 1 ? 'message_right' : 'message_left'),
                            mess.sentDate.substr(11), 
                            mess.name, 
                            (mess.thumbnail != null ? mess.thumbnail : 'user.png'), 
                            mess.image, 
                            true
                        );
                    });
                    return json;
                })
                .then((ss) => {
                    if (lastUpdate == null) { chatMessages.scrollTop = chatMessages.scrollHeight + 20; }
                    if (ss.length > 0) { lastUpdate = ss[ss.length - 1].sentDate;  }
                })
        }

        getMessages();
        resize();
        setInterval(() => { getMessages(); resize(); }, 1250);


        function resize() {
            document.querySelector(".messages").style.height = (window.innerHeight - 116 - 62-24) + 'px';
        }
        window.addEventListener('resize', resize);
    </script>
    <div class="text-center">
    </div>
    <script src="./../../js/bootstrap.min.js"></script>
</body>

</html>
