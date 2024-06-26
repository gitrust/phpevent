<?php

class Controller
{

	protected $_view;
	protected $_model;

	function __construct($needsLogin = false)
	{
		$this->_view = new View();

		if ($needsLogin) {
			$this->checkAccess();
		}

		$name = get_class($this);
		$modelpath = Conf::SRCROOT . '/models/' . strtolower($name) . '_model.php';


		if (file_exists($modelpath)) {
			require $modelpath;

			$modelName = $name . '_Model';
			$this->_model = new $modelName();
		}
	}

	protected function redirectToLogin()
	{
		// location to go if user is not logged in
		$data['location'] = 'login/';

		// redirect and die
		$this->_view->render('redirect', $data);
	}

	protected function redirectTo($page)
	{
		$data['location'] = $page;

		$this->_view->render('redirect', $data);
	}

	private function getControllerName()
	{
		return strtolower(get_class($this));
	}

	private function checkAccess()
	{
		if (!Session::get("userid")) {
			$this->redirectToLogin();
		}
	}

	protected function isPost()
	{
		return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
	}

	protected function isLoggedIn()
	{
		return !empty(Session::get("userid"));
	}

	protected function isAdmin()
	{
		return $this->_model->isUserAdmin(Session::get("userid"));
	}

	protected function isManager()
	{
		return $this->_model->isUserManager(Session::get("userid"));
	}

	protected function isUser()
	{
		return $this->_model->isUser(Session::get("userid"));
	}

	protected function getParamGet($name, $default = null)
	{
		if (isset($_GET[$name])) {
			return $_GET[$name];
		}
		return $default;
	}

	protected function getOrDefault($var, $default = null)
	{
		return isset($var) ? $var : $default;
	}

	protected function getParamPost($name, $default = null)
	{
		if (isset($_POST[$name])) {
			return $_POST[$name];
		}
		return $default;
	}


}
