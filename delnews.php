<?php
    // 接收传来的id
    $id=isset($_GET['id'])?$_GET['id']:'';
    if($id){
        try {
            $con = new PDO("mysql:host=localhost;dbname=lixdb;charset=utf8;port=3306","root","");
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // 删除操作
            $sql = "delete from news where id={$id}";
            $res = $con->query($sql);
            if($res){
                echo '<script>alert("删除成功");window.location.href="index.php"</script>';
            }else{
                echo 'error';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        echo '没有id';
    }
?>