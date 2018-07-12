<?php

set_error_handler('MyErrorHandler');

ini_set('display_errors', '1');
date_default_timezone_set('Asia/Dhaka');
function MyErrorHandler($errno, $errstr, $errfile, $errline)
{
    if ($errno != E_DEPRECATED && $errno != E_NOTICE)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo $errstr;
    }
}
require_once('./global.php');
//define('CWD', (($getcwd = getcwd()) ? $getcwd : '.'));
//
//// fetch the core includes
//require_once(CWD . '/includes/class_core.php');
//global $vbulletin;
//// initialize the data registry
//$vbulletin = new vB_Registry();
//
//// load the IP data & constants
//$vbulletin->fetch_config();
//
//if (CWD == '.')
//{
//    // getcwd() failed and so we need to be told the full forum path in config.php
//    if (!empty($vbulletin->config['Misc']['forumpath']))
//    {
//        define('DIR', $vbulletin->config['Misc']['forumpath']);
//    }
//    else
//    {
//        trigger_error('<strong>Configuration</strong>: You must insert a value for <strong>forumpath</strong> in config.php', E_USER_ERROR);
//    }
//}
//else
//{
//    define('DIR', CWD);
//}
//
//if (!empty($vbulletin->config['Misc']['datastorepath']))
//{
//    define('DATASTORE', $vbulletin->config['Misc']['datastorepath']);
//}
//else
//{
//    define('DATASTORE', DIR . '/includes/datastore');
//}
//
//if ($vbulletin->debug)
//{
//    restore_error_handler();
//}
//
//$dbtype = strtolower($vbulletin->config['Database']['dbtype']);
//
//// Force MySQL to MySQLi
//if ($dbtype == 'mysql')
//{
//    $dbtype = 'mysqli';
//}
//else if ($dbtype == 'mysql_slave')
//{
//    $dbtype = 'mysqli_slave';
//}
//
////If type is missing, Force MySQLi 
//$dbtype = $dbtype ? $dbtype : 'mysqli';
//
//// #############################################################################
//// Load database class
//switch ($dbtype)
//{
//    // Load standard MySQL class
//    case 'mysql':
//        {
//            if ($vbulletin->debug AND ($vbulletin->input->clean_gpc('r', 'explain', TYPE_UINT) OR (defined('POST_EXPLAIN') AND !empty($_POST))))
//            {
//                // load 'explain' database class
//                require_once(DIR . '/includes/class_database_explain.php');
//                $db = new vB_Database_Explain($vbulletin);
//            }
//            else
//            {
//                $db = new vB_Database($vbulletin);
//            }
//            break;
//        }
//
//    case 'mysql_slave':
//        {
//            require_once(DIR . '/includes/class_database_slave.php');
//            $db = new vB_Database_Slave($vbulletin);
//            break;
//        }
//
//    // Load MySQLi class
//    case 'mysqli':
//        {
//            if ($vbulletin->debug AND ($vbulletin->input->clean_gpc('r', 'explain', TYPE_UINT) OR (defined('POST_EXPLAIN') AND !empty($_POST))))
//            {
//                // load 'explain' database class
//                require_once(DIR . '/includes/class_database_explain.php');
//                $db = new vB_Database_MySQLi_Explain($vbulletin);
//            }
//            else
//            {
//                $db = new vB_Database_MySQLi($vbulletin);
//            }
//            break;
//        }
//
//    case 'mysqli_slave':
//        {
//            require_once(DIR . '/includes/class_database_slave.php');
//            $db = new vB_Database_Slave_MySQLi($vbulletin);
//            break;
//        }
//
//    // Load extended, non MySQL class
//    default:
//        {
//            @include_once(DIR . "/includes/class_database_$dbtype.php");
//            $dbclass = "vB_Database_$dbtype";
//            $db = new $dbclass($vbulletin);
//        }
//}
//
//// get core functions
//if (!empty($db->explain))
//{
//    $db->timer_start('Including Functions.php');
//    require_once(DIR . '/includes/functions.php');
//    $db->timer_stop(false);
//}
//else
//{
//    require_once(DIR . '/includes/functions.php');
//}
//
//// make database connection
//$db->connect(
//    $vbulletin->config['Database']['dbname'],
//    $vbulletin->config['MasterServer']['servername'],
//    $vbulletin->config['MasterServer']['port'],
//    $vbulletin->config['MasterServer']['username'],
//    $vbulletin->config['MasterServer']['password'],
//    $vbulletin->config['MasterServer']['usepconnect'],
//    $vbulletin->config['SlaveServer']['servername'],
//    $vbulletin->config['SlaveServer']['port'],
//    $vbulletin->config['SlaveServer']['username'],
//    $vbulletin->config['SlaveServer']['password'],
//    $vbulletin->config['SlaveServer']['usepconnect'],
//    $vbulletin->config['Mysqli']['ini_file'],
//    (isset($vbulletin->config['Mysqli']['charset']) ? $vbulletin->config['Mysqli']['charset'] : '')
//);
//
//// Allow setting of SQL mode, not generally required
//if (isset($vbulletin->config['Database']['set_sql_mode']))
//{
//    $db->force_sql_mode($vbulletin->config['Database']['set_sql_mode']);
//}
//else
//{
//    $db->force_sql_mode(''); // Force blank mode if none set, avoids Strict Mode issues.
//}
//
//if (defined('DEMO_MODE') AND DEMO_MODE AND function_exists('vbulletin_demo_init_db'))
//{
//    vbulletin_demo_init_db();
//}
//
//// make $db a member of $vbulletin
//$vbulletin->db =& $db;
//
//// #############################################################################
//// fetch options and other data from the datastore
//if (!empty($db->explain))
//{
//    $db->timer_start('Datastore Setup');
//}
//
//$datastore_class = (!empty($vbulletin->config['Datastore']['class'])) ? $vbulletin->config['Datastore']['class'] : 'vB_Datastore';
//
//if ($datastore_class != 'vB_Datastore')
//{
//    require_once(DIR . '/includes/class_datastore.php');
//}
//$vbulletin->datastore = new $datastore_class($vbulletin, $db);
//$vbulletin->datastore->fetch($specialtemplates);

