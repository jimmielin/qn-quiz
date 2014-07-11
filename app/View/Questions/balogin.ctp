<br /><br />
<h1>&infin;挑战: <strong>主持界面登录</strong></h1>
<h2>高二(8)班中华传统知识竞赛</h2>
<br />
<?php
    if(isset($error)) {
        ?>
        <div class="alert alert-danger"><strong>错误:</strong> 登录密码不正确. (#1001)</div>
        <?php
    }
?>
<form class="form-signin" role="form" method="post" action="<?php echo Router::url('/questions/balogin'); ?>">
    <input type="password" class="form-control" placeholder="密码" name="data[User][password]" required autofocus>
    <br />
    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
</form>