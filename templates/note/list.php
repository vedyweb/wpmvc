<h1>Add Note</h1>
<form id="add-note-form" action="admin-post.php?action=wpmvc_add_note" method="post">
    <input type="text" name="note" placeholder="Enter note" required>
    <input type="submit" name="add_note" value="Add Note">
</form>

<h2>Basic List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Node</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notes as $note): ?>
        <tr>
            <td><?php echo $note->id; ?></td>
            <td><?php echo $note->note; ?></td>
            <td>
                <a href="admin-post.php?action=wpmvc_edit_note&note_id=<?php echo $note->id; ?>">Edit</a>
                <a href="admin-post.php?action=wpmvc_delete_note&note_id=<?php echo $note->id; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
