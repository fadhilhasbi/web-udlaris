<div class="mx-auto w-full flex-grow border-y border-gray-200 bg-gray-100 px-4 py-10 dark:border-gray-700 dark:bg-slate-800 sm:px-6 lg:px-8">
    <div class="p-8">
        <div class="mt-12 rounded-lg bg-white p-4 py-8 shadow-xl dark:bg-slate-900">
            <h4 class="text-center text-4xl font-bold uppercase tracking-widest text-gray-800 dark:text-gray-100">FAQ</h4>
            <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-300">Here are some of the frequently asked questions</p>
            <div class="mt-12 space-y-12 px-2 xl:px-16">
                @foreach($faqs as $faq)
                    <div class="mt-4 flex">
                        <div>
                            <div class="flex h-16 items-center border-l-4 border-blue-600">
                                <span class="px-4 text-4xl text-blue-600">Q.</span>
                            </div>
                            <div class="flex h-16 items-center border-l-4 border-gray-400">
                                <span class="px-4 text-4xl text-gray-400">A.</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex h-16 items-center">
                                <span class="text-lg font-bold text-blue-600">{{ $faq['question'] }}</span>
                            </div>
                            <div class="flex items-center py-2">
                                <span class="text-gray-500">{{ $faq['answer'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
