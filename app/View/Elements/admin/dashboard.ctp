<?php
    if($cData["currentMode"] == 2) { ?>
        <div class="alert alert-info"><strong>提示:</strong> 系统处于调试模式. 正式启动比赛请启用数据库.</div>
        <?php
    }
?>
<div class="row">
    <div class="col-md-4">
        <h6>题库统计</h6>
        <table class="table table-bordered table-striped">
            <tr>
                <td width="50%"><strong>题库总题量</strong></td>
                <td><?php echo $qDataCount; ?></td>
            </tr>
            <tr>
                <td><strong>题库启用题目量</strong></td>
                <td><?php echo $qDataActiveCount; ?></td>
            </tr>
            <tr>
                <td><strong>题目类别</strong></td>
                <td><?php echo count($sDatas); ?></td>
            </tr>
        </table>
        <br />
        
        <h6>现场情况</h6>
        <table class="table table-bordered table-striped">
            <tr>
                <td width="50%"><strong>现题目号</strong></td>
                <td><a href="<?php echo Router::url("/questions/admin/open/" . $cData["currentQuestion"]); ?>">#<?php echo $cData["currentQuestion"]; ?></a></td>
            </tr>
            <tr>
                <td><strong>现题目标题</strong></td>
                <td><?php echo $this->Text->truncate($cqData["Question"]["content"], 25); ?></td>
            </tr>
            <tr>
                <td><strong>显示模式</strong></td>
                <td><?php 
                switch($cData["currentMode"]) {
                    case 1:
                        echo "(暂停)";
                    break;
                    
                    case 4:
                        echo "选类别中";
                    break;
                    
                    case 5:
                        if($cData["currentSpecialPage"] == "default") echo "(暂停)";
                        elseif($cData["currentSpecialPage"] == "grid") echo "蜂巢题";
                        else echo "特殊页面 - " . $cData["currentSpecialPage"];
                    break;
                    
                    case 2:
                    case 3:
                        echo ($cData["currentShowHint"] ? ($cData["currentShowAnswer"] ? "+提示 +答案" : "+提示") : "题目"); 
                }
                ?></td>
            </tr>
            <tr>
                <td><strong>前台上一次呼叫</strong></td>
                <td><?php echo $this->Time->timeAgoInWords($cData["lastFrontCallHome"]); ?></td>
            </tr>
            <tr>
                <td><strong>后台上一次呼叫</strong></td>
                <td><?php echo $this->Time->timeAgoInWords($cData["lastBackCallHome"]); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-8">
    <h6>题库分类情况</h6>
        <table class="table table-bordered table-striped">
        <?php
        foreach($sDatas as $sKey => $sValue) {
            ?>
            <tr>
                <td><strong><?php echo $sValue["Subject"]["name"]; ?></strong><br /><?php echo $sValue["Subject"]["description"]; ?></td>
                <td width="40px"><?php echo $sValue["Subject"]["count"]; ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>
</div>