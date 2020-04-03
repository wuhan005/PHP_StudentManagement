<h3 class="uk-heading-line">
    <span>学生信息管理</span>
</h3>
<?php if (count($data) > 0) { ?>
    <table class="uk-table uk-table-hover uk-table-divider uk-table-small">
        <thead>
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话号码</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
           
        </tr>
        </tbody>
    </table>
<?php } else { ?>
    <p class="uk-text-center uk-muted-text">数据库中还没有学生信息哦~</p>
    <p class="uk-text-center"><a class="uk-primary-text" href="/add">添加一条</a></p>
<?php } ?>
