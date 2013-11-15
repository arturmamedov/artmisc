/**
 * ToolsClass - contains methods:
 *	get ...
 */
 
class ToolsClass {
	
	/**
     * Extract and return a id video token from passed YouTube or Vimeo URL
     * 
     * @param string $video_url url of video, test and passed below
     * 
     * url format: https://www.youtube.com/watch?v=Sg3QiH-czmY 
     *				https://www.youtube.com/watch?v=kuNn1wuzC0U&list=PL1F41CC1ECB4C8A50&index=2 
	 *	https://www.youtube.com/watch?v=0BMPeXXBgb4&feature=c4-overview-vl&list=PLKCsPAuFEclDNfuhlioaljcEBu06cxV63
	 *			https://vimeo.com/59802973
	 *			https://vimeo.com/album/2034649/video/46926077
     *
     * @return string id numeric for vimeo, alphadecimal for youtube
     */
    static public function vitubeToken($video_url){

        if(strlen(strstr($video_url, 'youtu')) > 0){
            $query_string = array();
            parse_str(parse_url($video_url, PHP_URL_QUERY), $query_string);
            if(isset($query_string["v"])){
                $token = $query_string["v"];
            } else {
                if(($strs = strrpos($video_url, '/')) > 3)
                    $token = substr($video_url, $strs + 1);
                else
                    return false;
            }
        } elseif(strlen(strstr($video_url, 'vimeo')) > 0) {
            $result = preg_match('/(\d+)$/', $video_url, $matches);
            $token = $matches[0];
        } else
            return false;
		
        if(strlen($token) > 3)
            return $token;
        else
            return false;
    }	
 
}
