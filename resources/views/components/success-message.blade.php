<div
    x-data="{isOpen: true}"
    x-init="if (isOpen) {
        setTimeout(() => {
            isOpen = false
        }, 5000)
    }"
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-8"
    class="fixed bottom-10 right-10 bg-green-200 px-3 py-2 rounded-xl">
    <div class="flex">
        <p class="text-gray-700 mr-5">{{session('success')}}</p>

        <button type="button" @click="isOpen = false" >
            <svg  class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

</div>
