<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the editing form for the freetext question type.
 *
 * @package    qtype
 * @subpackage freetext
 * @copyright  2017 Damion Young (msdlt@medsci.ox.ac.uk)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * freetext question editing form definition.
 *
 * @copyright  2017 Damion Young (msdlt@medsci.ox.ac.uk)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_freetext_edit_form extends question_edit_form {

    /**
     * Add question-type specific form fields.
     *
     * @param MoodleQuickForm $mform the form being built.
     */
    protected function definition_inner($mform) {
        //the api id of the question that this will mark
        //TODO - long-term, display list of possible questions
        $mform->addElement('text', 'api_id',
                get_string('api_id', 'qtype_freetext'),
                array('size' => 20));
        $mform->setType('api_id', PARAM_INT); 
        $this->add_interactive_settings();
    }

    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_hints($question);

        return $question;
    }

    public function qtype() {
        return 'freetext';
    }
}
