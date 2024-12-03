<?php
    namespace src\routes;

    class Routes {
        private $routes = [];

        public function add($method, $path, $action) {
            $this->routes[] = [
                'method' => $method,
                'path' => $path,
                'action' => $action
            ];
        }

        public function handleResquest() {
            $this->setCorsHeaders();

            $method = $_SERVER['REQUEST_METHOD']; // Pega o método HTTP da requisição
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Pega o endpoint
            $path = str_replace('/api_teste/public', '', $path); // pega somente o final do endpoint    

            foreach($this->routes as $r){
                if ($this->matchRoutes($r['path'], $path) && $r['method'] === $method){
                    $params = $this->getParams($r['path'], $path);
                    call_user_func($r['action'], $params);
                    return;
                }
            }
            
            http_response_code(404);
            echo json_encode(['error' => 'Rota nao Encontrada']);
        }

        private function setCorsHeaders() {
            header("Access-Control-Allow-Origin: *"); // Permite requisições de qualquer origem
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Métodos permitidos
            header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeçalhos permitidos
            if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
                http_response_code(200);
                exit();
            }
        }


        private function matchRoutes($routePath, $requestPath) {
            $routeSegments = explode('/', trim($routePath, '/')); // Separa o caminho de rota registrado em listas 
            $requestSegments = explode('/', trim($requestPath, '/'));   // Separa o caminho da requisição em listas

            if (count($routeSegments) != count($requestSegments)) {
                return false; // compara a quantidade de elementos da requisição e da rota cadastrada
            }

            foreach ($routeSegments as $index => $segment) {
                if (strpos($segment, '{') ===  false && $segment !== $requestSegments[$index]) {
                    return false;
                }
            }

            return true;
        }

        private function getParams($routePath, $requestPath) {
            $routeSegments = explode('/', trim($routePath, '/'));
            $requestSegments = explode('/', trim($requestPath, '/'));

            $params = [];

            foreach ($routeSegments as $index => $segment) {
                if (strpos($segment, '{') === 0 && strpos($segment, '}') === strlen($segment) - 1) {
                    $params[] = $requestSegments[$index] ?? null;
                }
            }

            return $params;
        }
    }

?>