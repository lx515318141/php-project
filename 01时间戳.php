<?php
    /*
    时间戳：从1970.1.1到今天当前事件的毫秒单位
    time();      页面中显示为1587796817      这种格式我们不认识
    为了让其显示成我们认识的格式：
    data('时间格式'，时间戳)
    时间格式：
        年：Y，4位数年份  y，2位数年份
        月：M，英文       m，数组
        日：d
        时：H，24小时制  h，12小时制
        分：i，分钟
        秒：s
        年份和时间之间用空格隔开
        date('Y-m-d H:i:s',time())
    */
    echo time();
    echo '<br>';
    date_default_timezone_set('Asia/Shanghai');
    echo date('Y-m-d H:i:s',time());
    echo '<br>';
    echo date('Y/m/d H:i:s',time());
    // 日期和时间的格式可以自行修改
?>