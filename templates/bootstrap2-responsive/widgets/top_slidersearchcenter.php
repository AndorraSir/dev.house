<div class="wrap-map" id="wrap-map-1">
    {template_searchcenter}

    <div id="myCarousel" class="carousel slide search-senter" data-ride="carousel">
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
                <?php if(config_item('property_slider_enabled')===TRUE&&!empty($item['property_details'])):?>
                    <div class="slider-info">
                        <div class='container'>
                             <span class="title c-white text-uppercase strong-700 hide"><?php _che($item['property_details']['title']);?></span>
                              <span class="title c-white text-uppercase"></span>
                             <span class="subtitle-sm"><?php _che($item['property_details']['option_chlimit_8']);?></span>
                         </div>
                    </div> 
                <?php elseif(!empty($item['title'])): ?>
                    <div class="slider-info">
                        <div class='container'>
                           <span class="title c-white text-uppercase strong-700 hide" style="display:none;"><?php _che($item['property_details']['title']);?></span>
                              <h1 class="title c-white text-uppercase">ENCUENTRA TU INMUEBLE CON HOUSE</h1>
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
    <!-- Carousel nav -->
    <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <i class="arrow-left" aria-hidden="true"></i>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-slide="next"><i class="arrow-right" aria-hidden="true"></i>
</a>
    </div>
    
</div>