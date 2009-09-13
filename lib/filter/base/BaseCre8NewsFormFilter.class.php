<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8News filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8NewsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'                             => new sfWidgetFormFilterInput(),
      'summary'                           => new sfWidgetFormFilterInput(),
      'content'                           => new sfWidgetFormFilterInput(),
      'slug'                              => new sfWidgetFormFilterInput(),
      'display_date'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'is_active'                         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cre8_news_cre8_news_category_list' => new sfWidgetFormPropelChoice(array('model' => 'Cre8NewsCategory', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'title'                             => new sfValidatorPass(array('required' => false)),
      'summary'                           => new sfValidatorPass(array('required' => false)),
      'content'                           => new sfValidatorPass(array('required' => false)),
      'slug'                              => new sfValidatorPass(array('required' => false)),
      'display_date'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'is_active'                         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cre8_news_cre8_news_category_list' => new sfValidatorPropelChoice(array('model' => 'Cre8NewsCategory', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_news_filters[%s]');

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

    $criteria->addJoin(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_ID, Cre8NewsPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_CATEGORY_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(Cre8NewsCre8NewsCategoryPeer::CRE8_NEWS_CATEGORY_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Cre8News';
  }

  public function getFields()
  {
    return array(
      'id'                                => 'Number',
      'title'                             => 'Text',
      'summary'                           => 'Text',
      'content'                           => 'Text',
      'slug'                              => 'Text',
      'display_date'                      => 'Date',
      'is_active'                         => 'Boolean',
      'cre8_news_cre8_news_category_list' => 'ManyKey',
    );
  }
}
