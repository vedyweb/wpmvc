<?php
namespace VEDYWEB\WPMVC\Model;

/**
 * Class Note
 *
 * Represents a simple note model.
 *
 * @package VEDYWEB\WPMVC\Model
 */
class Note {

    /**
     * Note constructor.
     *
     * Initializes the Note object.
     */
    public function __construct() {
        global $wpdb;
        // Initialize the database connection or perform any necessary setup here.
    }

    /**
     * Get all notes.
     *
     * Retrieves all notes from the database.
     *
     * @return array An array of note objects.
     */
    public function getNotes() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        return $wpdb->get_results("SELECT * FROM $table_name");
    }

    /**
     * Add a new note.
     *
     * Inserts a new note into the database.
     *
     * @param string $note The content of the note.
     * @return void
     */
    public function addNote($note) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        $wpdb->insert($table_name, array('note' => $note));
    }

    /**
     * Get a note by its ID.
     *
     * Retrieves a single note from the database based on its ID.
     *
     * @param int $note_id The ID of the note.
     * @return object|null The note object if found, null otherwise.
     */
    public function getNoteById($note_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        return $wpdb->get_row("SELECT * FROM $table_name WHERE id = $note_id");
    }

    /**
     * Update a note by its ID.
     *
     * Updates a note in the database based on its ID.
     *
     * @param int $note_id The ID of the note.
     * @param string $note The new content of the note.
     * @return false|int False on failure, the number of rows updated on success.
     */
    public function updateNoteById($note_id, $note) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        return $wpdb->update($table_name, array('note' => $note), array('id' => $note_id));
    }

    /**
     * Delete a note by its ID.
     *
     * Deletes a note from the database based on its ID.
     *
     * @param int $note_id The ID of the note.
     * @return false|int False on failure, the number of rows deleted on success.
     */
    public function deleteNoteById($note_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wpmvc_notes';
        return $wpdb->delete($table_name, array('id' => $note_id));
    }
}