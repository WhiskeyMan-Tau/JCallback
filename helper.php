<?php
// No direct access
defined('JPATH_PLATFORM') or die;

/**
 * Helper class for JCallback module
 *
 * @package    Joomla.Site
 * @subpackage mod_jcallback
 */
class ModJcallbackHelper
{
    /**
     * Check the $_POST vars
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */
    public static function check($params)
    {
      if(JRequest::getVar('jcallback')){
        self::sendMail($params);
      }
    }

    /**
     * Send email whith user data from form
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */
    public static function sendMail($params)
    {
      $sender     = $params->get('sender');
      $recipient  = $params->get('recipient');
      $subject    = $params->get('subject');

      // Getting the site name
      $sitename = JFactory::getApplication()->get('sitename');

      // Getting user form data-------------------------------------------------
      $name     = JFilterInput::getInstance()->clean(JRequest::getVar('name'));
      $phone    = JFilterInput::getInstance()->clean(JRequest::getVar('phone'));
      $email    = JFilterInput::getInstance()->clean(JRequest::getVar('email'));
      $message  = JFilterInput::getInstance()->clean(JRequest::getVar('message'));

      // Set the massage body vars
      $nameLabel    = JText::_('MOD_JCALLBACK_FORM_NAME_LABEL_VALUE');
      $phoneLabel   = JText::_('MOD_JCALLBACK_FORM_PHONE_LABEL_VALUE');
      $emailLabel   = JText::_('MOD_JCALLBACK_FORM_EMAIL_LABEL_VALUE');
      $messageLabel = JText::_('MOD_JCALLBACK_FORM_MESSAGE_LABEL_VALUE');
      $emailLabel   = $email ? "<b>$emailLabel:</b> $email" : "";
      $messageLabel = $message ? "<b>$messageLabel:</b> $message" : "";

      // Get the JMail ogject
      $mailer = JFactory::getMailer();

      // Set JMail object params------------------------------------------------
      $mailer->setSubject($subject);
      // $mailer->setSender($sender);
      $mailer->addRecipient($recipient);

      // Get the mail message body
      require JModuleHelper::getLayoutPath('mod_jcallback','default_email_message');

      $mailer->isHTML(true);
      $mailer->Encoding = 'base64';
      $mailer->setBody($body);
      $mailer->Send();

      // The mail sending errors will be shown in the Joomla Warning Message from JMail object..
    }
}
