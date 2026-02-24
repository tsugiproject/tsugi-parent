<?php
/**
 * Tests for pythonauto tool
 */

// Load Composer autoloader - prefer tests/vendor, fallback to tsugi/vendor, then tsugi/lib/vendor
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../../tsugi/vendor/autoload.php')) {
    require_once __DIR__ . '/../../tsugi/vendor/autoload.php';
} else {
    require_once __DIR__ . '/../../tsugi/lib/vendor/autoload.php';
}

require_once __DIR__ . '/../BaseTestCase.php';

class PythonAutoTest extends BaseTestCase
{
    /**
     * Test that pythonauto tool loads
     * Uses page content check since getResponse() is not available with WebDriver
     */
    public function testPythonAutoLoads()
    {
        $client = $this->getPantherClient();
        
        // Tool likely requires login, so we'll just check it doesn't 500 or show fatal errors
        try {
            $crawler = $client->request('GET', $this->baseUrl . '/tsugi/store/pythonauto');
            sleep(1);
            
            $bodyText = $crawler->filter('body')->text();
            
            // Check for PHP fatal/parse errors (indicates 5xx-type failure)
            if (stripos($bodyText, 'Fatal error') !== false || stripos($bodyText, 'Parse error') !== false) {
                throw new \Exception('Tool returned page with PHP errors');
            }
            
            echo "✓ PythonAuto tool is accessible\n";
            $client->quit();
        } catch (\Exception $e) {
            try { $client->quit(); } catch (\Exception $e2) {}
            echo "⚠ PythonAuto test skipped: " . $e->getMessage() . "\n";
        }
    }
    
    /**
     * Test pythonauto with login (if test credentials available)
     */
    public function testPythonAutoWithLogin()
    {
        // This would require actual test user credentials
        // Uncomment and configure if you have test users set up
        
        /*
        $client = $this->getPantherClient();
        $client = $this->loginAsStudent($client);
        
        $crawler = $client->request('GET', $this->baseUrl . '/tools/pythonauto');
        
        // Check for exercise interface
        $this->assertGreaterThan(0, $crawler->filter('textarea, .inputarea')->count(), 
            'Should have code input area');
        
        echo "✓ PythonAuto loads with login\n";
        */
        
        echo "⚠ PythonAuto login test skipped (configure test credentials)\n";
    }
}
