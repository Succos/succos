<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
//defined('YII_RUN') or define('YII_RUN', true);
//defined('WE7_MODULE_NAME') or define('WE7_MODULE_NAME', 'zjhj_mall');



$config = require(__DIR__ . '/../config/web.php');
$app = new yii\web\Application($config);
try {
    $app->db->createCommand("SET SESSION sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'")->execute();
} catch (Exception $e) {
}
//$app->session->setName('DBSESSIONID');
$app->run();

if (is_dir(\Yii::$app->runtimePath . '/logs')) {
    deldir(\Yii::$app->runtimePath . '/logs');
}
if (is_dir(\Yii::$app->runtimePath . '/debug')) {
    deldir(\Yii::$app->runtimePath . '/debug');
}
if (file_exists(\Yii::$app->basePath . '/web/WXRES.txt')) {
    unlink(\Yii::$app->basePath . '/web/WXRES.txt');
}

function deldir($dir)
{
    //先删除目录下的文件：
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }

    closedir($dh);
    //删除当前文件夹：
    if (rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}