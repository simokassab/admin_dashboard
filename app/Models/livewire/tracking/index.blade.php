<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <main class="p-6 sm:p-10 space-y-6">
                    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
                        <div class="mr-6">
                            <h1 class="text-4xl font-semibold mb-2">{{ $tracking->msisdn }} Details</h1>
                        </div>

                    </div>
                    <section class="grid md:grid-cols-5 grid-cols-1 gap-6">
                    </section>
                    <section class="gap-6">
                        <livewire:tracking.logs-data-table tracking_id="{{ $tracking->id }}" />
                    </section>
                </main>

            </div>
        </div>
    </div>
</div>
