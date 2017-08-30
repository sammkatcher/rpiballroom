<h1 class="title">News</h1>	
			<div class="view view-News view-id-News view-display-id-page_1 view-dom-id-1">
      <div class="view-content">
      <div class="item-list">
	<?php		/*	This page will display a list of all of the new stories in the news_stories directory, $NEWS_FILEPATH, set in VARS.php */
	$filesnames = scandir($NEWS_FILEPATH);									//get names of everything in $NEWS_FILEPATH defined in VARS.php
	echo('<ul>');															//echo the start of an unordered list
	$filesnames = array_reverse($filesnames);								//files are ordered by alphabetical order, naming convention of files puts																			// 		year first, which means they are ordered oldest -> newest																			// 		this function reverses the list so they are newest -> oldest	$it = 0;																//keep track of how many we've echoed
	foreach ($filesnames as $file){											//iterate through each filename found
		if ($file != "." && $file != ".."){									//exclude '.' and '..'			if ($it >= $NUM_NEWSPAGE_NEWS_STORIES) break;					//if we've echoed the desired amount, stop
			$pattern = "/([0-9]{4})-([0-9]{2})-([0-9]{2})(.*)/";			//define regex pattern for separating filename into name of story and date
			preg_match($pattern, $file, $matches);							//find everything matching the pattern
			if (count($matches[1])>0){										//if its a valid filename, separate parts into variables to display
				$year = $matches[1];
				$month = $matches[2];
				$day = $matches[3];
				$event_name = trim(preg_replace('/_/',' ',$matches[4]));	//replace all underscores with spaces
				echo('<li class="views-row views-row-1 views-row-odd views-row-first">  ');
				echo('<div class="views-field-title">');
				echo('<span class="field-content"><a href="'.$NEWS_PATH.substr($file, 0, -4).'">'.substr($event_name, 0, -4).'</a></span>');			//echo title as link to story
				echo('</div>');
				echo('<span class="views-field-created">');
				echo('<span class="field-content">'.date('l', strtotime($month."/".$day."/".$year)).', '.$months[ltrim($month, '0')].' '.ltrim($day, '0').', '.$year.'</span>');	//display date of story
				echo('</span>');
				echo('</li>');
			}			$it++;
		}
	}
	echo('</ul>');
?>
</div>    </div>
</div> 		