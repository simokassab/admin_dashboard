<div>
    <div class="py-12 ">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <main class="p-6 sm:p-10 space-y-6 dark:bg-gray-800">
                    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                        <div class="mr-6">
                            <h1 class="text-4xl font-semibold mb-2 dark:text-gray-200">Dashboard</h1>
                            <div>
                                @if (session()->has('message'))
                                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{ session('message') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <section class="grid md:grid-cols-1 xl:grid-cols-3 gap-6">
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-2xl font-bold dark:text-gray-200">{{$visits}}</span>
                                <span class="block text-gray-500 dark:text-gray-200"> Visits</span>
                            </div>
                        </div>
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-2xl font-bold dark:text-gray-200">{{ $success }}</span>
                                <span class="block text-gray-500 dark:text-gray-200">Success</span>
                            </div>
                        </div>
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block text-2xl font-bold dark:text-gray-200">{{ $failure }}</span>
                                <span class="block text-gray-500 dark:text-gray-200">Failure</span>
                            </div>
                        </div>
                    </section>
                    <section class="gap-6">
                        <livewire:dashboard-table />
                    </section>
                </main>

            </div>
        </div>
    </div>
</div>
