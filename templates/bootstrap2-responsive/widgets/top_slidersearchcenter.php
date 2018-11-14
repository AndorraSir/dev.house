<div class="wrap-map" id="wrap-map-1">
    {template_searchcenter}

    <div id="myCarousel" class="carousel slide search-senter d-none d-sm-block" data-ride="carousel">
    <ol class="carousel-indicators">
    {slideshow_images}
    <li data-target="#myCarousel" data-slide-to="{num}" class="{first_active}"></li>
    {/slideshow_images}
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php foreach ($slideshow_images as $key => $item):?>
            <div class="carousel-item <?php _che($item['first_active']);?>">
            <div class="cont">
                <img alt="" src="<?php _che($item['url']);?>" />
                
            </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <i class="arrow-left" aria-hidden="true"></i>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next"><i class="arrow-right" aria-hidden="true"></i>
</a>
    </div>
    
</div>