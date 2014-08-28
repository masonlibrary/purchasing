<?php

	$site_base_url = '/purchasing/';
	$site_title = 'Purchasing';
	$site_uses_auth = false;
	$site_collapsible_menu = true;
	$site_copyright = 2014;
	// If copyright date is not this year, make a range
	if ($site_copyright != date('Y')) { $site_copyright .= '-' . date('Y'); }
        
        
        
        
        
        /*Fiscal Year Definitions*/
define('FY_START_MMDD', '07-01');
define('FY_START_MONTH', 7);
define('FY_START_DAY', 1);

define('FY_END_MMDD', '06-30');
define('FY_END_MONTH', 6);
define('FY_END_DAY, 30', 30);


/*Semester Definitions*/
define('FALL_START_MMDD', '08-15');
define('FALL_END_MMDD', '12-15');

define ('SPRING_START_MMDD', '01-01');
define ('SPRING_END_MMDD', '05-15');

define ('SUMMER_START_MMDD','05-16' );
define ('SUMMER_END_MMDD', '08-14');


/*Academic Year Definitions*/
define('AY_START_MMDD', '08-15');
define ('AY_START_MONTH', 8);
define ('AY_START_DAY', 15);
define('AY_END_MMDD', '08-14');
define ('AY_END_MONTH', 8);
define ('AY_END_DAY', 14);

?>
