<?php

namespace Langppm;

use Phalcon\Mvc\User\Component;

class Language extends Component
{

    public $language = 'en-EN';
    private $folder = '/lang/';

    public function auto($val)
    {
        if( (is_bool($val) ) && ($val == true) ){
            //Ask browser what is the best language
            $this->language = $this->request->getBestLanguage();
        }
    }

    public function get()
    {

        if($this->session->get('language')){
            $this->language = $this->session->get('language');
        }

        //Check if we have a translation file for that lang
        if (file_exists(__DIR__.$this->folder.$this->language.'.php')) {
           require __DIR__.$this->folder.$this->language.'.php';
        } else {
           // fallback to some default
           require __DIR__.$this->folder.'en-EN.php';
        }

        //Return a translation object
        return new \Phalcon\Translate\Adapter\NativeArray(array(
           "content" => $messages
        ));

    }

    public function has(){
        return $this->language;
    }


    public function destroy(){
        $this->session->remove('language');
    }

}