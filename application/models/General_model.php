<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
	//	$this->load->view('welcome_message');
	}
	
	public function get_user_data($uid){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('user_profile', 'user_profile.uid = users.id', 'left');
		$this->db->join('subs_packages', 'subs_packages.spk_slug = users.subs_package_slug', 'left');
		$this->db->where('users.id', $uid);
		
		return $this->db->get()->row();
	}
		
	public function get_note_contacts(){

		$this->db->select('*');
		$this->db->from('notification_contacts');
		$this->db->where('status', 1);
		if( $this->logedin_user->usertype == 'generaluser' ){
			$this->db->where('userid', $this->session->userdata('logedin_user')->id);
		}
		$conts = $this->db->get()->result_object();
		
		return $conts;
	}
		
	public function get_ques_average_rating( $rid )
	{
		$this->db->select('*');
		$this->db->from('reviews');
		$this->db->where('id', $rid);
		$first_rating = $this->db->get()->row()->first_rating;
	//	prex($rid);
		
		// Get question reviews 
		$this->db->select('*');
		$this->db->from('question_ratings');
		$this->db->where('rid', $rid);
		$rev = $first_rating;
		$actRev = []; // only this review which is greater then 0
		$ratingPercentage = '';
		foreach( $this->db->get()->result_object() as $actRev_k => $actRev_v ){
			
		//	if( $actRev_v->review > 0 ){
				$rev = $rev + $actRev_v->review;
				array_push($actRev, $actRev_v);
		//	}
		}
		/*
		pre($rev);
		pre($revItem = count($actRev));
		pre($actRev);
		*/
		$revItem = count($actRev) + 1;
		if( $revItem > 0 ){
			
			$ratingPercentage = ($rev / $revItem) * 10;
		}
	//	prex($ratingPercentage);
		return $ratingPercentage;
	}
	
	public function get_overall_avr_rating( $from = null ){
		/* 
		$this->db->select('*');
		$this->db->from('reviews');
		if($this->logedin_user->usertype == 'generaluser'){
			
			$this->db->where('for_pgid',$this->logedin_user->id);
		}
		 */
		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('pg.userid',$this->logedin_user->id);
		}
		if( $from != null ){
			$this->db->where('rv.inserted_at >',$from);
		}
		$first_rating = $this->db->get()->result_object();
		$all_ratings_total = 0;
		$count_total_ret_item = count($first_rating);
		
	//	prex($count_total_ret_item);
		foreach( $first_rating as $fr_k => $fr_v ){
			
		//	pre( $this->get_ques_average_rating($fr_v->id) );
		//	pre( $this->get_ques_average_rating($fr_v->id) );
			$all_ratings_total = $all_ratings_total + $this->get_ques_average_rating($fr_v->id);
		}
		if( $count_total_ret_item != 0 ){
			return $all_ratings_total / $count_total_ret_item;	
		}else{
			return false;
		}
	}
	public function get_overall_avr_rating_admin( $from = null ){
		
		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if( $from != null ){
			$this->db->where('rv.inserted_at >',$from);
		}
		$first_rating = $this->db->get()->result_object();
		$all_ratings_total = 0;
		$count_total_ret_item = count($first_rating);
		
	//	prex($count_total_ret_item);
		foreach( $first_rating as $fr_k => $fr_v ){
			
		//	pre( $this->get_ques_average_rating($fr_v->id) );
		//	pre( $this->get_ques_average_rating($fr_v->id) );
			$all_ratings_total = $all_ratings_total + $this->get_ques_average_rating($fr_v->id);
		}
		if( $count_total_ret_item != 0 ){
			return $all_ratings_total / $count_total_ret_item;	
		}else{
			return false;
		}
	}

	public function get_overall_avr_rating_ind(){

		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		if($this->logedin_user->usertype == 'generaluser'){
			$this->db->where('pg.userid',$this->logedin_user->id);
		}
		$first_rating = $this->db->get()->result_object();
		$all_ratings_total = 0;
		$count_total_ret_item = count($first_rating);
		
		$ratings = [];
		$ratings['star1'] = 0;
		$ratings['star2'] = 0;
		$ratings['star3'] = 0;
		$ratings['star4'] = 0;
		$ratings['star5'] = 0;
		$ratings['star6'] = 0;
		$ratings['star7'] = 0;
		$ratings['star8'] = 0;
		$ratings['star9'] = 0;
		$ratings['star10'] = 0;
		
		foreach( $first_rating as $fr_k => $fr_v ){
			$avr_rating = $this->get_ques_average_rating($fr_v->id);
			switch ( true ) {
				 case $avr_rating <= 10 :
					
						$ratings['star1'] = $ratings['star1'] + 1;
					  break;
				 case $avr_rating <= 20 :
					
						$ratings['star2'] = $ratings['star2'] + 1;
					  break;
				 case $avr_rating <= 30 :
					
						$ratings['star3'] = $ratings['star3'] + 1;
					  break;
				 case $avr_rating <= 40 :
					
						$ratings['star4'] = $ratings['star4'] + 1;
					  break;
				 case $avr_rating <= 50 :
					
						$ratings['star5'] = $ratings['star5'] + 1;
					  break;
				 case $avr_rating <= 60 :
					
						$ratings['star6'] = $ratings['star6'] + 1;
					  break;
				 case $avr_rating <= 70 :
					
						$ratings['star7'] = $ratings['star7'] + 1;
					  break;
				 case $avr_rating <= 80 :
					
						$ratings['star8'] = $ratings['star8'] + 1;
					  break;
				 case $avr_rating <= 90 :
					
						$ratings['star9'] = $ratings['star9'] + 1;
					  break;
				 case $avr_rating <= 100 :
					
						$ratings['star10'] = $ratings['star10'] + 1;
					  break;
				 default:
			}
		}
		$onlyRatings = [];
		foreach( $ratings as $r ){
			
			array_push($onlyRatings, $r);
		}
	//	prex($onlyRatings);
		return $onlyRatings;
	}
	
	public function get_overall_avr_rating_ind_admin(){

		$this->db->select('rv.*');
		$this->db->from('reviews as rv');
		$this->db->join('q_pages as pg', 'rv.for_pgid = pg.id', 'left');
		$first_rating = $this->db->get()->result_object();
		$all_ratings_total = 0;
		$count_total_ret_item = count($first_rating);
		
		$ratings = [];
		$ratings['star1'] = 0;
		$ratings['star2'] = 0;
		$ratings['star3'] = 0;
		$ratings['star4'] = 0;
		$ratings['star5'] = 0;
		$ratings['star6'] = 0;
		$ratings['star7'] = 0;
		$ratings['star8'] = 0;
		$ratings['star9'] = 0;
		$ratings['star10'] = 0;
		
		foreach( $first_rating as $fr_k => $fr_v ){
			$avr_rating = $this->get_ques_average_rating($fr_v->id);
			switch ( true ) {
				 case $avr_rating <= 10 :
					
						$ratings['star1'] = $ratings['star1'] + 1;
					  break;
				 case $avr_rating <= 20 :
					
						$ratings['star2'] = $ratings['star2'] + 1;
					  break;
				 case $avr_rating <= 30 :
					
						$ratings['star3'] = $ratings['star3'] + 1;
					  break;
				 case $avr_rating <= 40 :
					
						$ratings['star4'] = $ratings['star4'] + 1;
					  break;
				 case $avr_rating <= 50 :
					
						$ratings['star5'] = $ratings['star5'] + 1;
					  break;
				 case $avr_rating <= 60 :
					
						$ratings['star6'] = $ratings['star6'] + 1;
					  break;
				 case $avr_rating <= 70 :
					
						$ratings['star7'] = $ratings['star7'] + 1;
					  break;
				 case $avr_rating <= 80 :
					
						$ratings['star8'] = $ratings['star8'] + 1;
					  break;
				 case $avr_rating <= 90 :
					
						$ratings['star9'] = $ratings['star9'] + 1;
					  break;
				 case $avr_rating <= 100 :
					
						$ratings['star10'] = $ratings['star10'] + 1;
					  break;
				 default:
			}
		}
		$onlyRatings = [];
		foreach( $ratings as $r ){
			
			array_push($onlyRatings, $r);
		}
	//	prex($onlyRatings);
		return $onlyRatings;
	}
	
	public function rating_star($overall_avr_rating = null){
		$ret = '';
		if( $overall_avr_rating != null ){

			switch ( true ) {
				 case $overall_avr_rating <= 10 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star-half-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 20 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 30 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-half-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 40 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 50 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-half-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 60 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 70 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-half-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 80 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 90 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-half-o" aria-hidden="true"></i>
					';
					  break;
				 case $overall_avr_rating <= 100 :
					$ret .= '
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star" aria-hidden="true"></i>
					';
					  break;
				 default:
					$ret .= '
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					 <i class="txt_xlrting fa fa-star-o" aria-hidden="true"></i>
					';
			}
		}
		return $ret;
	}
	
	

	public function get_queations_ratings( $qid = null ){
		
		$this->db->select('*');
		$this->db->from('question_ratings');
		if( $qid != null ){
			$this->db->where('qid =',$qid);
		}
	//	prex($this->db->get()->result_object());
		$qus_rating = $this->db->get()->result_object();
	
		$ratings = [];
		$ratings['star1'] = 0;
		$ratings['star2'] = 0;
		$ratings['star3'] = 0;
		$ratings['star4'] = 0;
		$ratings['star5'] = 0;
		$ratings['star6'] = 0;
		$ratings['star7'] = 0;
		$ratings['star8'] = 0;
		$ratings['star9'] = 0;
		$ratings['star10'] = 0;
		
		foreach( $qus_rating as $qr_k => $qr_v ){
			switch ( true ) {
				 case $qr_v->review <= 1 :
					
						$ratings['star1'] = $ratings['star1'] + 1;
					  break;
				 case $qr_v->review <= 2 :
					
						$ratings['star2'] = $ratings['star2'] + 1;
					  break;
				 case $qr_v->review <= 3 :
					
						$ratings['star3'] = $ratings['star3'] + 1;
					  break;
				 case $qr_v->review <= 4 :
					
						$ratings['star4'] = $ratings['star4'] + 1;
					  break;
				 case $qr_v->review <= 5 :
					
						$ratings['star5'] = $ratings['star5'] + 1;
					  break;
				 case $qr_v->review <= 6 :
					
						$ratings['star6'] = $ratings['star6'] + 1;
					  break;
				 case $qr_v->review <= 7 :
					
						$ratings['star7'] = $ratings['star7'] + 1;
					  break;
				 case $qr_v->review <= 8 :
					
						$ratings['star8'] = $ratings['star8'] + 1;
					  break;
				 case $qr_v->review <= 9 :
					
						$ratings['star9'] = $ratings['star9'] + 1;
					  break;
				 case $qr_v->review <= 10 :
					
						$ratings['star10'] = $ratings['star10'] + 1;
					  break;
				 default:
			}
		}
		return (object)$ratings;
	}
	
	
	public function setting_option( $slug = null ){
		
		if( $slug != null ){
				
			$this->db->select('*');
			$this->db->from('settings');
			$this->db->where('option_slug =',$slug);
			$opt_val = $this->db->get()->row();
			return $opt_val->option_value;
		}else{
			return '';
		}
	}

}
