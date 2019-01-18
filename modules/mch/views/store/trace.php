<table class="table">
    <thead>
    <tr>
        <th>注册时间</th>
        <th>商户编号</th>
        <th>商户名称</th>
        <th>登录账号</th>
        <th>代理商编号</th>
        <th>代理商名称</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($output as $item): ?>
    <tr>
        <td><?=$item->time?></td>
        <td><?=$item->merchantId?></td>
        <td><?=$item->merchantName?></td>
        <td><?=$item->userName?></td>
        <td><?=$item->agentId?></td>
        <td><?=$item->agentName?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>