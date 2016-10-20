<?php
namespace Dashboard\Controller;
use Think\Controller;
class AjaxController extends MainController {

	public function searchans(){
		$qid = i('get.qid');
		$this->ajaxReturn(D('answer')->where('qid='.$qid)->select());
	}

	public function addans(){
		$qid = I('post.qid');
		$answer = I('post.answer');
		$aorder = I('post.aorder');
		$Ans = D('answer');
		$r = $Ans->Add_Answer($qid, $answer, $aorder);
		if($r){
			$this->ajaxReturn(true);
		}
		else{
			$this->ajaxReturn(false);
		}
	}

	public function addques(){
		$eid = I('post.eid');
		$gid = I('post.gid');
		$qtype = I('post.qtype');
		$question = I('post.question');
		$qorder = I('post.qorder');
		$Qus = D('question');
		if($qtype=='K'){
			$question = htmlspecialchars_decode($question);
		}
		$r = $Qus->Add_Question($eid, $gid, $qtype, $question, $qorder);
		if($r){
			$this->ajaxReturn(true);
		}
		else{
			$this->ajaxReturn(false);
		}
	}
}