<?php
/**
 * Quiz (Class 8 Event) Application
 * @package     ps.jimmielin.qn
 * @version     1.0
 * @copyright   (c) 2014 Jimmie Lin <jimmie.lin@gmail.com>
 * @author      Jimmie Lin <jimmie.lin@gmail.com>
 */
class Subject extends AppModel {
    public $hasMany = array("Question");
}
