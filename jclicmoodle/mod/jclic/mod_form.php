<?php //$Id: mod_form.php,v 1.1 2007/10/03 09:33:32 sarjona Exp $
require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_jclic_mod_form extends moodleform_mod {

    function definition() {

        global $CFG, $COURSE;
        $mform =& $this->_form;

        $strrequired = get_string('required');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'description', get_string('description'));
        $mform->setType('description', PARAM_RAW);
        $mform->setHelpButton('description', array('writing', 'questions', 'text'), false, 'editorhelpbutton');

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_jclic', get_string('header_jclic', 'jclic'));
        
        $mform->addElement('choosecoursefile', 'url', get_string('url', 'jclic'), array('courseid'=>$COURSE->id));
        $mform->setHelpButton('url', array('url',get_string('url', 'jclic'), 'jclic'), false, 'helpbutton');
        $mform->setDefault('url', '');
        $mform->setType('url', PARAM_RAW);
        $mform->addRule('url', null, 'required', null, 'client');
        
        $options = jclic_get_skins();
        $mform->addElement('select', 'skin', get_string('skin', 'jclic'), $options);
                
        $mform->addElement('text', 'width', get_string('width', 'jclic'), array('size'=>'5'));
        $mform->setDefault('width', '600');
        
        $mform->addElement('text', 'height', get_string('height', 'jclic'), array('size'=>'5'));
        $mform->setDefault('height', '400');
        
//-------------------------------------------------------------------------------
        $mform->addElement('header', 'header_score', get_string('header_score', 'jclic'));

        $options = array(-1 => get_string('unlimited','jclic'), 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 10 => 10);
        $mform->addElement('select', 'maxattempts', get_string('maxattempts', 'jclic'), $options);
        $mform->setDefault('maxattempts', '-1');
        
        $options = array('score' => get_string('avaluation_score','jclic'),'solved' => get_string('avaluation_solved','jclic'));
        $mform->addElement('select', 'avaluation', get_string('avaluation', 'jclic'), $options);
        $mform->setDefault('avaluation', '-1');

        $mform->addElement('text', 'maxgrade', get_string('maxgrade', 'jclic'), array('size'=>'5'));
        $mform->addRule('maxgrade', null, 'numeric', null, 'client');
        
        
//-------------------------------------------------------------------------------
        $this->standard_coursemodule_elements();
        // buttons
        $this->add_action_buttons();
    }


}
?>
