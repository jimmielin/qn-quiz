<?php
/**
 * Quiz (Class 8 Event) Application
 * @package     ps.jimmielin.qn
 * @version     1.0
 * @copyright   (c) 2014 Jimmie Lin <jimmie.lin@gmail.com>
 * @author      Jimmie Lin <jimmie.lin@gmail.com>
 */
App::uses('Controller', 'Controller');

class QuestionsController extends AppController {
	var $uses = array("Question", "Subject", "Config");
	/**
	 * Live.
	 */
	public function start() {
		$sDatas = $this->Subject->find("all");
		$this->set("sDatas", $sDatas);
	}
	
	/**
	 * Control Backend Panel.
	 */
	public function backend($action = "dashboard", $extra1 = "", $extra2 = "", $extra3 = "") {
		$this->layout = "backend";
		if(!$this->inBackend = $this->Session->read("System.isBackend")) {
			$this->redirect("/questions/balogin");
		}
		
		$cDataRaw = $this->Config->find("all");
		foreach($cDataRaw as $key => $value) {
			$cData[$value["Config"]["key"]] = $value["Config"]["value"];
		}
		
		$this->set("cData", $cData);
		
		switch($action) {
			case "setMode":
				$this->Config->id = 4;
				$this->Config->saveField("value", $extra1);
				
				if($cData["currentShowGrid"] == 1) {
					$this->Config->id = 7;
					$this->Config->saveField("value", 0);
				}
				
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "setSpecial":
				$this->Config->id = 9;
				$this->Config->saveField("value", $extra1);
				
				$this->Config->id = 4;
				$this->Config->saveField("value", 5);
				
				if($extra1 == "grid") {
					$this->Config->id = 7;
					$this->Config->saveField("value", 1);
				}
				else {
					$this->Config->id = 7;
					$this->Config->saveField("value", 0);
				}
				
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "showHint":
				$this->Config->id = 2;
				$this->Config->saveField("value", 1);
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "hideHint":
				$this->Config->id = 2;
				$this->Config->saveField("value", 0);
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "showAnswer":
				$this->Config->id = 3;
				$this->Config->saveField("value", 1);
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "hideAnswer":
				$this->Config->id = 3;
				$this->Config->saveField("value", 0);
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "dashboard":
			default:
				$qDataCount = $this->Question->find("count");
					$qDataActiveCount = $this->Question->find("count", array("conditions" => array("Question.status" => 0)));
					
				$cqData = $this->Question->find("first",
					array(
						"conditions" => array("Question.id" => $cData["currentQuestion"]),
						"contain" => array("Subject")
					)
				);
				
				$sDatas = $this->Subject->find("all",
					array(
						"contain" => array(
							"Question" => array(
								"limit" => 10,
								"order" => "RAND()",
								"conditions" => array(
									"Question.status" => 0
								)
							)
						)
					)
				);
				foreach($sDatas as $sKey => $sData) {
					$sDatas[$sKey]["Subject"]["count"] = $this->Question->find("count", array("conditions" => array("Question.subject_id" => $sData["Subject"]["id"], "Question.status" => 0)));
				}
				
				$this->set(compact("qDataCount", "qDataActiveCount", "sDatas", "cqData"));
			break;
		}
	}
	
