<!DOCTYPE html>
<html lang="{lang_code}">
  <head>
    <?php _widget('head');?>
  </head>

  <body>
{template_header}

<?php if(config_item('map_on_agent_profile_enabled') === TRUE): ?>
   <?php _widget('top_mapsearch');?>
<?php endif;?>

<?php _widget('top_ads');?>
<a name="content" id="content"></a>
<div class="wrap-content">
    <div class="container container-property">
        <div class="row-fluid">
            <div class="span9">
            <h2 id="content">{page_title}</h2>
              <div class="property_content">
                <p><?php echo $agent_profile['description']; ?></p>
                
                <?php
                if(!empty($agent_profile['embed_video_code']))
                {
                    echo $agent_profile['embed_video_code'];
                    echo '<br /><br />';
                }
                ?>
                
<?php if(count($page_documents) > 0): ?> 
<ul>
{page_documents}
<li>
<a href="{url}">{filename}</a>
</li>
{/page_documents}
</ul>
<?php endif; ?>  
                
                <div id="ajax_results">
                <?php foreach($agent_estates as $key=>$item): ?>
                <?php
                   if($key==0)echo '<ul class="thumbnails agent-property">';
                ?>
                    <?php _generate_results_item(array('key'=>$key, 'item'=>$item, 'columns'=>3, 'icons'=>false, 'view_counter'=>false)); ?>
                <?php
                   if( ($key+1)%3==0 )
                    {
                        echo '</ul><ul class="thumbnails agent-property">';
                    }
                    if( ($key+1)==count($agent_estates) ) echo '</ul>';
                    endforeach;
                ?>
                
                
                <div class="pagination-ajax-results pagination" rel="ajax_results">
                {pagination_links_agent}
                </div>
                </div>
                
                <br style="clear:both;" />
                
              </div>
            </div>
            <div class="span3">
                  {has_agent}
                  <h2>{lang_Agent}</h2>
                  <div class="agent">
                    <div class="image"><img src="{agent_image_url}" alt="{agent_name_surname}" /></div>
                    <div class="name"><a href="{agent_url}#content">{agent_name_surname}</a></div>
                    <div class="phone">{agent_phone}</div>
                    
                    <div class="mail"><a href="mailto:{agent_mail}?subject={lang_Estateinqueryfor}: {estate_data_id}, {page_title}">{agent_mail}</a></div>
                        <ul class="social social-boxed">
                            <?php if(!empty($agent_profile['facebook_link'])): ?>
                                <li><a href="<?php echo $agent_profile['facebook_link']; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['youtube_link'])): ?>
                                <li><a href="<?php echo $agent_profile['youtube_link']; ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['gplus_link'])): ?>
                                <li><a href="<?php echo $agent_profile['gplus_link']; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['twitter_link'])): ?>
                                <li><a href="<?php echo $agent_profile['twitter_link']; ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if(!empty($agent_profile['linkedin_link'])): ?>
                                <li><a href="<?php echo $agent_profile['linkedin_link']; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                        </ul><!-- /.social-->
                  </div>
                  
                  {/has_agent}
                  
        <?php if(!empty($agency_image_url)): ?>
        <h2><?php echo lang_check('Company details'); ?></h2>
          <div class="">
            <?php
            if(!empty($agency_image_url))
            {
            echo '<div class="image-company"><img src="'.$agency_image_url.'" alt="" /></div>';
            }
            ?>
          </div>
        <?php endif ?>

                  <?php _widget('right_ads'); ?>   

                  <h2>{lang_Enquireform}</h2>
                  <div id="form" class="property-form">
                    {validation_errors}
                    {form_sent_message}
                    <form method="post" action="{page_current_url}#form">
                        <label>{lang_FirstLast}</label>
                        <input class="{form_error_firstname}" name="firstname" type="text" placeholder="{lang_FirstLast}" value="{form_value_firstname}" />
                        <label>{lang_Phone}</label>
                        <input class="{form_error_phone}" name="phone" type="text" placeholder="{lang_Phone}" value="{form_value_phone}" />
                        <label>{lang_Email}</label>
                        <input class="{form_error_email}" name="email" type="text" placeholder="{lang_Email}" value="{form_value_email}" />
                        <label>{lang_Address}</label>
                        <input class="{form_error_address}" name="address" type="text" placeholder="{lang_Address}" value="{form_value_address}" />
                        <label>{lang_Message}</label>
                        <textarea class="{form_error_message}" name="message" rows="3" placeholder="{lang_Message}">{form_value_message}</textarea>
                        
                        <?php if(config_item('captcha_disabled') === FALSE): ?>
                        <label class="captcha"><?php echo $captcha['image']; ?></label>
                        <input class="captcha {form_error_captcha}" name="captcha" type="text" placeholder="{lang_Captcha}" value="" />
                        <br style="clear: both;" />
                        <input class="hidden" name="captcha_hash" type="text" value="<?php echo $captcha_hash; ?>" />
                        <?php endif; ?>
                        
                        <?php if(config_item('recaptcha_site_key') !== FALSE): ?>
                        <div class="control-group" >
                            <label class="control-label captcha"></label>
                            <div class="controls">
                                <?php _recaptcha(true); ?>
                           </div>
                        </div>
                       <?php endif; ?>
                        
                        <br style="clear: both;" />
                        <p style="text-align:right;">
                        <button type="submit" class="btn btn-info">{lang_Send}</button>
                        </p>
                    </form>
                  </div>
                  <?php _widget('right_adssmall'); ?> 
            </div>
        </div>
    </div>
</div>
    

<?php _subtemplate('footers', _ch($subtemplate_footer, 'standard')); ?>

<?php _widget('custom_javascript');?> 

  </body>
</html>