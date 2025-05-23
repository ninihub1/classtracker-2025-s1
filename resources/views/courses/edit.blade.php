<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Management') }}
        </h2>
    </x-slot>

    @auth
        <x-flash-message :data="session()"/>
    @endauth

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3 class="text-xl font-bold mb-6">Edit Courses</h3>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger text-red-600">
                            There were some problems with your input.<br><br>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <form action="{{ route('courses.update', $course->id) }}"
                              method="POST"
                              class="flex gap-4">

                            @method('patch')
                            @csrf

                            <div class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                <header
                                    class="border-b border-neutral-200 bg-zinc-800 font-medium text-white dark:border-white/10">
                                    <p class="col-span-1 px-6 py-4 border-b border-zinc-200 dark:border-white/10">
                                        Edit new course's details
                                    </p>
                                </header>

                                <section
                                    class="py-4 px-6 border-b border-neutral-200 bg-gray-100 font-medium text-zinc-800 dark:border-white/10">

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="national_code">
                                            National Code  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <x-text-input id="national_code" name="national_code" value="{{ old('national_code') ?? $course->national_code}}" placeholder="E.g. BSB00000"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('national_code')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="aqf_level">
                                            aqf_level  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <x-text-input id="aqf_level" name="aqf_level" value="{{ old('aqf_level') ?? $course->aqf_level}}" placeholder="E.g. Certificate I in"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('aqf_level')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="title">
                                            Title  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <x-text-input id="title" name="title" value="{{ old('title') ?? $course->title }}" placeholder="E.g. Business"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="tga_status">
                                            TGA Status  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <select id="tga_status" name="tga_status" class="rounded-md shadow-sm border-gray-300 text-black placeholder-gray-500">
                                            <option value="Current" {{ old('tga_status', $course->tga_status) == 'Current' ? 'selected' : '' }}>Current</option>
                                            <option value="Replaced" {{ old('tga_status', $course->tga_status) == 'Replaced' ? 'selected' : '' }}>Replaced</option>
                                            <option value="Expired" {{ old('tga_status', $course->tga_status) == 'Expired' ? 'selected' : '' }}>Expired</option>
                                            <option value="Not Provided" {{ old('tga_status', $course->tga_status) == 'null' ? 'selected' : '' }}>Not Provided</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('tga_status')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="state_code">
                                            State Code  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <x-text-input id="state_code" name="state_code" value="{{ old('state_code') ?? $course->state_code }}" placeholder="E.g. AVU0"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('state_code')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="nominal_hours">
                                            Nominal Hours  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <x-text-input id="nominal_hours" name="nominal_hours" value="{{ old('nominal_hours') ?? $course->nominal_hours }}" placeholder="E.g. 150"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('nominal_hours')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="type">
                                            Type  <span class="text-red-600">*</span>
                                        </x-input-label>
                                        <select id="type" name="type" class="rounded-md shadow-sm border-gray-300 text-black placeholder-gray-500">
                                            <option value="Qualification" {{ old('type', $course->type) == 'Qualification' ? 'selected' : '' }}>Qualification</option>
                                            <option value="Not Provided" {{ old('type', $course->type) == 'null' ? 'selected' : '' }}>Not Provided</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="qa">
                                            QA
                                        </x-input-label>
                                        <x-text-input id="qa" name="qa" value="{{ old('qa') ?? $course->qa }}" placeholder="E.g. AVU0"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('qa')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="nat_code">
                                            Nat Code
                                        </x-input-label>
                                        <x-text-input id="nat_code" name="nat_code" value="{{ old('nat_code') ?? $course->nat_code}}" placeholder="E.g. BSB00000"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('nat_code')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="nat_title">
                                            Nat Title
                                        </x-input-label>
                                        <x-text-input id="nat_title" name="nat_title" value="{{ old('nat_title') ?? $course->nat_title}}" placeholder="E.g. Business"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('nat_title')" class="mt-2"/>
                                    </div>

                                    <div class="flex flex-col my-2">
                                        <x-input-label for="nat_code_title">
                                            Nat Code & Title
                                        </x-input-label>
                                        <x-text-input id="nat_code_title" name="nat_code_title" value="{{ old('nat_code_title') ?? $course->nat_code_title  }}" placeholder="E.g. BSB00000 Certificate I in Business"
                                                      class="placeholder-gray-500 text-black"/>
                                        <x-input-error :messages="$errors->get('nat_code_title')" class="mt-2"/>
                                    </div>

                                </section>

                                <footer
                                    class="flex gap-4 px-6 py-4 border-b border-neutral-200 font-medium text-zinc-800 dark:border-white/10">

                                    <x-primary-link-button href="{{ route('courses.index') }}" class="bg-zinc-800">
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
