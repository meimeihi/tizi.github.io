<?php
return array (
  52 => 
  array (
    'urlrules' => 
    array (
      'list' => 
      array (
        'tplfile' => 'list',
        'rules' => 'list/{数字1}{id}{数字2}/,newslist/{数字1}{id}{数字2}/',
        'system' => '1',
      ),
      'show' => 
      array (
        'tplfile' => 'show',
        'rules' => 'html/{日期}/{数字1}{id}{数字3}.html,news/{数字3}{id}{数字2}.html,show/{id}{数字5}.html',
        'system' => '1',
      ),
    ),
    'domain' => 
    array (
      0 => 'temp.cm',
      1 => 'a.com',
    ),
  ),
);
?>