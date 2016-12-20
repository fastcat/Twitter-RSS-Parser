<?php
if (isset($q)){
	$td = $twitter_data['statuses'];
} else {
	$td = $twitter_data;
}
$arrLen = count($td);
//print(PHP_EOL.'<!--'.$json.'-->'.PHP_EOL);
for ($i=0; $i<$arrLen; $i++) {
	// twitter encodes text ... so we need to decode and reencode for non-cdata uses
	$cleanText=htmlspecialchars_decode($td[$i]['text']);
	print(PHP_EOL. '	<entry>'. PHP_EOL);
		print('		<id>tag:twitter.com,' . date("Y-m-d", strtotime($td[$i]['created_at'])) . ':/' . $td[$i]['user']['screen_name'] . '/statuses/' . $td[$i]['id_str'] . '</id>'. PHP_EOL);
		print('		<link href="https://twitter.com/'.$td[$i]['user']['screen_name'].'/statuses/'. $td[$i]['id_str'] .'" rel="alternate" type="text/html"/>'. PHP_EOL);
		print('		<title type="html">'.htmlspecialchars($td[$i]['user']['screen_name'].': '.$cleanText).'</title>'. PHP_EOL);
		print('		<summary type="html"><![CDATA['.$td[$i]['user']['screen_name'].': '.$td[$i]['text'].']]></summary>'. PHP_EOL);

		$feedContent = '		<content type="html"><![CDATA[<p>'.nl2br($td[$i]['text']).'</p>]]></content>';
		$text = processString($feedContent);

		print($text . PHP_EOL);
		print('		<updated>'.date('c', strtotime($td[$i]['created_at'])).'</updated>'. PHP_EOL);
		print('		<author><name>'.$td[$i]['user']['screen_name'].'</name></author>'. PHP_EOL);

		$hashLen = count($td[$i]['entities']['hashtags']);
		if ($hashLen > 0){
			for ($j=0; $j<$hashLen; $j++){
				print('		<category term="'.$td[$i]['entities']['hashtags'][$j]['text'].'"/>'. PHP_EOL);
			}
		}

	print('	</entry>'. PHP_EOL);
}

print('</feed>'. PHP_EOL);
// vim:ft=xml
?>
