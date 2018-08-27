<div class="wrap-map" id="wrap-map-1">
    <div id="myCarousel" class="carousel slide">
    <?php if(false): ?>
    <ol class="carousel-indicators">
    {slideshow_images}
    <li data-target="#myCarousel" data-slide-to="{num}" class="{first_active}"></li>
    {/slideshow_images}
    </ol>
    <?php endif; ?>
    
    
    <!-- Carousel items -->
    <div class="carousel-inner">
    <?php foreach ($slideshow_images as $key => $item):?>
        <div class="item <?php _che($item['first_active']);?>">
        <div class="cont">
            <img alt="" src="<?php _che($item['url']);?>" />
            <?php if(config_item('property_slider_enabled')===TRUE&&!empty($item['property_details'])):?>
                <div class="slider-info">
                    <div class='container'>
                         <span class="title c-white text-uppercase strong-700"><?php _che($item['property_details']['title']);?>Encuentra tu inmueble con House</span>
                         <span class="subtitle-sm"><?php _che($item['property_details']['option_chlimit_8']);?></span>
                     </div>
                </div> 
            <?php elseif(!empty($item['title'])): ?>whatsup
                <div class="slider-info">
                    <div class='container'>
                        <span class="title c-white text-uppercase strong-700">Encuentra tu inmueble con House</span>
                        <span class="subtitle-sm"><?php _che($item['description']);?></span>
                         <?php if(!empty($item['link'])):?>
                        <?php endif; ?>
                     </div>
                </div>                     
            <?php endif; ?>
        </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="container">
    <ol class="carousel-thumbs carousel-indicators">
    {slideshow_images}
        <li data-target="#myCarousel" data-slide-to="{num}" class="{first_active}"><a href="#"><img src="{url}" /></a></li>
    {/slideshow_images}
    </ol>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>
