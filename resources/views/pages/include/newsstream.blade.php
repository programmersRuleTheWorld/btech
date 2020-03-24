
@if($feed)

<div class="bd-example">
        <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions1" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions1" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions1" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions1" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions1" data-slide-to="4"></li>
            <li data-target="#carouselExampleCaptions1" data-slide-to="5"></li>
          </ol>
          <div class="carousel-inner">
              @foreach($items as $item)
              @if($loop->first)
            <div class="carousel-item img-fluid active">
              <a href={{ $permalink }}>
                <img src={{ asset("images/btlogogrey_bd.png") }} class="d-block w-100" alt="...">
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
                <a href={{ $permalink }}>
                <img src={{ asset("images/btlogogrey_bd.png") }} class="d-block w-100" alt="...">
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
          <a class="carousel-control-prev" href="#carouselExampleCaptions1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
@else

<h6>No feeds available at this time.</h6>

@endif