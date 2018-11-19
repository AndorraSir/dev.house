<!DOCTYPE html>
<html lang="{lang_code}">
  <head>
    <?php _widget('head');?>    
    <script>
        $(document).ready(function(){

        <?php if(config_db_item('map_version') =='open_street'):?>

        var contact_map;
        if($('#contactMap').length){
            contact_map = L.map('contactMap', {
                center: [{settings_gps}],
                zoom: 12,
                scrollWheelZoom: scrollWheelEnabled,
            });     
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(contact_map);
            var positron = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}{r}.png').addTo(contact_map);
            var property_marker = L.marker(
                [{settings_gps}],
                {icon: L.divIcon({
                        html: '<img src="assets/img/marker_blue.png">',
                        className: 'open_steet_map_marker',
                        iconSize: [19, 34],
                        popupAnchor: [-5, -45],
                        iconAnchor: [15, 45],
                    })
                }
            ).addTo(contact_map);
        
            property_marker.bindPopup("{settings_address},<br />{lang_GPS}: {settings_gps}");
        }

        <?php else:?>
        $("#contactMap").gmap3({
         map:{
            options:{
             center: [{settings_gps}],
             zoom: 12,
             scrollwheel: scrollWheelEnabled
            }
         },
         marker:{
            values:[
              {latLng:[{settings_gps}], options:{icon: "assets/img/marker_blue.png"}, data:"{settings_address},<br />{lang_GPS}: {settings_gps}"}
            ],
            
        options:{
          draggable: false
        },
        events:{
          mouseover: function(marker, event, context){
            var map = $(this).gmap3("get"),
              infowindow = $(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.open(map, marker);
              infowindow.setContent('<div style="width:400px;display:inline;">'+context.data+'</div>');
            } else {
              $(this).gmap3({
                infowindow:{
                  anchor:marker,
                  options:{disableAutoPan: mapDisableAutoPan, content: '<div style="width:400px;display:inline;">'+context.data+'</div>'}
                }
              });
            }
          },
          mouseout: function(){
            //var infowindow = $(this).gmap3({get:{name:"infowindow"}});
            //if (infowindow){
            //  infowindow.close();
            //}
          }
        }}});
        <?php endif;?>
    });
    
    </script>
  </head>

  <body>
  
{template_header}

<?php _subtemplate('headers', _ch($subtemplate_header, 'empty')); ?>

<a id="content"></a>
<div class="wrap-content pt-5">       
   
    <div class="container">
        <div class="row pb-5">
         <h1>{page_title}</h1>
        </div>
    </div>

    <div class="container">
        <div class="row pb-4">
            <div class="col-sm-6 pl-0">

                <h2 id="form">{lang_Contactform}</h2>
                <div id="contactForm"  class="contact-form">
                {has_settings_email}

                {validation_errors}
                {form_sent_message}
                <form method="post" action="{page_current_url}#form">
                    
                    <!-- The form name must be set so the tags identify it -->
                    <input type="hidden" name="form" value="contact" />

                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {form_error_firstname}">
                                    <div class="controls">
                                        <div class="input-prepend input-block-level">
                                            <span class="add-on"><i class="icon-user"></i></span>
                                            <input class="form-control input-block-level" id="firstname" name="firstname" type="text" placeholder="{lang_FirstLast}" value="{form_value_firstname}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {form_error_email}">
                                    <div class="controls">
                                        <div class="input-prepend input-block-level">
                                            <span class="add-on"><i class="icon-envelope"></i></span>
                                            <input class="form-control  input-block-level" id="email" name="email" type="text" placeholder="{lang_Email}" value="{form_value_email}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {form_error_phone}">
                                    <div class="controls">
                                        <div class="input-prepend input-block-level">
                                            <span class="add-on"><i class="icon-phone"></i></span>
                                            <input class="form-control input-block-level" id="phone" name="phone" type="text" placeholder="{lang_Phone}" value="{form_value_phone}" />
                                        </div>
                                    </div>
                                </div>
                                <?php if(config_item('captcha_disabled') === FALSE ): ?>
                                <div class="form-group"  style="display: none;">
                                    <?php echo $captcha['image']; ?>
                                    <input class="captcha" name="captcha" type="text" placeholder="{lang_Captcha}" value="" />
                                    <input class="hidden" name="captcha_hash" type="text" value="<?php echo $captcha_hash; ?>" />
                                </div>
                                <?php endif; ?>
                                
                                <?php if(config_item('recaptcha_site_key') !== FALSE): ?>
                                    <div class="form-group" >
                                        <label class="control-label captcha"></label>
                                        <div class="controls">
                                            <?php _recaptcha(true); ?>
                                       </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(config_db_item('terms_link') !== FALSE): ?>
                                    <button class="btn btn-info" type="submit" style="margin-top: 10px;">{lang_Send}</button>
                                <?php endif; ?>
                            </div>
                            <div class="span-mini"></div>
                            <div class="col-sm-6">
                                <div class="control-group {form_error_message}">
                                    <div class="controls">
                                        <textarea id="message" name="message" rows="4" class="form-control input-block-level" type="text" placeholder="{lang_Message}">{form_value_message}</textarea>
                                    </div>
                                </div>
                                                                
                                <?php if(config_db_item('terms_link') !== FALSE): ?>
                                <div class="control-group">
                                    <div class="controls text-right">
                                        <a target="_blank" href="<?php echo config_db_item('terms_link'); ?>"><?php echo lang_check('I accept the Terms and Conditions'); ?></a>
                                        <input type="checkbox" value="1" name="terms" required="required"  style="margin: 0;"> 
                                    </div>
                                </div>
                                <?php else: ?>
                                    <button class="btn btn-info pull-right" type="submit">{lang_Send}</button>
                                <?php endif; ?>
                            </div>
                            </div>
                </form>
                {/has_settings_email}
                </div>
            </div>
            <div class="col-sm-6 property_content pt-0">
            <h2>{lang_Contactdetails}</h2>
            {page_body}
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <h2>{lang_Locationonmap}</h2>
        </div>
    </div>
    <div class="container-fluid p-0">
        {has_settings_gps}
            <div class="container-fluid p-0">
                {has_settings_gps}
               <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=Av.%20de%20Joan%20Mart%C3%AD%2C%20102%2C%20AD200%20Encamp%2C%20Andorra&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">pureblack.de</a></div><style>.mapouter{text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>
                {/has_settings_gps}
            </div>
        {/has_settings_gps}
    </div>
    <div class="container pt-4 hide">

        <h2 id="form">{lang_Contactform}</h2>
     
        
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
</div>
    
<?php _subtemplate('footers', _ch($subtemplate_footer, 'standard')); ?>

<?php _widget('custom_javascript');?> 

  </body>
</html>