//function get_cache_groups_data()
//{
//    global $lib, $cache;
//    $lib->cache_groups();
//
//    return $cache['groups'];
//}
//
//function get_config_gvc_data()
//{
//    $sql       = 'SELECT variable,`value` from db_prefix_settings where variable IN(\'smiley_sets_default\',\'smileys_dir\',\'smileys_url\',\'avatar_directory\',\'avatar_url\',\'attachmentUploadDir\')';
//    $config    = [];
//    $rowConfig = vb3_pdo::vb3_pdo_query($sql);
//    if (!$rowConfig)
//    {
//        header('HTTP/1.0 404 not found');
//        exit;
//    }
//    foreach ($rowConfig as $v)
//    {
//        $config[$v['variable']] = $v['value'];
//    }
//    $config['boardurl'] = vb3_pdo::$boardurl;
//
//    $result         = ['result' => true, 'data' => []];
//    $result['data'] = $config;
//    $result         = base64_encode(serialize($result));
//    echo $result;
//    exit;
//}

function dirToArray($dir)
{
    $result = [];

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value, [".", ".."]))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            }
            else
            {
                $result[] = $value;
            }
        }
    }

    return $result;
}


class exporttogroups
{
    protected $gvs;

    public function __construct()
    {
        global $vbulletin;

        $this->init_db();

        if (isset($_GET['avatar']))
        {
        }
        elseif (isset($_GET['smiley']))
        {
            // 
        }
        elseif (isset($_GET['attachment']))
        {
            // these passed in vb3\DownloadFiles->DownloadAttachments
            $attachment_id = (int)$_GET['attachment'];
            $time          = (int)$_GET['time'];
            $thumb         = (int)$_GET['thumb'];
echo 111;die;
            $sourceUrl = "http://dbd.tapatest.com/testforum/vb/389/attachment.php?attachmentid=6&d=1531382562";
$f = file_get_contents($sourceUrl);
die;
//            // create a new cURL resource
//            $ch = curl_init();
//            // set referer if photobucket
//            //curl_setopt($ch, CURLOPT_FILE, $fp);
//            //curl_setopt($ch, CURLOPT_HEADER, 0);
//            //curl_exec($ch);
//            //curl_close($ch);
//            if(true)
//            {
//                curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//            }
//            // grab URL and pass it to the browser
//            $out = curl_exec($ch);
//var_dump($out);
//            /* Check for 404 (file not found). */
//            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
            die;
            
            //$attachment_path = $vbulletin->options['bburl'] . '/' . 'attchment.php?attachmentid=' . $attachment_id
            //                   . '&stc=1&thumb=' . $thumb . '&d=' . $time;
            //
            //$this->sendFileToBrowser($attachment_path);
        }
        elseif (isset($_GET['forumicon']))
        {
        }
        elseif (isset($_GET['rankimage']))
        {
        }
        elseif (isset($_GET['avatargallery']))
        {
        }
        elseif (isset($_GET['icon']))
        {
        }
        else
        {
            //if (!isset($_POST['exportkey']) || $_POST['exportkey'] != $exportKey || !isset($_POST['sql']) || empty($_POST['sql']))
            //{
            //    die();
            //}

            $sql = $_REQUEST['sql'];
            if (strpos($sql, 'INSERT') || strpos($sql, 'DELETE') || strpos($sql, 'TRUNCATE') || strpos($sql, 'UPDATE') || strpos($sql, 'DROP'))
            {
                die('Action not allowed');
            }
            if (strpos($sql, 'PHP: ') === 0)
            {
                $result         = ['result' => true, 'data' => []];
                $result['data'] = eval(substr($sql, 5));
                $result         = base64_encode(serialize($result));
            }
            else
            {
                $row                 = vb3_pdo::vb3_pdo_query($sql);
                $sqlResult['data']   = $row;
                $sqlResult['result'] = true;
                $result              = base64_encode(serialize($sqlResult));
            }
            echo $result;
            exit;
        }
    }

