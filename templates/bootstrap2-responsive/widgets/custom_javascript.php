
<?php if(config_item('enable_search_details_on_top') == TRUE): ?>

<script>
$(document).ready(function(){
	if($('.top_content').length == 0 && $(window).width() > 767)
    {
    	var content = $('.wrap-search');
    	var pos = content.offset();
    	
    	$(window).scroll(function(){
    		if($(this).scrollTop() > pos.top && $(window).width() > 767){
              content.addClass('search_on_top');
    		} else if($(this).scrollTop() <= pos.top){
              content.removeClass('search_on_top');
    		}
    	});
    }
});
</script>
<?php endif; ?>


<script>

$(document).ready(function(){
    // add calendar for all inputs with class .field_datepicker (required unique id)
    $('.field_datepicker').each(function(){
        $(this).datepicker({
            pickTime: false
        });
    })
    $('.to-top').on('click', function(e){
        e.preventDefault();
         $('html,body').animate({scrollTop:0}, 1500,'swing');
    })
    
    $('.field_datepicker_time').each(function(){
    $(this).datepicker({
        pickTime: true
    });
    });
})


</script>

<?php
    $output ='';
    $CI =& get_instance();
    //Get template settings
    $template_name = $CI->data['settings']['template'];
    $cache_time_sec = 604800; /* one week */
    $cache_file_name = FCPATH.'templates/'.$template_name.'/assets/cache/_generate_dependentfields.js';
    //Load view
    if(file_exists(FCPATH.'templates/'.$template_name.'/widgets/_generate_dependentfields_js.php'))
        if(file_exists($cache_file_name) /*&& filemtime($cache_file_name) > time()-$cache_time_sec*/)
        {
            $output = $CI->load->view($template_name.'/widgets/_generate_dependentfields_js.php', false, true);
            require_once APPPATH."helpers/min-js.php";
            $jSqueeze = new JSqueeze();
            $output = $jSqueeze->squeeze($output, true, false);
            file_put_contents(FCPATH.'templates/'.$template_name.'/assets/cache/_generate_dependentfields.js', $output);
        } else {
            $output = $CI->load->view($template_name.'/widgets/_generate_dependentfields_js.php', false, true);
            require_once APPPATH."helpers/min-js.php";
            $jSqueeze = new JSqueeze();
            $output = $jSqueeze->squeeze($output, true, false);
            file_put_contents(FCPATH.'templates/'.$template_name.'/assets/cache/_generate_dependentfields.js', $output);
        }

    echo '<script src="assets/cache/_generate_dependentfields.js?v='.rand(000,999).'"></script>';
?>

<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"> </h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>


