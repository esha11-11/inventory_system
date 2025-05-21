<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\DefaultController;




// FRONTEND-CONTROLLER
use App\Http\Controllers\MainController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\MainBookController;


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

/* ADMIN AUTHOR CONTROLLER */
	Route::get('/admin/author/status_active', [AuthorController::class, 'status_active'])->name('author.status.active');
	Route::get('/admin/author/status_deactive', [AuthorController::class, 'status_deactive'])->name('author.status.deactive');
	Route::get('/admin/author/delete_all', [AuthorController::class, 'delete_all'])->name('author.delete.all');

	Route::get('/admin/author', [AuthorController::class, 'index'])->name('author.all');
	Route::get('/admin/author/create', [AuthorController::class, 'create'])->name('author.create');
	Route::post('/admin/author/store', [AuthorController::class, 'store'])->name('author.store');
	Route::get('/admin/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit');
	Route::put('/admin/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');
	Route::get('/admin/author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
	Route::get('/admin/author/{id}/status', [AuthorController::class, 'status'])->name('author.status');
	
	/* ADMIN CATEGORY CONTROLLER */
	Route::get('/admin/category/status_active', [CategoryController::class, 'status_active'])->name('category.status.active');
	Route::get('/admin/category/status_deactive', [CategoryController::class, 'status_deactive'])->name('category.status.deactive');
	Route::get('/admin/category/delete_all', [CategoryController::class, 'delete_all'])->name('category.delete.all');

	Route::get('/admin/category', [CategoryController::class, 'index'])->name('category.all');
	Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
	Route::post('/admin/category/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
	Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
	Route::post('/admin/category/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
	Route::get('/admin/category/{id}/status', [CategoryController::class, 'status'])->name('category.status');
	Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


	/* ADMIN MEDIA CONTROLLER */
	Route::get('/admin/media/status_active', [MediaController::class, 'status_active'])->name('media.status.active');
	Route::get('/admin/media/status_deactive', [MediaController::class, 'status_deactive'])->name('media.status.deactive');
	Route::get('/admin/media/delete_all', [MediaController::class, 'delete_all'])->name('media.delete.all');


	Route::get('/admin/media', [MediaController::class, 'index'])->name('media.all');
	Route::get('/admin/media/create', [MediaController::class, 'create'])->name('media.create');
	Route::post('/admin/media/store', [MediaController::class, 'store'])->name('media.store');
	Route::get('/admin/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
	Route::put('/admin/media/update/{id}', [MediaController::class, 'update'])->name('media.update');	
	Route::get('/admin/media/delete{id}', [MediaController::class, 'delete'])->name('media.delete');
	Route::get('/admin/media/{id}/status', [MediaController::class, 'status'])->name('media.status');
	
	/* ADMIN TEAM CONTROLLER */

	Route::get('/admin/team/status_active', [TeamController::class, 'status_active'])->name('team.status.active');
	Route::get('/admin/team/status_deactive', [TeamController::class, 'status_deactive'])->name('team.status.deactive');
	Route::get('/admin/team/delete_all', [TeamController::class, 'delete_all'])->name('team.delete.all');





	Route::get('/admin/team', [TeamController::class, 'index'])->name('team.all');
	Route::post('/admin/team/store', [TeamController::class, 'store'])->name('team.store');
	Route::get('/admin/team/create', [TeamController::class, 'create'])->name('team.create');
	Route::get('/admin/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
	Route::post('/admin/team/update/{id}', [TeamController::class, 'Update'])->name('team.update');
	Route::get('/admin/team/{id}/status', [TeamController::class, 'status'])->name('team.status');
	Route::get('/admin/team/{id}/delete', [TeamController::class, 'Delete'])->name('team.delete');


	












	/* ADMIN BOOK CONTROLLER */
	/* ADMIN BOOK CONTROLLER */
	Route::get('/admin/book/status_active', [BookController::class, 'status_active'])->name('book.status.active');
	Route::get('/admin/book/status_deactive', [BookController::class, 'status_deactive'])->name('book.status.deactive');
	Route::get('/admin/book/delete_all', [BookController::class, 'delete_all'])->name('book.delete.all');


	Route::get('/admin/book', [BookController::class, 'index'])->name('book.all');
	Route::get('/admin/book/create', [BookController::class, 'create'])->name('book.create');
	Route::post('/admin/book/store', [BookController::class, 'store'])->name('book.store');
	Route::get('/admin/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
	Route::put('/admin/book/update/{id}', [BookController::class, 'update'])->name('book.update');	
	Route::get('/admin/book/delete{id}', [BookController::class, 'delete'])->name('book.delete');
	Route::get('/admin/book/status/{id}', [BookController::class, 'status'])->name('book.status');



	/* ADMIN Default CONTROLLER */

	Route::get('/admin/slider/status_active', [DefaultController::class, 'status_active'])->name('slider.status.active');
	Route::get('/admin/slider/status_deactive', [DefaultController::class, 'status_deactive'])->name('slider.status.deactive');
	Route::get('/admin/slider/delete_all', [DefaultController::class, 'delete_all'])->name('slider.delete.all');

	Route::get('/admin/slider', [DefaultController::class, 'Slider'])->name('slider.all');
	Route::get('/admin/slider/create', [DefaultController::class, 'SliderCreate'])->name('slider.create');
	Route::put('/admin/slider/store', [DefaultController::class, 'Store'])->name('slider.store');
	// Route::get('/admin/slider/edit/{id}', [DefaultController::class, 'SliderEdit'])->name('slider.edit');
	// Route::post('/admin/slider/update', [DefaultController::class, 'SliderUpdate'])->name('slider.update');
	Route::get('/admin/slider/{id}/status', [DefaultController::class, 'status'])->name('slider.status');
	Route::get('/admin/slider/{id}/delete', [DefaultController::class, 'Delete'])->name('slider.delete');
      /*++++++++++++++++++++++++++++++++  footer  ++++++++++++++++++++++++++++++++*/
  Route::get('/admin/footer', [DefaultController::class, 'Index'])->name('footer.all');
  Route::get('/admin/footer/edit/{id}', [DefaultController::class, 'Edit'])->name('footer.edit');
	
Route::post('/admin/footer/update', [DefaultController::class, 'FooterUpdate'])->name('footer.update');









// Authentication routes.
	Route::get('/dashboard', function () {
	  return view('admin.book.index');
	})->middleware(['auth', 'verified'])->name('dashboard');

	Route::middleware('auth')->group(function () {
		Route::get('/admin/profile', [HomeController::class, 'profile'])->name('profile');
		Route::post('/admin/profile_update', [HomeController::class, 'profile_update'])->name('profile.update');
			  Route::get('/profile', [HomeController::class, 'edit'])->name('profile.edit');
		Route::post('/admin/update_password', [HomeController::class, 'update_password'])->name('update.password');
		
	  // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	  // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	});






// frontend development

	// specific pages routes
	Route::get('/category/{slug}', [MainCategoryController::class, 'show'])->name('category.show');
	Route::get('/book/{slug}', [MainBookController::class, 'show'])->name('book.show');

	// static pages routes
	Route::get('/contact', [MainController::class, 'contact'])->name('home.contact');
	Route::get('/author', [MainController::class, 'author'])->name('home.author');
	Route::get('/author/detail/{slug}', [MainController::class, 'author_detail'])->name('author.detail');
	Route::get('/gallery', [MainController::class, 'gallery'])->name('home.gallery');
	Route::get('/about', [MainController::class, 'about'])->name('home.about');
	Route::get('/', [MainController::class, 'index'])->name('home.page');










require __DIR__.'/auth.php';