    private function init_db()
    {
        //$dbtype = strtolower($this->vbulletin->config['Database']['dbtype']);
        //
        //// Force MySQL to MySQLi
        //if ($dbtype == 'mysql')
        //{
        //    $dbtype = 'mysqli';
        //}
        //else
        //{
        //    if ($dbtype == 'mysql_slave')
        //    {
        //        $dbtype = 'mysqli_slave';
        //    }
        //}
        //
        ////If type is missing, Force MySQLi 
        //$dbtype = $dbtype ? $dbtype : 'mysqli';
        //
        //// Load database class
        //switch ($dbtype)
        //{
        //    // Load standard MySQL class
        //    case 'mysql':
        //        {
        //            if ($this->vbulletin->debug AND ($this->vbulletin->input->clean_gpc('r', 'explain', TYPE_UINT) OR (defined('POST_EXPLAIN') AND !empty($_POST))))
        //            {
        //                // load 'explain' database class
        //                require_once(DIR . '/includes/class_database_explain.php');
        //                $db = new vB_Database_Explain($this->vbulletin);
        //            }
        //            else
        //            {
        //                $db = new vB_Database($this->vbulletin);
        //            }
        //            break;
        //        }
        //
        //    case 'mysql_slave':
        //        {
        //            require_once(DIR . '/includes/class_database_slave.php');
        //            $db = new vB_Database_Slave($this->vbulletin);
        //            break;
        //        }
        //
        //    // Load MySQLi class
        //    case 'mysqli':
        //        {
        //            if ($this->vbulletin->debug AND ($this->vbulletin->input->clean_gpc('r', 'explain', TYPE_UINT) OR (defined('POST_EXPLAIN') AND !empty($_POST))))
        //            {
        //                // load 'explain' database class
        //                require_once(DIR . '/includes/class_database_explain.php');
        //                $db = new vB_Database_MySQLi_Explain($this->vbulletin);
        //            }
        //            else
        //            {
        //                $db = new vB_Database_MySQLi($this->vbulletin);
        //            }
        //            break;
        //        }
        //
        //    case 'mysqli_slave':
        //        {
        //            require_once(DIR . '/includes/class_database_slave.php');
        //            $db = new vB_Database_Slave_MySQLi($this->vbulletin);
        //            break;
        //        }
        //
        //    // Load extended, non MySQL class
        //    default:
        //        {
        //            @include_once(DIR . "/includes/class_database_$dbtype.php");
        //            $dbclass = "vB_Database_$dbtype";
        //            $db      = new $dbclass($this->vbulletin);
        //        }
        //}

        //// get core functions
        //if (!empty($db->explain))
        //{
        //    $db->timer_start('Including Functions.php');
        //    require_once(DIR . '/includes/functions.php');
        //    $db->timer_stop(false);
        //}
        //else
        //{
        //    require_once(DIR . '/includes/functions.php');
        //}

        //// make database connection
        //$db->connect(
        //    $this->vbulletin->config['Database']['dbname'],
        //    $this->vbulletin->config['MasterServer']['servername'],
        //    $this->vbulletin->config['MasterServer']['port'],
        //    $this->vbulletin->config['MasterServer']['username'],
        //    $this->vbulletin->config['MasterServer']['password'],
        //    $this->vbulletin->config['MasterServer']['usepconnect'],
        //    $this->vbulletin->config['SlaveServer']['servername'],
        //    $this->vbulletin->config['SlaveServer']['port'],
        //    $this->vbulletin->config['SlaveServer']['username'],
        //    $this->vbulletin->config['SlaveServer']['password'],
        //    $this->vbulletin->config['SlaveServer']['usepconnect'],
        //    $this->vbulletin->config['Mysqli']['ini_file'],
        //    (isset($this->vbulletin->config['Mysqli']['charset']) ? $this->vbulletin->config['Mysqli']['charset'] : '')
        //);
        //
        //$this->vbulletin->db =& $db;
    }


