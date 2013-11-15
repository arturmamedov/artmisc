artmisc
=======

PHP class with tools method / miscellaneous


current methods (2):

#### vitubeIdFromUrl($video_url)

    /**
    * Extract and return a id video token from passed YouTube or Vimeo URL
    *
    * @param string $video_url url of video, test and passed below
    *
    * url format: 
    *  http://youtu.be/Y8N4tIqy4uw
    *  https://www.youtube.com/watch?v=Sg3QiH-czmY
    *  https://www.youtube.com/watch?v=kuNn1wuzC0U&list=PL1F41CC1ECB4C8A50&index=2
    *  https://www.youtube.com/watch?v=0BMPeXXBgb4&feature=c4-overview-vl&list=PLKCsPAuFEclDNfuhlioaljcEBu06cxV63
    *  -
    *  https://vimeo.com/59802973
    *  https://vimeo.com/album/2034649/video/46926077
    *
    * @return string id numeric for vimeo, alphadecimal for youtube
    */

#### ytIdFromUrl($video_url)
    
    /**
    * YouTube - Cut and extract a video id token from passed URL
    * 
    * @param string $video_url url of video
    * 
    * url format: 
    *  http://youtu.be/Y8N4tIqy4uw
    *  https://www.youtube.com/watch?v=Sg3QiH-czmY 
    *  https://www.youtube.com/watch?v=kuNn1wuzC0U&list=PL1F41CC1ECB4C8A50&index=2 
    *  https://www.youtube.com/watch?v=0BMPeXXBgb4&feature=c4-overview-vl&list=PLKCsPAuFEclDNfuhlioaljcEBu06cxV63
    *
    * @return string id alphadecimal for youtube ex: "kuNn1wuzC0U"
    */
    $youtube_id = ytIdFromUrl($video_url);

#### vimeoIdFromUrl($video_url)
    
    /**
    * Cut and extract a video id token from passed Vimeo URL
    * 
    * @param string $video_url url of video
    * 
    * url format: 
    *  https://vimeo.com/59802973
    *	https://vimeo.com/album/2034649/video/46926077
    * 
    * @return string numeric for vimeo ex: "59802973"
    */
    $vimeo_id = vimeoIdFromUrl($video_url);
