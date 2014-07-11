<?php
    if(isset($success)) {
        ?>
<div class="alert alert-success">题目修改成功! <a href="<?php echo Router::url('/questions/admin/edit'); ?>" style="color: #f7f7f7; text-decoration: underline">回到题目管理界面</a></div>
        <?php
    }
    
    if($qData["Question"]["status"] == 1) {
        ?>
<div class="alert alert-warning"><strong>注意:</strong> 此题目尚未被启用. 修改题目不会影响它的使用标识, 如果需要修改题目使用状态请在编辑题库页面中完成.</div>   
        <?php
    }
?>
<form class="form-horizontal" role="form" action="<?php echo Router::url('/questions/admin/open/' . $qData["Question"]["id"]); ?>" method="post">
    <div class="form-group">
        <label for="data[Question][subject_id]" class="col-sm-2 control-label">题目组别</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-xs-6">
                    <select name="data[Question][subject_id]" class="form-control">
                        <?php
                            foreach($sDatas as $sKey => $sData) {
                            ?>
                            <option value="<?php echo $sData["Subject"]["id"]; ?>"<?php if($qData["Question"]["subject_id"] == $sData["Subject"]["id"]) { echo " selected"; } ?>><?php echo $sData["Subject"]["name"]; ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="data[Question][isGridQuestion]" value="1"<?php if($qData["Question"]["status"] == 9) { echo " checked"; } ?>> 这是一道 "蜂巢题", 它的编号是
                        <input type="text" name="data[Question][extra]" value="<?php echo $qData["Question"]["extra"]; ?>" />
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][content]" class="col-sm-2 control-label">题目内容</label>
        <div class="col-sm-10">
            <textarea name="data[Question][content]" rows="4" class="form-control"><?php echo $qData["Question"]["content"]; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][hint]" class="col-sm-2 control-label">题目提示语</label>
        <div class="col-sm-10">
            <textarea name="data[Question][hint]" rows="4" class="form-control"><?php echo $qData["Question"]["hint"]; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][answer]" class="col-sm-2 control-label">题目答案</label>
        <div class="col-sm-10">
            <textarea name="data[Question][answer]" rows="4" class="form-control"><?php echo $qData["Question"]["answer"]; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">修改题目</button>
        </div>
    </div>
</form>