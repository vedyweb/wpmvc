<?php

namespace VEDYWEB\WPMVC\Controller;

use VEDYWEB\WPMVC\Model\Note;
use VEDYWEB\WPMVC\View\NoteView;

/**
 * Class NoteController
 *
 * This class is responsible for managing operations related to notes.
 */
class NoteController {
    /**
     * NoteController constructor.
     *
     * This constructor adds necessary actions and enqueues scripts and styles.
     */
    public function __construct() {
        // Add WordPress actions
        add_action('admin_menu', array($this, 'addAdminMenu'));
        add_action('admin_post_wpmvc_delete_note', array($this, 'deleteNote'));
        add_action('admin_post_wpmvc_edit_note', array($this, 'editNote'));
        add_action('admin_post_wpmvc_add_note', array($this, 'addNote'));
        add_action('admin_post_wpmvc_update_note', array($this, 'updateNote'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    /**
     * Enqueues styles and scripts.
     *
     * This method adds required styles and scripts to the WordPress queue.
     */
    public function enqueue_scripts() {
        wp_enqueue_style('my-mvc-plugin-style', plugin_dir_url(__FILE__) . '../../assets/css/style.css', array(), '1.0.0');
        wp_enqueue_script('my-mvc-plugin-script', plugin_dir_url(__FILE__) . '../../assets/js/script.js', array('jquery'), '1.0.0', true);
    }

    /**
     * Adds a submenu to the admin menu.
     *
     * This method adds a submenu to the WordPress admin menu.
     */
    public function addAdminMenu() {
        add_menu_page(
            'WPMVC Notes Page',        // Page title
            'WPMVC Notes',              // Menu name
            'manage_options',           // User capability
            'wpmvc',                    // Menu URL (slug)
            array($this, 'listNote'),   // Function to generate page content
            'dashicons-admin-plugins',  // Menu icon
            20                          // Menu position
        );

        add_submenu_page(
            'wpmvc',                        // Parent menu page slug
            'WPMVC - Sub Page',            // Page title
            'Submenu',                      // Menu name
            'manage_options',               // User capability
            'wpmvc-submenu',               // Menu URL
            array($this, 'my_submenu_page') // Function to generate page content
        );
    }

    /**
     * Generates content for the submenu page.
     *
     * This method generates content for the submenu page.
     */
    public function my_submenu_page() {
        echo '<div class="wrap">';
        echo '<h2>My Submenu Page</h2>';
        // Submenu page content can be created here.
        echo '<p>You can add your content for the submenu page here.</p>';
        echo '</div>';
    }

    /**
     * Generates and renders the list of notes.
     *
     * This method retrieves notes using the Note model and renders them using the NoteView.
     */
    public function listNote() {
        $note_model = new Note();
        $notes = $note_model->getNotes();
        $node_view = new NoteView();
        echo $node_view->render('note/list', ['notes' => $notes], 'Note List');
    }

    /**
     * Adds a new note.
     *
     * This method processes the addition of a new note. If the 'add_note' parameter is set in the POST data,
     * it sanitizes and adds the note using the Note model.
     * After adding the note, the method redirects to the admin page.
     */
    public function addNote() {
        if (isset($_POST['add_note'])) {
            $note = sanitize_text_field($_POST['note']);
            $note_model = new Note();
            $note_model->addNote($note);
        }
        wp_redirect(admin_url('admin.php?page=wpmvc'));
        exit;
    }
    
    /**
     * Displays the edit page for a specific note.
     *
     * This method retrieves a note by its ID using the Note model and displays the edit page using the NoteView.
     * The note's information is passed to the view for rendering.
     */
    public function editNote() {
        if (isset($_GET['action']) && $_GET['action'] === 'wpmvc_edit_note' && isset($_GET['note_id'])) {
            $note_id = intval($_GET['note_id']);
            
            $note_model = new Note();
            $note = $note_model->getNoteById($note_id);
            $node_view = new NoteView();
            echo $node_view->render('note/edit', array('note' => $note), "Edit Page");
        }
    }

    /**
     * Updates a note based on user input.
     *
     * This method processes the update of a note's content. If the 'update_note' parameter is set in the POST data,
     * it sanitizes and updates the note content using the Note model.
     * After updating the note, the method redirects to the admin page.
     */
    public function updateNote() {
        if (isset($_POST['update_note']) && isset($_POST['note_id'])) {
            $note_id = intval($_POST['note_id']);
            $note = sanitize_text_field($_POST['note']);
            
            $note_model = new Note();
            $note_model->updateNoteById($note_id, $note);

            wp_redirect(admin_url('admin.php?page=wpmvc'));
            exit;
        }
    }

    /**
     * Deletes a note based on user request.
     *
     * This method processes the deletion of a note. If the 'action' parameter is set to 'wpmvc_delete_note' and
     * the 'note_id' parameter is set in the GET data, it deletes the note using the Note model.
     * After deleting the note, the method redirects to the admin page.
     */
    public function deleteNote() {
        if (isset($_GET['action']) && $_GET['action'] === 'wpmvc_delete_note' && isset($_GET['note_id'])) {
            $note_id = intval($_GET['note_id']);
            
            $note_model = new Note();
            $note_model->deleteNoteById($note_id);

            wp_redirect(admin_url('admin.php?page=wpmvc'));
            exit;
        }
    }
}
