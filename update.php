<?php
    /*
    第一步：获取当前要修改的文章内容，显示在页面上
    第二步：修改文章内容后保存到数据库
    */
    // 接收id
    $id = isset($_GET)?$_GET['id']:'';
    if ($id) {
        try {
            $con = new PDO("mysql:host=localhost;dbname=lixdb;charset=utf8;port=3306","root","");
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // 删除操作
            $sql = "select * from news where id={$id}";
            $res = $con->query($sql);
            $data = $res->fetchAll(PDO::FETCH_ASSOC);
            // print_r($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        echo '404文章不见了';
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{margin:0;padding:0;}
        .container{
            border: 1px solid #ccc;
            width: 1000px;
            margin: 20px auto;
            display: flex;
        }
        .left{
            flex-grow: 1;
            margin: auto 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .left a{
            text-decoration: none;
            color: black;
            padding:10px;
        }
        .right{
            margin: 10px 20px 0 20px;
        }
        p{
            margin: 10px 10px 10px 10px;
            text-align: center;
        }
        input{
            width: 500px;
        }
        textarea{
            vertical-align: top;
            margin-top: 5px;
            width: 500px;
            resize: none;
            /* 让textarea无法调节宽度 */
        }
        .btn{
            display: block;
            margin: 10px auto;
            width: 80px;
            height: 50px;
            border: none;
            background: red;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            /* 将光标变成手 */
        }
        button{
            display: block;
            margin: 10px auto;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='left'>
            <a href="index.php">返回</a>
        </div>
        <div class='right'>
            <form action="updatenews.php" method="post">
                <p>修改文档</p>
                <input type="text" value="<?php echo $data['0']['id']?>" name="id" style="display:none;">
                标题：<input type="text" value="<?php echo $data['0']['title']?>" name="title"><br>
                作者：<input type="text" value="<?php echo $data['0']['author']?>" name="author"><br>
                简介：<input type="text" value="<?php echo $data['0']['des']?>" name="des"><br>
                内容：<textarea name="content" cols="50" rows="10"><?php echo $data['0']['content']?></textarea><br>
                <!-- <button type="submit">保存</button> -->
                <input type="submit" value="保存" class="btn">
                <!-- button 和 input 都可用 -->
            </form>
        </div>
    </div>
</body>
</html>