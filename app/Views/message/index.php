<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Message</title>
    <style>
        #messageboard
        {
            text-align: left;
            border: 1px;
            text-align: center;
        }
        #messageboard th
        {
            padding: 15px;
            width: 50px;
            text-align: center;
            background-color:rgb(7, 190, 7);
        }
        #messageboard td
        { 
            padding: 15px;
        }

        #messageboard tr:nth-child(even)
        {
            background-color: rgb(238, 228, 228);
        }
        #messageboard td:nth-child(3),#messageboard th:nth-child(3)
        {
            width: 300px;
            text-align: left;
        }
    </style>  
    <script>
        function editmsg($id,$name,$content){
            $("h1").text("變更留言"),
            $("#msg_form")
                .attr({
                    "action":"<?= site_url('message/update') ?>",                    
                })
                .append(
                    $("<input>")
                        .attr({  
                            "name":"id",
                            "type":"hidden",
                            "value":$id,
                        })            
                )
            $("#name").attr({
                "value":$name,
            })
            $("#content").text($content);
        }
    </script>  
</head>
<body>
    <h1>留言板</h1>
    <form id="msg_form" method="post" action="<?= site_url('message/save') ?>">
        <table >
            <tr>
                <td>姓名：</td>
                <td><input id="name" type="text" name="name"></td>
            </tr>
            <tr>
                <td valign="top">留言內容：</td>
                <td><textarea id="content" name="content" cols="20" rows="5"></textarea></td>
            </tr>
            <tr>
                <td valign="top">&nbsp;</td>
                <td><input type="submit" value="送出"></td>
            </tr>
        </table>
    </form> 
    <table id="messageboard">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Message</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php if ($messages) : ?>
            <?php foreach($messages as $message) : ?>
                <tr id="messageboard_<?= $message['id'] ?>">
                    <td><?= $message['id'] ?></td>
                    <td><?= $message['name'] ?></td>
                    <td><?= $message['content'] ?></td>
                    <td><input type="button" value="編輯" onclick="editmsg(<?= $message['id'] ?>,'<?= $message['name'] ?>','<?= $message['content'] ?>')"></td>
                    <td><input type="button" value="刪除" onclick="location.href='<?= site_url('message/delete/' . $message['id']) ?>'"></td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
    
</body>
    
</html>