<?php
/**
 * Module Joomla Callback.
 *
 * @package    Joomla.site
 * @subpackage mod_jcallback
 * @license    GNU/GPL, see LICENSE.php
 */

// No direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

// This function for next versions
// function check($params){
//   if(JRequest::getVar('jcallback')){
//     modJcallbackHelper::sendMail($params);
//   }else {
//     // modJcallbackHelper::getSuccessTmpl($params);
//   }
// }

// If module must show only button in the positions
if ($params->get('showForm')){
  // require JMOduleHelper::getLayoutPath('mod_jcallback', 'default_modal');
}elseif(!JRequest::getVar('jcallback')){
  require JModuleHelper::getLayoutPath('mod_jcallback');
}elseif(JRequest::getVar('jcallback')){
  ModJcallbackHelper::check($params);
}
// Show post send mail message
if(JRequest::getVar('jcallback')){
  echo JText::_('MOD_JCALLBACK_POSTSEND_MESSAGE_VALUE');
}
