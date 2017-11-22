<?php


/**
 * Page Loader is a PHP Class which intend to load HTML Page from a remote server
 * This use the php CURL functions and proxy
 * @class
 */
class PageLoader{
    
    /**
     * The data load from the current URL
     * @var string
     */
    public $data = "";
    
    /**
     * The DOM Document of the loaded page
     * @var DOMDocument
     */
    public $document = null;
    
    /**
     * The constructor
     * @param string $url The url of the page you want to know
     */
    public function __construct($url) {
        
        //
        // Use the CURL function
        //
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_PROXY, '41.207.49.136:8080');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $counter = 0;
        do{
            $this->data = curl_exec($ch);
            if($counter++ > 5) break;
        }while(strlen($this->data) == 0);
        
        //
        // Using the document object model
        //
        libxml_use_internal_errors(TRUE);
        $this->document = new DOMDocument();
        @ ($this->document->loadHTML($this->data));
        
        
    }
}