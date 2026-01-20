# Quick Start Guide - Tsugi-Parent Panther Tests

## Prerequisites

1. **Chrome/Chromium installed** on your Mac
   ```bash
   # Check if installed
   which google-chrome-stable || which chromium || which chromium-browser || which google-chrome
   ```

2. **Composer dependencies installed**
   ```bash
   cd /Users/csev/htdocs/tsugi-parent/tests
   composer install
   ```

3. **ChromeDriver installed** (for browser automation)
   ```bash
   cd /Users/csev/htdocs/tsugi-parent
   mkdir -p tests/drivers
   ./tests/vendor/bin/bdi detect tests/drivers
   ```
   This will install ChromeDriver to `tests/drivers/chromedriver`

4. **Enable test user login** in `tsugi/config.php`:
   ```php
   $CFG->setExtension('qa_allow_test_users', true);
   ```

5. **Local server running**
   - Make sure your server is running at `http://localhost:8888/tsugi-parent/`
   - Test it in your browser first

## Running Your First Test

### Option 1: Run the smoke test directly
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/SmokeTest.php
```

### Option 2: Watch tests run (see browser window!)
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/SmokeTest.php --watch
# or use the convenience script:
./tests/run-watch.sh
```

### Option 3: Use the shell script
```bash
cd /Users/csev/htdocs/tsugi-parent
./tests/run-smoke.sh
# or with watch mode:
./tests/run-smoke.sh --watch
```

### Option 4: Run all tests
```bash
cd /Users/csev/htdocs/tsugi-parent
php tests/run-all.php
```

## What the Smoke Test Does

The smoke test (`SmokeTest.php`) quickly verifies:

1. ✓ Homepage loads without errors
2. ✓ Lessons page loads
3. ✓ A specific lesson module loads
4. ✓ Tools test harness is accessible (`/tools` → `/tsugi/store/test`)

**Note**: Mod tools are NOT tested directly via `/mod` URLs. Instead, they are tested through the tools test harness which provides built-in test accounts and launches tools via iframes.

**Expected output:**
```
=== Running Tsugi-Parent Smoke Tests ===

✓ Homepage loads successfully
✓ Lessons page loads successfully
✓ Lesson module loads successfully
✓ Tools directory is accessible
✓ Mod directory is accessible

✓ All smoke tests passed!
```

## Troubleshooting

### "Class not found" errors
Make sure you've installed composer dependencies:
```bash
cd /Users/csev/htdocs/tsugi-parent/tests
composer install
```

### "Connection refused" errors
- Make sure ChromeDriver is running (Panther starts it automatically)
- Check that your server is running at `http://localhost:8888/tsugi-parent/`

### Tests fail with 404 errors
- Verify the base URL in `BaseTestCase.php` matches your setup
- Check that the paths exist (e.g., `/tsugi/lms/lessons`)

### Chrome/Chromium not found
Install Chrome or Chromium, or update the browser path in `BaseTestCase.php`

## Next Steps

1. **Run smoke test before commits**: `php tests/SmokeTest.php`
2. **Add more tests**: See `TEST_OUTLINE.md` for test structure
3. **Customize tests**: Edit test files to match your specific needs
4. **Add test users**: Configure login credentials in `BaseTestCase.php` if needed

## Test Structure

```
tests/
├── SmokeTest.php          # Quick smoke test (run this!)
├── BaseTestCase.php       # Base class with utilities
├── run-all.php            # Run all test suites
├── LessonsTests/          # Lessons tests
├── AdminTests/            # Admin tests
├── ToolsTests/            # Tools folder tests
└── ModTests/              # Mod folder tests
```

## Before Committing

Always run the smoke test:
```bash
php tests/SmokeTest.php
```

If it passes, you're good to commit! 🎉
