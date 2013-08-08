<?php
namespace LC;
/**
 * 
 */
class GrapSkills {
    
    private $page;
	public $test = false;
    
	function __construct($URL) {
	    libxml_use_internal_errors(true);
		$this->page = new \DOMDocument();
        $this->test = $this->page->loadHTMLFile($URL);
        foreach (libxml_get_errors() as $error) {
            if ($error->level != LIBXML_ERR_WARNING) {
                echo ($error->level == LIBXML_ERR_ERROR? 'ERROR ': 'FATAL ERROR ') . 'in ' . $error->file . '[line ' . $error->line . '/' . $error->column . ']:' . $error->message . PHP_EOL;
            }
        }
	}
    
    function grap() {
        $tables = $this->page->getElementsByTagName('table');
        $one = '';
        foreach ($tables as $table) {
            if ($table->hasAttribute('class')) {
                $one = $table;
                break;
            }
        }
        return $one;
    }
}
