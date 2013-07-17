<?php
/** Most of the dashboard configuration is done here.
 * If you don't use one of the services here, just leave the entry blank. It 
 * won't hurt it :-)
 */

$cacti_server = "cacti.example.com";
$chef_server = "chef.example.com";
$fitb_server = "fitb.example.com";
$ganglia_server = "ganglia.example.com";
$ganglia_server_dev = "ganglia.dev.example.com";
$graphite_server = "graphite.example.com";
$graphite_server_dev = "graphite.dev.example.com";
$splunk_server = "splunk.example.com";

/** Hadoop name node */
$hadoopnn = "nn1.example.com";
/** Ganglia cluster which contains $hadoopnn */
$gangliacluster_nn = "HadoopNN";
/** Ganglia cluster which contains hadoop data nodes */
$gangliacluster_dn = "HadoopDN";

/** Servers hosting pgbouncer */
$pgbouncer_cluster_arr = array(
    '<gangla db cluster name>' => array('name' => '<ganglia db cluster name>', 'machines' => 'db1.example.com'),
);

/** The $..._TABS arrays define which tabs are shown at the tops of various 
 * pages. They also control what is shown on the index page.
 *
 * Each entry is the name of the tab, and the URL to open.
 * URLs don't have to redirect to other dashboard pages, use them to go to 
 * external sites too! Want to add a link to the Hadoop DFS page? Easy!
 */

$CONF_TABS = array(
	'DB_TABS' => array(
	    'PGBouncer' => 'example_pgbouncer.php',
	    'PostgreSQL Queries' => 'example_postgresql_queries.php',
	),
	'DEPLOY_TABS' => array(
	    'FITB' => 'example_fitb.php',
	    'New Relic' => 'example_newrelic.php',
	),
	'HADOOP_TABS' => array(
	    'Overview' => 'example_hadoop/overview.php',
	    'DFS' => 'example_hadoop/dfs.php',
	    'Jobs' => 'example_hadoop/jobs.php',
	    'Java Process Metrics' => 'example_hadoop/java_process.php',
	    'HBase' => 'example_hadoop/hbase.php',
	),
	'NETWORK_TABS' => array(
	    'FITB' => 'example_fitb.php',
	    'Netstat' => 'example_netstat.php',
	    'Mem info' => 'example_meminfo.php',
	),
	'TIME_TABS' => array(
	    'Time' => 'example_time.php',
	),
);
/*
	public static $DB_TABS = array(
	    'PGBouncer' => 'example_pgbouncer.php',
	    'PostgreSQL Queries' => 'example_postgresql_queries.php',
	);

	public static $DEPLOY_TABS = array(
	    'FITB' => 'example_fitb.php',
	    'New Relic' => 'example_newrelic.php',
	);

	public static $HADOOP_TABS = array(
	    'Overview' => 'example_hadoop/overview.php',
	    'DFS' => 'example_hadoop/dfs.php',
	    'Jobs' => 'example_hadoop/jobs.php',
	    'Java Process Metrics' => 'example_hadoop/java_process.php',
	    'HBase' => 'example_hadoop/hbase.php',
	);

	public static $NETWORK_TABS = array(
	    'FITB' => 'example_fitb.php',
	    'Netstat' => 'example_netstat.php',
	    'Mem info' => 'example_meminfo.php',
	);

	public static $TIME_TABS = array(
	    'Time' => 'example_time.php',
	);
*/

$CONF_SECTIONS = array(
	'Application' => array(
	    'Deploy' => 'DEPLOY_TABS',
	),
	'Operations' => array(
	    'Database' => 'DB_TABS',
	    'Network' => 'NETWORK_TABS',
	    'Chef' => array(
	        'chef' => '/example_chef.php',
	    ),
	    'Hadoop' => 'HADOOP_TABS',
	    'Util' => 'TIME_TABS',
	),
);

?>