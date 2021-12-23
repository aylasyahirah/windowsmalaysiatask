<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Customer') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form method="POST" action="{{ route('customer.store') }}" enctype='multipart/form-data'>
            @csrf

            <div>
              <x-label for="name" :value="__('Name')" />

              <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
              <x-label for="email" :value="__('Email')" />

              <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div>
              <x-label for="icno" :value="__('IC No')" />

              <x-input id="icno" class="block mt-1 w-full" type="text" name="icno" :value="old('icno')" required autofocus />
            </div>

            <div>
              <x-label for="telno" :value="__('Telephone No')" />

              <x-input id="telno" class="block mt-1 w-full" type="text" name="telno" :value="old('telno')" />
            </div>

            <div>
              <x-label for="phone" :value="__('Phone No')" />

              <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            </div>

            <div>
              <x-label for="officeno" :value="__('Office Phone No')" />

              <x-input id="officeno" class="block mt-1 w-full" type="text" name="officeno" :value="old('officeno')" />
            </div>

            <div>
              <x-label for="occupation" :value="__('Occupation')" />

              <x-input id="occupation" class="block mt-1 w-full" type="text" name="occupation" :value="old('occupation')" />
            </div>

            <div>
              <x-label for="race" :value="__('Race')" />

              <select class="form-control" name="race">
                <option value="">Select Race</option>
                <option value="M">Malay</option>
                <option value="C">Chinese</option>
                <option value="I">Indian</option>
                <option value="O">Others</option>
              </select>
            </div>

            <div>
              <x-label for="religion" :value="__('Religion')" />

              <select class="form-control" name="religion">
                <option value="">Select Religion</option>
                <option value="M">Muslim</option>
                <option value="B">Buddha</option>
                <option value="H">Hindu</option>
                <option value="C">Christian</option>
                <option value="O">Others</option>
              </select>
            </div>

            <div>
              <x-label for="address1" :value="__('Address 1')" />

              <x-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" />
            </div>

            <div>
              <x-label for="address2" :value="__('Address 2')" />

              <x-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" />
            </div>

            <div>
              <x-label for="postcode" :value="__('Postcode')" />

              <x-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" />
            </div>

            <div>
              <x-label for="city" :value="__('City')" />

              <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
            </div>

            <div>
              <x-label for="province" :value="__('Province')" />

              <x-input id="province" class="block mt-1 w-full" type="text" name="province" :value="old('province')" />
            </div>

            <div>
              <x-label for="image" :value="__('Profile Picture')" />

              <x-input id="image" class="block mt-1 w-full" type="file" name="image" />
            </div>

            <div class="mt-4">
              <x-label for="note" :value="__('Note')" />

              <textarea name="note" rows="3"></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
              <x-button class="ml-3">
                {{ __('Save') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>