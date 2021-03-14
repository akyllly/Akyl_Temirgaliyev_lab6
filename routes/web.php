<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/add', function () {
    DB::insert('insert into students(name,dateOfBirth,gpa,advisor) values(?,?,?,?)',['Akyl','2002-04-21',3,'Marzhan']);
});
Route::get('/select',function(){
    $results= DB::select('select * from students where id = ?',[1]);
    foreach($results as $students){
        echo "name is ".$students->name;
        echo "<br>";
        echo "date of birts is ".$students->dateOfBirth;
        echo "<br>";
        echo "gpa is ".$students->gpa;
        echo "<br>";
        echo "advisor is ".$students->advisor;
    }
});
Route::get('/update',function(){
    $updated = DB::update('update students set name = "Akylly" where id =?',[1]);
    return $updated;
});
Route::get('/delete',function(){
    $deleted = DB:: delete('delete from students where id = ?'[1]);
    return $deleted;
});
Route::get('/read',function(){
    $students = Student::find(1);
    return $students->name;
});
Route::get('/insert2',function(){
    $student = new Student;
    $student -> name = "Dauren";
    $student ->dateOfBirth = "1980-12-12";
    $student ->gpa = 4;
    $student -> advisor = "no";
    $student -> save();
});
Route::get('/update2',function(){
    $student = Student::find(1);
    $student ->gpa = 3;
    $student -> advisor = "Mariya Li";
    $student -> save();
});
Route::get('/delete2',function(){
    $student = Student::find(1);
    $student -> delete();
});

