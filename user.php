<?php
$host = 'api.twitter.com';
$method = 'GET';
$path = '/1.1/statuses/user_timeline.json'; // api call path

$query = array( // query parameters
    'screen_name' => $screen_name,
    'count' => $count,
    'trim_user' => 'false',
	'exclude_replies' => !$user_include_replies,
	'include_rts' => $user_include_rts,
);

include "functions.php";

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
    || $_SERVER['SERVER_PORT'] == 443) {

    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

if ($twitter_data['errors']) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    header('Content-type: text/html; charset=utf-8');
    print('<html><body><p>Twitter says:</p><dl>');
    for ($i = 0; $i < count($twitter_data['errors']); ++$i) {
        print('<dt>' . htmlspecialchars('Code ' . $twitter_data['errors'][$i]['code']) . '</dt>');
        print('<dd>' . htmlspecialchars($twitter_data['errors'][$i]['message']) . '</dd>');
    }
    print('</dl></body></html>');
} else {
    print('<?xml version="1.0" encoding="utf-8"?>'. PHP_EOL);
    print('<feed xmlns="http://www.w3.org/2005/Atom" xml:lang="en" xml:base="'.$_SERVER['SERVER_NAME'].'">'. PHP_EOL);
    print('<id>tag:twitter.com,2006:/'.$twitter_data[0]['user']['screen_name'].'</id>'. PHP_EOL);
    print('<title>@'.$twitter_data[0]['user']['screen_name'].'</title>'. PHP_EOL);
    print('<updated>'.date('c', strtotime($twitter_data[0]['created_at'])).'</updated>'. PHP_EOL);

    print('<link href="https://twitter.com/'.$twitter_data[0]['user']['screen_name'].'"/>'. PHP_EOL);
    print('<link href="'.$protocol.$_SERVER['SERVER_NAME'].str_replace("&", "&amp;", $_SERVER['REQUEST_URI']).'" rel="self" type="application/atom+xml" />'. PHP_EOL);
    print('<link href="https://abs.twimg.com/favicons/favicon.ico" rel="shortcut icon" type="image/x-icon"/>');

    include "feed.php";
}
?>
