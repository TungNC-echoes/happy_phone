<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ $first_slide->url }}" alt="{{ $first_slide->alt }}" style="width:100%;">
        </div>
        @foreach ($slides as $slide)
            <div class="item">
                <img src="{{ $slide->url }}" alt="{{ $slide->alt }}" style="width:100%;">
            </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="fa fa-chevron-circle-left fa-3x"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="fa fa-chevron-circle-right fa-3x"></span>
        <span class="sr-only">Next</span>
    </a>
</div>