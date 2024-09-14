<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page d'Accueil</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.default.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/auth/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/auth/img/logo1.png')}}">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding-top: 60px; /* Adjust based on your navbar's height */
        background-color: #f8f9fa;
        color: #d62662;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #a32f65 !important;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.3s ease;
    }

    .navbar a {
        padding: 10px 15px;
        color: #fff;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .navbar a:hover {
        color: #a32f65;
        background-color: #fff;
        border-radius: 5px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background: #fff;
        border: 1px solid #000;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        top: 100%;
        left: 0;
        z-index: 1000;
        min-width: 160px;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px;
        color: #000;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    .carousel-container {
        width: 100%;
        max-width: 1200px;
        margin: auto;
        padding: 40px 0;
        position: relative;
        overflow: hidden;
    }

    .owl-carousel .item {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
        text-align: center;
    }
    .owl-carousel img {
        width: 100%;
        height: auto;
        display: block;
        transition: opacity 0.5s ease-in-out;
    }
    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align: center;
        background: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    .overlay.show {
        opacity: 1;
    }



    .overlay h2 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .overlay p {
        font-size: 1.2rem;
    }

    .text-container {
        position: relative;
        color: #fff;
        background-color: #a32f65;
        padding: 20px;
        border-radius: 10px;
        font-size: 24px;
        font-weight: 700;
        z-index: 10;
        width: 100%;
        max-width: 500px;
        text-align: center;
        margin-top: 20px;
    }

    .image-container {
        width: 50%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.4);
        margin: 0 auto;
        border: 5px solid rgba(255, 255, 255, 0.8);
        position: relative;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .image-container::before,
    .image-container::after {
        content: '✨';
        font-size: 30px;
        position: absolute;
        animation: floatEmoji 3s infinite ease-in-out;
    }

    .image-container::before {
        top: -20px;
        left: -20px;
    }

    .image-container::after {
        bottom: -20px;
        right: -20px;
    }

    .image-container:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.5);
        border: 5px solid rgba(255, 255, 255, 1);
    }

    .ai-helper-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    #ai-helper {
        background-color: #a32f65;
        color: #000;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    #ai-helper:hover {
        background-color: #8c1d4e;
    }

    #chatbox {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        max-height: 400px;
        background: #fff;
        border: 1px solid #a32f65;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        z-index: 1000;
    }

    #chatbox-body {
        height: calc(100% - 40px);
        overflow-y: auto;
        padding: 10px;
    }

    .user-message, .ai-message {
        margin: 5px 0;
    }

    .user-message {
        text-align: right;
    }

    .ai-message {
        text-align: left;
    }

    #close-chatbox {
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        color: #a32f65;
    }

    #send-btn {
        cursor: pointer;
        background-color: #a32f65;
        color: #fff;
        border: none;
    }

    main {
        padding: 20px; /* Optional: Add space around the main content */
    }
    
</style>
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.6;
        margin: 0;
        padding-top: 60px;
        background: #f5f5f5;
        color: #333;
    }
    header {
        background: linear-gradient(135deg, #c2185b, #d32f2f);
        color: #fff;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        border-bottom: 6px solid #fff;
        border-radius: 0 0 20px 20px;
    }
    header h1 {
        margin: 0;
        font-size: 3em;
        color: #fff;
    }
    .container {
        width: 90%;
        max-width: 1200px; /* Increased max-width for larger cards */
        margin: 40px auto;
        padding: 40px;
        border-radius: 15px;
        line-height: 1.8;
        display: flex;
        flex-wrap: wrap; /* Allow wrapping of items */
        gap: 20px; /* Space between items */
    }
    .card {
        flex: 1 1 calc(33.333% - 20px); 
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        border-radius: 15px;
        overflow: hidden;
    }
    .card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .card-img-top {
        border-radius: 15px 15px 0 0;
        object-fit: cover;
        width: 100%;
        height: 300px; /* Increased height for better image display */
    }
    .card-body {
        padding: 20px;
    }
    .card-title {
        font-weight: bold;
        margin-bottom: 15px;
    }
    .card-text {
        color: #666;
    }
    @media (max-width: 768px) {
        header {
            padding: 20px 15px;
        }
        header h1 {
            font-size: 2em;
        }
        .container {
            width: 95%;
        }
        .card {
            flex: 1 1 100%; /* Single item per row on small screens */
        }
    }
    .ai-helper-container {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    #ai-helper-redirect {
        background-color: #4CAF50; /* Couleur de fond verte */
        color: white; /* Texte blanc */
        border: none;
        border-radius: 25px; /* Bouton arrondi */
        padding: 15px 10px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #ai-helper-redirect:hover {
        background-color: #45a049; /* Couleur légèrement plus foncée au survol */
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }

    #ai-helper-redirect:active {
        transform: translateY(1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>
