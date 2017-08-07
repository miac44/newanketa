<?php $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
<?php $menu['Главная'] = $admin_url . '/'; ?>
<?php $menu['Архив'] = $admin_url . '/archive/'; ?>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($menu as $k => $v) : ?>
                <li<?php if ($v==$request_uri){ echo ' class="active"'; }; ?>><a href="<?php echo $v; ?>"><?php echo $k; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
