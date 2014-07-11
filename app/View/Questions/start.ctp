<div class="all" id="start" style="display: none; margin-top: 18%; zoom: 2">
    <h1><?php echo $cName; ?></h1>
    <h2><?php echo $cDesc; ?></h2>
</div>

<!--<div class="all" id="debug" style="display: none; margin-top: 18%">
    <div class="questionContainer" id="questionContainerDebug">
        <h1 class="questionContainer_content"></h1>
        <h2 class="questionContainer_hint"></h2>
        
        <h3 class="questionContainer_answer"></h3>
    </div>

    <div id="branding" style="bottom: 0; left: 3px; position: fixed; padding: 8px">
        <h4><?php echo $cName; ?> <small><?php echo $cDesc; ?></small></h4>
    </div>
    
    <div id="debugBar" style="background: #9954bb; padding: 8px; bottom: 0; right: 15px; position: fixed; color: #FFF">
        <strong>调试模式</strong> 上次联系终端时刻是<span></span>
    </div>
</div>-->

<div class="all" id="showQuestion" style="display: none; margin-top: 18%">
    <div class="questionContainer" id="questionContainer">
        <h1 class="questionContainer_content"></h1>
        <h2 class="questionContainer_hint"></h2>
        
        <h3 class="questionContainer_answer"></h3>
        <div id="questionContainer_media"></div>
    </div>

    <div id="branding" style="bottom: 0; left: 3px; position: fixed; padding: 8px">
        <h4><?php echo $cName; ?> <small><?php echo $cDesc; ?></small></h4>
    </div>
</div>

<div class="all" id="special_grid" style="display: none; margin-top: 6%">
<center class="grid_main">    
    <div class="hexrow">
        <div id="grid1">
            <span>A1</span>
            <div></div><div></div>
        </div>
        <div id="grid2">
            <span>A2</span>
            <div></div><div></div>
        </div>
        <div id="grid3">
            <span>A3</span>
            <div></div><div></div>
        </div>
        <div id="grid4">
            <span>A4</span>
            <div></div><div></div>
        </div>
        <div id="grid5">
            <span>A5</span>
            <div></div><div></div>
        </div>
    </div>
    <div class="hexrow">
        <div id="grid6">
            <span>B1</span>
            <div></div><div></div>
        </div>
        <div id="grid7">
            <span>B2</span>
            <div></div><div></div>
        </div>
        <div id="grid8">
            <span>B3</span>
            <div></div><div></div>
        </div>
        <div id="grid9">
            <span>B4</span>
            <div></div><div></div>
        </div>
        <div id="grid10">
            <span>B5</span>
            <div></div><div></div>
        </div>
    </div>
    <div class="hexrow">
        <div id="grid11">
            <span>C1</span>
            <div></div><div></div>
        </div>
        <div id="grid12">
            <span>C2</span>
            <div></div><div></div>
        </div>
        <div id="grid13">
            <span>C3</span>
            <div></div><div></div>
        </div>
        <div id="grid14">
            <span>C4</span>
            <div></div><div></div>
        </div>
        <div id="grid15">
            <span>C5</span>
            <div></div><div></div>
        </div>
    </div>
    <div class="hexrow">
        <div id="grid16">
            <span>D1</span>
            <div></div><div></div>
        </div>
        <div id="grid17">
            <span>D2</span>
            <div></div><div></div>
        </div>
        <div id="grid18">
            <span>D3</span>
            <div></div><div></div>
        </div>
        <div id="grid19">
            <span>D4</span>
            <div></div><div></div>
        </div>
        <div id="grid20">
            <span>D5</span>
            <div></div><div></div>
        </div>
    </div>
</center>
    <div id="branding" style="bottom: 0; left: 3px; position: fixed; padding: 8px">
        <h4><?php echo $cName; ?> <small><?php echo $cDesc; ?></small></h4>
    </div>
</div>

