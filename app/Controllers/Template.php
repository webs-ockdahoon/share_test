<?php

namespace App\Controllers;

class Template extends BaseController
{
    protected $viewPath = "template";

    public function index()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("main");
        return $this->run();
        //return view('welcome_message');
    }

    public function sub()
    {
        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView("sub");
        return $this->run();
        //return view('welcome_message');
    }

    public function board($board = NULL)
    {
        $items = [
          [
              'is_notice' => FALSE,
              'created_at' => '2021-09-27 13:57:04',
              'title' => 'KNN 메디컬 캐내네 건강튜브(1010임산부의 날 특집) _ 산부인과 오소라교수 출연',
              'content' => '<img src="https://www.damc.or.kr/program/ckfinder/userfiles/images/09%EC%9B%94_%ED%99%8D%EB%B3%B4%ED%86%A1(1).jpg" alt=""><br><p>예시용 페이지입니다.</p>',
              'attachments' => ['첨부파일1.pdf', '첨부파일2.zip'],
          ],
            [
                'is_notice' => TRUE,
                'created_at' => '2021-09-23 11:15:40',
                'title' => '10월 대체공휴일 진료안내',
                'content' => '<p>예시용 페이지입니다.</p><br><img src="https://www.damc.or.kr/program/ckfinder/userfiles/images/09%EC%9B%94_%ED%99%8D%EB%B3%B4%ED%86%A1(1).jpg" alt=""><br>',
            ]
        ];

        $this->setUseLayout(false); // 레이아웃은 view 에서 선택하기 위해 해당 기능 해제
        $this->setView($board ? "board/{$board}" : "board", ['items' => $items]);
        return $this->run();
        //return view('welcome_message');
    }
}