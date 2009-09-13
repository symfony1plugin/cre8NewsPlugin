<?php

/**
 * Cre8News form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8NewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'title'                             => new sfWidgetFormInput(),
      'summary'                           => new sfWidgetFormTextarea(),
      'content'                           => new sfWidgetFormTextarea(),
      'slug'                              => new sfWidgetFormInput(),
      'display_date'                      => new sfWidgetFormDateTime(),
      'is_active'                         => new sfWidgetFormInputCheckbox(),
      'cre8_news_cre8_news_category_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Cre8NewsCategory')),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorPropelChoice(array('model' => 'Cre8News', 'column' => 'id', 'required' => false)),
      'title'                             => new sfValidatorString(array('max_length' => 80)),
      'summary'                           => new sfValidatorString(array('required' => false)),
      'content'                           => new sfValidatorString(array('required' => false)),
      'slug'                              => new sfValidatorString(array('max_length' => 100)),
      'display_date'                      => new sfValidatorDateTime(array('required' => false)),
      'is_active'                         => new sfValidatorBoolean(array('required' => false)),
      'cre8_news_cre8_news_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Cre8NewsCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8News';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['cre8_news_cre8_news_category_list']))
    {
      $values = array();
      foreach ($this->object->getCre8NewsCre8NewsCategorys() as $obj)
      {
        $values[] = $obj->getCre8NewsCategoryId();
      }

      $this->setDefault('cre8_news_cre8_news_category_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveCre8NewsCre8NewsCategoryList($con);
  }

  public function saveCre8NewsCre8NewsCategoryList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['cre8_news_cre8_news_category_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_ID, $this->object->getPrimaryKey());
    Cre8NewsCre8NewsCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('cre8_news_cre8_news_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Cre8NewsCre8NewsCategory();
        $obj->setCre8NewsId($this->object->getPrimaryKey());
        $obj->setCre8NewsCategoryId($value);
        $obj->save();
      }
    }
  }

}
