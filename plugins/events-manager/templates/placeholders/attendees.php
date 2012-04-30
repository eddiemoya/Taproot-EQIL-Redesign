<<<<<<< HEAD
<?php
/* @var $EM_Event EM_Event */
$people = array();
foreach($EM_Event->get_bookings() as $EM_Booking){
	if($EM_Booking->status == 1){
		$people[$EM_Booking->person->ID] = $EM_Booking->person;
	}
}
?>
<ul class="event-attendees">
	<?php foreach($people as $EM_Person): ?>
		<li><?php echo get_avatar($EM_Person->ID, 50); ?></li>
	<?php endforeach; ?>
=======
<?php
/* @var $EM_Event EM_Event */
$people = array();
foreach($EM_Event->get_bookings() as $EM_Booking){
	if($EM_Booking->status == 1){
		$people[$EM_Booking->person->ID] = $EM_Booking->person;
	}
}
?>
<ul class="event-attendees">
	<?php foreach($people as $EM_Person): ?>
		<li><?php echo get_avatar($EM_Person->ID, 50); ?></li>
	<?php endforeach; ?>
>>>>>>> 9bd3861f4a17d2059ec74a68daba6feb66e227a2
</ul>