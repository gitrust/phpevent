<?php
use chillerlan\QRCode\QRCode;

class Events extends Controller {

  public function __construct() {
    parent::__construct(false);
  }

	# required parameter eventid in path
	# call /events/id
	public function index($eventid) {
		$data["eventid"] = $eventid;
		$data["event"] = $this->getEvent($eventid);
		$data["taskcount"] = $this->_model->countTasks($eventid)[0]['cnt'];
		$data["foodcount"] = $this->_model->countFood($eventid)[0]['cnt'];

		$this->render($data);
	}

	public function print($eventid) {
		$data["eventid"] = $eventid;
		$data["event"] = $this->getEvent($eventid);
		$data["qrcode"] = $this->renderQrCode($data["eventid"]);

		$data["taskcount"] = $this->_model->countTasks($eventid)[0]['cnt'];
		$data["foodcount"] = $this->_model->countFood($eventid)[0]['cnt'];
		$data["foodlist"] = $this->_model->foodlistByEvent($eventid);
		$data["tasks"] = $this->_model->tasksByEvent($eventid);

		$data['title'] = I18n::tr('title.event'); 
	
		$this->_view->render('header', $data);
		$this->_view->render('container_start', $data);
		$this->_view->render('events/event', $data);
		$this->_view->render('events/foodlist', $data);
		$this->_view->render('events/tasks', $data);
		$this->_view->render('container_end', $data);
	}

	private function render($data = array()) {
		$data['title'] = I18n::tr('title.event');
		$data["isadmin"] = $this->isAdmin();
		$data["ismanager"] = $this->isManager();
		$data["qrcode"] = $this->renderQrCode($data["eventid"]);
	
		$this->_view->render('header', $data);
		$this->_view->render('container_start', $data);
		if ($this->isLoggedIn()) {
			$this->_view->render('nav', $data);
		}
		$this->_view->render('events/nav', $data);
		$this->_view->render('events/list', $data);
		$this->_view->render('container_end', $data);   
		$this->_view->render('footer');
	}

	private function getEvent($eventid) {
		$event = $this->_model->get($eventid);
		if (empty($event)) {
			throw new Exception('Event not found for id' . $eventid);
		}
		return $event[0];
	}

	private function renderQrCode($eventid="") {
		# URL for Event
		# in Base64 Format for img tag
		return (new QRCode())->render(Conf::DIR . "events/" . $eventid);
	}


	private function header($data) {
		
		$header = $data;
		return $header;
	}

}
