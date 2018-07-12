<?php
/*======================================================================*\
|| #################################################################### ||
|| # vBulletin 3.8.9 - Licence Number VBF83FEF44
|| # ---------------------------------------------------------------- # ||
|| # Copyright �2000-2015 vBulletin Solutions, Inc. All Rights Reserved. ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- VBULLETIN IS NOT FREE SOFTWARE ---------------- # ||
|| # http://www.vbulletin.com | http://www.vbulletin.com/license.html # ||
|| #################################################################### ||
\*======================================================================*/

// ######################## SET PHP ENVIRONMENT ###########################
error_reporting(E_ALL & ~E_NOTICE);
if (!is_object($vbulletin->db))
{
	exit;
}

// ########################################################################
// ######################### START MAIN SCRIPT ############################
// ########################################################################

$mysqlversion = $vbulletin->db->query_first("SELECT version() AS version");
define('MYSQL_VERSION', $mysqlversion['version']);
$enginetype = (version_compare(MYSQL_VERSION, '4.0.18', '<')) ? 'TYPE' : 'ENGINE';
$tabletype = (version_compare(MYSQL_VERSION, '4.1', '<')) ? 'HEAP' : 'MEMORY';

$aggtable = "taggregate_temp_$nextitem[nextrun]";

$vbulletin->db->query_write("
	CREATE TABLE IF NOT EXISTS " . TABLE_PREFIX . "$aggtable (
		threadid INT UNSIGNED NOT NULL DEFAULT '0',
		views INT UNSIGNED NOT NULL DEFAULT '0',
		KEY threadid (threadid)
	) $enginetype = $tabletype");

if ($vbulletin->options['usemailqueue'] == 2)
{
	$vbulletin->db->lock_tables(array(
		 $aggtable     => 'WRITE',
		 'threadviews' => 'WRITE'
	));
}

$vbulletin->db->query_write("
	INSERT INTO ". TABLE_PREFIX ."$aggtable
		SELECT threadid, COUNT(*) AS views
		FROM " . TABLE_PREFIX . "threadviews
		GROUP BY threadid
");

if ($vbulletin->options['usemailqueue'] == 2)
{
	$vbulletin->db->unlock_tables();
}
/* Small race condition but better than lots of IO wait for a DELETE query */
$vbulletin->db->query_write("TRUNCATE TABLE " . TABLE_PREFIX . "threadviews");

if (version_compare(MYSQL_VERSION, '5.1.0', '<'))
{
	$vbulletin->db->query_write(
		"UPDATE " . TABLE_PREFIX . "thread AS thread,". TABLE_PREFIX . "$aggtable AS aggregate
		SET thread.views = thread.views + aggregate.views
		WHERE thread.threadid = aggregate.threadid
	");
}
else
{
	$vbulletin->db->query_write("
		UPDATE " . TABLE_PREFIX . "thread AS thread
		INNER JOIN (SELECT * FROM ". TABLE_PREFIX . "$aggtable
		ORDER BY threadid) AS aggregate USING (threadid)
		SET thread.views = thread.views + aggregate.views
	");
}

$vbulletin->db->query_write("DROP TABLE IF EXISTS " . TABLE_PREFIX . $aggtable);

log_cron_action('', $nextitem, 1);


/*======================================================================*\
|| ####################################################################
|| # Downloaded: 03:07, Fri Jul 10th 2015
|| # CVS: $RCSfile: threadviews.php,v $ - $Revision: 80813 $
|| ####################################################################
\*======================================================================*/
?>
