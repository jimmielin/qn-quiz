<?php
    if(isset($success)) {
        ?>
<div class="alert alert-success">题目加入成功!</div>
        <?php
    }
?>
<form class="form-horizontal" role="form" action="<?php echo Router::url('/questions/admin/add'); ?>" method="post">
    <div class="form-group">
        <label for="data[Question][subject_id]" class="col-sm-2 control-label">题目组别</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-xs-6">
                    <select name="data[Question][subject_id]" class="form-control">
                        <?php
                            foreach($sDatas as $sKey => $sData) {
                            ?>
                            <option value="<?php echo $sData["Subject"]["id"]; ?>"><?php echo $sData["Subject"]["name"]; ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="data[Question][isGridQuestion]" value="1"> 这是一道 "蜂巢题", 它的编号是
                        <input type="text" name="data[Question][extra]" />
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][content]" class="col-sm-2 control-label">题目内容</label>
        <div class="col-sm-10">
            <textarea name="data[Question][content]" rows="4" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][hint]" class="col-sm-2 control-label">
            题目提示语
            <br />
            <label class="checkbox-inline"><input type="checkbox" name="data[Question][autohint]" value="1"> 此题自动提示</label>
        </label>
        <div class="col-sm-10">
            <textarea name="data[Question][hint]" rows="4" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="data[Question][answer]" class="col-sm-2 control-label">题目答案</label>
        <div class="col-sm-10">
            <textarea name="data[Question][answer]" rows="4" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">添加题目</button>
        </div>
    </div>
</form>