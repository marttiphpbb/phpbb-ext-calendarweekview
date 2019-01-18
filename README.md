# phpBB Extension - marttiphpbb Calendar Week View

[Topic on phpbb.com](https://www.phpbb.com/community/viewtopic.php?f=456&t=)

## Description

This phpBB extension provides a Calendar Week View page for the [Calendar extension set](https://github.com/marttiphpbb/phpbb-ext-calendarmono/blob/master/doc/calendar-set.md)

## Screenshot

![Calendar page](doc/calendar.png)

## Requirements

* phpBB 3.2.1+
* PHP 7.1+
* phpBB extension [Menu Items](https://github.com/marttiphpbb/phpbb-ext-menuitems)
* phpBB extension [Calendar Tag](https://github.com/marttiphpbb/phpbb-ext-calendartag)
* phpBB extension [Calendar Mono](https://github.com/marttiphpbb/phpbb-ext-calendarmono)
* PHP calendar extension (PHP compiled with --enable-calendar)

When it's not possible for you to have PHP compiled with --enable-calendar see the [PHP Ext Calendar extension](https://github.com/marttiphpbb/phpbb-ext-phpextcalendar) for a solution.

## Quick Install

You can install this on the latest release of phpBB 3.2 by following the steps below:

* Create `marttiphpbb/calendarweekview` in the `ext` directory.
* Download and unpack the repository into `ext/marttiphpbb/calendarweekview`
* Enable `Calendar Week View` in the ACP at `Customise -> Manage extensions`.

## Uninstall

* Disable `Calendar Week View` in the ACP at `Customise -> Extension Management -> Extensions`.
* To permanently uninstall, click `Delete Data`. Optionally delete the `/ext/marttiphpbb/calendarweekview` directory.

## Support

* Report bugs and other issues to the [Issue Tracker](https://github.com/marttiphpbb/phpbb-ext-calendarweekview/issues).

## License

[GPL-2.0](license.txt)

## More Screenshots

### Menu Link

![Menu Link](doc/menu_link.png)

### ACP: Links

![ACP Links](doc/acp_links.png)

### ACP: Page Rendering

![ACP Page Rendering](doc/acp_page.png)