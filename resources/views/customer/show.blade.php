<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex flex-row">
            <div class="basis-1/2">
              <img src="{{ $path }}" style="height: 150px;" />
            </div>
            <div class="basis-1/2" style="width: 100%;padding-left:50px">
              <table class="table-auto" style="width: 100%;">
                <tbody>
                  <tr>
                    <th style="text-align:left;">Name</th>
                    <td>{{ $customer->name }}</td>
                    <th style="text-align:left;">Email</th>
                    <td>{{ $customer->email }}</td>
                    <th style="text-align:left;">Identification Number</th>
                    <td>{{ $customer->identification_no }}</td>
                  </tr>
                  <tr>
                    <th style="text-align:left;">Telephone Number</th>
                    <td>{{ $customer->tel_phone_no }}</td>
                    <th style="text-align:left;">Phone Number</th>
                    <td>{{ $customer->phone_no }}</td>
                    <th style="text-align:left;">Office Phone Number</th>
                    <td>{{ $customer->office_phone_no }}</td>
                  </tr>
                  <tr>
                    <th style="text-align:left;">Occupation</th>
                    <td>{{ $customer->occupation }}</td>
                    <th style="text-align:left;">Race</th>
                    <td>{{ $customer->race }}</td>
                    <th style="text-align:left;">Religion</th>
                    <td>{{ $customer->religion }}</td>
                  </tr>
                  <tr>
                    <th style="text-align:left;">Address</th>
                    <td>{{ $customer->address_1 }} {{ $customer->address_2 }}</td>
                  </tr>
                  <tr>
                    <th style="text-align:left;">Postcode</th>
                    <td>{{ $customer->postcode }}</td>
                    <th style="text-align:left;">City</th>
                    <td>{{ $customer->city }}</td>
                    <th style="text-align:left;">Province</th>
                    <td>{{ $customer->province }}</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>