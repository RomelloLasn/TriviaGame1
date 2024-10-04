<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getRandomQuestions()
    {
        $questions = Question::inRandomOrder()->take(10)->get()->map(function ($question) {
            return [
                'question' => $question->question,
                'answers' => [
                    $question->answer_1,
                    $question->answer_2,
                    $question->answer_3,
                    $question->answer_4,
                ],
                'correct_answer' => $question->correct_answer
            ];
        });

        return response()->json($questions);
    }
}
