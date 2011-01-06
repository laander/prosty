<?php
$this->set('documentData', array(
        'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

    $this->set('channelData', array(
        'title' => __("Most Recent Posts", true),
        'link' => $html->url('/', true),
        'description' => __("Most recent posts.", true),
        'language' => 'en-us'));	

 foreach ($recent_entries as $recent_entry) {
						$state = $recent_entry["state"];
						$notification = $recent_entry["notification"]; 
						$model = $recent_entry["model"];
						$username = $recent_entry["ModifiedBy"]["username"];
						$id = $recent_entry[$model]["id"];
						$title = $recent_entry[$model]["title"];
						$controller = strToLower($model)."s";
						$anchorText = $username." ".$state." the ".strToLower($model)." '".$title."'";
        				$postTime = strtotime($recent_entry[$model]["modified"]);
 
        $postLink = array(
            'controller' => $controller,
            'action' => 'view',
            'year' => date('Y', $postTime),
            'month' => date('m', $postTime),
            'day' => date('d', $postTime));
        // You should import Sanitize
        App::import('Sanitize');
        // This is the part where we clean the body text for output as the description 
        // of the rss item, this needs to have only text to make sure the feed validates
        $bodyText = preg_replace('=\(.*?\)=is', '', $anchorText);
        //$bodyText = $text->stripLinks($bodyText);
        $bodyText = Sanitize::stripAll($bodyText);
        //$bodyText = $text->truncate($bodyText, 400, '...', true, true);
 
        echo  $rss->item(array(), array(
            'title' => $title,
            'link' => $postLink,
            'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
            'description' =>  $bodyText,
            'dc:creator' => $username,
            'pubDate' => $recent_entry[$model]["modified"]));
    }
?>