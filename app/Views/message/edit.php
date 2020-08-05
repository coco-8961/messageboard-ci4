<h1>修改留言內容</h1>
<form method="post" action="<?= site_url('message/update')?>">
    <table>
        <tr>
            <td>姓名：</td>
            <td><input type="text" name="name" value="<?= $message['name'] ?>"></td>
        </tr>
        <tr>
            <td valign="top">留言內容：</td>
            <td><textarea name="message" cols="20" rows="5"><?= $message['message'] ?></textarea></td>
        </tr>
        <tr>
            <td valign="top">&nbsp;</td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?= $message['id'] ?>">
</form>