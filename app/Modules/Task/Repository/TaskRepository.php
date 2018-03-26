<?php

namespace App\Modules\Task\Repository;

use App\Modules\Task\Models\Task;
use Illuminate\Support\Facades\Auth;
/**
 * Description of TaskRepository
 *
 * @author artmint
 */
class TaskRepository 
{ 
    
    public static function index()
    {
       // list of all taska
       return Task::orderBy('created_at', 'desc')->paginate(5);
    }
    
    private static function alphanumeric()
    {
       return str_random(25);
    }
    
    public static function getAlphanumeric()
    {
        return self::alphanumeric();
    }
    
    private static function description()
    {
        return str_random(150);
    }
    
    public static function getDescription()
    {
        return self::description();
    }
    
    public static function create()
    {
        $user = Auth::user();
        if ($user->can('create', Task::class))
        {
            Task::create([
               'id_user' => Auth::id(),
               'alphanumeric' => self::getAlphanumeric(),
               'description' => self::getDescription(),
           ]);
        } 
        else
        {
            echo 'Not Authorized';
        }
    }
    
    public static function indexUserTasks()
    {
        return Task::where('id_user', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
    }
    
    public static function show($id)
    {
        $user = Auth::user();
        $task = Task::find($id);
        if ($user->can('view', $task)) 
        {
            return $task; 
        }
        else
        {
            echo 'Not Authorized';
        }
    } 
    
    public static function edit($id)
    {
        return Task::find($id);
    }
    
    public static function update($task)
    {
        Task::where('id', $task['id'])->update([
            'alphanumeric' => $task['alphanumeric'],
            'description' => $task['description'],
            'status' => $task['status']
        ]);
    } 
    
    public static function destroy($id)
    {
        return Task::find($id)->delete();
    }
    
}
