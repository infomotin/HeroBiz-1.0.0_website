<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminServiceDetailController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminPortfolioCategoryController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminBlogPostController;
use App\Http\Controllers\Admin\AdminBlogCategoryController;
use App\Http\Controllers\Admin\AdminBlogTagController;
use App\Http\Controllers\Admin\AdminBlogAuthorController;
use App\Http\Controllers\Admin\AdminBlogCommentController;
use App\Http\Controllers\Admin\AdminPricingController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminContactMessageController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminAboutSectionController;
use App\Http\Controllers\Admin\AdminAboutTabController;
use App\Http\Controllers\Admin\AdminCallToActionController;
use App\Http\Controllers\Admin\AdminOnfocusController;
use App\Http\Controllers\Admin\AdminFeatureController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Heroes
    Route::resource('hero', AdminHeroController::class);

    // Services
    Route::resource('service', AdminServiceController::class);
    Route::resource('service-detail', AdminServiceDetailController::class);

    // Portfolio
    Route::resource('portfolio', AdminPortfolioController::class);
    Route::resource('portfolio-category', AdminPortfolioCategoryController::class);

    // Testimonials
    Route::resource('testimonial', AdminTestimonialController::class);

    // Team
    Route::resource('team', AdminTeamController::class);

    // Blog
    Route::resource('blog-post', AdminBlogPostController::class);
    Route::resource('blog-category', AdminBlogCategoryController::class);
    Route::resource('blog-tag', AdminBlogTagController::class);
    Route::resource('blog-author', AdminBlogAuthorController::class);

    // Blog Comments
    Route::get('blog-comment', [AdminBlogCommentController::class, 'index'])->name('blog-comment.index');
    Route::get('blog-comment/{comment}', [AdminBlogCommentController::class, 'show'])->name('blog-comment.show');
    Route::post('blog-comment/{comment}/approve', [AdminBlogCommentController::class, 'approve'])->name('blog-comment.approve');
    Route::post('blog-comment/{comment}/spam', [AdminBlogCommentController::class, 'spam'])->name('blog-comment.spam');
    Route::post('blog-comment/{comment}/trash', [AdminBlogCommentController::class, 'trash'])->name('blog-comment.trash');
    Route::delete('blog-comment/{comment}', [AdminBlogCommentController::class, 'destroy'])->name('blog-comment.destroy');

    // Pricing
    Route::resource('pricing', AdminPricingController::class);

    // FAQs
    Route::resource('faq', AdminFaqController::class);

    // Clients
    Route::resource('client', AdminClientController::class);

    // Pages
    Route::resource('page', AdminPageController::class);

    // Contact Messages
    Route::get('contact-message', [AdminContactMessageController::class, 'index'])->name('contact-message.index');
    Route::get('contact-message/{contactMessage}', [AdminContactMessageController::class, 'show'])->name('contact-message.show');
    Route::post('contact-message/{contactMessage}/archive', [AdminContactMessageController::class, 'archive'])->name('contact-message.archive');
    Route::delete('contact-message/{contactMessage}', [AdminContactMessageController::class, 'destroy'])->name('contact-message.destroy');

    // Settings
    Route::get('setting', [AdminSettingController::class, 'index'])->name('setting.index');
    Route::put('setting', [AdminSettingController::class, 'update'])->name('setting.update');

    // About Section
    Route::resource('about-section', AdminAboutSectionController::class);

    // About Tab
    Route::resource('about-tab', AdminAboutTabController::class);

    // Call to Action
    Route::resource('call-to-action', AdminCallToActionController::class);

    // Onfocus Section
    Route::resource('onfocus', AdminOnfocusController::class);

    // Feature
    Route::resource('feature', AdminFeatureController::class);
});
