UserAgent
=========

Typecho版 UserAgent插件

开发背景
----

在WordPress这一类的插件已经数不胜数。
在Typecho中，开发者对评论者的信息做了许多处理，包括留下了User-Agent字符串。因此作者对User-Agent做了处理，让追赶时尚的你轻轻松松使用。

更新日志
----

- v1.0.0&emsp;&emsp;识别大部分浏览器和操作系统

开发人员
----

本插件由本人 [UniqueOnly][1] 独立开发

使用说明
----

- 解压并移动UserAgent文件夹到你的网站目录下的usr/plugins/下
- 进入你的网站后台，发现即插即用，插件成功运转
- 假如在评论信息显示，则点击控制台->外观->编辑当前外观->functions.php
- 假如在侧栏显示，则点击控制台->外观->编辑当前外观->sidebar.php
- 在你要选择放置的地方输入

```
<?php UserAgent_Plugin::getBrowserName($comments->agent); ?>
<?php UserAgent_Plugin::getOSName($comments->agent); ?>
```

下载链接
----

[UserAgent-v1.0.0.rar][2]


  [1]: http://blog.uniqueonly.ml
  [2]: http://uniqueml.qiniudn.com/2014/08/3139837844.rar
