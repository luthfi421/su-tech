<?php
/**
 * Script dump database sutech ke file SQL.
 * Dijalankan: php database/dump_sutech.php
 */

$host = '127.0.0.1';
$port = 3306;
$dbname = 'sutech';
$user = 'root';
$pass = '';

try {
    $p = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (Throwable $e) {
    fwrite(STDERR, "KONEKSI GAGAL: " . $e->getMessage() . "\n");
    fwrite(STDERR, "Pastikan MySQL/MariaDB berjalan (XAMPP: start MySQL).\n");
    exit(1);
}

$out = [];
$out[] = '-- ============================================================';
$out[] = '-- Smart Umrah - Database Dump';
$out[] = '-- Database: ' . $dbname;
$out[] = '-- Generated: ' . date('Y-m-d H:i:s');
$out[] = '-- Server: MariaDB ' . $p->getAttribute(PDO::ATTR_SERVER_VERSION);
$out[] = '-- ============================================================';
$out[] = '';
$out[] = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";';
$out[] = 'SET time_zone = "+00:00";';
$out[] = 'SET FOREIGN_KEY_CHECKS = 0;';
$out[] = 'SET NAMES utf8mb4;';
$out[] = '';

$tables = $p->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

foreach ($tables as $t) {
    $out[] = '-- ------------------------------------------------------------';
    $out[] = '-- Table structure for: `' . $t . '`';
    $out[] = '-- ------------------------------------------------------------';
    $out[] = 'DROP TABLE IF EXISTS `' . $t . '`;';

    $create = $p->query('SHOW CREATE TABLE `' . $t . '`')->fetch(PDO::FETCH_ASSOC);
    $out[] = $create['Create Table'] . ';';
    $out[] = '';

    // Data
    $count = (int) $p->query('SELECT COUNT(*) FROM `' . $t . '`')->fetchColumn();
    if ($count > 0) {
        $out[] = '-- Dumping data for table `' . $t . '` (' . $count . ' rows)';
        $rows = $p->query('SELECT * FROM `' . $t . '`')->fetchAll(PDO::FETCH_ASSOC);
        $cols = array_keys($rows[0]);
        $colList = '`' . implode('`,`', $cols) . '`';

        foreach ($rows as $r) {
            $vals = [];
            foreach (array_values($r) as $v) {
                $vals[] = $v === null ? 'NULL' : $p->quote((string) $v);
            }
            $out[] = 'INSERT INTO `' . $t . '` (' . $colList . ') VALUES (' . implode(',', $vals) . ');';
        }
        $out[] = '';
    }
}

$out[] = 'SET FOREIGN_KEY_CHECKS = 1;';
$out[] = '';
$out[] = '-- End of dump';

$content = implode("\n", $out);
file_put_contents('database/sutech.sql', $content);

fwrite(STDOUT, "DUMP OK\n");
fwrite(STDOUT, "File: database/sutech.sql\n");
fwrite(STDOUT, "Size: " . filesize('database/sutech.sql') . " bytes\n");
fwrite(STDOUT, "Lines: " . count($out) . "\n");
fwrite(STDOUT, "Tables (" . count($tables) . "): " . implode(', ', $tables) . "\n");
