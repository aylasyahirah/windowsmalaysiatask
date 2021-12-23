<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Customer') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
          <x-button class="ml-3">
            <a href="{{ route('customer.create') }}">
              {{ ('Add Customer') }}
            </a>
          </x-button>
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
          <table style="width:100%" class="table-auto border-collapse border">
            <thead>
              <tr>
                <th>Name</th>
                <th>Identification Number</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($customers as $customer)
              <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->identification_no }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone_no }}</td>
                <td>
                  {{ Form::open(array('url' => 'customer/' . $customer->id, 'class' => 'pull-right')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  <a href="{{ route('customer.edit', $customer->id) }}"><i class="fas fa-edit"></i></a>
                  <button type="submit"><i class="fas fa-trash"></i></button>
                  {{ Form::close() }}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>