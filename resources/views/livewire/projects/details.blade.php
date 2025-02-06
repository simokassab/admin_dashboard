<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <main class="p-6 sm:p-10 space-y-6 dark:bg-gray-800">
                    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                        <div class="mr-6">
                            <h1 class="text-4xl font-semibold mb-2 dark:text-gray-200">Project Details</h1>
                            <h1 class="text-4xl font-semibold mb-2 dark:text-gray-200"> {{ $project->project->name }} </h1>
                        </div>

                    </div>
                    <section class="grid md:grid-cols-5 grid-cols-5 gap-6">
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                                <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-2xl font-bold dark:text-gray-200">{{ $visits }}</span>
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
                                <span class="block text-2xl font-bold dark:text-gray-200">{{ $successes }}</span>
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
                                <span class="inline-block text-2xl font-bold dark:text-gray-200">{{ $failures }}</span>
                                <span class="inline-block text-xl text-gray-500 font-semibold"></span>
                                <span class="block text-gray-500 dark:text-gray-200">Failure</span>
                            </div>
                        </div>
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-yellow-600 bg-yellow-100 rounded-full mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
                                </svg>
                            </div>
                            <div>
                                <span class="inline-block text-2xl font-bold dark:text-gray-200">{{ $first_clicks }}</span>
                                <span class="inline-block text-xl text-gray-500 font-semibold"></span>
                                <span class="block text-gray-500 dark:text-gray-200">First Clicks</span>
                            </div>
                        </div>
                        <div class="flex items-center p-8 bg-white shadow rounded-lg dark:bg-gray-600">
                            <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5" />
                                </svg>

                            </div>
                            <div>
                                <span class="inline-block text-2xl font-bold dark:text-gray-200">{{ $second_clicks }}</span>
                                <span class="inline-block text-xl text-gray-500 font-semibold"></span>
                                <span class="block text-gray-500 dark:text-gray-200">Second Clicks</span>
                            </div>
                        </div>
                    </section>
                    <section >
                        <livewire:projects.project-data-table project_id="{{$project->id}}" />
                    </section>
                </main>

            </div>
        </div>
    </div>
</div>
