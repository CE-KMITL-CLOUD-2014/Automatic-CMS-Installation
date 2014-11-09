<?php
class ScheduleController extends BaseController {

	public  function deleteAction() {
		$site = Site::all();
		//$data = array();
		$count_data = 0;

		for($i=0;$i<count($site);$i++) {
			$sid = $site[$i]->sid;
			$step = $site[$i]->step1.$site[$i]->step2.$site[$i]->step3.$site[$i]->step4.$site[$i]->step5.$site[$i]->step6;
			$date_create = strtotime($site[$i]->date_create);
			$date_today = strtotime(date('Y-m-d H:i:s'));
			$diff = $date_today - $date_create;

			if($diff > 3600 && $step != '111111') {
				$count_data++;
				SiteController::confirmDeleteSite($sid);
				ob_flush();
				/*$data[] = array(
				'sid' => $sid,
				'step' => $step,
				'diff' => $diff
				);*/
			}
		}

		//$count_data = count($data);

		if($count_data == 0) {
			return 'There are not any sites to delete.';
		} else {
			return 'There are '.$count_data.' sites having been deleted.';
		}

		
	}
}