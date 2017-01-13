<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/REST_Controller.php');

/** 
* Controller to handle AJAX requests. Responses are JSON data.
*/
class Services extends REST_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('poll');
        $this->load->model('votes');
    }

    public function polls_get($poll_id = NULL) {
        if (is_null($poll_id)) {
            $this->get_polls();
        }
        else {
            $this->get_poll($poll_id);
        }        
    }

    /**
    * Gets a JSON encoded list of all polls.
    */
    public function get_polls() {
        $polls = $this->poll->read_polls();

        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($polls));
    }

    /**
    * Gets a JSON encoded poll by poll id.
    * If an exception is caught, a 404 Not Found header is returned.
    */
    public function get_poll($poll_id) {
        try {
             $poll = $this->poll->read_poll($poll_id);
        }
        catch (Exception $e) {
             $this->output->set_header("HTTP/1.1 404 Not Found");
             return;
        }

        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($poll));        
    }

    /**
    * Posts a vote with the specified poll id and option number.
    * If an exception is caught, a 404 Not Found header is returned.
    */
    public function votes_post($poll_id, $option_num){
        try {
             $this->votes->submit_vote($poll_id, $option_num);
        }
        catch (Exception $e) {
             $this->output->set_header("HTTP/1.1 404 Not Found");
             return;
        }

        $this->output->set_header("HTTP/1.1 200 OK");
    }

    /**
    * Gets a JSON encoded list of the number of votes on each option, for a specified poll id.
    * If an exception is caught, a 404 Not Found header is returned.
    */
    public function votes_get($poll_id) {
        try {
             $votes = $this->votes->read_votes($poll_id);
        }
        catch (Exception $e) {
             $this->output->set_header("HTTP/1.1 404 Not Found");
             return;
        }

        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($votes));
    }

    /**
    * Deletes all votes on a poll, by poll id.
    * If an exception is caught, a 404 Not Found header is returned.
    */
    public function votes_delete($poll_id) {
        try {
             $votes = $this->votes->delete_votes($poll_id);
        }
        catch (Exception $e) {
             $this->output->set_header("HTTP/1.1 404 Not Found");
             return;
        }

        $this->output->set_header("HTTP/1.1 200 OK");
    }

}