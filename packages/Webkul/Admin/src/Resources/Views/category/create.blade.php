<x-app-layout>
    <x-slot name="header" class="flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
        <div class="space-x-4 pl-2">
            <x-nav-link href="{{ route('category.index') }}" :active="request()->routeIs('category.index')">
                {{ __('Index') }}
            </x-nav-link>

            <x-nav-link href="{{ route('category.create') }}" :active="request()->routeIs('category.create')">
                {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="p-2">
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" type="text" name="name" class="mt-1 block w-full" autocomplete="current-password" />
                            <x-input-error for="name" class="mt-2" />
                            <x-input-error for="slug" class="mt-2" />
                        </div>
                        
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="parent_id" value="{{ __('Select Parent Category') }}" />
                            <select name="parent_id" id="parent_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" >
                                <option value=""></option>
                                @foreach ($all as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="pt-2 float-right">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
