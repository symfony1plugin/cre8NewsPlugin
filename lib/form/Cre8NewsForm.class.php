<?php

/**
 * Cre8News form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8NewsForm extends BaseCre8NewsForm
{
  public function configure()
  {
    unset(
      $this['slug'],
      $this['created_at'],
      $this['updated_at']
    );
    
    $this->setDefault('display_date', array('year' => date('Y'), 'month' => date('n'), 'day' => date('j'), 'hour' => date('G'), 'minute' => date('i')));
    $this->setWidget('content', new fckFormWidget());
    
    $this->widgetSchema['title']->setAttributes(array('style' => 'width: 350px;'));
    
  }
}