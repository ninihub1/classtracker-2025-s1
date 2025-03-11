<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Units Management') }}
        </h2>
    </x-slot>

    @auth
        <x-flash-message :data="session()"/>
    @endauth

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-xl font-bold mb-6">Create Units</h3>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger text-red-600">
                            There were some problems with your input.<br><br>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <form action="{{ route('units.store') }}"
                              method="POST"
                              class="flex gap-4">

                            @csrf

                            <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                <header
                                    class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                    <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                        Enter new unit's details
                                    </p>
                                </header>

                                <section
                                    class="py-4 px-6 border-b border-neutral-200 bg-gray-100 font-medium text-zinc-800 dark:border-white/10">

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="national_code">
                                            National Code
                                        </x-input-label>
                                        <x-text-input id="national_code" name="national_code" value="{{ old('national_code') }}" placeholder="e.g. BSBMKG000"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('national_code')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="title">
                                            Title
                                        </x-input-label>
                                        <x-text-input id="title" name="title" value="{{ old('title') }}" placeholder="e.g. Analyse consumer behaviour for specific markets"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="tga_status">
                                            TGA Status
                                        </x-input-label>
                                        <select id="tga_status" name="tga_status" class="rounded-md shadow-sm border-gray-300 text-black placeholder-gray-500">
                                            <option value="Replaced">Replaced</option>
                                            <option value="Current">Current</option>
                                            <option value="Expired">Expired</option>
                                            <option value="Not Provided">Not Provided</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('tga_status')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="state_code">
                                            State Code
                                        </x-input-label>
                                        <x-text-input id="state_code" name="state_code" value="{{ old('state_code') }}" placeholder="e.g. AUJ00"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('state_code')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="nominal_hours">
                                            Nominal Hours
                                        </x-input-label>
                                        <x-text-input id="nominal_hours" name="nominal_hours" value="{{ old('nominal_hours') }}" placeholder="e.g. 50"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('nominal_hours')" class="mt-2"/>
                                    </div>

                                </section>

                                <footer
                                    class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">

                                    <x-primary-link-button href="{{ route('units.index') }}" class="bg-zinc-800">
                                        Cancel
                                    </x-primary-link-button>

                                    <x-primary-button type="submit" class="bg-zinc-800">
                                        Save
                                    </x-primary-button>
                                </footer>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
