<?php
    $anchor = [
        ["href="=>"'https://www.facebook.com/'","img src="=>"'../pictures/facebook.png'","alt="=>"'Facebook'"],

        ["href="=>"'https://www.instagram.com'","img src="=>"'../pictures/instagram.png'","alt="=>"'Instagram'"],

        ["href="=>"'https://twitter.com/home'","img src="=>"'../pictures/twitter.png'","alt="=>"'Twitter'"],

        ["href="=>"'https://www.youtube.com/'","img src="=>"'../pictures/youtube.png'","alt="=>"'YouTube'"],

        ["href="=>"'https://www.pinterest.com/'","img src="=>"'../pictures/pinterest.png'","alt="=>"'Pinterest'"],

        ["href="=>"'https://www.tiktok.com/'","img src="=>"'../pictures/tiktok.png'","alt="=>"'TikTok'"],

        ["href="=>"'https://www.linkedin.com/'","img src="=>"'../pictures/linkedin.png'","alt="=>"'LinkedIn'"],

        ["href="=>"'https://weheartit.com/'","img src="=>"'../pictures/weheartit.png'","alt="=>"'WeHeartIt'"],
    ];  
    
    $target="target='_blank'";
    
    function tag(array $anchor, int $num) {
        $index = array_keys($anchor);
        return $index[$num];
    }

    foreach ($anchor as $tag) {
        echo "<a " . tag($tag,0) . $tag[tag($tag,0)]. "$target><" . tag($tag,1) . $tag[tag($tag,1)] . tag($tag,2) . $tag[tag($tag,2)]."></a>";
    };
?>