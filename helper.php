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
      if(JRequest::getVar('name'))
        self::sendMail($params);
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
      $sender = $params->get('sender');
      $recipient = $params->get('recipient');
      $subject = $params->get('subject');

      // Getting the site name
      $sitename = JFactory::getApplication()->get('sitename');

      // Getting user form data-------------------------------------------------
      // Getting name from form
      $name = JRequest::getVar('name');
      // Getting phone frome form
      $phone =  JRequest::getVar('phone');
      // Getting e-mail from form
      $email = JRequest::getVar('email');
      // Getting message from form
      $message = JRequest::getVar('message', 'Ленивые человеки не пишут сообщеньки.');

      // Get the JMail ogject
      $mailer = JFactory::getMailer();

      // Set JMail object params------------------------------------------------
      $mailer->setSubject($subject);
      // $mailer->setSender($sender);
      $mailer->addRecipient($recipient);

      // Set the message body
      $email = $email ? "<b>User e-mail:</b> $email" : "";
      $message = $message ? "<b>User message:</b> $message" : "";
      $body   = '<h2 style="text-align: center;">'.$subject .' '. ($sitename).'</h2>'
        . '<b>User:</b> '. $name . '</br>'
        . '<b>User phone:</b> ' . $phone . '</br>'
        . "$email </br>"
        . "$message";

      $mailer->isHTML(true);
      $mailer->Encoding = 'base64';
      $mailer->setBody($body);
      $mailer->Send();

      // The mail sending errors will be shown in the Joomla Warning Message from JMail object..
    }
}
