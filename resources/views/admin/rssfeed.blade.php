<?php ob_start(); ?>

<div class="rss-widget">
    <ul class="feed_list">
        <?php
            $opts = array(
                'http' => array(
                    'method'		=>"GET", 
                    'user_agent'	=> $_SERVER['HTTP_USER_AGENT'],
                    'header'		=>array(
                        "Accept-language: en", 
                        "Cookie: foo=bar",
                        "Content-type: application/x-www-form-urlencoded\r\n"
                    )
                )
            );

            $context = stream_context_create( $opts );
            libxml_set_streams_context( $context );

            $rss = new DOMDocument();
            $rss->load('http://netfusiontechnology.com/feed/');
            $feed = array();
            foreach ($rss->getElementsByTagName('item') as $node) {
                $item = array ( 
                    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue
                );
                array_push( $feed, $item );
            }
            
            $limit = 6;
            $feed_content = '';
            
            for( $x = 0; $x < $limit; $x++ ) {
                $title 			= str_replace(' & ', ' &amp; ', $feed[$x]['title']);
                $link 			= $feed[$x]['link'];
                $description 	= $feed[$x]['desc'];
                $date 			= date( 'F d, Y', strtotime($feed[$x]['date']));
                
                ?>

                    <li>
                        <a class="rsswidget" href="<?php echo $link ; ?>"><?php echo $title; ?></a>
                        <span class="rss-date"><?php echo $date; ?></span>
                        <div class="rssSummary">
                            <?php echo $description; ?>
                        </div>
                    </li>

                <?php
            }
            
        ?>
    </ul>
</div>
<?php
$string = ob_get_contents();
ob_end_clean();

echo $string;