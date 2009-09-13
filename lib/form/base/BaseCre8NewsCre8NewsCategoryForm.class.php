<?php

/**
 * Cre8NewsCre8NewsCategory form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8NewsCre8NewsCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cre8_news_id'          => new sfWidgetFormInputHidden(),
      'cre8_news_category_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'cre8_news_id'          => new sfValidatorPropelChoice(array('model' => 'Cre8News', 'column' => 'id', 'required' => false)),
      'cre8_news_category_id' => new sfValidatorPropelChoice(array('model' => 'Cre8NewsCategory', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_news_cre8_news_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8NewsCre8NewsCategory';
  }


}
