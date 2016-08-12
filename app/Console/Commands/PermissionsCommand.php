<?php
/**
 * Created by PhpStorm.
 * User: xiangyuwang
 * Date: 8/10/16
 * Time: 3:12 PM
 */

namespace  App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;

class  PermissionsCommand extends Command{


    /**
     * @var string
     */
    protected $signature = 'permission:update';
    /**
     * @var string
     */
    protected $description = 'Update all regisiterd permission';
    /**
     * @return int
     */
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

        $routeCollection = app()->getRoutes();
        foreach ($routeCollection as $id=>$route) {
            $name = $this->getNamedRoute($route['action']);
            if($name){
                $rows = [
                    'method' => $route['method'],
                    'path' => $route['uri'],
                    'name' => $name,
                    'controller' => $this->getController($route['action']),
                    'action' => $this->getAction($route['action']),
                ];
                $permission = Permission::firstOrCreate($rows);
                if($permission->roles->isEmpty() && $permission->roles->contains('Admin'))
                {
                    $permission->roles()->attach(1);
                }

            }

        }
        $this->info("Admin's permission updated");

    }
    /**
     * @param array $action
     * @return string
     */
    protected function getNamedRoute(array $action)
    {
        return (!isset($action['as'])) ? null : $action['as'];
    }
    /**
     * @param array $action
     * @return mixed|string
     */
    protected function getController(array $action)
    {
        if (empty($action['uses'])) {
            return 'None';
        }

        return current(explode("@", $action['uses']));
    }
    /**
     * @param array $action
     * @return string
     */
    protected function getAction(array $action)
    {
        if (!empty($action['uses'])) {
            $data = $action['uses'];
            if (($pos = strpos($data, "@")) !== false) {
                return substr($data, $pos + 1);
            } else {
                return "METHOD NOT FOUND";
            }
        } else {
            return 'Closure';
        }
    }
    /**
     * @param array $action
     * @return string
     */
    protected function getMiddleware(array $action)
    {
        return (isset($action['middleware'])) ? (is_array($action['middleware'])) ? join(", ", $action['middleware']) : $action['middleware'] : '';
    }

}