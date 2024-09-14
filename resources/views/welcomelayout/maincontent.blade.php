<div class="carousel-container">
    <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="overlay">
                <h2>Bienvenue sur notre système de gestion des RH</h2>
                <p>Votre solution tout-en-un pour la gestion des ressources humaines.</p>
            </div>
            <img src="{{asset('images/img1.jpg')}}" alt="Slide 1">
        </div>
        <div class="item">
            <div class="overlay">
                <h2>Gestion des Employés</h2>
                <p>Gérez et suivez efficacement les informations des employés.</p>
            </div>
            <img src="{{asset('images/img2.jpg')}}" alt="Slide 2">
        </div>
        <div class="item">
            <div class="overlay">
                <h2>Demandes de Congés</h2>
                <p>Rationalisez les demandes et les approbations de congés.</p>
            </div>
            <img src="{{asset('images/img3.jpg')}}" alt="Slide 3">
        </div>
    </div>

</div>
<!--for display news-->
<h2 class="text-center my-4">Actualités</h2>
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



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <cs-article-card-24></cs-article-card-24>
        </div>
        <div class="col-md-6">
            <cs-infopane-card></cs-infopane-card>
        </div>
    </div>
</div>

