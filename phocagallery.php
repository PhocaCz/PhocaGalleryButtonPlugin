<?php
/* @package Joomla
 * @copyright Copyright (C) Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @extension Phoca Extension
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\Object\CMSObject;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Session\Session;

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgButtonPhocaGallery extends CMSPlugin
{

    protected $autoloadLanguage = true;

	function onDisplay($name) {

		$app = JFactory::getApplication();

		$document = JFactory::getDocument();
		$template = $app->getTemplate();

		$enableFrontend = $this->params->get('enable_frontend', 0);


        $link = 'index.php?option=com_phocagallery&amp;view=phocagallerylinks&amp;tmpl=component&amp;layout=modal&amp;'
                . Session::getFormToken() . '=1&amp;editor='.$name;


		$button = new CMSObject();
        $button->modal   = true;
        $button->link    = $link;
        $button->text    = Text::_('PLG_EDITORS-XTD_PHOCAGALLERY_IMAGE');
        $button->name    = $this->_type . '_' . $this->_name;
        $button->icon    = 'image';
        $button->iconSVG = '<svg version="1.1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
 <path d="m48-1.9e-5h416a48 48 45 0 1 48 48v416a48 48 135 0 1-48 48h-416a48 48 45 0 1-48-48v-416a48 48 135 0 1 48-48zm45.814 95.514h276.43c26.51 0 53.212-0.01108 57.047 3.8255l3.7647 9.0474v247.23c0 26.51 0.0622 53.22-3.7647 57.048l-9.0474 3.7646h-324.43c-3.5218 0-6.5579-1.2747-9.0474-3.7646-2.4896-2.4897-3.8254-5.5256-3.8254-9.0475v-295.23c0-3.5218 1.3359-6.558 3.8254-9.0474 2.4896-2.5504 5.5256-3.8255 9.0474-3.8255zm16.334 29.207v215.01l33.439-24.65a82.875 82.875 173.68 0 1 82.568-9.1406 17.713 17.713 132.5 0 0 22.425-24.472 43.769 43.769 130.07 0 1 31.506-37.454l20.442-22.184a41.718 41.718 1.6648 0 1 62.948 1.8295l8.0143 9.7811a17.153 17.153 160.34 0 0 30.422-10.872v-49.852a48 48 45 0 0-48-48zm42.869 45.176c11.756-11.662 43.704-11.64 55.438 0l11.416 27.567c-11.416 27.689-11.416 27.689-11.416 27.689l-27.689 11.598-27.75-11.598-11.355-27.689c0-10.809 3.7647-19.977 11.355-27.567" fill="#942133" fill-rule="evenodd"/>
</svg>';

        $button->options = [
        'height' => '300px',
        'width'  => '800px',
        'bodyHeight'  => '70',
        'modalWidth'  => '80',
        ];

		if ($enableFrontend == 0) {
            if (!$app->isClient('administrator')) {
				$button = null;
			}
		}

		return $button;
	}
}
