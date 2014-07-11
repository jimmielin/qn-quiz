<br /><br /><br />
<!--<div class="row">
    <div class="col-md-2">
        <a href="<?php echo Router::url('/questions/backend/setMode/1'); ?>" class="btn btn-lg btn-primary btn-block<?php if($cData["currentMode"] == 1) { echo " disabled btn-bold"; } ?>">主幻灯</a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo Router::url('/questions/backend/setMode/3'); ?>" class="btn btn-lg btn-success btn-block<?php if($cData["currentMode"] == 3) { echo " disabled btn-bold"; } ?>">显示题目</a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo Router::url('/questions/backend/setMode/4'); ?>" class="btn btn-lg btn-warning btn-block<?php if($cData["currentMode"] == 4) { echo " disabled btn-bold"; } ?>">选择类别</a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo Router::url('/questions/backend/setSpecial/default'); ?>" class="btn btn-lg btn-default btn-block<?php if($cData["currentMode"] == 5) { echo " disabled btn-bold"; } ?>">特殊显示</a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo Router::url('/questions/backend/setSpecial/grid'); ?>" class="btn btn-lg btn-info btn-block<?php if($cData["currentShowGrid"] == 1) { echo " disabled btn-bold"; } ?>">蜂巢题</a>
    </div>
    <div class="col-md-2">
        
    </div>
</div>-->
<div class="row">
    <div class="col-md-2">
        <h6>控制台</h6>
        <ul class="nav nav-pills nav-stacked">
            <li<?php if($cData["currentMode"] == 1) { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/backend/setMode/1/"); ?>">主幻灯</a></li>
            <li<?php if($cData["currentMode"] == 3) { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/backend/setMode/3"); ?>">显示题目</a></li>
            <li<?php if($cData["currentMode"] == 4) { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/backend/setMode/4"); ?>">选择类别</a></li>
            <li class="divider"></li>
            <li<?php if($cData["currentShowGrid"] == 1) { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/backend/setSpecial/grid"); ?>">蜂巢题</a></li>
        </ul>
        
    </div>
    <div class="col-md-10">
        <h6>此时题目</h6>
        <table class="table table-bordered table-striped">
            <tr>
                <th>题目 <small>(#<?php echo $cqData["Question"]["id"]; ?>)</small></th>
            </tr>
            <tr>
                <td><?php echo $cqData["Question"]["content"]; ?></td>
            </tr>
            <tr>
                <th>提示</th>
            </tr>
            <tr>
                <td><?php echo $cqData["Question"]["hint"]; ?></td>
            </tr>
            <tr>
                <th>答案</th>
            </tr>
            <tr>
                <td><?php echo $cqData["Question"]["answer"]; ?></td>
            </tr>
            <tr>
                <td>
                     <?php if($cData["currentShowHint"]) { ?>
                     <a href="<?php echo Router::url("/questions/backend/hideHint"); ?>" class="btn btn-sm btn-danger">隐藏提示</a>
                     <?php } else if($cqData["Question"]["autohint"]) { ?>
                     <a href="#" class="btn btn-sm btn-danger disabled">此题强制提示</a>
                     <?php } else { ?>
                     <a href="<?php echo Router::url("/questions/backend/showHint"); ?>" class="btn btn-sm btn-success">显示提示</a>
                     <?php } ?>
                     
                     <?php if($cData["currentShowAnswer"]) { ?>
                     <a href="<?php echo Router::url("/questions/backend/hideAnswer"); ?>" class="btn btn-sm btn-danger">隐藏答案</a>
                     <?php } else { ?>
                     <a href="<?php echo Router::url("/questions/backend/showAnswer"); ?>" class="btn btn-sm btn-success">显示答案</a>
                     <?php } ?>
                </td>
            </tr>
        </table>
        
        <div class="row">
            <div class="col-md-2 tabs-left">
                <h6>选择类别</h6>
                <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#intro" data-toggle="tab">说明</a>
                <?php
                    foreach($sDatas as $sKey => $sData) {
                        ?>
                            <li><a href="#subject_<?php echo $sKey; ?>" data-toggle="tab"><?php echo $sData["Subject"]["name"]; ?> (<?php echo $sData["Subject"]["count"]; ?>)</a></li>
                        <?php
                    }
                ?>
                </ul>
            </div>
            <div class="col-md-10">
                <h6>题库预览</h6>
                <div class="tab-content">
                <div class="tab-pane fade in active" id="intro">
                    <h3>题目预览</h3>
                    <h4>触摸左侧选项以预览类别内的题目.</h4>
                    
                    <br />
                    <center>
                        <a href="<?php echo Router::url('/questions/backend/randomQA'); ?>" class="btn btn-lg btn-info">全科随机抽题</a>
                        <a href="<?php echo Router::url('/questions/backend/setMode/4'); ?>" class="btn btn-lg btn-warning <?php if($cData["currentMode"] == 4) { echo " disabled btn-bold"; } ?>">选择类别</a>
                    </center>
                </div>
                <?php
                    foreach($sDatas as $sKey => $sData) {
                        ?>
                            <div class="tab-pane fade" id="subject_<?php echo $sKey; ?>">
                                <table class="table table-striped table-condensed table-bordered">
                                    <tr>
                                        <th width="1%">#</th>
                                        <th width="45%">题目</th>
                                        <th width="45%">答案</th>
                                        <th width="9%">操作</th>
                                    </tr>
                                    <?php
                                        foreach($sData["Question"] as $qKey => $qData) {
                                        ?>
                                        <tr>
                                            <td><?php echo $qData["id"]; ?></td>
                                            <td><?php echo $this->Text->truncate($qData["content"], 55); ?></td>
                                            <td><?php echo $this->Text->truncate($qData["answer"], 55); ?></td>
                                            <td><a href="<?php echo Router::url('/questions/backend/chooseQT/' . $qData["id"]); ?>" class="btn btn-sm btn-primary">选题</a></td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                </table>
                                <br />
                                <center>
                                    <a href="<?php echo Router::url('/questions/backend/randomQT/' . $sData["Subject"]["id"]); ?>" class="btn btn-lg btn-primary<?php if($sData["Subject"]["count"] == 0) { echo " disabled"; } ?>">类内随机抽题</a>
                                </center>
                            </div>
                        <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="branding" style="bottom: 0; left: 3px; position: fixed; padding: 8px; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);">
    <h4><?php echo $cName; ?> <small><?php echo $cDesc; ?> <strong>操作后台</strong></small></h4>
</div>