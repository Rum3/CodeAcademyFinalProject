@extends('admin.dashboard')
@section('content2')
<form method="POST" action="{{ route('user.update', ['id'=>$user->id]) }}">
    @csrf
    @method('PUT')
    <div class="relative bottom-40 left-60 w-3/4 h-1/2 overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
      <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Username</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          <tr class="hover:bg-gray-50">
            <td class="flex gap-4 px-6 py-4 font-normal text-gray-900">
              <div class="text-sm">
                <div class="font-medium text-gray-700">
                  <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" type="text" id="name" value="{{ $user->name }}">
                </div>
              </div>
            </td>
            <td class="px-4 py-4">
              <div class="text-sm">
                <div class="text-gray-400">
                  <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" type="text" id="email" value="{{ $user->email }}">
                </div>
              </div>
            </td>
            <td class="px-6 py-4">
              <div>
                <select id="roleSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role">
                  <option value="admin">admin</option>
                  <option value="student">student</option>
                  <option value="employer">employer</option>
                  <option value="teacher">teacher</option>
                  <option value="regular">regular</option>
                </select>
              </div>
            </td>
            {{-- <td class="px-6 py-4">
            <div class="relative" id="trainingsContainer" style="display:none">
                <button id="dropdownHoverButton3" data-dropdown-toggle="trainingsDropdown" data-dropdown-trigger="click"  class="text-gray-900 bg-gray-50 border border-gray-300 text-gray-900 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm-40 px-20 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Trainings<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            </div>
            </td> --}}
            <td class="px-6 py-4">
              <div class="flex justify-end gap-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
</form>
{{-- <div id="trainingsDropdown" class="hidden text-gray-900 bg-gray-50 border border-gray-300 text-gray-900 font-small rounded-lg px-5 py-2.5 mr-2">
    @foreach ($trainings as $training)
        <div class="flex items-center">
            <input type="checkbox" name="trainings[]" value="{{ $training->id }}" class="mr-2"
                   {{ in_array($training->id, $user->student->trainings->pluck('id')->toArray()) ? 'checked' : '' }}>
            <span class="text-gray-700">{{ $training->title }}</span>
        </div>
    @endforeach
</div> --}}

  <script src="{{ asset('js/users.js') }}"></script>
    @endsection
