<?php

class Poll extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
    * Queries the database and returns all polls.
    */
    public function read_polls() {
    	$polls = $this->db->order_by('id')->get('Polls')->result();

    	return $polls;
    }

    /*
    * Queries the database and returns the specified poll if it exists.
    * An exception is thrown otherwise.
    */
    public function read_poll($poll_id) {
    	$poll = $this->db->get_where('Polls', array('id' => $poll_id));

        if($poll->num_rows !== 1){
            throw new Exception("Poll $poll_id doesn't exist.");
        }

        $poll = $poll->result();
        $options = $this->db->order_by('option_num')->get_where('Options', array('poll_id' => $poll_id))->result();

        $answers = array();
        foreach ($options as $option) {
            $answers[] = $option->option_text;
        }
        $poll[0]->answers = $answers;

        return $poll[0];
    }


}