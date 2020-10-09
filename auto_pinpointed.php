<?php

namespace pinpoint;
use pinpoint\Common\AopClassMap;
use pinpoint\Common\PinpointDriver;

$classMap = new AopClassMap();
if(defined('USER_DEFINED_CLASS_MAP_IMPLEMENT'))
{
    $className = USER_DEFINED_CLASS_MAP_IMPLEMENT;
    global $classMap;
    $classMap = new $className();
    assert($classMap instanceof AopClassMap);
}

define('CLASS_PREFIX','Proxied_');

PinpointDriver::getInstance()->init($classMap);

if(class_exists("\Plugins\PerRequestPlugins")){
    \Plugins\PerRequestPlugins::instance();
}
