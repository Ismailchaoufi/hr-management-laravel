<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('welcomelayout.navbar_styleandhead')

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
            gap: 20px 40px; /* Space between items */
        }
        .card {
            flex: 1 1 calc(50% - 20px); /* Two items per row with gap adjustment */
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
    </style>
</head>
<body>
    @include('welcomelayout.navbar')

    <div class="container">
        @foreach($items as $item)
        <a href="{{ $item->get_permalink() }}" class="card mt-5" target="_blank">
            @if($item->get_enclosure() && $item->get_enclosure()->get_link())
                <img src="{{ $item->get_enclosure()->get_link() }}" class="card-img-top" alt="News Image">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->get_title() }}</h5>
                <p class="card-text">{{ Str::limit(strip_tags($item->get_description()), 200) }}</p>
                <p class="card-text">
                    <small class="text-muted">Published: {{ $item->get_date('d-m-Y | g:i a') }}</small>
                </p>
            </div>
        </a>
        @endforeach
    </div>

</body>
</html>
