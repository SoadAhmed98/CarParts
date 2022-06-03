<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\permissionGenerator;
use Spatie\Permission\Models\Permission;

class PermissionsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To Update All Permissions in DB ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         try{
              $controllers_permissions=(new permissionGenerator)->generate()->exceptNamespaces(["App\Http\Controllers\Admin\Auth"])->exceptMethods(['edit','create'])->get();
              foreach($controllers_permissions as $controller=>$permissions){
                foreach($permissions as $permission){
                      Permission::updateOrCreate(
                          ['name'=>ucwords("{$permission} {$controller}"),'guard_name'=>'admin','controller'=>$controller],
                          ['name','guard_name','controller']
                        );
                    }
                }
                $this->info("Permissions Updated Successfully");
        }
        catch(\Exception $e){
                $this->error("Something went wrong ,{$e->getMessage()}");
            }
       
    }
}
