<!DOCTYPE html>
<html lang="{lang_code}">
  <head>
    <?php _widget('head');?>
    <script language="javascript">
    $(document).ready(function(){
        
        $("#search_showroom").keyup( function() {
            if($(this).val().length > 2 || $(this).val().length == 0)
            {
                $.post('<?php echo $ajax_showroom_load_url; ?>', {search: $('#search_showroom').val()}, function(data){
                    $('.property_content_position').html(data.print);
                    
                    reloadElements();
                }, "json");
            }
        });

    });    
    </script>
  </head>

  <body>
  
{template_header}

<?php _subtemplate('headers', _ch($subtemplate_header, 'empty')); ?>

<a name="content" id="content"></a>
<div class="wrap-content">
    <div class="container">
    
        <h2>{page_title}</h2>
        <div class="property_content">
        <?php _widget('center_defaultcontent');?>
        <?php _widget('center_imagegallery');?>
        
        {has_page_documents}
        <h2>{lang_Filerepository}</h2>
        <ul>
        {page_documents}
        <li>
            <a href="{url}">{filename}</a>
        </li>
        {/page_documents}
        </ul>
        {/has_page_documents}
        </div>
        <?php if(file_exists(APPPATH.'controllers/admin/showroom.php')):?>
        <!-- SHOWROOM -->
        <div id="showroom" class="news_content">
        <div class="row-fluid">
        <div class="span9">
        <div class="property_content_position">
        <div class="row-fluid"
        <ul class="thumbnails">
            <?php foreach($showroom_module_all as $key=>$row):?>
              <li class="span12 li-list">
                <div class="thumbnail span4">
                <?php if(isset($row->image_filename)):?>
                  <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="<?php echo base_url('files/thumbnail/'.$row->image_filename)?>" />
                <?php else:?>
                  <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="assets/img/no_image.jpg" />
                <?php endif;?>
                  <a href="<?php echo site_url('showroom/'.$row->id.'/'.$lang_code); ?>#content-position" class="over-image"> </a>
                </div>
                  <div class="caption span8">
                    <p class="bottom-border"><strong><?php echo $row->title.', '.date("Y-m-d", strtotime($row->date_publish)); ?></strong></p>
                    <p class="prop-description"><?php echo $row->description; ?></p>
                    <p>
                    <a class="btn btn-info" href="<?php echo site_url('showroom/'.$row->id.'/'.$lang_code); ?>#content-position">
                    {lang_Details}
                    </a>
                    </p>
                  </div>
              </li>
            <?php endforeach;?>
            </ul>
            <div class="pagination news">
            <?php echo $showroom_pagination; ?>
            </div>
        </div>
        </div>
        </div>
        <div class="col-3">
        
            <input type="text" placeholder="{lang_Search}" id="search_showroom" autocomplete="off"/>
        
            <ul class="nav nav-tabs nav-stacked">
            <?php foreach($categories_showroom as $id=>$category_name):?>
            <?php if($id != 0): ?>
                <li><a href="{page_current_url}?cat=<?php echo $id; ?>#showroom"><?php echo $category_name; ?></a></li>
            <?php endif;?>
            <?php endforeach;?>
            </ul>
        </div>
        </div>
        </div>
        <!-- /SHOWROOM -->
        <?php endif;?>
    </div>
</div>
    
<?php _subtemplate('footers', _ch($subtemplate_footer, 'standard')); ?>

<?php _widget('custom_javascript');?> 

  </body>
</html>