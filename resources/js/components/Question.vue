<template>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">{{ question.question }}</h2>
        <div v-for="(answer, index) in shuffledAnswers" :key="index" class="mb-2">
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 w-full text-left">{{ answer }}</button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        question: Object,
        shuffledAnswers: Array
    }
};
</script>
