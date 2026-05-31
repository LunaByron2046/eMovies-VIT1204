<?php
use Slim\Http\Request;
use Slim\Http\Response;

class RouteAction {
    private $db;

    public function __construct() {
        $this->db = new RestServerDB();
    }
    public function index(Request $request, Response $response, $args) {
        return $this->jsonResponse($response, 'success', null, 'API运行正常');
    }

    
    public function getAllGames(Request $request, Response $response) {
        $games = $this->db->getAllGames();
        return $this->jsonResponse($response, 'success', $games);
    }

    
    public function getGameById(Request $request, Response $response, $args) {
        $game = $this->db->getGameById($args['id']);
        if ($game) {
            return $this->jsonResponse($response, 'success', $game);
        }
        return $this->jsonResponse($response, 'error', null, '游戏不存在', 404);
    }

    
    public function addGame(Request $request, Response $response) {
        $data = $request->getParsedBody();
        $validation = $this->validateGameInput($data);
        
        if (!$validation['valid']) {
            return $this->jsonResponse($response, 'error', null, $validation['msg'], 400);
        }

        
        $filename = isset($data['filename']) ? $data['filename'] : 'default.jpg';
        
        $success = $this->db->addGame(
            $data['name'],
            $data['platform'],
            $data['monthly_subscription'],
            $data['category'],
            $filename
        );

        return $success
            ? $this->jsonResponse($response, 'success', null, '游戏添加成功', 201)
            : $this->jsonResponse($response, 'error', null, '添加失败', 500);
    }

    
    public function searchGames(Request $request, Response $response, $args) {
        $games = $this->db->searchGames($args['keyword']);
        return $this->jsonResponse($response, 'success', $games);
    }

    
    
    
    private function validateGameInput($data) {
        if (empty($data['name']) || empty($data['platform']) 
            || empty($data['monthly_subscription']) || empty($data['category'])) {
            return array('valid' => false, 'msg' => '必填字段不能为空');
        }
        return array('valid' => true);
    }

    private function jsonResponse(Response $response, $status, $data = null, $message = '', $code = 200) {
        return $response->withJson(array(
            'status' => $status,
            'data'   => $data,
            'message' => $message
        ), $code);
    }
}