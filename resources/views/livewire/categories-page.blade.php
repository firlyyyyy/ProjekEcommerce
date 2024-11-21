<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @foreach ($categories as $category)
            <a wire:key="{{ $category->id }}" wire:navigate href="/products?selected_categories[0]={{ $category->id }}"
                class="group flex flex-col bg-white border border-gray-200 rounded-xl shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 dark:bg-slate-900 dark:border-gray-800">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <img class="h-20 w-20 rounded-lg object-cover" src="{{ url('storage', $category->image) }}"
                                alt="{{ $category->name }}">
                            <div>
                                <h3
                                    class="text-2xl font-semibold text-gray-800 group-hover:text-rose-600 dark:text-gray-200 dark:group-hover:text-rose-400">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="text-rose-600 dark:text-rose-400">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
