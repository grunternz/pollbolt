<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index() {
		parent::__construct();
	}

	public function load_poll_view() {
		$this->load->view('polls');
	}

	public function load_vote_view() {
		$this->load->view('vote');
	}

	public function load_results_view() {
		$this->load->view('results');
	}

	public function load_about_view() {
		$this->load->view('about');
	}

	public function load_view() {
		$this->load->view('index');
	}
}