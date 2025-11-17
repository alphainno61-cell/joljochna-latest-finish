<?php
/**
 * Database Connection Diagnostic & Fix Script
 * Upload this to your server root and run via browser: https://yourdomain.com/fix-database-connection.php
 * DELETE this file after fixing the issue for security!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><title>Database Connection Fix - Joljochna</title>";
echo "<style>body{font-family:Arial;padding:20px;background:#f5f5f5}";
echo ".success{color:green;font-weight:bold}.error{color:red;font-weight:bold}";
echo ".info{background:#e3f2fd;padding:10px;margin:10px 0;border-left:4px solid #2196F3}";
echo ".warning{background:#fff3cd;padding:10px;margin:10px 0;border-left:4px solid #ffc107}";
echo "pre{background:#263238;color:#aed581;padding:15px;overflow:auto}</style></head><body>";

echo "<h1>🔧 Joljochna Database Connection Diagnostic</h1>";
echo "<hr>";

// Step 1: Check if .env file exists
echo "<h2>Step 1: Checking .env file</h2>";
$envFile = __DIR__ . '/.env';
if (!file_exists($envFile)) {
    echo "<p class='error'>❌ .env file not found!</p>";
    echo "<p class='info'>Please copy .env.production to .env and configure it.</p>";
    exit;
} else {
    echo "<p class='success'>✅ .env file found</p>";
}

// Step 2: Read database configuration
echo "<h2>Step 2: Reading Database Configuration</h2>";
$envContent = file_get_contents($envFile);
preg_match('/DB_HOST=(.*)/', $envContent, $hostMatch);
preg_match('/DB_PORT=(.*)/', $envContent, $portMatch);
preg_match('/DB_DATABASE=(.*)/', $envContent, $dbMatch);
preg_match('/DB_USERNAME=(.*)/', $envContent, $userMatch);
preg_match('/DB_PASSWORD=(.*)/', $envContent, $passMatch);

$host = isset($hostMatch[1]) ? trim($hostMatch[1]) : 'not set';
$port = isset($portMatch[1]) ? trim($portMatch[1]) : '3306';
$database = isset($dbMatch[1]) ? trim($dbMatch[1]) : 'not set';
$username = isset($userMatch[1]) ? trim($userMatch[1]) : 'not set';
$password = isset($passMatch[1]) ? trim($passMatch[1]) : '';

echo "<pre>";
echo "DB_HOST     = $host\n";
echo "DB_PORT     = $port\n";
echo "DB_DATABASE = $database\n";
echo "DB_USERNAME = $username\n";
echo "DB_PASSWORD = " . (empty($password) ? '(empty)' : '(set)') . "\n";
echo "</pre>";

// Step 3: Test MySQL connection with current credentials
echo "<h2>Step 3: Testing MySQL Connection</h2>";

$testHosts = [$host];
if ($host === 'localhost') {
    $testHosts[] = '127.0.0.1';
} elseif ($host === '127.0.0.1') {
    $testHosts[] = 'localhost';
}

$connected = false;
$workingHost = '';
$connection = null;

foreach ($testHosts as $testHost) {
    echo "<p>Testing connection to: <strong>$testHost</strong>...</p>";
    
    try {
        $dsn = "mysql:host=$testHost;port=$port;charset=utf8mb4";
        $connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        
        echo "<p class='success'>✅ Connection successful to $testHost!</p>";
        $connected = true;
        $workingHost = $testHost;
        break;
    } catch (PDOException $e) {
        echo "<p class='error'>❌ Failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

if (!$connected) {
    echo "<div class='warning'>";
    echo "<h3>⚠️ Cannot connect to MySQL server</h3>";
    echo "<p><strong>Possible solutions:</strong></p>";
    echo "<ol>";
    echo "<li>Verify database credentials with your hosting provider</li>";
    echo "<li>Check if MySQL service is running</li>";
    echo "<li>Try these common hosts in .env:<br>";
    echo "   - <code>DB_HOST=localhost</code><br>";
    echo "   - <code>DB_HOST=127.0.0.1</code><br>";
    echo "   - <code>DB_HOST=/var/lib/mysql/mysql.sock</code></li>";
    echo "<li>Contact your hosting support for correct DB_HOST value</li>";
    echo "</ol>";
    echo "</div>";
    exit;
}

// Step 4: Check if database exists
echo "<h2>Step 4: Checking Database</h2>";
try {
    $stmt = $connection->query("SHOW DATABASES LIKE '$database'");
    $dbExists = $stmt->fetch();
    
    if ($dbExists) {
        echo "<p class='success'>✅ Database '$database' exists</p>";
        
        // Select the database
        $connection->exec("USE `$database`");
        
        // Check tables
        $stmt = $connection->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $tableCount = count($tables);
        
        echo "<p class='success'>✅ Found $tableCount tables in database</p>";
        
        if ($tableCount === 19) {
            echo "<p class='success'>✅ Correct number of tables (19) - Database properly imported!</p>";
        } elseif ($tableCount === 0) {
            echo "<p class='error'>❌ No tables found - Database needs to be imported!</p>";
            echo "<p class='info'>Import file: database/finaljoljochna_production.sql via phpMyAdmin</p>";
        } else {
            echo "<p class='warning'>⚠️ Expected 19 tables but found $tableCount</p>";
        }
        
        // Check users table
        if (in_array('users', $tables)) {
            $stmt = $connection->query("SELECT COUNT(*) as count FROM users");
            $result = $stmt->fetch();
            echo "<p class='success'>✅ Users table exists with {$result['count']} user(s)</p>";
        }
        
    } else {
        echo "<p class='error'>❌ Database '$database' does not exist!</p>";
        echo "<p class='info'>Create database in cPanel and import: database/finaljoljochna_production.sql</p>";
    }
} catch (PDOException $e) {
    echo "<p class='error'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Step 5: Generate fix instructions
echo "<h2>Step 5: Fix Instructions</h2>";

if ($workingHost !== $host) {
    echo "<div class='warning'>";
    echo "<h3>⚠️ Configuration Update Needed</h3>";
    echo "<p>Your .env file uses: <code>DB_HOST=$host</code></p>";
    echo "<p>But connection works with: <code>DB_HOST=$workingHost</code></p>";
    echo "<p><strong>Update your .env file:</strong></p>";
    echo "<pre>DB_HOST=$workingHost</pre>";
    echo "</div>";
}

echo "<div class='info'>";
echo "<h3>✅ Next Steps</h3>";
echo "<ol>";
echo "<li>If database host needs updating, edit .env file</li>";
echo "<li>Run these commands on server:<br><pre>";
echo "php artisan config:clear\n";
echo "php artisan cache:clear\n";
echo "php artisan config:cache\n";
echo "</pre></li>";
echo "<li>Test your site: <a href='/'>Homepage</a> | <a href='/admin/login'>Admin Panel</a></li>";
echo "<li><strong>DELETE this file (fix-database-connection.php) for security!</strong></li>";
echo "</ol>";
echo "</div>";

// Step 6: Laravel cache clear (if possible)
echo "<h2>Step 6: Clearing Laravel Cache</h2>";
if (file_exists(__DIR__ . '/artisan')) {
    echo "<p>Running Laravel commands...</p>";
    echo "<pre>";
    
    $commands = [
        'config:clear' => 'Clearing config cache',
        'cache:clear' => 'Clearing application cache',
        'config:cache' => 'Caching configuration',
    ];
    
    foreach ($commands as $cmd => $desc) {
        echo "$desc...\n";
        $output = shell_exec("cd " . __DIR__ . " && php artisan $cmd 2>&1");
        echo $output . "\n";
    }
    
    echo "</pre>";
    echo "<p class='success'>✅ Cache cleared successfully</p>";
} else {
    echo "<p class='warning'>⚠️ artisan file not found - clear cache manually</p>";
}

echo "<hr>";
echo "<h2>🎉 Diagnostic Complete!</h2>";
echo "<p><strong style='color:red'>IMPORTANT: Delete this file now for security!</strong></p>";
echo "<p>File location: " . __FILE__ . "</p>";

echo "</body></html>";
?>

