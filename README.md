Language
==================

Installation & Configuration
-------------

To install

    ppm install language


example to add library:

	$di->set('lang', function(){
		$lang = new Language();
		// lang auto ask to the browser for the lenguage
		$lang->auto(false);
		return $lang;
	});


execute in controller

    public function enAction(){

      // save the lenguage in session
      // if you can change the lenguage you ned modify this session
      $this->session->set('language','en-EN');

      // return the session lenguage
      // $this->lang->has();

      // return object with translations you can pass this object to the view
      // $this->lang->get();

      $this->view->setVar("t", $this->lang->get());

    }
