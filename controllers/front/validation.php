<?php
/**
 * 2007-2014 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 *         DISCLAIMER   *
 * ***************************************
 * Do not edit or add to this file if you wish to upgrade Prestashop to newer
 * versions in the future.
 * ****************************************************
 *
 * @category	Belvg
 * @package	Belvg_Twocheckout
 * @author    Alexander Simonchik <support@belvg.com>
 * @copyright Copyright (c) 2010 - 2014 BelVG LLC. (http://www.belvg.com)
 * @license   http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt
 */

class BrinkscheckoutValidationModuleFrontController extends ModuleFrontController
{
	public function __construct()
	{
		parent::__construct();

		$this->context = Context::getContext();
	}

	public function initContent()
	{
		$twocheckout = new Brinkscheckout();
		if ($twocheckout->active && Tools::isSubmit('token'))
			$twocheckout->processPayment(Tools::getValue('token'));
		else
			die($twocheckout->l('You must submit a valid token to use the Brink\'s Payment API.'));
	}
}

