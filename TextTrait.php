<?php namespace App\Model\Traits;

use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Routing\Router;

trait DboTrait
{

    /**
     * String with allowed tags for strip_tags
     * @var string
     */
    public $allowed_tags = '<strong><b><bold><i>';

    /**
     * Remove the bindings that text can contain
     *
     * @param string $text
     *
     * @return string clean text
     */
    public function removeBindings($text)
    {
        $clean = preg_replace('#\[code\](.*)\[\/code\]#', '', $text);
        
        $clean = preg_replace('#\[shortcode\](.*)\[\/shortcode\]#', '', $text);

        $clean = preg_replace('#\[gallery\](.*)\[\/gallery\]#', '', $clean);

        $clean = preg_replace('#\[list\](.*)\[\/list\]#', '', $clean);

        return $clean;
    }


    /**
     * Generate url from string escaping and replacing some char
     *
     * @param string $string
     *
     * @return string
     */
    public function escapeUrl($string)
    {
        $titleclean = $this->cleanSymbol($string);
        $url = strtolower($titleclean);

        $filters = [
            // replace & with 'and' for readability
            '/&+/'          => 'and',
            // replace non-alphanumeric characters with a hyphen
            '/[^a-z0-9]+/i' => '-',
            // replace multiple hyphens with a single hyphen
            '/-+/'          => '-'
        ];

        // apply each replacement
        foreach ($filters as $regex => $replacement) {
            $url = preg_replace($regex, $replacement, $url);
        }

        // remove hyphens from the start and end of string
        $url = trim($url, '-');

        // restrict the length of the URL
        $url = trim(substr($url, 0, 55));

        // set a default value just in case
        //if(strlen($url) == 0){
        //    $url = uniqid();
        //}

        return $url;
    }


    /**
     * clean string from latin charachter
     *   è é ò à ù ì
     *
     * @param string $string
     *
     * @return string
     */
    public function cleanSymbol($string)
    {
        $string = str_replace("è", "e", $string);
        $string = str_replace("à", "a", $string);
        $string = str_replace("ò", "o", $string);
        $string = str_replace("ì", "i", $string);
        $string = str_replace("ù", "u", $string);
        $string = str_replace("é", "e", $string);

        return $string;
    }


    /**
     * clean string from latin charachter
     *   è é ò à ù ì
     *
     * @param string $string
     *
     * @return string
     */
    public function removeSymbol($string)
    {
        $string = str_replace("è", "", $string);
        $string = str_replace("à", "", $string);
        $string = str_replace("ò", "", $string);
        $string = str_replace("ì", "", $string);
        $string = str_replace("ù", "", $string);
        $string = str_replace("é", "", $string);

        return $string;
    }


    /**
     * Static function for convert text http:// www. links to html a tag with optional target blank
     *
     * @param string $text
     * @param array $target_blank (if false[default]): link havent the target=_blank
     *
     * @return string The converte string
     */
    public function convertTextToLink($text, $target_blank = false)
    {
        ///* Url link
        if ($target_blank) {
            // Find and replace all http/https links that are not part of an existing html anchor
            // Find and replace all naked www.links.com (without http://)
            $text = preg_replace('/\b(?:(http(s?):\/\/)|(?=www\.))(\S+)/is',
                '<a href="http$2://$3" target="_blank">$1$3</a>',
                $text);//@todo pass on a mind page for analytics and more security
        } else {
            $text = preg_replace('/\b(?:(http(s?):\/\/)|(?=www\.))(\S+)/is', '<a href="http$2://$3">$1$3</a>', $text);
        } // @todo pass on a mind page for analytics and more security

        return $text;
    }


    /**
     * Static function for convert html a tag to html a tag with target blank
     * es: a tag -in-> a tag with target=_blank
     *
     * @param string $html
     * @param array $options (if target-blank): link receive target=_blank
     *
     * @return string The converte string
     */
    public function convertAtagTotblank($html)
    {
        $html = preg_replace("/<a href=(\"|\')(http:\/\/|https:\/\/)(.*?)(\"|\')>/",
            "<a href=\"http://$3\" target=\"_blank\">", $html);

        //$html = preg_replace('/(?=<a\.)(\S+)/', '<a href="http$2://$3" target="_blank">$1$3</a>', $html);
        //@todo pass on a site page for analytics and more security

        return $html;
    }
}
