@props(['align' => 'right', 'width' => '48'])

<div x-data="{ open: false }" @keydown.escape="open = false" 
     class="relative inline-block text-left">
    <div>
        <button type="button" @click="open = ! open" 
                :class="{ 'bg-gray-100': open }" 
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
            {{ $trigger }}
        </button>
    </div>

    <div x-show="open" @click.away="open = false" 
         :class="{
             'origin-top-right': align === 'right',
             'origin-top-left': align === 'left',
         }"
         class="absolute z-10 mt-2 w-{{ $width }} rounded-md shadow-lg"
         x-cloak>
        <div class="rounded-md bg-white dark:bg-gray-800 shadow-xs">
            {{ $content }}
        </div>
    </div>
</div>
