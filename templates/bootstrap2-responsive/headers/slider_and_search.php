<div class="wrap-map" id="wrap-map-1">
    <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
    {slideshow_images}
    <li data-target="#myCarousel" data-slide-to="{num}" class="{first_active}"></li>
    {/slideshow_images}
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
        <?php foreach ($slideshow_images as $key => $item):?>
            <div class="item <?php _che($item['first_active']);?>">
            <div class="cont">
                <img alt="" src="<?php _che($item['url']);?>" />
                <?php if(config_item('property_slider_enabled')===TRUE&&!empty($item['property_details'])):?>
                    <div class="slider-info">
                        <div class='container'>
                             TEXTO 
                         </div>
                    </div> 
                <?php elseif(!empty($item['title'])): ?>
                    <div class="slider-info">
                        <div class='container'>
                           
                         </div>
                    </div>                     
                <?php endif; ?>
            </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>

{template_search-slideshow}