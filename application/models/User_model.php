<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
	//	$this->load->view('welcome_message');
	}
	
	public function user_data_by_id( $uid = null ){
      
		if( $uid != null ){
			
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('user_profile', 'user_profile.uid = users.id', 'left');
			$this->db->join('subs_packages', 'subs_packages.spk_slug = users.subs_package_slug', 'left');
			$this->db->where('users.id', $uid);
			$userdata = $this->db->get()->row();
			unset($userdata->password);
			return $userdata;
		}else{
			return [];
		}
	//	prex($uid);
	}
   
   public function check_package_limit( $uid )
   {
      $theUser = $this->user_data_by_id($uid);
   //   prex($theUser);
      if( $theUser->usertype == 'generaluser' ){
         if( 
            $theUser->subs_package_slug == 'bronze' || 
            $theUser->subs_package_slug == 'gold' || 
            $theUser->subs_package_slug == 'silver'
            ){
               
         //   pre($theUser);
               $pkg_end_date = date("Y-m-d", strtotime(date("Y-m-d", strtotime($theUser->subs_start_date)) . " + 1 year")); 
           //    pre($theUser);
            //   pre($pkg_end_date);
            //   prex(date("Y-m-d"));
               if (date("Y-m-d") > $pkg_end_date) {
               //    prex(5454);
                     $subs_plan = array(
                        'subs_package_slug' => 'free'
                     );
                     $this->db->where('id', $uid);
                     $this->db->update('users', $subs_plan);
               }
            
            
         }
      }
      /*
            pre($theUser->subs_package_slug);
            pre('last date: ' . date("Y-m-d", strtotime(date("Y-m-d", strtotime($theUser->subs_start_date)) . " + 1 year")));
            pre('Today: ' . date("Y-m-d"));
            exit;
            */
   }
   
   
   public function check_package_condetions( $uid )
   {
      $theUser = $this->user_data_by_id($uid);
   //   prex($theUser);
      if( $theUser->usertype == 'generaluser' ){
         if( $theUser->subs_package_slug == 'bronze' ){

            $social_links = array(
               'pos_rdr_url_yelp' => '',
               'pos_rdr_url_trip_advisor' => '',
               'pos_rdr_url_urban_spoon' => '',
               'pos_rdr_url_city_search' => ''
            );
            $this->db->where('uid', $uid);
            $this->db->update('user_profile', $social_links);
         }
      }
   }
   
   
}