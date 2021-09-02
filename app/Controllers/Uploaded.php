<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Uploaded extends BaseController
{
    private $uploaded_path;

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // 순수 파일 경로만 추출 + 실제 파일 저장 경로 지정
        $file_path = str_replace(array(substr($this->cont_url,1)."/file/",substr($this->cont_url,1)."/download/"),"",uri_string());
        $this->uploaded_path = WRITEPATH . "uploads/" . $file_path;

        // 파일이 존재하는지 체크
        if(!file_exists($this->uploaded_path) || !$file_path){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            exit();
        }
    }

    /**
     * 일반 파일 출력
     * @return ResponseInterface
     */
	public function file()
	{
        $file = new \CodeIgniter\Files\File($this->uploaded_path);
        $mime = $file->getMimeType();
        $file = file_get_contents($this->uploaded_path);

        $this->response
            ->setStatusCode(200)
            ->setContentType($mime)
            ->setBody($file)
            ->send();
    }

    /**
     * 강제 파일 다운로드
     * @return \CodeIgniter\HTTP\DownloadResponse|nulld
     */
    public function download()
    {
        return $this->response->download($this->uploaded_path, null);
    }


}
