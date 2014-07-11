<h3><?php echo $actionName; ?></h3>
<h4><?php echo $actionDesc; ?></h4>
<div class="row">
    <div class="col-md-2">
        <ul class="nav nav-pills nav-stacked">
            <li<?php if($action == "dashboard") { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/admin/"); ?>">管理中心</a></li>
            <li<?php if($action == "edit" || $action == "open") { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/admin/edit"); ?>">编辑题库</a></li>
            <li<?php if($action == "add") { echo " class='active'"; } ?>><a href="<?php echo Router::url("/questions/admin/add"); ?>">添加题目</a></li>
        
        </ul>
        
        <br />
        <h6>现场调控</h6>
        <a href="<?php echo Router::url('/questions/admin/setMode/1'); ?>" class="btn btn-sm btn-primary btn-block<?php if($cData["currentMode"] == 1) { echo " disabled btn-bold"; } ?>">主幻灯</a>
        <a href="<?php echo Router::url('/questions/admin/setMode/3'); ?>" class="btn btn-sm btn-success btn-block<?php if($cData["currentMode"] == 3) { echo " disabled btn-bold"; } ?>">显示题目</a>
        <a href="<?php echo Router::url('/questions/admin/setMode/4'); ?>" class="btn btn-sm btn-info btn-block<?php if($cData["currentMode"] == 4) { echo " disabled btn-bold"; } ?>">选择类别</a>
        
        <hr />
        <a href="<?php echo Router::url('/questions/admin/setMode/2'); ?>" class="btn btn-sm btn-warning btn-block<?php if($cData["currentMode"] == 2) { echo " disabled btn-bold"; } ?>">调试模式</a>
    </div>
    <div class="col-md-10">
        <?php
        switch($action) {
            case "edit":
                echo $this->element("admin/edit");
            break;
            
                case "open": echo $this->element("admin/open"); break;
            
            case "add":
                echo $this->element("admin/add");
            break;
            
            case "dashboard":
            default:
                echo $this->element("admin/dashboard");
            break;
        }
        ?>
    </div>
</div>