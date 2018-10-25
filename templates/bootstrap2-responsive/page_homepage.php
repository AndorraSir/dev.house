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

  </head>

  <body>
{template_header}

<?php _subtemplate('headers', _ch($subtemplate_header, 'map_and_search')); ?>
<a name="content" id="content"></a>
<div class="wrap-content homepage-content">
    <div class="container pt-5">
      <div class="row">
          <div class="col-12">
              <?php _widget('center_recentproperties');?>
          </div>
      </div>
    </div>
    <div class="container-fluid p-0">
        {has_settings_gps}
        <div id="contactMap">
        </div>
        {/has_settings_gps}
    </div>
</div>


<?php _subtemplate('footers', _ch($subtemplate_footer, 'standard')); ?>

<?php _widget('custom_javascript');?> 
    
  </body>
</html>