<?php

class Cre8NewsCategory extends BaseCre8NewsCategory
{
  public function __toString()
  {
    return $this->getName();
  }
}

$columns_map = array('from'   => Cre8NewsCategoryPeer::NAME,
                     'to'     => Cre8NewsCategoryPeer::SLUG);
sfPropelBehavior::add('Cre8NewsCategory', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map, 'separator' => '-', 'permanent' => true)));
