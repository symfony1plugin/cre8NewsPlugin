<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8NewsCategory filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8NewsCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                              => new sfWidgetFormFilterInput(),
      'cre8_news_cre8_news_category_list' => new sfWidgetFormPropelChoice(array('model' => 'Cre8News', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                              => new sfValidatorPass(array('required' => false)),
      'cre8_news_cre8_news_category_list' => new sfValidatorPropelChoice(array('model' => 'Cre8News', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_news_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addCre8NewsCre8NewsCategoryListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_CATEGORY_ID, Cre8NewsCategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Cre8NewsCategory';
  }

  public function getFields()
  {
    return array(
      'id'                                => 'Number',
      'name'                              => 'Text',
      'cre8_news_cre8_news_category_list' => 'ManyKey',
    );
  }
}
