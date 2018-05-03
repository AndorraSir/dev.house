<?php
/* [START] Search background settings */
$this->data['search_background'] = 'assets/img/texture22.jpg';
if(isset($this->data['settings']['search_background']))
{
    if(is_numeric($this->data['settings']['search_background']))
    {
        $files_search_background = $this->file_m->get_by(array('repository_id' => $this->data['settings']['search_background']), TRUE);
        if( is_object($files_search_background) && file_exists(FCPATH.'files/thumbnail/'.$files_search_background->filename))
        {
            $this->data['search_background'] = base_url('files/'.$files_search_background->filename);
        }
    }
}
?>
<style>
.wrap-search {
    background-image: url('<?php echo $this->data['search_background']; ?>');   
}
</style>
<?php
/* [END] Search background settings */
?>