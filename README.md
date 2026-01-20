
Tsugi Parent Site
=================

In general, a Tsugi store and apps will be installed at the <code>/tsugi</code>
path, leaving the root path
to be a web site where the store owner can put up any site they like with documentation,
instructions, etc.  The Tsugi parent site can use any technology but the two most
common approaches are static HTML possibly mixed in with PHP.

You can see this in action by comparing
<a href="https://www.tsugicloud.org" target="_blank">https://www.tsugicloud.org</a>
(a static html site)
with
<a href="https://www.tsugicloud.org/tsugi" target="_blank">https://www.tsugicloud.org/tsugi</a>
(a tsugi store).

One strategy is just put a page in that does not even link to Tsugi at all.  Simply introduce
the user to how your local app store is used.   As an example you could install your Tsugi store
into your LMS using Content-Item / Deep-Linking for everyone and this page is
merely documentation.  You could even make the top page a single redirect to a
completely different web page and host this parent site using any technology you like.

Instructions for Installing a Tsugi Server Environment
------------------------------------------------------

To install a Tsugi - see the following repositories

* Installing Tsugi on Docker, ubuntu or Amazon EC2 [link](https://github.com/tsugiproject/tsugi-build)

Links into Tsugi
----------------

If you want this to be a site (like TsugiCloud) that allows login, and encourages
folks to login and apply for keys, or look at the cool tools on your site,
you will need to embed various links into Tsugi in the parent web site.

* <a href="/tsugi">/tsugi</a> Will link to the top page in Tsugi.

* <a href="/tsugi/store">/tsugi/store</a> Will link to app store in Tsugi.

* <a href="/tsugi/admin">/tsugi/admin</a> Will link to the admin page in Tsugi.
You may decide not to expose this link to end users and just share it with your administrators.

* <a href="/tsugi/login">/tsugi/login</a> Will link to the Tsugi login page (assuming Google login is setup).

* <a href="/tsugi/logout">/tsugi/logout</a> Will log the user out.

These pages will have a links at the top and the left most navigation should link back to this
page.  This is set in the <code>tsugi/config.php</code> file.

    $CFG->servicename = 'MyStore';
    $CFG->apphome = 'https://www.mystore.edu';

You can see this in action on
<a href="https://www.tsugicloud.org/tsugi/store/" target="_blank">tsugicloud.org</a> - the
text and destination of the upper left link go back to the parent site.  The <code>apphome</code>
value does not have to be on the same web server as <code>/tsugi</code>.

When you first go to the <code>/tsugi</code> page, you will not see an "Admin" link.  The link
is hidden by default until you manually navigate to <a href="/tsugi/admin">/tsugi/admin</a>
and enter the login password successfully.  At that point, Tsugi sets a cookie and your browser
starts seeing the "Admin" link.   This is to keep from showing 99.9% of your users an Admin link
they cannot use on every screen.  Is the Tsugi site is in "DEVELOPER" mode
(for developers on their desktop), the Admin link appears all the time.

Making a Koseu Site
-------------------

With some work, you can turn this parent site into a standalone LMS using Koseu.
Koseu is a Tsugi-based LMS/MOOC platform that is used to build the content and site for:

* <a href="https://www.py4e.com/" target="_blank">Python For Everybody</a>
* <a href="https://www.wd4e.com/" target="_blank">Web Design For Everybody</a>
* <a href="https://www.dj4e.com/" target="_blank">Django For Everybody</a>
* <a href="https://openochem.org/" target="_blank">Open Organic Chemistry</a>
* <a href="https://www.wa4e.com/" target="_blank">Web Applications For Everybody</a>

Please join the <a href="https://www.tsugi.org/" target="_new">Tsugi Developers List</a> if you
are interested in building a Koseu site.

Hosting Tsugi
-------------

Instructions for hosting your own Tsugi server are available at:

* <a href="https://github.com/tsugiproject/tsugi-build" target="_blank">Tsugi Hosting Instructions</a>

You can use Tsugi tools for free at:

* <a href="https://www.tsugicloud.org/" target="_blank">TsugiCloud</a>

You can get commercial support for Tsugi at

* <a href="https://www.learnxp.com/" target="_blank">Learning Experiences</a>

Testing
-------

This project includes a comprehensive browser automation test suite using Symfony Panther. 
The tests are located in the `tests/` directory.

### Quick Start

Run a quick smoke test to verify basic functionality:
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/SmokeTest.php
```

Run all tests:
```bash
php tests/run-all.php
```

Run tests in watch mode (shows browser window):
```bash
php tests/SmokeTest.php --watch
# or use the convenience script:
./tests/run-watch.sh
```

Run specific test suites:
```bash
php tests/LessonsTests/LessonsTest.php
php tests/AdminTests/AdminSmokeTest.php  # Note: Requires Google OAuth to be disabled
php tests/ToolsTests/PythonAutoTest.php
php tests/ToolsTests/AllToolsSmokeTest.php
```

### Setup

Before running tests, ensure:
1. Dependencies are installed: `cd tests && composer install`
2. ChromeDriver is installed (required for browser automation):
   ```bash
   cd /Users/csev/htdocs/tsugi-parent
   mkdir -p tests/drivers
   ./tests/vendor/bin/bdi detect tests/drivers
   ```
   This installs ChromeDriver to `tests/drivers/chromedriver`.
3. Chrome/Chromium is installed on your system
4. Enable test user login in `tsugi/config.php`:
   ```php
   $CFG->setExtension('qa_allow_test_users', true);
   ```
   This allows the test suite to create test users for automated testing.
5. **For admin tests**: 
   - Set the admin password in `tsugi/config.php`:
     ```php
     $CFG->adminpw = 'short';  // Set your admin password here
     ```
     This is the password used to log into `/tsugi/admin`. The default is `'short'`.
   - Disable Google OAuth login in `tsugi/config.php`:
     ```php
     // Comment out or disable Google OAuth for admin tests
     // $CFG->google_client_id = '...';
     ```
     Admin tests require password-based authentication, not OAuth.
6. Your local server is running (default: `http://localhost:8888`)

For detailed testing documentation, setup instructions, and troubleshooting, see:
* [tests/README.md](tests/README.md) - Complete testing guide
