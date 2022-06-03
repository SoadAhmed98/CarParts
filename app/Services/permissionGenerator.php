<?php
namespace App\Services;

use Illuminate\Support\Facades\Route;

class permissionGenerator {
    private array $permissions=[];
    public function generate()
    {  
        
        foreach(Route::getRoutes() AS $key => $route){
            //dd($route);
            $action=$route->getAction();
            // dd($action);
            if(array_key_exists('controller',$action) &&
            !in_array('api',$action['middleware']) && 
            str_starts_with($action['controller'],"App\Http\Controllers\Admin") &&
            str_contains($action['controller'],"@"))
                {
                    $actionArray=explode("@",$action['controller']);
                    $method=$actionArray[1];
                    $controller=$actionArray[0];
                    $this->permissions[$controller][]=$method;
                }
        
        }
        return $this;
    }
    public function exceptNamespaces(array $namespaces)
    {
        foreach($this->permissions as $fullnamespace => $methods){
          foreach($namespaces as $namespace){
              if(str_starts_with($fullnamespace,$namespace)){
                  unset($this->permissions[$fullnamespace]);
              }
          }
        }
        return $this;
    }
    public function exceptController(array $controllers)
    {
          foreach($controllers as $controller){
              if(array_key_exists($controller,$this->permissions)){
                  unset($this->permissions[$controller]);
              }
          }
        return $this;
    }
    public function exceptMethods(array $givenMethods)
    {
       
        foreach($this->permissions as $fullnamespace => $methods){
          foreach($methods as $index=>$method){
              if(in_array($method,$givenMethods)){
                  unset($this->permissions[$fullnamespace][$index]);
              }
          }
        }
        return $this;
    }
    public function getFullNamespace()
    {
        return $this->permissions;
    }
    public function get()
    {   $permissions=[];
        foreach($this->permissions as $fullnamespace => $methods){
          $permissions[str_replace("Controller","",last((explode('\\',$fullnamespace) )))]=$methods  ;
        }
        return $permissions;
    }
}
?>