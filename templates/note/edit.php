<h1>Edit Note</h1>
<form method="post" action="admin-post.php?action=wpmvc_update_note&note_id="<?php echo $note->id ?>>
    <input type="hidden" name="note_id" value="<?php echo $note->id ?>">
    <input type="text" name="note" value="<?php echo $note->note ?>">
    <button type="submit" name="update_note">Update Note</button>
</form>