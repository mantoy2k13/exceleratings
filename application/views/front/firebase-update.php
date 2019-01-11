
<script src="https://www.gstatic.com/firebasejs/5.7.0/firebase.js"></script>
<script>
	// Initialize Firebase
	var config = {
		apiKey: "AIzaSyD-fJuBn0DP3Ep0DSZ1pYs-vllNtVRH7dE",
		authDomain: "exceleratings.firebaseapp.com",
		databaseURL: "https://exceleratings.firebaseio.com",
		projectId: "exceleratings",
		storageBucket: "exceleratings.appspot.com",
		messagingSenderId: "411841575861"
	};
	firebase.initializeApp(config);
</script>

<script>
 
	firebase.database().ref('<?=$user_id?>/total_average_rating_alltime').set('<?=round($overall_avr_rating,1); ?>');
	firebase.database().ref('<?=$user_id?>/total_number_of_reviews').set('<?=$total_rating_item?>');
	firebase.database().ref('<?=$user_id?>/review_activity_last_30_days').set('<?php echo round($this->General_model->get_overall_avr_rating(date('Y-m-d', strtotime('-1 months'))), 1); ?>');
	firebase.database().ref('<?=$user_id?>/last_review_inserted').set('<?=$last_review_inserted?>');
	firebase.database().ref('<?=$user_id?>/total_average_rating_alltime_graph').set(<?=json_encode($total_rating_item4chart)?>);
	
	firebase.database().ref('total_average_rating_alltime').set('<?=round($overall_avr_rating_admin,1); ?>');
	firebase.database().ref('total_number_of_reviews').set('<?=$total_rating_item_admin?>');
	firebase.database().ref('review_activity_last_30_days').set('<?php echo round($this->General_model->get_overall_avr_rating_admin(date('Y-m-d', strtotime('-1 months'))), 1); ?>');
	firebase.database().ref('last_review_inserted').set('<?=$last_review_inserted_admin?>');
	firebase.database().ref('total_average_rating_alltime_graph').set(<?=json_encode($total_rating_item4chart_admin)?>);
	
	
	/* 
	function writeUserData(userId, data) {
		firebase.database().ref('screensaver_description/' + userId).set(data);
	}
	*/
</script>
