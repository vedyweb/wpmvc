<?php

namespace VEDYWEB\WPMVC\View;

/**
 * Class NoteView
 *
 * This class handles rendering of templates for notes.
 */
class NoteView {

    /**
     * Renders a template with provided data.
     *
     * This method renders a template with optional data and a title. It uses output buffering to capture
     * the rendered content and returns it.
     *
     * @param string $template The template file to be rendered (excluding file extension).
     * @param array $data Optional data to be passed to the template.
     * @param string $title Optional title to be used for the template.
     * @return string The rendered content of the template.
     */
    public function render($template, $data = [], $title = "") {
        ob_start();
        extract($data);
        include __DIR__ . '/../../templates/layout/header.php';
        include __DIR__ . '/../../templates/' . $template . '.php';
        include __DIR__ . '/../../templates/layout/footer.php';
        return ob_get_clean();
    }
}