<div class="all" id="showList" style="display: none; margin-top: 18%">
    <div class="questionList">
        <ul class="questionList-list">
            <?php
                foreach($sDatas as $sKey => $sData) {
                ?>
                <li>
                    <?php echo $this->Html->image("subjects/" . $sData["Subject"]["img"]); ?>
                    <?php echo $sData["Subject"]["name"]; ?>
                </li>
                <?php
                }
            ?>
        </ul>
    </div>

    <div id="branding" style="bottom: 0; left: 3px; position: fixed; padding: 8px">
        <h3><?php echo $cName; ?> <small><?php echo $cDesc; ?></small></h3>
    </div>
</div>

<div id="connError" style="background: #242424; padding: 8px; bottom: 0; right: 15px; position: fixed; color: #FFF; display: none">
    <strong>网络错误</strong> (#2710) 无法连接到主服务器, 请耐心等待.
</div>

<script type="text/javascript">
var currentMode = -1;
var currentPage = "";
var base = "<?php echo Router::url("/css/qstyles/", true); ?>";
    function readyState() {
        $.ajax(
            "<?php echo Router::url("/questions/callHome/front"); ?>",
            {
                dataType: "json",
                type: "GET"
            }
        ).done(function(data, textStatus, jqXHR) {
            $("#connError").hide();
            console.log(data);
            
            // 1: Intro, 2: Debug w/ Q, 3: ShowQ, 4: ShowList, 5: Special
            
            if(data.cData.currentMode == 1) {
                if(currentMode != 1) {
                    $(".all:not(#start)").fadeOut(500, function() {
                        $("#start").fadeIn(500);
                    })
                }
                    
                currentMode = 1;
            }
            
            /** Show Questions + Debug(2) **/
            if(data.cData.currentMode == 2) {
                if(currentMode != 2) {
                    $(".all:not(#debug)").fadeOut(500, function() {
                        $("#debug").fadeIn(500);
                    })
                }
                
                currentMode = 2;
                
                $("#debugBar span").text(new Date().toLocaleTimeString());
            }
            
            if(data.cData.currentMode == 3) {
                if(currentMode != 3) {
                    $(".all:not(#showQuestion)").fadeOut(500, function() {
                        $("#showQuestion").fadeIn(500);
                    })
                }
                
                currentMode = 3;
            }
            
                if(currentMode == 2 || currentMode == 3) {
                    $(".questionContainer_content").html(nl2br(data.cqData.Question.content));
                    if(data.cData.currentShowHint == "1" || data.cqData.Question.autohint) $(".questionContainer_hint").html(nl2br(data.cqData.Question.hint));
                        else $(".questionContainer_hint").html("");
                    if(data.cData.currentShowAnswer == "1") $(".questionContainer_answer").html(nl2br(data.cqData.Question.answer));
                        else $(".questionContainer_answer").html("");
                    
                    if(currentQuestion != data.cqData.Question.id)
                        $("#questionContainer_media").html(data.cqData.Question.media);
                    
                    currentQuestion = data.cqData.Question.id;
                }
            
            /** Show List (4) **/
            if(data.cData.currentMode == 4) {
                if(currentMode != 4) {
                    $(".all:not(#showList)").fadeOut(500, function() {
                        $("#showList").fadeIn(500);
                    })
                }
                
                currentMode = 4;
            }
            
            /** Show Special (5) **/
            if(data.cData.currentMode == 5) {
                // special pages.
                if(currentMode != 5 || currentPage != data.cData.currentSpecialPage) {
                    $(".all:not(#special_" + data.cData.currentSpecialPage + ")").fadeOut(500, function() {
                        $("#special_" + data.cData.currentSpecialPage).fadeIn(500);
                    })
                    
                    currentMode = 5;
                    currentPage = data.cData.currentSpecialPage;
                }
            }
            
            if(currentMode == 5 && currentPage == "grid") {
                if($("#dynamicStyle").attr("href") != (base + "/grid.css")) $("#dynamicStyle").attr("href", base + "/grid.css");
            } 
            else $("#dynamicStyle").attr("href", base + "/zero.css");
            
            setTimeout(readyState, 2000);
        }).fail(function() {
            $("#connError").fadeIn(200);
            setTimeout(readyState, 5000);
        });
    }

readyState();
</script>