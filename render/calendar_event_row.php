<?php

/**
* phpBB Extension - marttiphpbb calendarinlineview
* @copyright (c) 2019 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarinlineview\render;

use marttiphpbb\calendarinlineview\value\dayspan;
use marttiphpbb\calendarinlineview\value\calendar_event;

class calendar_event_row
{
	protected $segments = [];

	public function __construct()
	{
		$this->segments[] = new dayspan(1, 5373484);
	}

	public function get_free_segment_index(calendar_event $calendar_event):?int
	{
		$index = count($this->segments) - 1;

		while($s = $this->segments[$index])
		{
			if ($s instanceof calendar_event && $s->overlaps($calendar_event))
			{
				return null;
			}
			else if ($s instanceof dayspan && $s->contains($calendar_event))
			{
				return $index;
			}

			$index--;
		}

		return null;
	}

	public function insert(int $index, calendar_event $calendar_event):void
	{
		$dayspan = $this->segments[$index];
		$replace = [];

		if(!$dayspan->has_same_start($calendar_event))
		{
			$replace[] = new dayspan($dayspan->get_start_jd(), $calendar_event->get_first_jd_before());
		}

		$replace[] = $calendar_event;

		if(!$dayspan->has_same_end($calendar_event))
		{
			$replace[] = new dayspan($calendar_event->get_first_jd_after(), $dayspan->get_end_jd());
		}

		array_splice($this->segments, $index, 1, $replace);
	}

	public function get_segments(dayspan $dayspan):array
	{
		$return_ary = [];

		foreach ($this->segments as $index => $segment)
		{
			if ($segment->overlaps($dayspan))
			{
				$return_ary[$index] = $segment;
			}
		}

		return $return_ary;
	}
}
