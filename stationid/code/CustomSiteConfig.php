<?php
class CustomSiteConfig extends DataObjectDecorator {

	function extraStatics() {
       return array(
           'db' => array(
               'StreamIsLive' => 'Boolean'
           )
       );
   }

   public function updateCMSFields(FieldSet $fields) {
       $fields->addFieldToTab("Root.Stream", new CheckboxField("StreamIsLive", "Turn On Stream Player"));
   }

}