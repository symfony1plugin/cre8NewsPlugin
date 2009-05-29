<?php 
$sfDate = new sfDate();
$sfDate->clearTime()->firstDayOfMonth();
?>
<ul class="cre8_news_by_month">
	<?php for($i=0; $i < 12; $i++): ?>
  	<?php if($num = Cre8NewsPeer::doCountBetweenDates($sfDate->firstDayOfMonth()->format_database(), $sfDate->finalDayOfMonth()->format_database())): ?>
  	<li><a <?php echo ($sfDate->format('Y-m') == $sf_params->get('date') ? 'class="nms"' : '' ); ?> href="<?php echo url_for('@news?date=' . $sfDate->format('Y-m')); ?>"><?php echo $sfDate->format('F y'); ?> (<?php echo $num; ?>)</a></li>
  	<?php endif; ?>
  <?php $sfDate->firstDayOfMonth()->subtractMonth(); endfor; ?>
</ul>
