
@if($feed)

<div class="bd-example">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="bg-primary active" aria-current="true" aria-label="Slide 0"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="bg-primary" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="bg-primary" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="bg-primary" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="bg-primary" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" class="bg-primary" aria-label="Slide 5"></button>
            </div>
              @foreach($items as $item)
              @if($loop->first)
            <div class="carousel-item img-fluid active">
                <a href="{{ $item->get_permalink() }}">
                <img class="d-block w-100" src="{{ asset('images/btlogo.gif') }}">
              <div class="carousel-caption d-block">
                @if(strlen($item->get_title()) > 39 || strlen($item->get_description()) > 39)
                <h6 class="text-info"><b>{{ substr($item->get_title(),0,40) . '...' }}</b></h6>
                <h6 class="text-info">{{ substr($item->get_description(),0,40) . '...' }}</h6>
                @else
                <h6 class="text-info"><b>{{ $item->get_title() }}</b></h6>
                <h6 class="text-info">{{ $item->get_description() }}</h6>
                @endif
              </div>
            </a>
            </div>
            @else
                <div class="carousel-item">
                <a href="{{ $item->get_permalink() }}">
                <img class="d-block w-100" src="{{ asset('images/btlogo.gif') }}">
                <div class="carousel-caption d-block">
                  @if(strlen($item->get_title()) > 39 || strlen($item->get_description()) > 39)
                  <h6 class="text-info"><b>{{ substr($item->get_title(),0,40) . '...' }}</b></h6>
                  <h6 class="text-info">{{ substr($item->get_description(),0,40) . '...' }}</h6>
                  @else
                  <h6 class="text-info"><b>{{ $item->get_title() }}</b></h6>
                  <h6 class="text-info">{{ $item->get_description() }}</h6>
                  @endif              </div>
            </a>
            </div>
            @endif
            @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
        </div>
      </div>
    </div>
@else

<h6>No feeds available at this time.</h6>

@endif
