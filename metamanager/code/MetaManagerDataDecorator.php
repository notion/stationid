<?php
/**
* Adds autoupdate of the metadatafields on pagesave.
* A checkbox is added to the Main Content tab to select wether to update the MetaDescription and MetaKeyword fields on save.
* Default is set to yes
*
* You can adjust the amount of keywords, minimal word character and wich words to exclude in _config.php
* 
* @Author Martijn van Nieuwenhoven
* @Alias Marvanni
* @Email marvanni@hotmail.com
*
* @Silverstripe version 2.3.2
* @package AutoMetaDataUpdater
*/ 

class MetaManagerDataDecorator extends SiteTreeDecorator { 
	
	/**
	 * @var int 
	 */
	protected static $keyword_amount = 15;
	
	/**
	 * @var int
	 */
	protected static $min_word_char = 3;

	/**
	 * @var string
	 */
	protected static $exclude_words = '';
	
	/**
	 * @var bool
	 */
	protected static $checkbox_state = 0;
	
	/**
	 * @var string
	 */
	protected static $checkbox_tab = '';
	
	/**
	 * @var string
	 */
	protected static $checkbox_pos = '';
	
	/**
	 * @var bool
	 */
	protected static $show_checkbox = 0;
	
	/**
	 * @var bool
	 */
	protected static $show_meta_messages = 0;
	
	/** 
	 * @var bool
	 */
	protected static $update_meta_title = 0;
	
	/** 
	 * @var bool
	 */
	protected static $update_meta_desc = 0;
	
	/** 
	 * @var int
	 */
	protected static $meta_desc_length = 0;
	
	/** 
	 * @var bool
	 */
	protected static $update_meta_keys = 0;
	
	/**
	 * @var bool
	 */
	protected static $hide_extra_meta = 0;
	
	/**
	 * @var bool
	 */
	protected static $disable_update_popup = 0;
	
	/**
	 * @var bool
	 */
	protected static $update_url = 0;
	

	/**
	 * Set the default state of checkbox in content tab
	 * @param int $checkbox_state 
	 */
	public function set_checkbox_state($var) {
		if ($var) self::$checkbox_state = $var;
	}
	
	/**
	 * Show the update checkbox
	 * @param bool $show_checkbox
	 */
	public function set_show_checkbox($var) {
		if ($var) self::$show_checkbox = $var;
	}
	
	/**
	 * Position checkbox at tab e.g. : "Root.Content.Main" or "Root.Content.MetaData" (default)
	 * @param string $checkbox_tab
	 */
	public function set_checkbox_tab($var) {
		if ($var) self::$checkbox_tab = $var;
	}
	/**
	 * Position checkbox above e.g. : "Content", "Title" or "MenuTitle"
	 * Leave empty to show the checkbox below the Contentfield
	 * @param string $checkbox_pos
	 */
	public function set_checkbox_pos($var) {
		if ($var) self::$checkbox_pos = $var;
	}
	
	/**
	 * Set the amount of keywords to insert in the MetaKeywords field
	 * @param int $keyword_amount 
	 */
	public function set_keyword_amount($var) {
		if ($var) self::$keyword_amount = $var;
	}
	
	/**
	 * Set the minimum wordlength for MetaKeywords
	 * @param int $min_word_char 
	 */
	public function set_min_word_char($var) {
		if ($var) self::$min_word_char = $var;
	}
	
	/**
	 * Set the words to exlude seperate with comma
	 * @param string $exclude_words 
	 */
	public function set_exclude_words($var) {
		if ($var) self::$exclude_words = $var;
	}
	
	/**
	 * Set wether to update the MetaTitle with Pagetitle
	 * @param int $update_meta_title 
	 */
	public function set_update_meta_title($var) {
		if ($var) self::$update_meta_title = $var;
	}
	
	/**
	 * Set wether to hide the ExtraMeta field
	 * @param int $hide_extra_meta 
	 */
	public function set_hide_extra_meta($var) {
		if ($var) self::$hide_extra_meta = $var;
	}
	
	/**
	 * Set wether to disable the annoying update url popup
	 * @param int $disable_update_popup  
	 */
	public function set_disable_update_popup($var) {
		if ($var) self::$disable_update_popup = $var;
	}
	
	/**
	 * Set wether to update the urlsegment
	 * @param int $update_url  
	 */
	public function set_update_url($var) {
		if ($var) self::$update_url = $var;
	}
	
