<?php

/**
 * Cre8NewsCategory form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8NewsCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'name'                              => new sfWidgetFormInput(),
      'slug'                              => new sfWidgetFormInput(),
      'cre8_news_cre8_news_category_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Cre8News')),
    ));

    $this->setValidators(array(
      'id'                                => new sfValidatorPropelChoice(array('model' => 'Cre8NewsCategory', 'column' => 'id', 'required' => false)),
      'name'                              => new sfValidatorString(array('max_length' => 128)),
      'slug'                              => new sfValidatorString(array('max_length' => 160)),
      'cre8_news_cre8_news_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Cre8News', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_news_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8NewsCategory';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['cre8_news_cre8_news_category_list']))
    {
      $values = array();
      foreach ($this->object->getCre8NewsCre8NewsCategorys() as $obj)
      {
        $values[] = $obj->getCre8NewsId();
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
    $c->add(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_CATEGORY_ID, $this->object->getPrimaryKey());
    Cre8NewsCre8NewsCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('cre8_news_cre8_news_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Cre8NewsCre8NewsCategory();
        $obj->setCre8NewsCategoryId($this->object->getPrimaryKey());
        $obj->setCre8NewsId($value);
        $obj->save();
      }
    }
  }

}
