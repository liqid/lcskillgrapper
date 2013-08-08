<?php
namespace LC;
use LC\Transfer\Skill as Skill;
use LC\Transfer\Condition as Condition;
use LC\Transfer\ConditionType as CType;
use LC\Transfer\Effect as Effect;
use LC\Transfer\EffectType as EType;
use LC\Transfer\Tier as Tier;
use LC\Transfer\SkillType as SType;

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
        // foreach (libxml_get_errors() as $error) {
            // if ($error->level != LIBXML_ERR_WARNING) {
                // echo ($error->level == LIBXML_ERR_ERROR? 'ERROR ': 'FATAL ERROR ') . 'in ' . $error->file . '[line ' . $error->line . '/' . $error->column . ']:' . $error->message . PHP_EOL;
            // }
        // }
	}
    
    function grap() {
        $tables = $this->page->getElementsByTagName('table');
        $one = '';
        $test = 0;
        $xpath = new \DOMXPath($this->page);
        foreach ($tables as $table) {
            if (!$table->hasAttribute('class')) {
                    // $skillId = 1;
                    $trs = $table->firstChild->getElementsByTagName('tr');
                    $trIndex = 0;
                    foreach ($trs as $key => $tr) {
                        $tds = $tr->getElementsByTagName('td');
                        $tdIndex = 0;
                        foreach ($tds as $td) {
                            if ($trIndex == 0) {
                                if ($tdIndex == 0) {
                                    $skillImage = $td->firstChild->getAttribute('src');
                                    var_dump($skillImage);
                                } else {
                                    $skillName = $xpath->query('descendant::*/text()',$td->firstChild)->item(0)->textContent;
                                    var_dump($skillName);
                                }
                                
                            }
                            $tdIndex++;
                        }
                        if ($trIndex == 0) {
                            break;
                        }
                    }
                    $one = 'bla';
                break;
            }
        }
var_dump($test);
        return $one;
    }
}
