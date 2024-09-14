<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @include('welcomelayout.navbar_styleandhead')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #chat-container {
            width: 100%;
            max-width: 400px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        #chat-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

        #chat-messages {
            height: 350px;
            overflow-y: auto;
            padding: 20px;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 20px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .user-message {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
            margin-left: auto;
        }

        .bot-message {
            background-color: #f1f0f0;
            align-self: flex-start;
        }

        #input-container {
            display: flex;
            padding: 10px;
            background-color: #f9f9f9;
        }

        #user-input {
            flex-grow: 1;
            border: 1px solid #ddd;
            border-radius: 20px;
            padding: 10px;
            margin-right: 10px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('welcomelayout.navbar')
    <div id="chat-container">
        <div id="chat-header">Poser vos questions dans le sujet de RH</div>
        <div id="chat-messages"></div>
        <div id="input-container">
            <input type="text" id="user-input" placeholder="Tapez votre message...">
            <button onclick="sendMessage()">Envoyer</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            const userInput = document.getElementById('user-input');
            const message = userInput.value.trim();
            if (message === '') return;

            userInput.value = '';

            displayMessage(message, 'user-message');

            axios.post('/dialogflowchat', { message: message })
                .then(response => {
                    displayMessage(response.data.reply, 'bot-message');
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    displayMessage('Désolé, une erreur s\'est produite.', 'bot-message');
                });
        }

        function displayMessage(message, className) {
            const chatMessages = document.getElementById('chat-messages');
            const messageElement = document.createElement('div');
            messageElement.textContent = message;
            messageElement.className = `message ${className}`;
            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        document.getElementById('user-input').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>

</html>
