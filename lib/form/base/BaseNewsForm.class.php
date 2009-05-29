<?php

/**
 * News form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInput(),
      'summary'      => new sfWidgetFormTextarea(),
      'content'      => new sfWidgetFormTextarea(),
      'slug'         => new sfWidgetFormInput(),
      'display_date' => new sfWidgetFormDateTime(),
      'is_active'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'News', 'column' => 'id', 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 80)),
      'summary'      => new sfValidatorString(array('required' => false)),
      'content'      => new sfValidatorString(array('required' => false)),
      'slug'         => new sfValidatorString(array('max_length' => 100)),
      'display_date' => new sfValidatorDateTime(array('required' => false)),
      'is_active'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }


}