    public static function outputError($errorCode, $msg, $httpCode = 500)
    {
        header($_SERVER['SERVER_PROTOCOL'] . " $httpCode Internal Server Error", true, $httpCode);
        print_r('error_code: ' . $errorCode . '<br/>');
        print_r($msg);
        exit;
    }


    function sendFileToBrowser($file_path)
    {
        @ob_start();
        $size = @filesize($file_path);
        if ($size)
        {
            header("Content-Length: $size");
        }
        $mime = @mime_content_type($file_path);
        if ($mime)
        {
            header("Content-type: $mime");
        }
        if (@readfile($file_path) == false)
        {
            $fp = @fopen($file_path, 'rb');

            if ($fp !== false)
            {
                while (!feof($fp))
                {
                    echo fread($fp, 8192);
                }
                fclose($fp);
            }
        }

        flush();
        @ob_end_flush();
    }

    function sendImageSpriteToBrowser($file_path, $x, $y, $w, $h)
    {
        $src  = imagecreatefrompng($file_path);
        $dest = imagecreatetruecolor($w, $h);
        imagealphablending($dest, false);
        imagesavealpha($dest, true);
        /* $black = imagecolorallocate($dest, 0, 0, 0);
        imagecolortransparent($dest, $black);*/
        imagecopyresampled($dest, $src, 0, 0, $x * -1, $y * -1, $w, $h, $w, $h);

        // Output and free from memory
        header('Content-Type: image/png');


        imagepng($dest);
        imagedestroy($dest);
        flush();
    }
}


class vb3_pdo
{
    private static $db_prefix;
    public static  $boardurl;
    private static $pdo;

    private static function getPDO()
    {
        global $vbulletin;

        $db_type = strtolower($vbulletin->config['Database']['dbtype']);

        if (self::$pdo == null)
        {
            //self::$boardurl = $boardurl;
            //self::$db_prefix = $db_prefix;
            if (!in_array($db_type, ['mysql', 'mysqli']))
            {
                die('error db_type:' . $db_type);
            }

            $db_server = $vbulletin->config['MasterServer']['servername'];
            $db_name   = $vbulletin->config['Database']['dbname'];
            $db_user   = $vbulletin->config['MasterServer']['username'];
            $db_passwd = $vbulletin->config['MasterServer']['password'];
            $db        = [
                'dsn'      => "mysql:host=$db_server;dbname=$db_name;port=3306;charset=utf8",
                'host'     => $db_server,
                'port'     => '3306',
                'dbname'   => $db_name,
                'username' => $db_user,
                'password' => $db_passwd,
                'charset'  => 'utf8',
            ];
            $options   = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            try
            {
                $pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
            } catch (PDOException $e)
            {
                die('fail connect mysql' . $e->getMessage());
            }
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }

    public static function vb3_pdo_query($sql = '')
    {
        $pdo = self::getPDO();
        $sql = str_replace("db_prefix_", self::$db_prefix, $sql);
        try
        {
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                           ]);
            $rows = $stmt->fetchAll();
        } catch (PDOException $e)
        {
            die('execute fail' . $e->getMessage());
        }

        return $rows;
    }
}

new exporttogroups();