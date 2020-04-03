# PHP_StudentManagement
Web应用开发课程作业

## 开始使用
```
composer install
```
设置站点根目录为`/public/`，Nginx 需要额外配置 URL 重写规则。

## 目录结构
```
.
├── README.md
├── composer.json
├── composer.lock
├── core
│   ├── checker.php     表单验证
│   ├── config.php      配置
│   ├── core.php        入口
│   ├── database.php    数据库 （其中包括数据库单例，以及简单的链式调用方法）
│   ├── function.php    模板函数
│   └── router.php      路由
├── handler
│   ├── Handler.php     控制器父类
│   ├── Main.php        主要业务逻辑控制器
│   └── NotFound.php    404 路由控制器
├── public
│   └── index.php       程序入口
├── vendor              Composer 依赖
└── views               视图
    ├── add.php
    ├── del.php
    ├── edit.php
    ├── footer.html
    ├── header.html
    └── index.php
```