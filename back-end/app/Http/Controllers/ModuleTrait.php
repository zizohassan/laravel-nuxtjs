<?php
namespace App\Http\Controllers;

trait ModuleTrait
{
    protected function setModuleName($module_name)
    {
        $this->module_name = $module_name;
    }

    protected function initModel()
    {
        $module = \Str::lower($this->module_name);
        $module = \Str::singular($module);
        $module = \str::camel($module);
        $module = \Str::ucfirst($module);
        if (in_array($module, $this->expectModules())) {
            return false;
        }
        $namespace = 'App\\' . $module;
        $this->model = new $namespace;

    }

    protected function expectModules()
    {
        return ['Contact'];
    }
}