<?php
require_once('conf/conf.php');
require_once('phplib/Dashboard.php');
Dashboard::$MAIN_TABS = array(
        'Overview' => '/main.php',
    );
exit;
$sections = array();
foreach ($CONF_SECTIONS as $section_title => $dashboard_groups) {
    foreach ($dashboard_groups as $dashboard_group_title => $dashboards_value) {
        if (!is_array($dashboards_value) and array_key_exists($dashboards_value, $CONF_TABS)) {
            $sections[$section_title] = array($dashboard_group_title => Dashboard::${$dashboards_value});
        }
        else {
            $sections[$section_title] = array($dashboard_group_title => $dashboards_value);
        }
    }
}
// $sections = array(
//     'Application' => array(
//         'Deploy' => Dashboard::$DEPLOY_TABS,
//     ),
//     'Operations' => array(
//         'Database' => Dashboard::$DB_TABS,
//         'Network' => Dashboard::$NETWORK_TABS,
//         'Chef' => array(
//             'chef' => '/example_chef.php',
//         ),
//         'Hadoop' => Dashboard::$HADOOP_TABS,
//         'Util' => Dashboard::$TIME_TABS,
//     ),
// );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboards</title>
    <link rel="stylesheet" type="text/css" href="assets/css/screen.css">
</head>
<body class="index">

<?php foreach ($sections as $section_title => $dashboard_groups) : ?>
<div class='section'>
    <h2><?= $section_title ?></h2>
    <table width='100%'>
    <tr valign='top'>
        <?php $i = 0; ?>
        <?php foreach ($dashboard_groups as $dashboard_group_title => $dashboards) : ?>
        <td width='20%'>
            <div class='index-group-title'><?= $dashboard_group_title ?></div>
            <ul style='margin: 0; padding-left: 20px;'>
                <?php foreach ($dashboards as $name => $url) : ?>
                <?php 
                $link_title = Tabs::getLinkTitle($name, $url);
                $link_target = Tabs::getLinkTarget($url);
                $link_image = Tabs::getLinkIcon($url);
                ?>
                <li><a href='<?= $url ?>' <?= $link_target ?> title='<?= $link_title ?>'><span><?= $link_title ?><?= $link_image ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </td>
        <?php if ($i % 5 == 4 && $i < count($dashboard_groups) - 1) : ?>
        </tr><tr valign='top'>
            <?php endif; ?>
        <?php $i++; ?>
        <?php endforeach; ?>
        <?php if ($i % 5 != 0) : for ($j = 0; $j < (5 - ($i % 5)); $j++) : ?>
        <td width='20%'></td>
        <?php endfor; endif; ?>
    </tr>
    </table>
</div>
    <?php endforeach; ?>

</body>
</html>
