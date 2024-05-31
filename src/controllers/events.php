<?php
use chillerlan\QRCode\QRCode;

class PDF extends tFPDF
{
	const MAX_COLS = 10;
	const ROWS_PER_PAGE = 26;
	const ROW_HEIGHT = 6;
	const COL_WIDTH = 20;
	const LEFT_OFFSET = 15;
	const MAX_CELL_TEXT = 12;
	const WITH_BORDER = 1;
	const NO_BORDER = 0;
	

	public function __construct() {
        # L = Landscape, P = Portrait
		parent::__construct('L', 'mm', 'A4');
	}

	function CreateFooter() {
		$currenty = $this->GetY();

		$this->SetFont('DejaVu','I',7);
		$this->SetY(-15);
		$this->Cell(0, 10, $this->page, 0, 0, 'C');		
		$this->Cell(0, 20, I18n::tr("label.createdat") . date("j.n.Y"), self::NO_BORDER,0,'R');
		$this->Ln();

		$this->SetY($currenty);
	}

	function TrimValue($v, $maxlen){
		if (is_null($v)) {
			return '';
		}
		return substr(trim($v), 0, $maxlen);
	}

	function CreateTableHeader($header) {
		$currentx = $this->GetX();

		$col_widths = array_fill(0, self::MAX_COLS, self::COL_WIDTH);

		// Header
		$headerheight = 10;
		$this->SetFont('DejaVu','',8);
		// offset left border
		
		$this->SetX(self::LEFT_OFFSET);
		
		// first corner cell
		//$this->Cell(self::COL_WIDTH,$headerheight,'', self::NO_BORDER,0,'C');
		
		for($i=0; $i<=count($header); $i++){
			// guard: max column count
			if ($i > self::MAX_COLS) {
				break;
			}
			$this->Cell($col_widths[$i], $headerheight, $header[$i], self::NO_BORDER, 0,'C');
		}
		$this->Ln();

		$this->SetX($currentx);
	}

	function CreatePageTitle($title) {
		$cy = $this->GetY();
		$this->SetY(5);
		$this->SetFont('DejaVu','B',10);
		$this->Cell(120);
		$this->Cell(40,10,$title, self::NO_BORDER,0,'C');
		$this->Ln(20);
		$this->SetY($cy);
	}

	// Better table
	function CreateTable($header, $rows)
	{

		$this->CreateFooter();

		// y offset for the table
		$this->SetY(20);

		// header and footer
		$this->CreateTableHeader($header);
		
		
		$this->SetFont('DejaVu','',10);
		// Table Data
		$col_widths = array_fill(0, self::MAX_COLS, self::COL_WIDTH);
		$rowidx = 1;
		$pagecreated = false;
		foreach($rows as $row)
		{
			// Create new page
			$newpage = ($rowidx++ % self::ROWS_PER_PAGE) == 0;
			if ($newpage) {				
				$this->AddPage();
				$this->CreateFooter();

				// repeat header for new page
				$this->CreateTableHeader($header);
				$pagecreated = true;
			}

			// offset left border
			$this->SetX(self::LEFT_OFFSET);

			// Data Columns
			$colidx = 0;
			foreach ($row as $col) {
				$value = $col;

				// first column 
				if ($colidx == 0){
					$this->SetFont('DejaVu','',8);
					// max 30 characters
					$value = $this->TrimValue($value,30);
					$this->Cell($col_widths[$colidx++],self::ROW_HEIGHT,$value, self::WITH_BORDER,0,'L');
				} else {
					$this->SetFont('DejaVu','',7);
					$value = $this->TrimValue($value,self::MAX_CELL_TEXT);
					$this->Cell($col_widths[$colidx++],self::ROW_HEIGHT,$value, self::WITH_BORDER,0,'C');
				}

				// guard: max column count
				if ($colidx >= self::MAX_COLS) {
					continue;
				}
				
			}
			$this->Ln();
		}
	}
}  

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

	public function pdf($eventid) {
		$data["event"] = $this->getEvent($eventid);
		$data["foodlist"] = $this->_model->foodlistByEvent($eventid);
		$data["tasks"] = $this->_model->tasksByEvent($eventid);
		

		$pdf = new PDF();

		// Define Fonts that will be used in PDF
		// Add a Unicode font (uses UTF-8)
		$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
		$pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
		$pdf->AddFont('DejaVu','I','DejaVuSans-Oblique.ttf',true);

		$pdf->SetAutoPageBreak(false);
		$pdf->SetFont('DejaVu','',10);
		$pdf->SetTitle(I18n::tr("pdfreport.event.filetitle"));
		$pdf->SetCreator('events ' . Conf::APPVERSION);
		$pdf->AddPage();

		# Generate table
		$pdf->CreatePageTitle($data["event"]["title"]);

		// Foodlist
		$food_header = array("Name","Volunteer","Kategorie","Notiz");
		$rows = $this->rows1($data["foodlist"]);
		$pdf->CreateTable($food_header,$rows);

		$tasks_header = array("Name","Volunteer","Kategorie","Notiz");
		$rows2 = $this->rows1($data["tasks"]);
		$pdf->CreateTable($tasks_header,$rows2);

		$pdf->Output('event.pdf','D'); 
	}

	// Load data
	private function rows1($d)	{
		$trows = array();
		foreach ($d as $food) {
			$cols = array($food["name"],$food["volunteer"],$food["category"],$food["note"]);
			$trows[] = $cols;
		}		
		return $trows;
	}

	private function rows2($tasks)	{
		$trows = array();
		foreach ($tasks as $item) {
			$cols = array($item["name"],$item["volunteer"],$item["daytime"],$item["description"]);
			$trows[] = $cols;
		}		
		return $trows;
	}

	private function header($data) {
		
		$header = $data;
		return $header;
	}

}
