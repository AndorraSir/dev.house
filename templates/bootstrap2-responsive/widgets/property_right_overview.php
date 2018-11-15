<h4>{lang_Overview}</h4>
<div class="property_options">
  {category_options_1}
  {is_text}
  <span><strong>{option_name}:</strong> <span>{option_prefix} {option_value} {option_suffix}</span><br style="clear: both;" /></span>
  {/is_text}
  {is_checkbox}
  <img src="assets/img/checkbox_{option_value}.png" alt="{option_value}" />&nbsp;&nbsp;{option_name}
  {/is_checkbox}
  {/category_options_1}
  <?php if(!empty($estate_data_option_64) && isset($this->treefield_m)): ?>
  <div class="bottom-border wtf">
      <strong><?php echo $options_name_64; ?>:</strong>
      <span>
      <?php
          $nice_path = $estate_data_option_64;
          $link_defined = false;
          // Get treefield with language data
          $treefield_id = $this->treefield_m->id_by_path(64, $lang_id, $nice_path);
          if(is_numeric($treefield_id))
          {
              $treefield_data = $this->treefield_m->get_lang($treefield_id, TRUE, $lang_id);

              // If no content defined then no link, just span
              if(!empty($treefield_data->{"body_$lang_id"}))
              {
                  // If slug then define slug link
                  $href = slug_url('treefield/'.$lang_code.'/'.$treefield_id.'/'.url_title_cro($treefield_data->{"value_$lang_id"}), 'treefield_m');
                  echo '<a href="'.$href.'">'.$nice_path.'</a>';
                  $link_defined=true;
              }
          }
          if(!$link_defined) echo $nice_path;
      ?>
      </span>
      <br style="clear: both;" />
  </div>
  <?php endif;?>
  <?php
      foreach($category_options_1 as $key=>$row)
      {
          if($row['option_type'] == 'UPLOAD')
          {
              if(!empty($row['option_value']) && is_numeric($row['option_value']))
              {
                  //Fetch repository
                  $rep_id = $row['option_value'];
                  $file_rep = $this->file_m->get_by(array('repository_id'=>$rep_id));
                  $rep_value = '';
                  if(count($file_rep))
                  {
                      $rep_value.= '<ul>';
                      foreach($file_rep as $file_r)
                      {
                          $rep_value.= "<li><a target=\"_blank\" href=\"".base_url('files/'.$file_r->filename)."\">$file_r->filename</a></li>";
                      }
                      $rep_value.= '</ul>';

                      echo '<p class="bottom-border"><strong>'.$row['option_name'].':</strong></p>';
                      echo $rep_value;
                  }
              }
          }

      }
  ?>

  

  <p style="text-align:right;" style="display:none">
      <a target="_blank" class="btn hide" href="{estate_data_printurl}"><i class="icon-print"></i>&nbsp;{lang_PrintVersion}</a>
  </p>
</div>