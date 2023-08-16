<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/select', function () {
//   $users = User::all(); // retorna uma collection com todos os dados
//   $users = User::get(); // retorna uma collection com todos os dados
//   $users = User::where('id', '>=', 30)->get(); // retorna uma collection com todos os dados
//   $users = User::where('id', 1)->first(); // retorna um objecto de collection
//   $users = User::first(); // retorna o primeiro objecto de collection que encontra no banco
//   $users = User::find(5); // retorna um objecto de collection
//   $users = User::findOrFail(500); // retorna um objecto de collection ou uma execption com 404
//   $users = User::where('name', 'name')->first(); // retorna um objecto de collection ou uma execption com 404
//   $users = User::where('name', 'name')->firstOrFail(); // retorna um objecto de collection ou uma execption com 404
//   $users = User::firstWhere('name', 'name'); // retorna um objecto de collection

//   dd($users);
});

Route::get('/where', function (User $user) {
    $filter = 'zella';
//   $users = $user->where('email', '=', 'cwhite@example.com')->first();
//   $users = $user->where('name', 'like', "%{$filter}%")->get();

//   $users = $user->where('name', 'like', "%{$filter}%")
//       ->orWhere('name', '=', 'Jennifer')->dd();

//    $users = $user->where('name', 'like', "%{$filter}%")
//        ->WhereNot('name', '=', 'Jennifer')->get();

//    $users = $user->where('name', 'like', "%{$filter}%")
//        ->WhereIn('name', [ 'Jennifer', "Mary"])->get();

//    $users = $user->where('name', 'like', "%{$filter}%")
//        ->orWhere(function ($query) use ($filter) {
//            $query->where('name', '!=', 'Marco')
//                ->orWhere('email', '=', 'cwhite@exemple.com')
//                ->orWhere('name', '=',$filter );
//        })->get();
//
//   dd($users);
});

Route::get('/paginate', function () {
    $filter = request('filter');
    $totalPage = request('total', 10);
//    $users = User::paginate();
//    $users = User::where('name', 'like', "%${filter}%")->paginate($totalPage);
//
//    return $users;
});

Route::get('/order-by', function () {
    $users = User::orderby('id', 'desc')->get();

    return $users;
});

Route::get('/insert', function (Post $post) {
//    $post->user_id = 1;
//    $post->title = 'Meu novo post' . Str::random(10);
//    $post->body = 'body do post.....';
//    $post->date = date('Y-m-d');
//    $post->save();

        $post->create([
            'title' => Str::random(10),
            'body' => 'data of poat',
            'date' => date('Y-m-d'),
            'user_id' => 2
        ]);


    $posts = POst::orderby('id', 'desc')->get();

    return $posts;
});

Route::get('/update', function () {
    $post = Post::find(6);

    $post->update([
        'title' => Str::random(10),
        'body' => 'data of poat',
        'date' => date('Y-m-d'),
        'user_id' => 3
    ]);


    $posts = POst::orderby('id', 'desc')->get();

    return $posts;
});

Route::get('/delete', function () {
    if(!$post = Post::find(3))
        return 'ja foi excluido';

    $post->delete();
    $posts = Post::orderby('id', 'desc')->get();

    return $posts;
});

Route::get('/soft-delete', function () {
    if(!$post = Post::find(5))
        return 'ja foi excluido';

    $post->delete();
    $posts = Post::orderby('id', 'desc')->get();

    return $posts;
});

Route::get('/accessor', function (){
    $post = Post::first();

    return $post;
});

Route::get('/mutators', function (){
    $user = User::first();
    $post = Post::create([
        'user_id' => $user->id,
        'title' => Str::random(),
        'body' => 'um body',
        'date' => now()
    ]);

    return $post;
});

Route::get('/local-scope', function (){
//    return Post::lastWeek()->get();
    return Post::yesterday()->get();
});

Route::get('/anonymous-global-scopes', function (){
//    return Post::get();
    return Post::withoutGlobalScope('year')->get();
});

Route::get('/global-scopes', function (){
//    return Post::get();
    return Post::withoutGlobalScope(\App\Scopes\YearScope::class)->get();
});

Route::get('/observer', function (){
    $post = Post::create([
        'title' => Str::random(16),
        'body' => Str::random(100),
        'date' => \Carbon\Carbon::now(),
    ]);
    return $post;
});

Route::get('/events', function (){
    $post = Post::create([
        'title' => Str::random(),
        'body' => Str::random(100),
        'date' => \Carbon\Carbon::now(),
    ]);
    return $post;
});

Route::get('/', function () {
    return view('welcome');
});
