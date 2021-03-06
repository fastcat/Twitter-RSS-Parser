<?php
// * Create secrets.php with contents like:
// $token = 'XXXX';
// $token_secret = 'XXXX';
// $consumer_key = 'XXXX';
// $consumer_secret = 'XXXX';
// * Read the readme.md file for instructions on setting that up.
if(file_exists("secrets.php")) {
	include "secrets.php";
} else {
	print('ERROR: Before using this script, copy config.php-dist to config.php and customize it.');
	exit();
}

// * Enter your twitter username below.  This is used for the home
// * view, and a default for lists if one isn't specified in the URL.
$screen_name = "XXXX";

// * Default max tweets to retrieve.  Can be customized per type of query below, and in
// * URL by appending "&count=X" to any query.
// * Note: Count includes RTs, even if you exclude them below.
// * max value: 200
// * default:   10
$count = 10;



// * ***************************************************************
// * User Status Parameters	
// * ***************************************************************

// * Max tweets to retrieve. Count includes RTs, even if you exclude them below.
// * max value: 200
// * default:   $count
//$user_count = $count;

// * Sets whether retweets are included in the timeline.  Retweets count
// * towards the $count limit even if this is true, they're just hidden.
// * default: false
$user_include_rts = false;

// * Sets whether replies are included in the timeline.  Replies count
// * towards the $count limit even if this is true, they're just hidden.
// * default: false
$user_include_replies = false;



// * ***************************************************************
// * List Parameters	
// * ***************************************************************

// * Max tweets to retrieve. Count includes RTs, even if you exclude them below.
// * max value: 200
// * default:   $count
//$list_count = $count;

// * Sets whether retweets are included in the timeline.  Retweets count
// * towards the $count limit even if this is true, they're just hidden.
// * default: true
$list_include_rts = false;



// * ***************************************************************
// * Home Timeline Parameters
// * ***************************************************************

// * Max tweets to retrieve. Count includes RTs, even if you exclude them below.
// * max value: 200
// * default:   $count
//$home_count = $count;

// * Sets whether retweets are included in the timeline.  Retweets count
// * towards the $count limit even if this is true, they're just hidden.
// * default: true
$home_include_rts = true;

// * Sets whether replies are included in the timeline.  Replies count
// * towards the $count limit even if this is true, they're just hidden.
// * default: true
$home_include_replies = true;



// * ***************************************************************
// * Search Parameters
// * ***************************************************************

// * Max tweets to retrieve. Count includes RTs, even if you exclude them below.
// * max value: 200
// * default:   $count
//$search_count = $count;

// * Type of search results to return.
// * options: mixed|recent|popular
// * default: mixed
$search_result_type = 'mixed';
?>
