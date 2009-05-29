<?php

class Cre8News extends PluginCre8News 
{
}

$columns_map = array('from'   => Cre8NewsPeer::TITLE,
                     'to'     => Cre8NewsPeer::SLUG);

sfPropelBehavior::add('Cre8News', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map, 'separator' => '-', 'permanent' => true)));