	/**
	 * Set wether to update the metadesc
	 * @param int $update_meta_desc  
	 */
	public function set_update_meta_desc($var) {
		if ($var) self::$update_meta_desc = $var;
	}
	
	/**
	 * Set MetaDescription length
	 * @param int $meta_desc_length (max 255 by SS default) 
	 */
	public function set_meta_desc_length($var) {
		if ($var) self::$meta_desc_length = $var;
	}
	
	/**
	 * Set wether to update the metakeywords
	 * @param int $update_meta_keys  
	 */
	public function set_update_meta_keys($var) {
		if ($var) self::$update_meta_keys = $var;
	}
	
	/**
	 * Show wich Meta fields wil be updated
	 * @param bool $show_meta_messages 
	 */
	 public function set_show_meta_messages($var) {
		if ($var) self::$show_meta_messages = $var;
	}

    function extraStatics() {
		return array(
			'db' => array(
				'GenerateMetaData' => 'Int',
			),
            'defaults' => array(
				'GenerateMetaData' => -1,
			),
		);
	}
	/**
	 * Compose string to show wich fields are set to auto update
	 * @param string $updated_field_string  
	 */
	 
	protected function updatedFields(){
		
		$updated_field_string = '';
		
		if(self::$show_meta_messages == 1){
			$updatedfields = array();
			
			if(self::$update_url == 1) 			$updatedfields[] = _t('SiteTree.URLSegment','URL Segment ');
			if(self::$update_meta_title == 1) 	$updatedfields[] = _t('SiteTree.METATITLE','Title ');
			if(self::$update_meta_desc == 1) 	$updatedfields[] = _t('SiteTree.METADESC','Description ');
			if(self::$update_meta_keys == 1) 	$updatedfields[] = _t('SiteTree.METAKEYWORDS','Keywords ');
		 
			$updated_field_string = "(".implode(", ", $updatedfields).")";
	 	}
		return $updated_field_string;
	}
	 
	 
	/**
	 * add a checkbox to the contenttab to choose wether to update the metafields or not.
	 */
	public function getCMSFields() { 
		$fields = parent::getCMSFields();
		$this->extend('updateCMSFields', $fields);	
		return $fields;
	}
	
	public function updateCMSFields(FieldSet &$fields) {
		//Set default
		if($this->owner->GenerateMetaData == -1){
			$this->owner->GenerateMetaData = self::$checkbox_state;
		}
		if(empty(self::$checkbox_tab)) {
			self::$checkbox_tab = 'Root.Content.Metadata';
		}
		if(self::$show_checkbox == 1){
			$fields->addFieldToTab(self::$checkbox_tab, new CheckboxField('GenerateMetaData', _t('MetaManager.GENERATEMETADATA','Generate Meta-data automatically from the page content') . self::updatedFields() , $this->owner->GenerateMetaData), self::$checkbox_pos);
		} else {
			$fields->addFieldToTab(self::$checkbox_tab, new HiddenField('GenerateMetaData', _t('MetaManager.GENERATEMETADATA','Generate Meta-data automatically from the page content'), $this->owner->GenerateMetaData), self::$checkbox_pos);
		}
		if(self::$hide_extra_meta == 1){
			$fields->removeFieldsFromTab('Root.Content.Metadata', array('ExtraMeta'));	
		}	
		if(self::$disable_update_popup == 1){
			Requirements::clear('sapphire/javascript/UpdateURL.js');
			
			if(self::$update_url == 1){
				Requirements::javascript('metamanager/javascript/UpdateURL.js');
			}
		}
		
	}
	
	/**
	 * Update Metadata fields function
	 */
	public function onBeforeWrite () {
		
		$id = $this->owner->ID;		
		if($id){
			
			// if GenerateMetaData checkbox is checked, generate metadata based on content and title
			if(isset($_REQUEST['GenerateMetaData']) && $_REQUEST['GenerateMetaData']){
				
				if(self::$update_meta_title == 1){
					// Empty MetaTitle
					$this->owner->MetaTitle = '';
					// Check for Content, to prevent errors
					if($this->owner->Title){
						$this->owner->MetaTitle = strip_tags($this->owner->Title);
					}
				}
				if(self::$update_meta_desc == 1){
					// Empty MetaDescription
					$this->owner->MetaDescription = '';
					// Check for Content, to prevent errors
					if($this->owner->Content){
						$this->owner->MetaDescription = html_entity_decode(strip_tags($this->owner->Content), ENT_COMPAT , 'UTF-8');
						if(self::$meta_desc_length > 0 && strlen($this->owner->MetaDescription) > self::$meta_desc_length) {
							$this->owner->MetaDescription = substr($this->owner->MetaDescription, 0, self::$meta_desc_length) . "...";
						}
					}
				}
				
				if(self::$update_meta_keys == 1){
					// Empty MetaKeywords
					$this->owner->MetaKeywords = '';
					// Check for Content, to prevent errors
					if($this->owner->Content){
						// calculateKeywords
						$keystring = self::calculateKeywords($this->owner->Content, self::$min_word_char, self::$keyword_amount, self::$exclude_words);
						if($keystring){	
							$this->owner->MetaKeywords = $keystring;
						}	
					}
				}
			}
		}

    parent::onBeforeWrite ();
  }
	
