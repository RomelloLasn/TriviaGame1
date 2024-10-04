<template>
    <div id="app" class="min-h-screen flex flex-col bg-gray-100">
        <header class="bg-blue-600 text-white p-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-bold">Trivia Game</h1>
            </div>
        </header>
        <main class="flex-grow p-4 container mx-auto">
            <div v-if="!gameStarted" class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Welcome to the Trivia Game!</h2>
                <p class="mb-4">Test your knowledge with our fun and challenging trivia questions.</p>
                <button @click="startGame" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Start Game</button>
            </div>
            <div v-else class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">{{ currentQuestion.question }}</h2>
                <div v-for="(answer, index) in shuffledAnswers" :key="index" class="mb-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 w-full text-left">{{ answer }}</button>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
import axios from 'axios';
import Question from './components/Question.vue';

export default {
    name: 'App',
    components: {
        Question
    },
    data() {
        return {
            gameStarted: false,
            questions: [],
            currentQuestionIndex: 0,
        };
    },
    computed: {
        currentQuestion() {
            return this.questions[this.currentQuestionIndex];
        },
        shuffledAnswers() {
            if (!this.currentQuestion) return [];
            const answers = [
                this.currentQuestion.answer_1,
                this.currentQuestion.answer_2,
                this.currentQuestion.answer_3,
                this.currentQuestion[`answer_${this.currentQuestion.correct_answer}`]
            ];
            return answers.sort(() => Math.random() - 0.5);
        }
    },
    methods: {
        async startGame() {
            try {
                const response = await axios.get('/api/questions');
                this.questions = response.data;
                this.gameStarted = true;
            } catch (error) {
                console.error('Error fetching questions:', error);
            }
        }
    }
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>