	/**
	 * Admin Panel.
	 */
	public function admin($action = "dashboard", $extra1 = "", $extra2 = "", $extra3 = "") {
		$this->layout = "admin";
		if(!$this->userData = $this->adminLogins[$this->Session->read("System.isAdmin")]) {
			$this->redirect("/questions/adlogin");
		}
		
		$cDataRaw = $this->Config->find("all");
		foreach($cDataRaw as $key => $value) {
			$cData[$value["Config"]["key"]] = $value["Config"]["value"];
		}
		
		$this->set("cData", $cData);
		
		switch($action) {
			case "setMode":
				$this->Config->id = 4;
				$this->Config->saveField("value", $extra1);
				
				$this->redirect($_SERVER["HTTP_REFERER"]);
			break;
			
			case "edit":
				$actionName = "题库管理";
				$actionDesc = "这里可以浏览题库中的所有题目和添加新题.";
			
				$qDatas = $this->Question->find("all", array(
					"contain" => array("Subject" => array("fields" => array("name"))),
					"order" => array(
						"id" => "asc"	
					)
				));
				
				$this->set(compact("qDatas"));
			break;
			
				case "mode":
					$qData = $this->Question->findById($extra1);
					if(!$qData) $this->redirect("/questions/admin/edit");
					$this->Question->id = $extra1;
					$this->Question->saveField("status", ($qData["Question"]["status"] == 0 ? 1 : 0));
					$this->redirect("/questions/admin/edit");
				break;
				
				case "open":
					if($extra2 == "success") $this->set("success", true);
					$actionName = "编辑题库";
					$actionDesc = "请填写下面的表格修改题库中已经有的题目. 请确认数据后点击保存.";
					
					$sDatas = $this->Subject->find("all");
				
					$this->set(compact("sDatas"));
					
					$qData = $this->Question->findById($extra1);
					if(!$qData) $this->redirect("/questions/admin/edit");
					
					if(isset($this->data["Question"]["content"])) {
						$nqData = $this->data;
						if(isset($this->data["Question"]["isGridQuestion"])) {
							$nqData["Question"]["status"] = 9;
						}
						
						$this->Question->id = $qData["Question"]["id"];
						$this->Question->save($nqData);
						
						$this->redirect("/questions/admin/open/" . $qData["Question"]["id"] . "/success");
					}
					
					$this->set("qData", $qData);
				break;
			
			case "add":
				$actionName = "加入题库";
				$actionDesc = "请填写下面的表格将题目加入题库.";
				
				$sDatas = $this->Subject->find("all");
				
				$this->set(compact("sDatas"));
				
				if(isset($this->data["Question"]["content"])) {
					$qData = $this->data;
					if(isset($this->data["Question"]["isGridQuestion"])) {
						$qData["Question"]["status"] = 9;
					}
					
					$this->Question->create();
					$this->Question->save($qData);
					
					$this->set("success", true);
				}
			break;
			
			case "dashboard":
			default:
				$actionName = "后台管理中心";
				$actionDesc = "这里可以管理题库系统的统计数据和比赛此时的进程.";
				
				$qDataCount = $this->Question->find("count");
					$qDataActiveCount = $this->Question->find("count", array("conditions" => array("Question.status" => 0)));
					
				$cqData = $this->Question->find("first",
					array(
						"conditions" => array("Question.id" => $cData["currentQuestion"]),
						"contain" => array("Subject")
					)
				);
				
				$sDatas = $this->Subject->find("all");
				foreach($sDatas as $sKey => $sData) {
					$sDatas[$sKey]["Subject"]["count"] = $this->Question->find("count", array("conditions" => array("Question.subject_id" => $sData["Subject"]["id"])));
				}
				
				$this->set(compact("qDataCount", "qDataActiveCount", "sDatas", "cqData"));
			break;
		}
		
		$this->set("userData", $this->userData);
		$this->set(compact("action", "actionName", "actionDesc"));
	}
	
	public function adlogin() {
		$this->layout = "admin";
		if(isset($this->data["User"]["password"])) {
			if(isset($this->adminLogins[sha1($this->data["User"]["password"])])) {
				$this->Session->write("System.isAdmin", sha1($this->data["User"]["password"]));
				$this->redirect("/questions/admin");
			}
			else {
				$this->set("error", true);
			}
		}
	}
	
		public function balogin() {
			$this->layout = "backend";
			if(isset($this->data["User"]["password"])) {
				if($this->data["User"]["password"] == "80808080") {
					$this->Session->write("System.isBackend", sha1($this->data["User"]["password"]));
					$this->redirect("/questions/backend");
				}
				else {
					$this->set("error", true);
				}
			}
		}
	
	/**
	 * AJAX Helpers.
	 */
	public function callHome($caller = "front") {
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json; charset=utf-8");
		$this->layout = "ajax";
		
		$this->Config->id = ($caller == "front" ? 5 : 6);
		$this->Config->saveField("value", time());
		
		$cDataRaw = $this->Config->find("all");
		foreach($cDataRaw as $key => $value) {
			$cData[$value["Config"]["key"]] = $value["Config"]["value"];
		}
		
		$cqData = $this->Question->find("first",
			array(
				"conditions" => array("Question.id" => $cData["currentQuestion"]),
				"contain" => array("Subject")
			)
		);
		
		die(
			json_encode(
				array(
					"cqData" => $cqData,
					"cData" => $cData
				)
			)
		);
	}
}