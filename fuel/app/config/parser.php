<?php
return array(
    'extensions' => array(
        'php'       => 'View',
//  'smarty'    => 'View_Smarty', // we want .tpl, not .smarty
        'tpl'      => array('class' => 'View_Smarty', 'extension' => 'tpl'),
    ),
    'View_Smarty'   => array(
        'include'       => APPPATH.'vendor'.DS.'Smarty'.DS.'Smarty'.DS.'libs'.DS.'Smarty.class.php',
        'delimiters'    => array('{', '}'),
        'environment'   => array(
            'compile_dir'       => APPPATH.'tmp'.DS.'Smarty'.DS.'templates_c'.DS,
            'config_dir'        => APPPATH.'tmp'.DS.'Smarty'.DS.'configs'.DS,
            'cache_dir'         => APPPATH.'cache'.DS.'Smarty'.DS,
            'caching'           => false,
            'cache_lifetime'    => 0,
            'force_compile'     => true, // debug!
            'compile_check'     => true,
            'debugging'         => false,
            'autoload_filters'  => array(),
            'default_modifiers' => array(),
        ),
    ),
);