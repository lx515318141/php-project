<?php
    print_r($_GET);
    // 接收用户传来的数据，并判断数据是否为空
    $title=isset($_GET['title'])?$_GET['title']:'';
    $author=isset($_GET['author'])?$_GET['author']:'';
    $des=isset($_GET['des'])?$_GET['des']:'';
    $content=isset($_GET['content'])?$_GET['content']:'';
    echo $author;
    echo $title;
    // 生成一个时间
    date_default_timezone_set('Asia/Shanghai');
    $time=date('Y-m-d H:i:s',time());
    // 写入数据
    $con = new PDO("mysql:host=localhost;dbname=lixdb;charset=utf8;port=3306","root","");
    $sql = "insert into news (title,author,des,content,time) values('{$title}','{$author}','{$des}','{$content}','{$time}')";
    $res = $con->query($sql);
    if($res){
        echo '<script>alert("添加成功");window.location.href="index.php";</script>；';
    }else{
        echo '添加失败';
    }
?>