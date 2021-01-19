<?php
    include "pdo.php";
    $pdo = getPdo();
    $sql = "select * from p_rooms";
    $res = $pdo->query($sql);
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';print_r($data);echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .divs {
            width: 100px;
            height: 100px;
            float: left;
            background-color: green;
            border: 1px solid #fff;
            margin: 5px;
        }
        #container{
            width: 500px;
        }
    </style>
</head>
<body>
    <h1>房间定号</h1>
    <h3 id="date"></h3>
    <div id="container">

        <?php
            foreach($data as $k=>$v){
                $id = $v['id'];
                $price = $v['price'] / 100;


                echo "<div class=\"divs\" data-id=\"{$id}\">";
                echo "<button class=\"btn\">可预订 ￥{$price}.00</button>";
                echo "{$v['name']}";
                echo "</div>";
            }
        
        ?>
        
    </div>
    <script src="functions.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        setInterval(function(){
            document.getElementById("date").innerText = getDate()
        },1000)


        $(".btn").click(function(){

            var id = $(this).parent().attr("data-id")
            var self = $(this)

            if(confirm("确定订座吗？")){
                $.ajax({
                    url: 'seat.php',
                    method: 'get',
                    data: {id:id},
                    dataType:'json'
                }).done(function(res){
                    console.log(res)
                    if(res.errno==0)
                    {
                        console.log("预订成功")
                        self.parent().css("background-color","red")
                        self.text("已预订")
                        self.attr("disabled","disabled")
                    }
                })
            }
        })
    </script>
</body>
</html>