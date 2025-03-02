@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="grid grid-cols-3 gap-4 ">
        <div class="bg-blue-100 px-4 py-8 rounded-lg shadow flex items-center justify-between">
            <h2 class="text-lg">Total Products</h2>
            <span class="text-4xl font-bold">100</span>
        </div>

        <div class="bg-red-100 px-4 py-8 rounded-lg shadow flex items-center justify-between">
            <h2 class="text-lg">Pending Orders</h2>
            <span class="text-4xl font-bold">250</span>
        </div>

        <div class="bg-green-100 px-4 py-8 rounded-lg shadow flex items-center justify-between">
            <h2 class="text-lg">Total Orders</h2>
            <span class="text-4xl font-bold">360</span>
        </div>
    </div>
@endsection
