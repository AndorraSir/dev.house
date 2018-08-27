<!DOCTYPE html>
<html lang="{lang_code}">
  <head>
    <?php _widget('head');?>
    <script language="javascript">
    $(document).ready(function(){


    });
    </script>
  </head>

  <body>
  
{template_header}
<?php _subtemplate('headers', _ch($subtemplate_header, 'slider_and_compact')); ?>
<a name="content" id="content"></a>
<div class="wrap-content">
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php _widget('center_recentproperties');?>
        </div>
    </div>
</div>
</div>
    
<?php _subtemplate('footers', _ch($subtemplate_footer, 'standard')); ?>
<?php _widget('custom_javascript');?> 
  </body>
</html>