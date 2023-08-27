<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
        <div class="h-fit min-h-full flex justify-end">
            <a class="text-blue-500 text-right content-end" href="{{ route('questions.create') }}">
                + New Question
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('All Questions') }}
                            </h2>
                        </header>
                        @if (session('status'))
                            <p
                                class="text-lg font-medium text-white bg-green-600"
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 3000)"
                                class="text-sm text-gray-600"
                            >{{ session('status') }}</p>
                        @endif
                        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                            @foreach ($questions as $question)
                                <div class="p-6 flex space-x-2">
                                    <div class="flex-1">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-gray-800">{{ $question->user->name }}</span>
                                                <small class="ml-2 text-sm text-gray-600">{{ $question->created_at->format('j M Y, g:i a') }}</small>
                                            </div>
                                        </div>
                                        <h2 class="text-lg font-medium text-gray-900">
                                            <a href="{{ route('questions.show', $question) }}">
                                                {{ $question->title }}
                                            </a>
                                        </h2>
                                        <div>
                                            <a class="text-blue-500" href="{{ route('questions.edit', $question) }}">
                                                <button>
                                                    {{ __('Edit') }}
                                                </button>
                                            </a>
                                            <form style="display: inline" method="POST" action="{{ route('questions.destroy', $question) }}">
                                                @csrf
                                                @method('delete')
                                                <a class="text-blue-500" href="{{ route('questions.destroy', $question) }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </a>
                                            </form>
                                        </div>
                                        <p class="mt-4 text-lg text-gray-900">{!! $question->body !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
