<?php
// No direct access
defined('JPATH_PLATFORM') or die; ?>

<div class="mod_jcallback">
  <form action="<?php modJcallbackHelper::check($params);?>" method="post">
    <p class="jcallback-field-name">
      <input required type="text" name="name" placeholder="<?php echo JText::_('MOD_JCALLBACK_NAME_VALUE')?>" style="max-width: 80%;" />
    </p>
    <p class="jcallback-field-phone">
      <label title="<?php echo JText::_('MOD_JCALLBACK_PHONE_LABEL_TITLE_VALUE');?>"><?php echo JText::_('MOD_JCALLBACK_PHONE_LABEL_VALUE');?></label>
      <input required type="text" name="phone" placeholder="<?php echo JText::_('MOD_JCALLBACK_PHONE_VALUE')?>" style="max-width: 80%;" />
    </p>
    <p class="jcallback-field-email">
      <label><?php echo JText::_('MOD_JCALLBACK_EMAIL_LABEL_VALUE');?></label>
      <input type="text" name="email" placeholder="<?php echo JText::_('MOD_JCALLBACK_EMAIL_VALUE')?>" style="max-width: 80%;" />
    </p>
    <p class="jcallback-field-message">
      <label><?php echo JText::_('MOD_JCALLBACK_MESSAGE_LABEL_VALUE');?></label>
      <textarea class="textarea" name="message" placeholder="<?php echo JText::_('MOD_JCALLBACK_MESSAGE_VALUE')?>" style="max-width: 100%;"></textarea>
    <input type="submit" class="btn btn-danger" name="jcallback" style="width:100%; font-weight:bold;" />
  </form>
</div>
