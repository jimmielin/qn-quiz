<?php
/**
 * Quiz (Class 8 Event) Application
 * @package     ps.jimmielin.qn
 * @version     1.0
 * @copyright   (c) 2014 Jimmie Lin <jimmie.lin@gmail.com>
 * @author      Jimmie Lin <jimmie.lin@gmail.com>
 */
App::uses('Controller', 'Controller');

class AppController extends Controller {
    public function beforeFilter() {
        $this->adminLogins = array(
            "24c973699f14c6d348690b00bf0e918287cc63cd" => array(
                "name" => "林海芃",
                "privilege" => 2
            )
        );
        
        $this->cName = "&infin;挑战";
        $this->set("cName", $this->cName);
        
        $this->cDesc = "高二(8)班中华文化传统知识竞赛";
        $this->set("cDesc", $this->cDesc);
    }
}