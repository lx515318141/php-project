<?php
    // 接收修改后的数据
    $id=isset($_POST['id'])?$_POST['id']:'';
    $title=isset($_POST['title'])?$_POST['title']:'';
    $author=isset($_POST['author'])?$_POST['author']:'';
    $des=isset($_POST['des'])?$_POST['des']:'';
    $content=isset($_POST['content'])?$_POST['content']:'';
    date_default_timezone_set('Asia/Shanghai');
    $time=date('Y-m-d H:i:s',time());
    if ($id) {
        try {
            $con = new PDO("mysql:host=localhost;dbname=lixdb;charset=utf8;port=3306","root","");
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // 修改操作
            $sql = "update news set title='{$title}',author='{$author}',des='{$des}',content='{$content}',time='{$time}' where id={$id}";
            $res = $con->query($sql);
            if ($res) {
                echo '<script>alert("修改成功");window.location.href="index.php"</script>';
            }else{
                echo '修改失败';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        echo 'id不存在';
    }
?>