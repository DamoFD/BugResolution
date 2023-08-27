<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header class="mb-10">
                            <h1 class="text-lg font-medium text-gray-900">
                                {{ ucwords($question->title) }}
                            </h1>
                            <a class="text-blue-500" href="{{ route('questions.edit', $question) }}">
                                <button>
                                    {{ __('Edit') }}
                                </button>
                            </a>
                        </header>
                        <p>
                            {!! $question->body !!}
                        </p>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
