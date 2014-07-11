<h6>题库中共保存<?php echo count($qDatas); ?>题</h6>
<table class="table table-bordered table-striped">
    <tr>
        <th>#</th>
        <th width="80px">组别</th>
        <th>题目</th>
        <th>提示</th>
        <th>答案</th>
        <th>情况</th>
        <th>操作</th>
    </tr>
    <?php foreach($qDatas as $qKey => $qData) { ?>
    <tr>
        <td><?php echo $qData["Question"]["id"]; ?></td>
        <td><?php if($qData["Question"]["status"] != 9) { echo $qData["Subject"]["name"]; } else { echo "蜂巢" . $qData["Question"]["extra"]; } ?></td>
        <td><p><?php echo $qData["Question"]["content"]; ?></p></td>
        <td><?php echo $qData["Question"]["hint"]; ?></td>
        <td><?php echo $qData["Question"]["answer"]; ?></td>
        <td>
            <?php if($qData["Question"]["status"] != 9) { ?><a href="<?php echo Router::url('/questions/admin/mode/' . $qData["Question"]["id"]); ?>" class="btn btn-sm btn-<?php echo ($qData["Question"]["status"] ? "danger" : "success"); ?>"><?php echo ($qData["Question"]["status"] ? "已用" : "可用"); }
            else { ?>
                <a href="#" class="btn btn-sm btn-success btn-block">蜂巢</a>
            <?php } ?>
        </td>
        <td>
            <a href="<?php echo Router::url('/questions/admin/open/' . $qData["Question"]["id"]); ?>" class="btn btn-sm btn-primary">编辑</a>
        </td>
    </tr>
    <?php } ?>
</table>