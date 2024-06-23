
@extends('layouts.app')

@section('content')

<h1 class="text-3xl text-black-500 mb-3 mt-10">Listes des utilisateurs</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nom
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Roles
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $items)
            <tr class="bg-gray-900 dark:bg-gray-900 border border-gray-700 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                    {{$items->name}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                    {{$items->email}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap ">
                    @foreach ($items->roles as $role)
                    {{ $role->name }}
                    @endforeach
                </th>
                <td class="px-6 py-4">
                    <!-- <a href="#" class="font-medium bg-green-500 px-2 py2 text-white rounded-md hover:underline">Attribuer</a> -->
                    <a href="{{route('admin.users.edit',['user' => $items->id ])}}" class="font-medium bg-blue-500 px-2 py2 text-white rounded-md hover:none">Edit</a>
                    <a href="#" class="font-medium bg-red-500 px-2 py2 text-white rounded-md  hover:none">Remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<a href="#" class="font-medium bg-blue-500 px-4 py-2 text-white rounded-md hover:none">Back</a>

@endsection