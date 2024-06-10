<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            width: 80%;
        }

        .cards {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            width: 60%;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            flex: 1;
            transition: background-color 0.3s;
        }

        .card:hover {
            background-color: #f0f0f0;
        }

        .details {
            display: none;
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .active {
            display: flex;
            flex-direction: row;
        }

        .details.active {
            display: block;
            width: 40%;
        }

        .alert {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .alert button {
            margin-top: 10px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cards">
            <div class="card" data-details="Details for Card 1">
                <h3>Card 1</h3>
            </div>
            <div class="card" data-details="Details for Card 2">
                <h3>Card 2</h3>
            </div>
            <div class="card" data-details="Details for Card 3">
                <h3>Card 3</h3>
            </div>
        </div>
        <div class="details">
            <p>Select a card to see details here.</p>
        </div>
    </div>

    <div class="alert" id="alert-box">
        <p id="alert-message"></p>
        <button onclick="closeAlert()">OK</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            const detailsContainer = document.querySelector('.details');
            const container = document.querySelector('.container');
            const alertBox = document.getElementById('alert-box');
            const alertMessage = document.getElementById('alert-message');

            cards.forEach(card => {
                card.addEventListener('click', function () {
                    const details = this.getAttribute('data-details');
                    detailsContainer.innerHTML = `<p>${details}</p>`;
                    container.classList.add('active');
                });
            });
        });

        function showAlert(message) {
            const alertBox = document.getElementById('alert-box');
            const alertMessage = document.getElementById('alert-message');
            alertMessage.textContent = message;
            alertBox.style.display = 'block';
        }

        function closeAlert() {
            const alertBox = document.getElementById('alert-box');
            alertBox.style.display = 'none';
        }
    </script>
</body>
</html>
