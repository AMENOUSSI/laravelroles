<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles Create') }}
            </h2>
            <a href="{{ route('articles.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-xl rounded-md text-white px-5 py-3">&rightarrow;</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Title</label>
                            <div class="my-3">
                                <input type="text" name="title" id="title" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Title">
                                @error('title')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="" class="text-lg font-medium">Content</label>
                            <div class="my-3">
                                <textarea name="text" placeholder="Content" id="text"  class="border-gray-300 shadow-sm w-1/2 rounded-lg" cols="30" rows="10">{{ old('text') }}</textarea>
                                @error('text')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-lg font-medium">Author</label>
                            <div class="my-3">
                                <input value="{{ old('author') }}" type="text" name="author" id="author" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Author">
                                @error('author')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="text-lg bg-gray-800 py-2 px-3 text-white rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
