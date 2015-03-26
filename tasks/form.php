<form action="index.php?page=tasks&action=<?php echo isset($data) ? 'update&id=' . $data['id'] : 'create'; ?>" method="post">
    <table border="0px">
        <?php if (isset($data['id'])): ?>
        <tr>
            <td>ID: </td>
            <td><input type="text" name="id" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" /></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><textarea name="description"><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea></td>
        </tr>
        <tr>
            <td>Priority: </td>
            <td>
                <select name="priority">
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Created: </td>
            <td><input type="text" name="created" value="<?php echo isset($data['created']) ? $data['created'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td>Due date: </td>
            <td><input type="text" name="dueDate" value="<?php echo isset($data['dueDate']) ? $data['dueDate'] : ''; ?>" /></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="<?php echo isset($data) ? 'Update' : 'Create'; ?>" /></td>
        </tr>
    </table>
</form>