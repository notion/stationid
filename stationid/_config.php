<?php

global $project;
$project = 'stationid';

global $database;
$database = 'stationid';

require_once('conf/ConfigureFromEnv.php');

// Add custom site config
Object::add_extension('SiteConfig', 'CustomSiteConfig');

MySQLDatabase::set_connection_charset('utf8');

// This line set's the current theme. More themes can be
// downloaded from http://www.silverstripe.org/themes/
SSViewer::set_theme('stationid');

// Set the site locale
i18n::set_locale('en_US');

// enable nested URLs for this site (e.g. page/sub-page/)
SiteTree::enable_nested_urls();