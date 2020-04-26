<?php
    try {
        $con = new PDO("mysql:host=localhost;dbname=lixdb;charset=utf8;port=3306","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $res=$con->query('select * from news');
        $data=$res->fetchAll(PDO::FETCH_ASSOC);
        // 字符串拼接
        $str='';
        for($i=0;$i<count($data);$i++){
            $str.="<tr>
                    <td>{$data[$i]['id']}</td>
                    <td>{$data[$i]['title']}</td>
                    <td>{$data[$i]['author']}</td>
                    <td>{$data[$i]['des']}</td>
                    <td>{$data[$i]['time']}</td>
                    <td><a href='delnews.php?id={$data[$i]['id']}'>删除</a>
                    <a href='update.php?id={$data[$i]['id']}'>修改</a></td>
                   </tr>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
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
    </style>
</head>
<body>
    <div class='container'>
        <div class='left'>
            <a href="javascript:;">所有文档列表</a>
            <a href="upload.html">上传文档</a>
        </div>
        <div class='right'>
            <table border='1' cellpadding='0' cellspacing='0' width='800' style="background: #ddd;">
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>作者</th>
                    <th>简介</th>
                    <th>时间</th>
                    <th width='32px'>操作</th>
                </tr>
                <?php
                    echo $str;
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>