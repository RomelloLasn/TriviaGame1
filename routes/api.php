<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/question', [QuestionController::class, 'getRandomQuestion']);
