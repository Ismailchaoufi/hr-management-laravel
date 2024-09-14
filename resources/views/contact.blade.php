<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('welcomelayout.navbar_styleandhead')

        <!-- Add your contact form or contact information here -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding-top: 60px;
            }
            .container {
                max-width: 900px;
                margin: auto;
                padding: 20px;
                margin-top: 40px;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .language-selector {
                display: flex;
                justify-content: flex-end;
                align-items: center;
                margin-bottom: 20px;
            }
            .language-selector select {
                border: none;
                border-radius: 5px;
                padding: 10px;
                font-size: 16px;
                background-color: #d63384; /* Dark pink color */
                color: white;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .language-selector select:hover {
                background-color: #b30d70; /* Darker pink on hover */
            }
            .section {
                margin-bottom: 20px;
                padding: 20px;
                background: #f9f9f9;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                display: flex;
                align-items: center;
            }
            .section i {
                font-size: 1.5em;
                color: #d63384;
                margin-right: 15px;
            }
            .section h3 {
                margin-top: 0;
                font-size: 1.2em; /* Reduced size */
                color: #333;
            }
            .section p {
                margin: 0;
                font-size: 1em;
                color: #555;
            }
            .section a {
                color: #d63384;
                text-decoration: none;
                font-weight: bold;
            }
            .section a:hover {
                text-decoration: underline;
            }
            .map-container {
                position: relative;
                width: 250%;
                height: 450px;
                margin: 20px 0;
                overflow: hidden;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            .map-container iframe {
                width: 100%;
                height: 100%;
                border: 0;
            }
        </style>
    </head>
    <body>
        @include('welcomelayout.navbar')
        <div class="container">
            <h2 style="font-size: 2em; color: #333; text-align: center;">Contactez _ Nous</h2>
            <!-- Google Translate Widget -->
            <div id="google_translate_element" style="margin-bottom: 20px;"></div>
            <div class="section">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h3>Carte</h3>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d970.3130962816946!2d-7.959734203262822!3d32.22931118482611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdaf7b6b270c2bef%3A0x1e79dbd038998cb9!2z2LnZhdin2YTYqSDYqNmG2YPYsdmK2LEg2KfZhNmD2KrYp9io2Kkg2KfZhNi52KfZhdip!5e1!3m2!1sen!2sma!4v1724520474967!5m2!1sen!2sma" width="600" height="450" style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <div class="section">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h3>Adresse</h3>
                    <p>Avenue Mohammed V, Benguérir, Maroc.</p>
                </div>
            </div>

            <div class="section">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h3>Téléphone</h3>
                    <p>+212 5 24 00 00 00</p>
                </div>
            </div>

            <div class="section">
                <i class="fas fa-fax"></i>
                <div>
                    <h3>Fax</h3>
                    <p>+212 5 24 00 00 01</p>
                </div>
            </div>

            <div class="section">
                <i class="fas fa-envelope"></i>
                <div>
                    <h3>E-mail</h3>
                    <p><a href="mailto:contact@gouv-rhamna.ma">contact@gouv-rhamna.ma</a></p>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script src="{{ asset('js/app.js') }}"></script>
    </div>