	public function onAfterWrite(){
		
		if(self::$update_meta_title == 1 || self::$update_meta_desc == 1 || self::$update_meta_keys == 1){
			// TODO : find a nicer way to reload the page 
			LeftAndMain::ForceReload ();
		}
		parent::onAfterWrite ();
	}
	
	/**
	 * Extract Keywords
	 * Returns a lowercase string with keywords ordered by occurance in content seperated with comma's
	 * @var $string
	 * @var $min_word_char
	 * @var $keyword_amount
	 * @var $exclude_words
	 */
	private function calculateKeywords($string = '', $min_word_char = 4, $keyword_amount = 15,  $exclude_words = '' ) {
		
		$exclude_words = explode(", ", $exclude_words);
		//add space before br tags so words aren't concatenated when tags are stripped
		$string = preg_replace('/\<br(\s*)?\/?\>/i', " <br />", $string); 
		// get rid off the htmltags
		$string = html_entity_decode(strip_tags($string), ENT_NOQUOTES , 'UTF-8');
		
		// count all words with str_word_count_utf8
		$initial_words_array  = self::str_word_count_utf8($string, 1);
		$total_words = sizeof($initial_words_array);
		
		$new_string = $string;
		
		//convert to lower case
		$new_string = mb_convert_case($new_string, MB_CASE_LOWER, "UTF-8");
		
		// strip excluded words
		foreach($exclude_words as $filter_word)	{
			$new_string = preg_replace("/\b".$filter_word."\b/i", "", $new_string); 
		}
		
		// calculate words again without the excluded words using str_word_count_utf8
		$words_array = self::str_word_count_utf8($new_string, 1);
		$words_array = array_filter($words_array, create_function('$var', 'return (strlen($var) >= '.$min_word_char.');'));
		
		$popularity = array();
		$unique_words_array = array_unique($words_array);
		
		// create density array
		foreach($unique_words_array as  $key => $word)	{
			preg_match_all('/\b'.$word.'\b/i', $string, $out);
			$count = count($out[0]);	
			$popularity[$key]['count'] = $count;
			$popularity[$key]['word'] = $word;
			
		}
		
		usort($popularity, array($this,'cmp'));
		
		// sort array form higher to lower
		krsort($popularity);
		
		// create keyword array with only words
		$keywords = array();
		foreach($popularity as $value){
						$keywords[] = $value['word']; 
					}
					
		// glue keywords to string seperated by comma, maximum 15 words
		$keystring =  implode(', ', array_slice($keywords, 0, $keyword_amount));
		
		// return the keywords
		return $keystring;
	}
	
	/**
	 * Sort array by count value
	 */
	private static function cmp($a, $b) {
		return ($a['count'] > $b['count']) ? +1 : -1;
	}

	/** Word count for UTF8
	/* Found in: http://www.php.net/%20str_word_count#85592
	/* The original mask contained the apostrophe, not good for Meta keywords:
	/* "/\p{L}[\p{L}\p{Mn}\p{Pd}'\x{2019}..."
	*/
    private static function str_word_count_utf8($string, $format = 0) {
        switch ($format) {
        case 1:
            preg_match_all("/\p{L}[\p{L}\p{Mn}\p{Pd}]*/u", $string, $matches);
            return $matches[0];
        case 2:
            preg_match_all("/\p{L}[\p{L}\p{Mn}\p{Pd}]*/u", $string, $matches, PREG_OFFSET_CAPTURE);
            $result = array();
            foreach ($matches[0] as $match) {
                $result[$match[1]] = $match[0];
            }
            return $result;
        }
        return preg_match_all("/\p{L}[\p{L}\p{Mn}\p{Pd}]*/u", $string, $matches);
    }	
}