<?php

class Votes extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
    * Queries the database for how many votes each option has on a poll, by poll id.
    * If there are no options, the poll either has no defined options or doesn't exist
    * and as such an exception is thrown.
    */
    public function read_votes($poll_id) {
        $options = $this->db->get_where('Options', array('poll_id' => $poll_id));

        $num_options = $options->num_rows;
        if($options->num_rows < 1){
            throw new Exception("Poll $poll_id doesn't have any defined options, or doesn't exist.");
        }

        $votes = $this->db->get_where('Votes', array('poll_id' => $poll_id))->result();

        $option_count = array_pad(Array(), $num_options, 0);        
        foreach($votes as $vote){
            $option_count[$vote->option_num]++;
        }

        return $option_count;        
    }

    /*
    * Inserts a vote into the database, according to the specified poll id and option number.
    * If the query returns nothing, then the specified poll either doesn't exist or has no such option, and
    * as such an exception is thrown.
    */
    public function submit_vote($poll_id, $option_num) {
        $options = $this->db->get_where('Options', array('option_num'=>$option_num, 'poll_id'=>$poll_id));

        if($options->num_rows < 1){
            throw new Exception("Poll $poll_id doesn't exist or option number $option_num doesn't exist.");
        }

        $data = array(
            'poll_id' => $poll_id,
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'option_num' => $option_num
        );

        $this->db->insert('Votes', $data);
    }

    /*
    * Queries the database to delete all votes corresponding to the specified poll id.
    * If the query returns nothing, then the specified poll either doesn't exist or has
    * no votes yet, and as such an exception is thrown.
    */
    public function delete_votes($poll_id) {
        $votes = $this->db->get_where('Votes', array('poll_id' => $poll_id));

        if ($votes->num_rows < 1) {
            throw new Exception("Poll $poll_id doesn't exist or has no votes.");
        }

        $this->db->delete('Votes', array('poll_id' => $poll_id));
    }
}