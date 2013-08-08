<?php

namespace LC;
function __autoload($className)
{
    echo 'huhu';
    
}


$test = new GrapSkills('http://guide.lastchaos.bplaced.net/index.php?title=Titan_Skill_aktiv');
echo $test->grap();
