# Tsugi-Parent Panther QA Test Suite

This directory contains browser automation tests using Symfony Panther for testing the tsugi-parent application.

## ⚠️ Security

**Tests are protected from web access** to prevent unauthorized execution:
- `.htaccess` blocks all web access to `/tests` directory
- Tests can only run from command line (CLI) or localhost
- **Safe to deploy** - tests won't run via web URLs on production servers

See `SECURITY.md` for details.

## Setup

1. Install dependencies (if not already installed):
```bash
cd /Users/csev/htdocs/tsugi-parent/tests
composer install
```

2. Install ChromeDriver (required for browser automation):
```bash
cd /Users/csev/htdocs/tsugi-parent
mkdir -p tests/drivers
./tests/vendor/bin/bdi detect tests/drivers
```
This will install ChromeDriver to `tests/drivers/chromedriver`.

3. Make sure Chrome/Chromium is installed on your Mac:
```bash
# Check if Chrome is installed
which google-chrome-stable || which chromium || which chromium-browser || which google-chrome
```

4. Enable test user login in `tsugi/config.php`:
   ```php
   $CFG->setExtension('qa_allow_test_users', true);
   ```
   This allows the test suite to create test users for automated testing.

5. Ensure your local server is running at `http://localhost:8888/tsugi-parent/`

## Running Tests

### Run a single test:
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/SmokeTest.php
```

### Watch tests run (see browser window):
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/SmokeTest.php --watch
# or use the convenience script:
./tests/run-watch.sh
```

### Run all tests:
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/run-all.php
```

### Run specific test suite:
```bash
php tests/LessonsTests/LessonsTest.php
php tests/AdminTests/AdminSmokeTest.php
php tests/ToolsTests/PythonAutoTest.php
php tests/ToolsTests/ToolsTestHarnessTest.php
php tests/ToolsTests/AipaperTest.php  # Example: test specific tool
```

**Note**: Mod tools are NOT tested directly. They are tested through the tools test harness at `/tools` which goes to `/tsugi/store/test`. This harness provides built-in test accounts (Jane Instructor, Sue Student, Jane Student) and launches tools via iframes.

### Testing Individual Tools

You can create detailed tests for specific tools (like aipaper). See:
- `tests/ToolsTests/ToolTestTemplate.php` - Template for creating tool tests
- `tests/ToolsTests/AipaperTest.php` - Example test for aipaper tool
- `tests/ToolsTests/HOW_TO_TEST_TOOLS.md` - Guide for testing individual tools

## Watch Mode

Watch mode shows the browser window as tests run, so you can see what's happening in real-time. This is useful for:
- Debugging test failures
- Understanding what the tests are doing
- Verifying visual elements

**Enable watch mode:**
- Add `--watch` flag: `php tests/SmokeTest.php --watch`
- Or use: `./tests/run-watch.sh`
- Or set environment variable: `PANTHER_WATCH=1 php tests/SmokeTest.php`

## Test Structure

```
tests/
├── README.md                    # This file
├── SmokeTest.php               # Quick smoke test - run before commits
├── run-all.php                 # Run all test suites
├── BaseTestCase.php            # Base test class with common utilities
├── LessonsTests/               # Tests for lessons functionality
│   └── LessonsTest.php         # Test lessons rendering and navigation
├── AdminTests/                 # Tests for admin functionality
│   ├── AdminSmokeTest.php      # Test admin interface
│   └── README_ADMIN_TEST.md     # Admin test documentation
├── ToolsTests/                  # Tests for tools in /tools folder
│   ├── PythonAutoTest.php      # Test pythonauto tool
│   ├── PythonDataTest.php      # Test python-data tool
│   ├── SqlIntroTest.php        # Test sql-intro tool
│   └── ToolsTestHarnessTest.php # Test the tools test harness (/tools -> /tsugi/store/test)
│                                 # This harness tests ALL tools including mod tools
│                                 # Uses built-in accounts: Jane Instructor, Sue Student, Jane Student
```

## Test Organization

### Smoke Tests
Quick tests that verify basic functionality is working. Run these before every commit.

### Lessons Tests
Tests for lessons functionality:
- Lessons rendering (with and without items array)
- Navigation between modules
- Progress badges
- LTI launches
- Discussions

### Admin Tests
Tests for admin interface:
- Admin login and authentication
- Admin UI navigation
- Admin modal popups

### Tools Tests
Tests for individual tools in `/tools`:
- Tool launches
- Exercise submission
- Grade recording
- Settings pages

### Mod Tests
Tests for tools in `/mod`:
- Peer grading workflows
- Other mod tool functionality

## Writing New Tests

1. Extend `BaseTestCase`:
```php
<?php
require_once __DIR__ . '/BaseTestCase.php';

class MyTest extends BaseTestCase {
    public function testSomething() {
        $client = $this->getPantherClient();
        $crawler = $client->request('GET', $this->baseUrl . '/my-page');
        // Your assertions here
    }
}
```

2. Use helper methods from `BaseTestCase`:
- `getPantherClient()` - Get configured Panther client
- `loginAsInstructor()` - Login as instructor
- `loginAsStudent()` - Login as student
- `waitForElement()` - Wait for element to appear

## CI Integration

These tests can be integrated into CI/CD pipelines. Make sure:
- Chrome/Chromium is available in CI environment
- Xvfb or similar is set up for headless browser testing
- Base URL is configurable via environment variable
