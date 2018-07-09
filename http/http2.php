<?php
/**
 * 获取 get 数据 和 post 数据
 */

// 获取 url 参数（get 数据）
$params = getQueryParams($_SERVER['QUERY_STRING']);
echo "param1: " . $params["param1"];
echo "<br />";
echo "param2: " . $params["param2"];
echo "<br />";

function getQueryParams($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param)
    {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
    }
    return $params;
}



// 通过 $_POST 获取 post 数据
// 判断 $_POST["btnSubmit"] 是否存在，如果存在则表示有 post 过来的 form
if  (isset($_POST["btnSubmit"]))
{
    if (empty($_POST['txtUsername']))
    {
        echo "您没有输入用户名";
        exit(0);
    }

    echo "您的用户名: " . $_POST['txtUsername'] . "";
}
?>

<form action="" method="post">
    <div>姓名：</div>
    <div><input type="text" id="txtUsername" name="txtUsername" value="wanglei" /></div>

    <div><input type="submit" name="btnSubmit" value="提交"/></div>
</form>