<?php
/**
* phpBB Extension - marttiphpbb calendarweekview
* @copyright (c) 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarweekview\event;

use phpbb\controller\helper;
use phpbb\event\data as event;
use phpbb\auth\auth;
use marttiphpbb\calendarweekview\service\user_today;
use marttiphpbb\calendarweekview\util\cnst;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class menu_listener implements EventSubscriberInterface
{
	protected $helper;
	protected $user_today;
	protected $auth;

	public function __construct(
		helper $helper,
		user_today $user_today,
		auth $auth
	)
	{
		$this->helper = $helper;
		$this->user_today = $user_today;
		$this->auth = $auth;
	}

	static public function getSubscribedEvents()
	{
		return [
			'marttiphpbb.menuitems.add_items'	=> 'add_items',
		];
	}

	public function add_items(event $event)
	{
		$items = $event['items'];

		if (!count($this->auth->acl_getf('f_read')))
		{
			return;
		}

		$now = $this->user_today->get_date();

		$link = $this->helper->route('marttiphpbb_calendarweekview_page_controller', [
			'year'	=> $now['year'],
			'month'	=> $now['mon'],
		]);

		$items[cnst::FOLDER]['links'] = [
			'link'		=> $link,
			'include'	=> cnst::TPL . 'include/menu_item.html',
		];

		$event['items'] = $items;
	}
}