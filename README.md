## 简介
---

本项目是基于thinkphp写的一个内部钓鱼网站系统。用来测试甲方公司内部钓鱼，请勿用于非法用途。

## 部署方法
---

支持**windows**、**linux**、**MAC**。

克隆项目到本地
```bash
git clone https://github.com/MSG-maniac/mail_fishing.git
```
部署目录为项目根目录的public目录

具体参考thinkphp部署方法 
```url
https://www.kancloud.cn/manual/thinkphp5/336757
```

### 举个栗子
---
如果当前终端在/usr/share/nginx目录下

执行命令
```bash
git clone https://github.com/MSG-maniac/mail_fishing.git
```

nginx配置文件如下
```nginx
server {
    #默认http请求自动跳转到https
    listen       80;
    server_name oa.xxx.com;
    rewrite ^(.*)$  https://$host$1 permanent;
}

server {
    listen      443 ssl;
    server_name oa.xxx.com;

    #需要配置证书
    ssl on;
    ssl_certificate     /opt/ssl/oa.crt;
    ssl_certificate_key /opt/ssl/oa.key;

    location / {
        root   /usr/share/nginx/mail_fishing/public;
        index index.php  index.html index.htm;
        if (!-e $request_filename) {
                rewrite  ^(.*)$  /index.php?s=/$1  last;
                break;
        }
    }


    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    #
    location ~ \.php$ {
        root           /usr/share/nginx/mail_fishing/public;
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME   $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}
```

## 模板文件替换

文件路径
```file
application\index\view\index.html
```
模板内需要包含一个html的form表单

默认是一个极简内容页，新模板一定要包含：
```html
<form action="/index/index/input" method="post">
```

仿制页面时候请把静态文件放入到目录,或者自定义目录：
```
public\static
```

## 配置数据库

数据库文件在根目录，导入即可：
```
mail.sql
```

配置数据库连接：
```
文件路径:
config/database.php

默认如下
    // 数据库类型
    'type'            => 'mysql',
    // 服务器地址
    'hostname'        => '127.0.0.1',
    // 数据库名
    'database'        => 'mail',
    // 用户名
    'username'        => 'root',
    // 密码
    'password'        => '',
```

## 部署完成

到此部署完成，可以找邮箱开始给公司同事发邮件了。

## 中招查看

```
http://oa.xxx.com/superhack/index/search?key=fcvxz657o54ewn123cvb432lg
```
自己替换域名